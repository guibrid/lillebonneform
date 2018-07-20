<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AdherentsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AdherentsTable Test Case
 */
class AdherentsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\AdherentsTable
     */
    public $Adherents;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.adherents',
        'app.associations',
        'app.diplomas',
        'app.fees',
        'app.members',
        'app.users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Adherents') ? [] : ['className' => AdherentsTable::class];
        $this->Adherents = TableRegistry::get('Adherents', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Adherents);

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
