<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PracticasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PracticasTable Test Case
 */
class PracticasTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PracticasTable
     */
    public $Practicas;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.practicas'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Practicas') ? [] : ['className' => PracticasTable::class];
        $this->Practicas = TableRegistry::getTableLocator()->get('Practicas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Practicas);

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
