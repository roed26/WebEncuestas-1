<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Answer Controller
 *
 * @property \App\Model\Table\AnswerTable $Answer
 */
class AnswerController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Questions']
        ];
        $this->set('answer', $this->paginate($this->Answer));
        $this->set('_serialize', ['answer']);
    }

    /**
     * View method
     *
     * @param string|null $id Answer id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $answer = $this->Answer->get($id, [
            'contain' => ['Questions']
        ]);
        $this->set('answer', $answer);
        $this->set('_serialize', ['answer']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $answer = $this->Answer->newEntity();
        if ($this->request->is('post')) {
            $answer = $this->Answer->patchEntity($answer, $this->request->data);
            if ($this->Answer->save($answer)) {
                $this->Flash->success('The answer has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The answer could not be saved. Please, try again.');
            }
        }
        $questions = $this->Answer->Questions->find('list', ['limit' => 200]);
        $this->set(compact('answer', 'questions'));
        $this->set('_serialize', ['answer']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Answer id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $answer = $this->Answer->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $answer = $this->Answer->patchEntity($answer, $this->request->data);
            if ($this->Answer->save($answer)) {
                $this->Flash->success('The answer has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The answer could not be saved. Please, try again.');
            }
        }
        $questions = $this->Answer->Questions->find('list', ['limit' => 200]);
        $this->set(compact('answer', 'questions'));
        $this->set('_serialize', ['answer']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Answer id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $answer = $this->Answer->get($id);
        if ($this->Answer->delete($answer)) {
            $this->Flash->success('The answer has been deleted.');
        } else {
            $this->Flash->error('The answer could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
