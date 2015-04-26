<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * AnswerText Controller
 *
 * @property \App\Model\Table\AnswerTextTable $AnswerText
 */
class AnswerTextController extends AppController
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
        $this->set('answerText', $this->paginate($this->AnswerText));
        $this->set('_serialize', ['answerText']);
    }

    /**
     * View method
     *
     * @param string|null $id Answer Text id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $answerText = $this->AnswerText->get($id, [
            'contain' => ['Questions']
        ]);
        $this->set('answerText', $answerText);
        $this->set('_serialize', ['answerText']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $answerText = $this->AnswerText->newEntity();
        if ($this->request->is('post')) {
            $answerText = $this->AnswerText->patchEntity($answerText, $this->request->data);
            if ($this->AnswerText->save($answerText)) {
                $this->Flash->success('The answer text has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The answer text could not be saved. Please, try again.');
            }
        }
        $questions = $this->AnswerText->Questions->find('list', ['limit' => 200]);
        $this->set(compact('answerText', 'questions'));
        $this->set('_serialize', ['answerText']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Answer Text id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $answerText = $this->AnswerText->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $answerText = $this->AnswerText->patchEntity($answerText, $this->request->data);
            if ($this->AnswerText->save($answerText)) {
                $this->Flash->success('The answer text has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The answer text could not be saved. Please, try again.');
            }
        }
        $questions = $this->AnswerText->Questions->find('list', ['limit' => 200]);
        $this->set(compact('answerText', 'questions'));
        $this->set('_serialize', ['answerText']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Answer Text id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $answerText = $this->AnswerText->get($id);
        if ($this->AnswerText->delete($answerText)) {
            $this->Flash->success('The answer text has been deleted.');
        } else {
            $this->Flash->error('The answer text could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
