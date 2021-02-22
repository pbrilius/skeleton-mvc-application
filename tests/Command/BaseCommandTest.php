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

use App\Command\BaseCommand;
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
class BaseCommandTest extends TestCase
{
    /**
     * Abstraction case
     *
     * @return void
     */
    public function testAbstractio(): void
    {
        $baseCommand = $this
            ->getMockBuilder(BaseCommand::class)
            ->disableOriginalConstructor()
            ->disableProxyingToOriginalMethods()
            ->getMockForAbstractClass();

        $this->assertObjectNotHasAttribute('_input', $baseCommand);
        $this->assertObjectNotHasAttribute('_output', $baseCommand);

        $this->assertClassHasAttribute('_input', BaseCommand::class);
        $this->assertClassHasAttribute('_output', BaseCommand::class);
    }
}