<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * Levels Controller
 *
 * @property \App\Model\Table\LevelsTable $Levels
 *
 * @method \App\Model\Entity\Level[] paginate($object = null, array $settings = [])
 */
class LevelsController extends AppController
{

    public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);

        $user = $this->Auth->user();
        if (isset($user['role']) && $user['role'] === 'author') {
            $this->Auth->allow(['index','edit']);
        }

    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index($id = null)
    {
        $this->paginate = [
            'contain' => ['Rankings']
        ];
        $session = $this->request->session();
        $levels = $this->paginate($this->Levels->find('all')->where(['association_id' => $session->read('association_id') ]));

        $this->set(compact('levels'));
        $this->set('_serialize', ['levels']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $level = $this->Levels->newEntity();
        if ($this->request->is('post')) {
            $level = $this->Levels->patchEntity($level, $this->request->getData());
            if ($this->Levels->save($level)) {
                $this->Flash->success(__('The level has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The level could not be saved. Please, try again.'));
        }
        $rankings = $this->Levels->Rankings->find('list', ['limit' => 200]);
        $this->set(compact('level', 'rankings'));
        $this->set('_serialize', ['level']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Level id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $level = $this->Levels->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $level = $this->Levels->patchEntity($level, $this->request->getData());
            if ($this->Levels->save($level)) {
                $this->Flash->success(__('The level has been saved.'));
                $session = $this->request->session();
                return $this->redirect(['action' => 'index', $session->read('association_id')]);
            }
            $this->Flash->error(__('The level could not be saved. Please, try again.'));
        }
        $rankings = $this->Levels->Rankings->find('list', ['limit' => 200]);
        $this->set(compact('level', 'rankings'));
        $this->set('_serialize', ['level']);
    }

}
