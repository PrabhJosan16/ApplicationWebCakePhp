<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\StaffTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\StaffTable Test Case
 */
class StaffTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\StaffTable
     */
    public $Staff;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Staff',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Staff') ? [] : ['className' => StaffTable::class];
        $this->Staff = TableRegistry::getTableLocator()->get('Staff', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Staff);

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
