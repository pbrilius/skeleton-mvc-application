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
namespace Tests;

use Doctrine\Common\Collections\ArrayCollection;
use PBG\Entity\User;
use PHPUnit\Framework\TestCase;

/**
 * User unit
 * 
 * @category Unit_Cases
 * @package  SOLID
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */
class UserTest extends TestCase
{
    /**
     * Note down
     *
     * @return void
     */
    public function testNoteDown(): void
    {
        $user = new User();
        $note = 'PSA recordings, a. k. a. PSR1-17 standardization';
        $user->noteDown($note);

        $this->assertSameSize([$note], $user->getNotes());
    }

    /**
     * Contructor ORM Collection case
     *
     * @return void
     */
    public function testConstructorCollection(): void
    {
        $user = new User();

        $this->assertInstanceOf(ArrayCollection::class, $user->getNotes());
    }

}