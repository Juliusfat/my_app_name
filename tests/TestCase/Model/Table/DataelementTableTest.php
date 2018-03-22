<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DataelementTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DataelementTable Test Case
 */
class DataelementTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DataelementTable
     */
    public $Dataelement;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.dataelement',
        'app.data'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Dataelement') ? [] : ['className' => DataelementTable::class];
        $this->Dataelement = TableRegistry::get('Dataelement', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Dataelement);

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
