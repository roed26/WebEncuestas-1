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
            if ($this->Polls->save($poll)) {
                $this->Flash->success('The poll has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The poll could not be saved. Please, try again.');
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
                $this->Flash->success('The poll has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The poll could not be saved. Please, try again.');
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
            $this->Flash->success('The poll has been deleted.');
        } else {
            $this->Flash->error('The poll could not be deleted. Please, try again.');
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
}
