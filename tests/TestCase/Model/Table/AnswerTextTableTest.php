<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AnswerTextTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AnswerTextTable Test Case
 */
class AnswerTextTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'AnswerText' => 'app.answer_text',
        'Questions' => 'app.questions',
        'Polls' => 'app.polls',
        'Users' => 'app.users',
        'Answer' => 'app.answer'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('AnswerText') ? [] : ['className' => 'App\Model\Table\AnswerTextTable'];
        $this->AnswerText = TableRegistry::get('AnswerText', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->AnswerText);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
