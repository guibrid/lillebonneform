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

    public function deletefile()
        {
            $controllerName = strtolower($this->request->params['controller']);

            $fileToDelete = $this->Manifestations->get($this->request->query['id']);
            $fileName = $this->request->query['file_type'];
            $dirName = $this->request->query['file_type'].'_dir';

            //Supprimer le fichier physics
            $urlFile = 'files/'.$controllerName.'/'.$this->request->query['file_type'].'/'.$fileToDelete->$dirName.'/'.$fileToDelete->$fileName;
            $urlFolder = 'files/'.$controllerName.'/'.$this->request->query['file_type'].'/'.$fileToDelete->$dirName;

            unlink($urlFile);
            rmdir($urlFolder);
            $updatedData = [$this->request->query['file_type'] => '', $this->request->query['file_type'].'_dir' => ''];

            $fileToDelete = $this->Manifestations->patchEntity($fileToDelete, $updatedData);
            if ($this->Manifestations->save($fileToDelete)) {
              $this->Flash->success(__('Le fichier est supprimé.'));
              return $this->redirect(['controller' => 'Manifestations', 'action' => 'edit', $this->request->query['id']]);

          } else {
            $this->Flash->error(__('Le fichier n\'a pas pu être supprimé'));
            return $this->redirect(['controller' => 'Manifestations', 'action' => 'edit', $this->request->query['id']]);
          }

        }
}
