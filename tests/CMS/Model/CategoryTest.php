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

namespace Tests\CMS\Model;

use CMS\BaseModelInterface;
use CMS\Model\Category;
use PHPUnit\Framework\TestCase;

/**
 * Model CMS stack
 * 
 * @category Unit_Cases
 * @package  Category
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */
class CategoryTest extends TestCase
{
    /**
     * Implementation case
     *
     * @return void
     */
    public function testImplementation(): void
    {
        $category = $this
            ->getMockBuilder(Category::class)
            ->disableOriginalConstructor()
            ->disableProxyingToOriginalMethods()
            ->getMock();

        $category
            ->expects($this->once())
            ->method('single')
            ->willReturn([]);

        $category
            ->expects($this->once())
            ->method('list')
            ->willReturn([]);

        $category
            ->expects($this->once())
            ->method('post')
            ->willReturn([]);

        $category
            ->expects($this->once())
            ->method('update')
            ->willReturn([]);

        $category
            ->expects($this->once())
            ->method('delete')
            ->willReturn([]);

        $this->assertInstanceOf(BaseModelInterface::class, $category);
        $this->assertIsArray(
            $category->single(
                hash('sha3-224', random_bytes(2))
            )
        );
        $this->assertIsArray(
            $category->list()
        );
        $this->assertIsArray(
            $category->post(
                []
            )
        );
        $this->assertIsArray(
            $category->update(
                [],
                hash('sha512/256', random_bytes(2))
            )
        );
        $this->assertIsArray(
            $category->delete(
                hash('sha384', random_bytes(2))
            )
        );
    }
}
