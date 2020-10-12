<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * MealDishesFixture
 */
class MealDishesFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'Meal_ID' => ['type' => 'integer', 'length' => 100, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'Menu_item_ID' => ['type' => 'integer', 'length' => 100, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'Quantity' => ['type' => 'integer', 'length' => 100, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'FK_Meals_MealDishes' => ['type' => 'index', 'columns' => ['Meal_ID'], 'length' => []],
            'FK_MenuItemID_MealDishes' => ['type' => 'index', 'columns' => ['Menu_item_ID'], 'length' => []],
        ],
        '_constraints' => [
            'FK_Meals_MealDishes' => ['type' => 'foreign', 'columns' => ['Meal_ID'], 'references' => ['meals', 'ID'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
            'FK_MenuItemID_MealDishes' => ['type' => 'foreign', 'columns' => ['Menu_item_ID'], 'references' => ['menu_items', 'ID'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8mb4_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd
    /**
     * Init method
     *
     * @return void
     */
    public function init()
    {
        $this->records = [
            [
                'Meal_ID' => 1,
                'Menu_item_ID' => 1,
                'Quantity' => 1,
                'created' => '2020-09-26 22:04:28',
                'modified' => '2020-09-26 22:04:28',
            ],
        ];
        parent::init();
    }
}
