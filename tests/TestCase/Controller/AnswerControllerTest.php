<?php
namespace App\Test\TestCase\Controller;

use App\Controller\AnswerController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\AnswerController Test Case
 */
class AnswerControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'Answer' => 'app.answer',
        'Questions' => 'app.questions',
        'Polls' => 'app.polls',
        'Users' => 'app.users',
        'AnswerText' => 'app.answer_text'
    ];

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
