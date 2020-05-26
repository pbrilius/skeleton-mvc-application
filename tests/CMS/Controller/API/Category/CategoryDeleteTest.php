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

use CMS\Controller\API\Category\CategoryDelete;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ServerRequestInterface;

/**
 * Category API stack
 * 
 * @category Unit_Cases
 * @package  Controller
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */
class CategoryDeleteTest extends TestCase
{
    /**
     * Callback case
     *
     * @return void
     */
    public function testCallback(): void
    {
        $categoryDelete = $this
            ->getMockBuilder(CategoryDelete::class)
            ->disableOriginalConstructor()
            ->disableProxyingToOriginalMethods()
            ->setMethods(['__invoke'])
            ->getMock();

        $categoryDelete
            ->expects($this->once())
            ->method('__invoke')
            ->willReturn([]);

        $request = $this
            ->prophesize(ServerRequestInterface::class)
            ->reveal();

        $response = call_user_func(
            $categoryDelete,
            $request,
            []
        );

        $this->assertIsArray($response);
        $this->assertEquals(0, sizeof($response));

    }
}