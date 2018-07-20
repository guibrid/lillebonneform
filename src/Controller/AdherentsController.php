<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * Adherents Controller
 *
 * @property \App\Model\Table\AdherentsTable $Adherents
 *
 * @method \App\Model\Entity\Adherent[] paginate($object = null, array $settings = [])
 */
class AdherentsController extends AppController
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
        $adherents = $this->paginate($this->Adherents->find('all')->where(['association_id' => $session->read('association_id') ]));

        $this->set(compact('adherents'));
        $this->set('_serialize', ['adherents']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $adherent = $this->Adherents->newEntity();
        if ($this->request->is('post')) {
            $adherent = $this->Adherents->patchEntity($adherent, $this->request->getData());
            if ($this->Adherents->save($adherent)) {
                $this->Flash->success(__('L\'adherent est enregistré.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('L\'adherent n\'a pas pu être enregistré.'));
        }
        $associations = $this->Adherents->Associations->find('list', ['limit' => 200]);
        $this->set(compact('adherent', 'associations'));
        $this->set('_serialize', ['adherent']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Adherent id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $adherent = $this->Adherents->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $adherent = $this->Adherents->patchEntity($adherent, $this->request->getData());
            if ($this->Adherents->save($adherent)) {
                $this->Flash->success(__('L\'adherent est enregistré.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('L\'adherent n\'a pas pu être enregistré.'));
        }
        $associations = $this->Adherents->Associations->find('list', ['limit' => 200]);
        $this->set(compact('adherent', 'associations'));
        $this->set('_serialize', ['adherent']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Adherent id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $adherent = $this->Adherents->get($id);
        if ($this->Adherents->delete($adherent)) {
            $this->Flash->success(__('L\'adherent est supprimé.'));
        } else {
            $this->Flash->error(__('L\'adherent n\'a pas pu être supprimé.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
