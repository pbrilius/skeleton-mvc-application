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
namespace Tests\Admin\Controller\User;

use Admin\Controller\User\UserUpdate;
use App\Facilitator\BaseCrudUnit;
use Laminas\Diactoros\Response;
use Psr\Http\Message\ResponseInterface;

/**
 * Admin stack
 * 
 * @category Admin
 * @package  User
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */
class UserUpdateTest extends BaseCrudUnit
{
    /**
     * Invocation case
     *
     * @return void
     */
    public function testInvocation(): void
    {
        $userUpdate = $this
            ->getMockBuilder(UserUpdate::class)
            ->disableOriginalConstructor()
            ->disableArgumentCloning()
            ->disableAutoReturnValueGeneration()
            ->disableProxyingToOriginalMethods()
            ->disallowMockingUnknownTypes()
            ->setMethods(['__invoke'])
            ->getMock();

        $userUpdate
            ->expects($this->atLeastOnce())
            ->method('__invoke')
            ->willReturn($this->prophesize(ResponseInterface::class)->reveal());

        $response = call_user_func(
            $userUpdate,
            $this->requestMock,
            []
        );

        $this->assertPreConditions();

        $this->assertNotEmpty($response);
        $this->assertNotNull($response);
        $this->assertIsObject($response);
        $this->assertIsNotIterable($response);
        $this->assertInstanceOf(ResponseInterface::class, $response);
        $this->assertNotInstanceOf(Response::class, $response);
        
        $this->assertObjectNotHasAttribute('_cmsModel', $userUpdate);
        $this->assertObjectNotHasAttribute('templateEngine', $response);
        $this->assertIsCallable($userUpdate);
        $this->assertClassNotHasAttribute('_cmsModel', UserUpdate::class);
        $this->assertClassNotHasAttribute('_templateEngine', UserUpdate::class);

        $this->assertPostConditions();
    }
}