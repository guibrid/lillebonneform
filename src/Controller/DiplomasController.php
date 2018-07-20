<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * Diplomas Controller
 *
 * @property \App\Model\Table\DiplomasTable $Diplomas
 *
 * @method \App\Model\Entity\Diploma[] paginate($object = null, array $settings = [])
 */
class DiplomasController extends AppController
{

    public function initialize(){
        parent::initialize();

        // Include the FlashComponent
        $this->loadComponent('Flash');
        // Load Files model
        $this->loadModel('Files');

        $this->loadComponent('RequestHandler');

    }

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);

        $user = $this->Auth->user();
        if (isset($user['role']) && $user['role'] === 'author') {
            $this->Auth->allow(['index','edit','add','delete','cartepro','deletefile']);
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
        $diplomas = $this->paginate($this->Diplomas->find('all')->where(['association_id' => $session->read('association_id') ]));

        $this->set(compact('diplomas'));
        $this->set('_serialize', ['diplomas']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $diploma = $this->Diplomas->newEntity();
        if ($this->request->is('post')) {
            $diploma = $this->Diplomas->patchEntity($diploma, $this->request->getData());

            if ($this->Diplomas->save($diploma)) {
                $this->Flash->success(__('The diploma has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The diploma could not be saved. Please, try again.'));
        }
        $associations = $this->Diplomas->Associations->find('list', ['limit' => 200]);
        $this->set(compact('diploma', 'associations'));
        $this->set('_serialize', ['diploma']);

    }

    /**
     * Edit method
     *
     * @param string|null $id Diploma id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $diploma = $this->Diplomas->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $diploma = $this->Diplomas->patchEntity($diploma, $this->request->getData());
            if ($this->Diplomas->save($diploma)) {
                $this->Flash->success(__('The diploma has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The diploma could not be saved. Please, try again.'));
        }
        $associations = $this->Diplomas->Associations->find('list', ['limit' => 200]);
        $this->set(compact('diploma', 'associations'));
        $this->set('_serialize', ['diploma']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Diploma id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $diploma = $this->Diplomas->get($id);

        if ($this->Diplomas->delete($diploma)) {

            $this->Flash->success(__('The diploma has been deleted.'));
        } else {
            $this->Flash->error(__('The diploma could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }


    public function cartepro()
        {
          if($this->request->is('ajax')){
            //$typeBrevet = $this->request->data['typeBrevet'];
            return null;
          }
        }

    public function deletefile()
        {
            $controllerName = strtolower($this->request->params['controller']);
            //debug($controllerName);
            //debug( $this->request->query['id']);
            //debug( $this->request->query['file_type']);

            $fileToDelete = $this->Diplomas->get($this->request->query['id']);
            $fileName = $this->request->query['file_type'];
            $dirName = $this->request->query['file_type'].'_dir';

            //Supprimer le fichier physics
            $urlFile = 'files/'.$controllerName.'/'.$this->request->query['file_type'].'/'.$fileToDelete->$dirName.'/'.$fileToDelete->$fileName;
            $urlFolder = 'files/'.$controllerName.'/'.$this->request->query['file_type'].'/'.$fileToDelete->$dirName;
            //debug($urlFile);
            //debug($urlFolder);
            unlink($urlFile);
            rmdir($urlFolder);
            $updatedData = [$this->request->query['file_type'] => '', $this->request->query['file_type'].'_dir' => ''];
            //debug($updatedData);
            $fileToDelete = $this->Diplomas->patchEntity($fileToDelete, $updatedData);
            if ($this->Diplomas->save($fileToDelete)) {
              $this->Flash->success(__('Le fichier est supprimé.'));
              return $this->redirect(['controller' => 'Diplomas', 'action' => 'edit', $this->request->query['id']]);

          } else {
            $this->Flash->error(__('Le fichier n\'a pas pu être supprimé'));
            return $this->redirect(['controller' => 'Diplomas', 'action' => 'edit', $this->request->query['id']]);
          }

        }

}
