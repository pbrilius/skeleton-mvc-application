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
use CMS\Model\Page;
use PHPUnit\Framework\TestCase;

/**
 * Model CMS stack
 * 
 * @category Unit_Cases
 * @package  Page
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */
class PageTest extends TestCase
{
    /**
     * Implementation case
     *
     * @return void
     */
    public function testImplementation(): void
    {
        $page = $this
            ->getMockBuilder(Page::class)
            ->disableOriginalConstructor()
            ->disableProxyingToOriginalMethods()
            ->getMock();

        $page
            ->expects($this->once())
            ->method('single')
            ->willReturn([]);

        $page
            ->expects($this->once())
            ->method('list')
            ->willReturn([]);

        $page
            ->expects($this->once())
            ->method('post')
            ->willReturn([]);

        $page
            ->expects($this->once())
            ->method('update')
            ->willReturn([]);

        $page
            ->expects($this->once())
            ->method('delete')
            ->willReturn([]);

        $this->assertInstanceOf(BaseModelInterface::class, $page);
        $this->assertIsArray(
            $page->single(
                hash('sha3-224', random_bytes(2))
            )
        );
        $this->assertIsArray(
            $page->list()
        );
        $this->assertIsArray(
            $page->post(
                []
            )
        );
        $this->assertIsArray(
            $page->update(
                [],
                hash('sha512/256', random_bytes(2))
            )
        );
        $this->assertIsArray(
            $page->delete(
                hash('sha384', random_bytes(2))
            )
        );
    }
}