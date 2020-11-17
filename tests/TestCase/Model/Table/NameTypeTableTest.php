<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\NameTypeTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\NameTypeTable Test Case
 */
class NameTypeTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\NameTypeTable
     */
    public $NameType;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.NameType',
        'app.TypeMeal',
        'app.MealName',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('NameType') ? [] : ['className' => NameTypeTable::class];
        $this->NameType = TableRegistry::getTableLocator()->get('NameType', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->NameType);

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
