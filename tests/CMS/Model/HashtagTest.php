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
use CMS\Model\Hashtag;
use PHPUnit\Framework\TestCase;

/**
 * Model CMS stack
 * 
 * @category Unit_Cases
 * @package  Hashtag
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */
class HashtagTest extends TestCase
{
    /**
     * Implementation case
     *
     * @return void
     */
    public function testImplementation(): void
    {
        $hashtag = $this
            ->getMockBuilder(Hashtag::class)
            ->disableOriginalConstructor()
            ->disableProxyingToOriginalMethods()
            ->getMock();

        $hashtag
            ->expects($this->once())
            ->method('single')
            ->willReturn([]);

        $hashtag
            ->expects($this->once())
            ->method('list')
            ->willReturn([]);

        $hashtag
            ->expects($this->once())
            ->method('post')
            ->willReturn([]);

        $hashtag
            ->expects($this->once())
            ->method('update')
            ->willReturn([]);

        $hashtag
            ->expects($this->once())
            ->method('delete')
            ->willReturn([]);

        $this->assertInstanceOf(BaseModelInterface::class, $hashtag);
        $this->assertIsArray(
            $hashtag->single(
                hash('sha3-224', random_bytes(2))
            )
        );
        $this->assertIsArray(
            $hashtag->list()
        );
        $this->assertIsArray(
            $hashtag->post(
                []
            )
        );
        $this->assertIsArray(
            $hashtag->update(
                [],
                hash('sha512/256', random_bytes(2))
            )
        );
        $this->assertIsArray(
            $hashtag->delete(
                hash('sha384', random_bytes(2))
            )
        );
    }
}