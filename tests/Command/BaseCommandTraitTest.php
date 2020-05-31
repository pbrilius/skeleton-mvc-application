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

use App\Command\BaseCommandTrait;
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
class BaseCommandTraitTest extends TestCase
{
    /**
     * OOP case
     *
     * @return void
     */
    public function testObjectiveOrientation(): void
    {
        $baseCommandTraitObject = $this
            ->getMockBuilder(BaseCommandTrait::class)
            ->disableOriginalConstructor()
            ->disableProxyingToOriginalMethods()
            ->getMockForTrait();

        $this->assertObjectNotHasAttribute('_input', $baseCommandTraitObject);
        $this->assertObjectNotHasAttribute('_output', $baseCommandTraitObject);
    }
}