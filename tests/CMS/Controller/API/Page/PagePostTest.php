<?php

/**
 * PHP version 7
 * 
 * @category Controller
 * @package  Invokables
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */
namespace Tests\CMS\Controller\API\Page;

use Monolog\Test\TestCase;
use Psr\Http\Message\ServerRequestInterface;

/**
 * Post API stack
 * 
 * @category Unit_Cases
 * @package  Controller
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */
class PagePostTest extends TestCase
{
    /**
     * Callback case
     *
     * @return void
     */
    public function testCallback(): void
    {
        $pagePost = $this
            ->getMockBuilder(PagePost::class)
            ->disableOriginalConstructor()
            ->disableProxyingToOriginalMethods()
            ->setMethods(['__invoke'])
            ->getMock();

        $pagePost
            ->expects($this->once())
            ->method('__invoke')
            ->willReturn([]);

        $request = $this
            ->prophesize(ServerRequestInterface::class)
            ->reveal();

        $response = call_user_func(
            $pagePost,
            $request,
            []
        );

        $this->assertIsArray($response);
        $this->assertEquals(0, sizeof($response));
    }
}