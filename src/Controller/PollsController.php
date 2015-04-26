<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Polls Controller
 *
 * @property \App\Model\Table\PollsTable $Polls
 */
class PollsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users']
        ];
        $this->set('polls', $this->paginate($this->Polls));
        $this->set('_serialize', ['polls']);
    }

    /**
     * View method
     *
     * @param string|null $id Poll id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $poll = $this->Polls->get($id, [
            'contain' => ['Users', 'Questions']
        ]);
        $this->set('poll', $poll);
        $this->set('_serialize', ['poll']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $poll = $this->Polls->newEntity();
        if ($this->request->is('post')) {
            $poll = $this->Polls->patchEntity($poll, $this->request->data);
            $poll->user_id = $this->Auth->user('id');
            if ($this->Polls->save($poll)) {
                $this->Flash->success('La encuesta ha sido agregada.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('La encuesta no se ha agregado. Por favor, intente otra vez.');
            }
        }
        $users = $this->Polls->Users->find('list', ['limit' => 200]);
        $this->set(compact('poll', 'users'));
        $this->set('_serialize', ['poll']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Poll id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $poll = $this->Polls->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $poll = $this->Polls->patchEntity($poll, $this->request->data);
            if ($this->Polls->save($poll)) {
                $this->Flash->success('La encuesta ha sido modificada.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('La encuesta no se ha modificado. Por favor, intente otra vez.');
            }
        }
        $users = $this->Polls->Users->find('list', ['limit' => 200]);
        $this->set(compact('poll', 'users'));
        $this->set('_serialize', ['poll']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Poll id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $poll = $this->Polls->get($id);
        if ($this->Polls->delete($poll)) {
            $this->Flash->success('La encuesta ha sido borrada.');
        } else {
            $this->Flash->error('La encuesta no se ha borrado. Por favor, intente otra vez.');
        }
        return $this->redirect(['action' => 'index']);
    }

    public function questions()
    {
        $questions = $this->request->params['pass'];
        $polls = $this->Polls->find('questioned', [
            'questions' => $questions
        ]);
        $this->set(compact('polls', 'questions'));
    }

    public function isAuthorized($user)
    {
        $action = $this->request->params['action'];

        // The add and index actions are always allowed.
        if (in_array($action, ['index', 'add', 'questions'])) {
            return true;
        }
        // All other actions require an id.
        if (empty($this->request->params['pass'][0])) {
            return false;
        }

        // Check that the bookmark belongs to the current user.
        $id = $this->request->params['pass'][0];
        $poll = $this->Polls->get($id);
        if ($poll->user_id == $user['id']) {
            return true;
        }
        return parent::isAuthorized($user);
    }
}
