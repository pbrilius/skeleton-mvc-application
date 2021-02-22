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
namespace Tests\ERP\Controller\API\Resource;

use App\Facilitator\BaseApiUnit;
use ERP\Controller\API\Resource\ResourceList;

/**
 * Resource API stack
 * 
 * @category Unit_Cases
 * @package  Controller
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */
class ResourceListTest extends BaseApiUnit
{
    /**
     * Callback case
     *
     * @return void
     */
    public function testCallback(): void
    {
        $resourceList = $this
            ->getMockBuilder(ResourceList::class)
            ->disableOriginalConstructor()
            ->disableProxyingToOriginalMethods()
            ->setMethods(['__invoke'])
            ->getMock();

        $resourceList
            ->expects($this->once())
            ->method('__invoke')
            ->willReturn([]);

        $resopnse = call_user_func(
            $resourceList,
            $this->requestMock,
            []
        );

        $this->assertIsArray($resopnse);
        $this->assertEquals(0, sizeof($resopnse));
    }
}