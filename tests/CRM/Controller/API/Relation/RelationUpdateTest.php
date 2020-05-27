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

namespace Tests\CRM\Controller\API\Relation;

use App\Facilitator\BaseApiUnit;
use CRM\Controller\API\Relation\RelationUpdate;

/**
 * Relation API stack
 * 
 * @category Unit_Cases
 * @package  Controller
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */
class RelationUpdateTest extends BaseApiUnit
{
    /**
     * Invocation case
     *
     * @return void
     */
    public function testInvocation(): void
    {
        $relationUpdate = $this
            ->getMockBuilder(RelationUpdate::class)
            ->disableOriginalConstructor()
            ->disableProxyingToOriginalMethods()
            ->setMethods(['__invoke'])
            ->getMock();

        $relationUpdate
            ->expects($this->once())
            ->method('__invoke')
            ->willReturn([]);

        $response = call_user_func(
            $relationUpdate,
            $this->requestMock,
            [
                'id' => $this->id,
            ]
        );

        $this->assertIsArray($response);
        $this->assertEquals(0, sizeof($response));
    }
}
