<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * Brevets Controller
 *
 * @property \App\Model\Table\BrevetsTable $Brevets
 *
 * @method \App\Model\Entity\Brevet[] paginate($object = null, array $settings = [])
 */
class BrevetsController extends AppController
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
        $brevets = $this->paginate($this->Brevets->find('all')->where(['association_id' => $session->read('association_id') ]));
        $this->set(compact('brevets'));
        $this->set('_serialize', ['brevets']);
    }

    /**
     * View method
     *
     * @param string|null $id Brevet id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $brevet = $this->Brevets->get($id, [
            'contain' => ['Associations']
        ]);

        $this->set('brevet', $brevet);
        $this->set('_serialize', ['brevet']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $brevet = $this->Brevets->newEntity();
        if ($this->request->is('post')) {
            $brevet = $this->Brevets->patchEntity($brevet, $this->request->getData());
            if ($this->Brevets->save($brevet)) {
                $this->Flash->success(__('The brevet has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The brevet could not be saved. Please, try again.'));
        }
        $associations = $this->Brevets->Associations->find('list', ['limit' => 200]);
        $this->set(compact('brevet', 'associations'));
        $this->set('_serialize', ['brevet']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Brevet id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $brevet = $this->Brevets->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $brevet = $this->Brevets->patchEntity($brevet, $this->request->getData());
            if ($this->Brevets->save($brevet)) {
                $this->Flash->success(__('The brevet has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The brevet could not be saved. Please, try again.'));
        }
        $associations = $this->Brevets->Associations->find('list', ['limit' => 200]);
        $this->set(compact('brevet', 'associations'));
        $this->set('_serialize', ['brevet']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Brevet id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $brevet = $this->Brevets->get($id);
        if ($this->Brevets->delete($brevet)) {
            $this->Flash->success(__('The brevet has been deleted.'));
        } else {
            $this->Flash->error(__('The brevet could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function deletefile()
        {
            $controllerName = strtolower($this->request->params['controller']);
            //debug($controllerName);
            //debug( $this->request->query['id']);
            //debug( $this->request->query['file_type']);

            $fileToDelete = $this->Brevets->get($this->request->query['id']);
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
            $fileToDelete = $this->Brevets->patchEntity($fileToDelete, $updatedData);
            if ($this->Brevets->save($fileToDelete)) {
              $this->Flash->success(__('Le fichier est supprimé.'));
              return $this->redirect(['controller' => 'Brevets', 'action' => 'edit', $this->request->query['id']]);

          } else {
            $this->Flash->error(__('Le fichier n\'a pas pu être supprimé'));
            return $this->redirect(['controller' => 'Brevets', 'action' => 'edit', $this->request->query['id']]);
          }

        }
}
