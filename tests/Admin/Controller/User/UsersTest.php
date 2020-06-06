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

use Admin\Controller\User\Users as UserUsers;
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
class UsersTest extends BaseCrudUnit
{
    /**
     * Invocation case
     *
     * @return void
     */
    public function testInvocation(): void
    {
        $users = $this
            ->getMockBuilder(UserUsers::class)
            ->disableOriginalConstructor()
            ->disableArgumentCloning()
            ->disableAutoReturnValueGeneration()
            ->disableProxyingToOriginalMethods()
            ->disallowMockingUnknownTypes()
            ->setMethods(['__invoke'])
            ->getMock();

        $users
            ->expects($this->atLeastOnce())
            ->method('__invoke')
            ->willReturn($this->prophesize(ResponseInterface::class)->reveal());

        $response = call_user_func(
            $users,
            $this->requestMock,
            []
        );

        $this->assertPreConditions();
        $this->assertNotEmpty($response);
        $this->assertNotNull($response);
        $this->assertIsObject($response);
        $this->assertInstanceOf(ResponseInterface::class, $response);
        $this->assertNotInstanceOf(Response::class, $response);
        $this->assertObjectNotHasAttribute('_cmsModel', $users);
        $this->assertObjectNotHasAttribute('_templateEngine', $users);
        $this->assertIsCallable($users);
        $this->assertClassNotHasAttribute('_cmsModel', UserUsers::class);
        $this->assertClassNotHasAttribute('_templateEngine', UserUsers::class);
        $this->assertPostConditions();
    }
}