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
namespace Tests\CMS\Controller\API\Category;

use CMS\Controller\API\Category\CategoryList;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ServerRequestInterface;

/**
 * Hashtag API stack
 * 
 * @category Unit_Cases
 * @package  Controller
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */
class CategoryListTest extends TestCase
{
    /**
     * Return case
     *
     * @return void
     */
    public function testReturnType(): void
    {
        $categoryList = $this
            ->getMockBuilder(CategoryList::class)
            ->disableOriginalConstructor()
            ->disableProxyingToOriginalMethods()
            ->setMethods(['__invoke'])
            ->getMock();

        $categoryList
            ->expects($this->once())
            ->method('__invoke')
            ->willReturn([]);

        $request = $this
            ->prophesize(ServerRequestInterface::class)
            ->reveal();

        $response = call_user_func(
            $categoryList,
            $request,
            []
        );

        $this->assertIsArray($response);
        $this->assertEquals(0, sizeof($response));
    }
}