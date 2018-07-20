<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DiplomasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DiplomasTable Test Case
 */
class DiplomasTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DiplomasTable
     */
    public $Diplomas;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.diplomas',
        'app.associations',
        'app.fees',
        'app.members'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Diplomas') ? [] : ['className' => DiplomasTable::class];
        $this->Diplomas = TableRegistry::get('Diplomas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Diplomas);

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
