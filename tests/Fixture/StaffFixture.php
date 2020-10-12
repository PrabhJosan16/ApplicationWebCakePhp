<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * StaffFixture
 */
class StaffFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'staff';
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'ID' => ['type' => 'integer', 'length' => 100, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'Staff_role_code' => ['type' => 'integer', 'length' => 100, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'First_name' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'Last_name' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'Other_details' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'collate' => 'utf8mb4_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'created' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        'modified' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'FK_StaffRole_Satff' => ['type' => 'index', 'columns' => ['Staff_role_code'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['ID'], 'length' => []],
            'FK_StaffRole_Satff' => ['type' => 'foreign', 'columns' => ['Staff_role_code'], 'references' => ['ref_staff_role', 'ID'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
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
                'Staff_role_code' => 1,
                'First_name' => 'Lorem ipsum dolor sit amet',
                'Last_name' => 'Lorem ipsum dolor sit amet',
                'Other_details' => 'Lorem ipsum dolor sit amet',
                'created' => '2020-09-26 21:51:33',
                'modified' => '2020-09-26 21:51:33',
            ],
        ];
        parent::init();
    }
}
