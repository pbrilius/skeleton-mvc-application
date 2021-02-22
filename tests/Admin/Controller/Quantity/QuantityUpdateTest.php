<?php

/**
 * PHP version 7
 * 
 * @category Base
 * @package  Controller
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */

namespace Tests\Admin\Controller\Quantity;

use Admin\Controller\Quantity\QuantityUpdate;
use App\Facilitator\BaseCrudUnit;
use Laminas\Diactoros\Response;
use Psr\Http\Message\ResponseInterface;

/**
 * Admin stack
 * 
 * @category Admin
 * @package  Quantity
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */
class QuantityUpdateTest extends BaseCrudUnit
{
    /**
     * QE case
     *
     * @return void
     */
    public function testQe(): void
    {
        $qe = $this
            ->getMockBuilder(QuantityUpdate::class)
            ->disableOriginalConstructor()
            ->disableArgumentCloning()
            ->enableAutoReturnValueGeneration()
            ->allowMockingUnknownTypes()
            ->setMethods(['__invoke'])
            ->getMock();

        $response = call_user_func(
            $qe,
            $this->requestMock,
            []
        );

        $this->assertNotEmpty($response);
        $this->assertNotNull($response);
        $this->assertIsObject($response);
        $this->assertIsNotIterable($response);
        $this->isInstanceOf(ResponseInterface::class, $response);
        $this->assertNotInstanceOf(Response::class, $response);
    }
}
