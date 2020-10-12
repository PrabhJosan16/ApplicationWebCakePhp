<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * MealsFixture
 */
class MealsFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'ID' => ['type' => 'integer', 'length' => 100, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'Customer_ID' => ['type' => 'integer', 'length' => 100, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'Staff_ID' => ['type' => 'integer', 'length' => 100, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'Date_of_meal' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => 'CURRENT_TIMESTAMP', 'comment' => '', 'precision' => null],
        'Cost_of_meal' => ['type' => 'integer', 'length' => 100, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'Other_details' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'FK_Customer_Meals' => ['type' => 'index', 'columns' => ['Customer_ID'], 'length' => []],
            'FK_Staff_Meals' => ['type' => 'index', 'columns' => ['Staff_ID'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['ID'], 'length' => []],
            'FK_Customer_Meals' => ['type' => 'foreign', 'columns' => ['Customer_ID'], 'references' => ['customers', 'ID'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
            'FK_Staff_Meals' => ['type' => 'foreign', 'columns' => ['Staff_ID'], 'references' => ['staff', 'ID'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
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
                'ID' => 1,
                'Customer_ID' => 1,
                'Staff_ID' => 1,
                'Date_of_meal' => '2020-09-26 21:48:38',
                'Cost_of_meal' => 1,
                'Other_details' => 'Lorem ipsum dolor sit amet',
                'created' => '2020-09-26 21:48:38',
                'modified' => '2020-09-26 21:48:38',
            ],
        ];
        parent::init();
    }
}
