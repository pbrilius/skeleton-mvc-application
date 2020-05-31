<?php

/**
 * PHP version 7
 * 
 * @category TDD
 * @package  Simulation
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */
namespace Tests\PBG\Command;

use PBG\Command\FillUpBaseEtl;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\StreamInterface;

/**
 * Command ETL base
 * 
 * @category Unit_Cases
 * @package  CLI
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */
class FillUpBaseEtlTest extends TestCase
{
    /**
     * Execution case
     *
     * @return void
     */
    public function testExecution(): void
    {
        $fillUpEtl = $this
            ->getMockBuilder(FillUpBaseEtl::class)
            ->disableOriginalConstructor()
            ->disableProxyingToOriginalMethods()
            ->getMock();

        $fillUpEtl
            ->expects($this->once())
            ->method('execute');

        $streamInput = $this
            ->prophesize(StreamInterface::class)
            ->reveal();
        
        $streamOutput = $this
            ->prophesize(StreamInterface::class)
            ->reveal();

        $this->assertNull($fillUpEtl->execute(
            $streamInput,
            $streamOutput
        ));

    }
}