<?php

/**
 * PHP version 7
 * 
 * @category TDD
 * @package  BDD
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */
namespace Tests\PBG\Model;

use PBG\Model\Loan;
use PHPUnit\Framework\TestCase;

/**
 * Model C2C stack
 * 
 * @category Unit_Cases
 * @package  Loan
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */
class LoanModelTest extends TestCase
{
    /**
     * Implementation case
     *
     * @return void
     */
    public function testImplementation(): void
    {
        $loan = $this
            ->getMockBuilder(Loan::class)
            ->disableOriginalConstructor()
            ->disableProxyingToOriginalMethods()
            ->setMethods(['baseUp'])
            ->getMock();

        $loan
            ->expects($this->once())
            ->method('baseUp');

        $this->assertNull($loan->baseUp());

        $this->assertObjectHasAttribute('table', $loan);
        $this->assertClassHasAttribute('table', Loan::class);
    }
}