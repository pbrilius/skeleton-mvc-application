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

namespace Tests\B2C\Controller\API\Business;

use App\Facilitator\BaseApiUnit;
use B2C\Controller\API\Business\BusinessDelete as BusinessBusinessDelete;

/**
 * Business API stack
 * 
 * @category Unit_Cases
 * @package  Controller
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */
class BusinessDeleteTest extends BaseApiUnit
{
    /**
     * Invocation case
     *
     * @return void
     */
    public function testInvocation(): void
    {
        $businessDelete = $this
            ->getMockBuilder(BusinessBusinessDelete::class)
            ->disableArgumentCloning()
            ->disableAutoReturnValueGeneration()
            ->disableOriginalConstructor()
            ->disableProxyingToOriginalMethods()
            ->disallowMockingUnknownTypes()
            ->setMethods(['__invoke'])
            ->getMock();
            
        $businessDelete
            ->expects($this->once())
            ->method('__invoke')
            ->willReturn([]);

        $response = call_user_func(
            $businessDelete,
            $this->requestMock,
            [
                'id' => $this->id,
            ]
        );

        $this->assertIsArray($response);
        $this->assertGreaterThanOrEqual(0, $response);
    }
}
