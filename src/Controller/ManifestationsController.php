<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * Manifestations Controller
 *
 * @property \App\Model\Table\ManifestationsTable $Manifestations
 *
 * @method \App\Model\Entity\Manifestation[] paginate($object = null, array $settings = [])
 */
class ManifestationsController extends AppController
{

    public function initialize(){
        parent::initialize();

        // Include the FlashComponent
        $this->loadComponent('Flash');
        // Load Files model
        $this->loadModel('Files');

    }

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
        $manifestations = $this->paginate($this->Manifestations->find('all')->where(['association_id' => $session->read('association_id') ]));

        $this->set(compact('manifestations'));
        $this->set('_serialize', ['manifestations']);
    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $manifestation = $this->Manifestations->newEntity();
        if ($this->request->is('post')) {
            $manifestation = $this->Manifestations->patchEntity($manifestation, $this->request->getData());
            if ($this->Manifestations->save($manifestation)) {
                $this->Flash->success(__('The manifestation has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The manifestation could not be saved. Please, try again.'));
        }
        $associations = $this->Manifestations->Associations->find('list', ['limit' => 200]);
        $this->set(compact('manifestation', 'associations'));
        $this->set('_serialize', ['manifestation']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Manifestation id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $manifestation = $this->Manifestations->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $manifestation = $this->Manifestations->patchEntity($manifestation, $this->request->getData());
            if ($this->Manifestations->save($manifestation)) {
                $this->Flash->success(__('The manifestation has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The manifestation could not be saved. Please, try again.'));
        }
        $associations = $this->Manifestations->Associations->find('list', ['limit' => 200]);
        $this->set(compact('manifestation', 'associations'));
        $this->set('_serialize', ['manifestation']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Manifestation id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $manifestation = $this->Manifestations->get($id);
        if ($this->Manifestations->delete($manifestation)) {
            $this->Flash->success(__('The manifestation has been deleted.'));
        } else {
            $this->Flash->error(__('The manifestation could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
