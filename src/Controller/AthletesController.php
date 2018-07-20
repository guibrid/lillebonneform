<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * Athletes Controller
 *
 * @property \App\Model\Table\AthletesTable $Athletes
 *
 * @method \App\Model\Entity\Athlete[] paginate($object = null, array $settings = [])
 */
class AthletesController extends AppController
{

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);

        $user = $this->Auth->user();
        if (isset($user['role']) && $user['role'] === 'author') {
            $this->Auth->allow(['index','edit','add','delete']);
        }

    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Associations']
        ];
        $session = $this->request->session();
        $athletes = $this->paginate($this->Athletes->find('all')->where(['association_id' => $session->read('association_id') ]));

        $this->set(compact('athletes'));
        $this->set('_serialize', ['athletes']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $athlete = $this->Athletes->newEntity();
        if ($this->request->is('post')) {
            $athlete = $this->Athletes->patchEntity($athlete, $this->request->getData());
            if ($this->Athletes->save($athlete)) {
                $this->Flash->success(__('The athlete has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The athlete could not be saved. Please, try again.'));
        }
        $associations = $this->Athletes->Associations->find('list', ['limit' => 200]);
        $this->set(compact('athlete', 'associations'));
        $this->set('_serialize', ['athlete']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Athlete id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $athlete = $this->Athletes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $athlete = $this->Athletes->patchEntity($athlete, $this->request->getData());
            if ($this->Athletes->save($athlete)) {
                $this->Flash->success(__('The athlete has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The athlete could not be saved. Please, try again.'));
        }
        $associations = $this->Athletes->Associations->find('list', ['limit' => 200]);
        $this->set(compact('athlete', 'associations'));
        $this->set('_serialize', ['athlete']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Athlete id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $athlete = $this->Athletes->get($id);
        if ($this->Athletes->delete($athlete)) {
            $this->Flash->success(__('The athlete has been deleted.'));
        } else {
            $this->Flash->error(__('The athlete could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
