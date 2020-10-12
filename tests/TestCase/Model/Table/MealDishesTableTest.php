<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MealDishesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MealDishesTable Test Case
 */
class MealDishesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\MealDishesTable
     */
    public $MealDishes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.MealDishes',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('MealDishes') ? [] : ['className' => MealDishesTable::class];
        $this->MealDishes = TableRegistry::getTableLocator()->get('MealDishes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->MealDishes);

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
