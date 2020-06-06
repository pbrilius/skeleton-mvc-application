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
namespace Tests\Admin\Controller\Business;

use Admin\Controller\Business\Businesses;
use App\Facilitator\BaseCrudUnit;
use Laminas\Diactoros\Response;
use Psr\Http\Message\ResponseInterface;

/**
 * Admin stack
 * 
 * @category Admin
 * @package  Business
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */
class BusinessesTest extends BaseCrudUnit
{
    /**
     * Invocation case
     *
     * @return void
     */
    public function testInvocation(): void
    {
        $businesses = $this
            ->getMockBuilder(Businesses::class)
            ->disableOriginalConstructor()
            ->disableArgumentCloning()
            ->disableAutoReturnValueGeneration()
            ->disableProxyingToOriginalMethods()
            ->disallowMockingUnknownTypes()
            ->setMethods(['__invoke'])
            ->getMock();

        $businesses
            ->expects($this->atLeastOnce())
            ->method('__invoke')
            ->willReturn($this->prophesize(ResponseInterface::class)->reveal());

        $reponse = call_user_func(
            $businesses,
            $this->requestMock,
            []
        );

        $this->assertPreConditions();

        $this->assertNotEmpty($reponse);
        $this->assertNotNull($reponse);
        $this->assertIsObject($reponse);
        $this->assertIsNotIterable($reponse);
        $this->assertInstanceOf(ResponseInterface::class, $reponse);
        $this->assertNotInstanceOf(Response::class, $reponse);

        $this->assertObjectNotHasAttribute('_cmsModel', $businesses);
        $this->assertObjectNotHasAttribute('_templateEngine', $businesses);
        $this->assertIsCallable($businesses);
        $this->assertClassNotHasAttribute('_cmsModel', Businesses::class);
        $this->assertClassNotHasAttribute('_templateEngine', Businesses::class);

        $this->assertPostConditions();
    }
}