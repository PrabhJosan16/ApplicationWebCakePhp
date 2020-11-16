<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MealNameTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MealNameTable Test Case
 */
class MealNameTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\MealNameTable
     */
    public $MealName;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.MealName',
        'app.Meals',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('MealName') ? [] : ['className' => MealNameTable::class];
        $this->MealName = TableRegistry::getTableLocator()->get('MealName', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MealName);

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
}
