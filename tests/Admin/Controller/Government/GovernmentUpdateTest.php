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

namespace Admin\Controller\Government;

use App\Facilitator\BaseCrudUnit;
use Laminas\Diactoros\Response;
use Psr\Http\Message\ResponseInterface;

/**
 * Admin stack
 * 
 * @category Admin
 * @package  Government
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */
class GovernmentUpdateTest extends BaseCrudUnit
{
    /**
     * Invocation case
     *
     * @return void
     */
    public function testInvocation(): void
    {
        $govUpdate = $this
            ->getMockBuilder(GovernmentUpdate::class)
            ->disableOriginalConstructor()
            ->disableArgumentCloning()
            ->enableAutoReturnValueGeneration()
            ->disallowMockingUnknownTypes()
            ->setMethods(['__invoke'])
            ->getMock();

        $response = call_user_func(
            $govUpdate,
            $this->requestMock,
            []
        );

        $this->assertNotEmpty($response);
        $this->assertNotNull($response);
        $this->assertIsObject($response);
        $this->assertIsNotIterable($response);
        $this->assertInstanceOf(ResponseInterface::class, $response);
        $this->assertNotInstanceOf(Response::class, $response);

        $this->assertObjectNotHasAttribute('_cmsModel', $govUpdate);
        $this->assertObjectNotHasAttribute('_tempalteEngine', $govUpdate);
        $this->assertIsCallable($govUpdate);
        $this->assertClassNotHasAttribute('_cmsModel', GovernmentUpdate::class);
        $this->assertClassNotHasAttribute('_templateEngine', GovernmentUpdate::class);
    }
}
