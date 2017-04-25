<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RelevesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RelevesTable Test Case
 */
class RelevesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\RelevesTable
     */
    public $Releves;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.releves',
        'app.sites'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Releves') ? [] : ['className' => 'App\Model\Table\RelevesTable'];
        $this->Releves = TableRegistry::get('Releves', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Releves);

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
