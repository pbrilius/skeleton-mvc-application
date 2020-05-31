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
namespace Tests\Command;

use App\Command\BaseCommandInterface;
use PHPUnit\Framework\TestCase;

/**
 * Command base
 * 
 * @category Unit_Cases
 * @package  CLI
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */
class BaseCommandInterfaceTest extends TestCase
{
    /**
     * Implementation case
     *
     * @return void
     */
    public function testImplementation(): void
    {
        $baseCommand = $this
            ->prophesize(BaseCommandInterface::class)
            ->reveal();

        $this->assertInstanceOf(BaseCommandInterface::class, $baseCommand);
    }
}