<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * NameTypeFixture
 */
class NameTypeFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'name_type';
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'type_dish_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'no_type' => ['type' => 'string', 'length' => 7, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'nom_dish' => ['type' => 'string', 'length' => 80, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        '_indexes' => [
            'type_dish_fk' => ['type' => 'index', 'columns' => ['type_dish_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'type_type_fk' => ['type' => 'foreign', 'columns' => ['type_dish_id'], 'references' => ['type_meal', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
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
                'id' => 1,
                'type_dish_id' => 1,
                'no_type' => 'Lorem',
                'nom_dish' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
