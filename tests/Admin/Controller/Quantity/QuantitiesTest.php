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

use Admin\Controller\Quantity\Quantities;
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
class QuantitiesTest extends BaseCrudUnit
{
    /**
     * QE case
     *
     * @return void
     */
    public function testQe(): void
    {
        $qe = $this
            ->getMockBuilder(Quantities::class)
            ->disableOriginalConstructor()
            ->disableArgumentCloning()
            ->enableAutoReturnValueGeneration()
            ->disallowMockingUnknownTypes()
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

        $this->assertObjectNotHasAttribute('_cmsModel', $qe);
        $this->assertObjectNotHasAttribute('_templateEngine', $qe);
        $this->assertIsCallable($qe);
        $this->assertClassNotHasAttribute('_cmsModel', Quantities::class);
        $this->assertClassNotHasAttribute('_templateEngine', Quantities::class);
    }
}
