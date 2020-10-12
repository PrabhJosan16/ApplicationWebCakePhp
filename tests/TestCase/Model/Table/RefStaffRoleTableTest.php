<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RefStaffRoleTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RefStaffRoleTable Test Case
 */
class RefStaffRoleTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\RefStaffRoleTable
     */
    public $RefStaffRole;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.RefStaffRole',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('RefStaffRole') ? [] : ['className' => RefStaffRoleTable::class];
        $this->RefStaffRole = TableRegistry::getTableLocator()->get('RefStaffRole', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->RefStaffRole);

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
