<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TypeMealTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TypeMealTable Test Case
 */
class TypeMealTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\TypeMealTable
     */
    public $TypeMeal;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
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
        $config = TableRegistry::getTableLocator()->exists('TypeMeal') ? [] : ['className' => TypeMealTable::class];
        $this->TypeMeal = TableRegistry::getTableLocator()->get('TypeMeal', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TypeMeal);

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
