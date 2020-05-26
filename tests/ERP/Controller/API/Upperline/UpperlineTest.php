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

namespace Tests\ERP\Controller\API\Upperline;

use App\Facilitator\BaseApiUnit;
use ERP\Controller\API\Upperline\Upperline;

/**
 * Upperline API stack
 * 
 * @category Unit_Cases
 * @package  Controller
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */
class UpperlineTest extends BaseApiUnit
{
    /**
     * Callback case
     *
     * @return void
     */
    public function testCallback(): void
    {
        $upperline = $this
            ->getMockBuilder(Upperline::class)
            ->disableOriginalConstructor()
            ->disableProxyingToOriginalMethods()
            ->setMethods(['__invoke'])
            ->getMock();

        $upperline
            ->expects($this->once())
            ->method('__invoke')
            ->willReturn([]);

        $response = call_user_func(
            $upperline,
            $this->requestMock,
            [
                'id' => $this->id,
            ]
        );

        $this->assertIsArray($response);
        $this->assertEquals(0, sizeof($response));
    }
}
