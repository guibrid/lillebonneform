<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ManifestationsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ManifestationsTable Test Case
 */
class ManifestationsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ManifestationsTable
     */
    public $Manifestations;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.manifestations',
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
        $config = TableRegistry::exists('Manifestations') ? [] : ['className' => ManifestationsTable::class];
        $this->Manifestations = TableRegistry::get('Manifestations', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Manifestations);

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
