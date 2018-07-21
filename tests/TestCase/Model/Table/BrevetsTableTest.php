<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BrevetsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BrevetsTable Test Case
 */
class BrevetsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\BrevetsTable
     */
    public $Brevets;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.brevets',
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
        $config = TableRegistry::exists('Brevets') ? [] : ['className' => BrevetsTable::class];
        $this->Brevets = TableRegistry::get('Brevets', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Brevets);

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
