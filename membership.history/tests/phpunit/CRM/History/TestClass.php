<?php

use Civi\Test\HeadlessInterface;
use Civi\Test\HookInterface;
use Civi\Test\TransactionalInterface;



#use PHPUnit\Framework\TestCase;

/**
 * @covers Email
 */
class CRM_History_Page_HistoryPageTest extends \PHPUnit_Framework_TestCase
{
    public function testCanBeCreatedFromRun()
    {
        $this->assertInstanceOf(
            CRM_History_Page_HistoryPage::class,
            CRM_History_Page_HistoryPage::run()
        );
    }
    public function testCanBeCreatedFromgetMembershipPeriod($mid)
    {
        $this->assertInstanceOf(
            CRM_History_Page_HistoryPage::class,
            CRM_History_Page_HistoryPage::run()
        );
    }
}
