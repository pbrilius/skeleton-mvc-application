<?php

namespace Tests\B2C\Controller\API\Business;

use App\Facilitator\BaseApiUnit;
use B2C\Controller\API\Business\BusinessList;

class BusinessListTest extends BaseApiUnit
{
    public function testInvocation(): void
    {
        $businessList = $this
            ->getMockBuilder(BusinessList::class)
            ->disableArgumentCloning()
            ->disableAutoReturnValueGeneration()
            ->disableOriginalConstructor()
            ->disableProxyingToOriginalMethods()
            ->disallowMockingUnknownTypes()
            ->getMock();

        $businessList
            ->expects($this->once())
            ->method('__invoke')
            ->willReturn([]);

        $response = call_user_func(
            $businessList,
            $this->requestMock,
            []
        );

        $this->assertIsArray($response);
        $this->assertGreaterThanOrEqual(0, $response);
    }
}