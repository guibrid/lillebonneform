<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;

/**
 * Associations Controller
 *
 * @property \App\Model\Table\AssociationsTable $Associations
 *
 * @method \App\Model\Entity\Association[] paginate($object = null, array $settings = [])
 */
class AssociationsController extends AppController
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
            $this->Auth->allow(['index','edit','validate','deletefile']);
        }

    }


    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
      $current_user_id = $this->Auth->user('id'); //Get user logged ID



      $association = $this->Associations
                          ->find('all')
                          ->where(['user_id' => $current_user_id ]);
      $row = $association->first();
      /*if ( $row->validation == 1 ) {
        return $this->redirect(['controller' => 'Associations','action' => 'validate']);
      }*/
      $session = $this->request->session();
      $session->write('association_id', $row->id);
      $session->write('validation', $row->validation);
      /*if ( $session->read('validation') == 1 ) {
        return $this->redirect(['controller' => 'Associations','action' => 'validate']);
      }*/
      $associations = $this->paginate($association);


      // Enregistrer l'ID de l'association dans uen variable de session

      $this->set(compact('associations'));
      $this->set('_serialize', ['associations']);

    }

    /**
     * View method
     *
     * @param string|null $id Association id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $association = $this->Associations->get($id, [
            'contain' => ['Diplomas', 'Fees', 'Members']
        ]);

        $this->set('association', $association);
        $this->set('_serialize', ['association']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $association = $this->Associations->newEntity();
        if ($this->request->is('post')) {

          $association = $this->Associations->patchEntity($association, $this->request->getData());
          if ($this->Associations->save($association)) {
                $this->Flash->success(__('The association has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The association could not be saved. Please, try again.'));
        }

        $users = $this->Associations->Users->find('list', ['limit' => 200]);
        $this->set(compact('association', 'users'));
        $this->set('_serialize', ['association']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Association id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $association = $this->Associations->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {

            $association = $this->Associations->patchEntity($association, $this->request->getData());

            if ($this->Associations->save($association)) {
                $this->Flash->success(__('The association has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The association could not be saved. Please, try again.'));
        }
        $this->set(compact('association'));
        $this->set('_serialize', ['association']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Association id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $association = $this->Associations->get($id);
        if ($this->Associations->delete($association)) {
            $this->Flash->success(__('The association has been deleted.'));
        } else {
            $this->Flash->error(__('The association could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    /**
     * Validate method
     *
     * @param string|null $id Association id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function validate($id = null)
    {
      $session = $this->request->session();

      if ($this->request->is(['patch', 'post', 'put', 'get'])) {

        $associationsTable = TableRegistry::get('Associations');
        $association = $associationsTable->get( $session->read('association_id') ); // Retourne l'article avec l'id
        $association->validation = 1;

        if (!$associationsTable->save($association) ) {
          $this->Flash->error(__('La validation n\'a pas fonctionné.'));
        }

      }

    }

    public function deletefile()
        {
            $controllerName = strtolower($this->request->params['controller']);

            $fileToDelete = $this->Associations->get($this->request->query['id']);
            $fileName = $this->request->query['file_type'];
            $dirName = $this->request->query['file_type'].'_dir';

            //Supprimer le fichier physics
            $urlFile = 'files/'.$controllerName.'/'.$this->request->query['file_type'].'/'.$fileToDelete->$dirName.'/'.$fileToDelete->$fileName;
            $urlFolder = 'files/'.$controllerName.'/'.$this->request->query['file_type'].'/'.$fileToDelete->$dirName;

            unlink($urlFile);
            rmdir($urlFolder);
            $updatedData = [$this->request->query['file_type'] => '', $this->request->query['file_type'].'_dir' => ''];

            $fileToDelete = $this->Associations->patchEntity($fileToDelete, $updatedData);
            if ($this->Associations->save($fileToDelete)) {
              $this->Flash->success(__('Le fichier est supprimé.'));
              return $this->redirect(['controller' => 'Associations', 'action' => 'edit', $this->request->query['id']]);

          } else {
            $this->Flash->error(__('Le fichier n\'a pas pu être supprimé'));
            return $this->redirect(['controller' => 'Associations', 'action' => 'edit', $this->request->query['id']]);
          }

        }
}
