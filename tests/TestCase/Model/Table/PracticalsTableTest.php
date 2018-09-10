<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PracticalsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PracticalsTable Test Case
 */
class PracticalsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PracticalsTable
     */
    public $Practicals;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.practicals'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Practicals') ? [] : ['className' => PracticalsTable::class];
        $this->Practicals = TableRegistry::getTableLocator()->get('Practicals', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Practicals);

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
