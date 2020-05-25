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
use CMS\Model\Post;
use PHPUnit\Framework\TestCase;

/**
 * Model CMS stack
 * 
 * @category Unit_Cases
 * @package  Post
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */
class PostTest extends TestCase
{
    /**
     * Implementation case
     *
     * @return void
     */
    public function testImplementation(): void
    {
        $post = $this
            ->getMockBuilder(Post::class)
            ->disableOriginalConstructor()
            ->disableProxyingToOriginalMethods()
            ->getMock();

        $post
            ->expects($this->once())
            ->method('single')
            ->willReturn([]);

        $post
            ->expects($this->once())
            ->method('list')
            ->willReturn([]);

        $post
            ->expects($this->once())
            ->method('post')
            ->willReturn([]);

        $post
            ->expects($this->once())
            ->method('update')
            ->willReturn([]);

        $post
            ->expects($this->once())
            ->method('delete')
            ->willReturn([]);

        $this->assertInstanceOf(BaseModelInterface::class, $post);
        $this->assertIsArray(
            $post->single(
                hash('sha3-224', random_bytes(2))
            )
        );
        $this->assertIsArray(
            $post->list()
        );
        $this->assertIsArray(
            $post->post(
                []
            )
        );
        $this->assertIsArray(
            $post->update(
                [],
                hash('sha512/256', random_bytes(2))
            )
        );
        $this->assertIsArray(
            $post->delete(
                hash('sha384', random_bytes(2))
            )
        );
    }
}