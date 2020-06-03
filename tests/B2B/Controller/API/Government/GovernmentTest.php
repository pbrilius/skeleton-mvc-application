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

namespace TEsts\B2C\Controller\API\Government;

use App\Facilitator\BaseApiUnit;
use B2B\Controller\API\Government\Government;

/**
 * Government API stack
 * 
 * @category Unit_Cases
 * @package  Controller
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */
class GovernmentTest extends BaseApiUnit
{
    /**
     * Invocation case
     *
     * @return void
     */
    public function testInvocatio(): void
    {
        $government = $this
            ->getMockBuilder(Government::class)
            ->disableOriginalConstructor()
            ->disableArgumentCloning()
            ->disableProxyingToOriginalMethods()
            ->disallowMockingUnknownTypes()
            ->getMock();

        $government
            ->expects($this->once())
            ->method('__invoke')
            ->willReturn([]);

        $response = call_user_func(
            $government,
            $this->requestMock,
            [
                'id' => $this->requestMock,
            ]
        );

        $this->assertIsArray($response);
        $this->assertGreaterThanOrEqual(0, $response);
        
    }
}
