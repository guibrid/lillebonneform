<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * Requests Controller
 *
 * @property \App\Model\Table\RequestsTable $Requests
 *
 * @method \App\Model\Entity\Request[] paginate($object = null, array $settings = [])
 */
class RequestsController extends AppController
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
            $this->Auth->allow(['index','edit','add','delete','deletefile']);
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
        $requests = $this->paginate($this->Requests->find('all')->where(['association_id' => $session->read('association_id') ]));

        $this->set(compact('requests'));
        $this->set('_serialize', ['requests']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $request = $this->Requests->newEntity();
        if ($this->request->is('post')) {
            $request = $this->Requests->patchEntity($request, $this->request->getData());
            if ($this->Requests->save($request)) {
                $this->Flash->success(__('The request has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The request could not be saved. Please, try again.'));
        }
        $associations = $this->Requests->Associations->find('list', ['limit' => 200]);
        $this->set(compact('request', 'associations'));
        $this->set('_serialize', ['request']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Request id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $request = $this->Requests->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $request = $this->Requests->patchEntity($request, $this->request->getData());
            if ($this->Requests->save($request)) {
                $this->Flash->success(__('The request has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The request could not be saved. Please, try again.'));
        }
        $associations = $this->Requests->Associations->find('list', ['limit' => 200]);
        $this->set(compact('request', 'associations'));
        $this->set('_serialize', ['request']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Request id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $request = $this->Requests->get($id);
        if ($this->Requests->delete($request)) {
            $this->Flash->success(__('The request has been deleted.'));
        } else {
            $this->Flash->error(__('The request could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function deletefile()
        {
            $controllerName = strtolower($this->request->params['controller']);

            $fileToDelete = $this->Requests->get($this->request->query['id']);
            $fileName = $this->request->query['file_type'];
            $dirName = $this->request->query['file_type'].'_dir';

            //Supprimer le fichier physics
            $urlFile = 'files/'.$controllerName.'/'.$this->request->query['file_type'].'/'.$fileToDelete->$dirName.'/'.$fileToDelete->$fileName;
            $urlFolder = 'files/'.$controllerName.'/'.$this->request->query['file_type'].'/'.$fileToDelete->$dirName;

            unlink($urlFile);
            rmdir($urlFolder);
            $updatedData = [$this->request->query['file_type'] => '', $this->request->query['file_type'].'_dir' => ''];

            $fileToDelete = $this->Requests->patchEntity($fileToDelete, $updatedData);
            if ($this->Requests->save($fileToDelete)) {
              $this->Flash->success(__('Le fichier est supprimé.'));
              return $this->redirect(['controller' => 'Requests', 'action' => 'edit', $this->request->query['id']]);

          } else {
            $this->Flash->error(__('Le fichier n\'a pas pu être supprimé'));
            return $this->redirect(['controller' => 'Requests', 'action' => 'edit', $this->request->query['id']]);
          }

        }
}
