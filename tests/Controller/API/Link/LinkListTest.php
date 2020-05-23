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

use PBG\Controller\API\Link\LinkList;
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
class LinkListTest extends TestCase
{
    /**
     * Return arrya case
     *
     * @return void
     */
    public function testReturnArray(): void
    {
        $linkList = $this
            ->getMockBuilder(LinkList::class)
            ->disableOriginalConstructor()
            ->disableProxyingToOriginalMethods()
            ->setMethods(['__invoke'])
            ->getMock();
        $request = $this->prophesize(ServerRequestInterface::class);
        $response = call_user_func($linkList, $request->reveal(), []);

        $this->assertIsArray($response);

    }
}