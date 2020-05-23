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
namespace Tests\API\Link;

use PBG\Controller\API\Link\LinkPost;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ServerRequestInterface;

/**
 * Link stack
 * 
 * @category Unit_Cases
 * @package  Controller
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */
class LinkPostTest extends TestCase
{
    /**
     * Array return case
     *
     * @return void
     */
    public function testArrayReturn(): void
    {
        $linkPost = $this
            ->getMockBuilder(LinkPost::class)
            ->disableProxyingToOriginalMethods()
            ->disableOriginalConstructor()
            ->setMethods(['__invoke'])
            ->getMock();

        $request = $this->prophesize(ServerRequestInterface::class);
        $response = call_user_func($linkPost, $request->reveal(), []);

        $this->assertIsArray($response);
    }
}