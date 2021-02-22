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
namespace Tests\SOLID;

use Doctrine\Common\Collections\ArrayCollection;
use PBG\Entity\Note;
use PBG\Entity\User;
use PHPUnit\Framework\TestCase;

/**
 * Note unit
 * 
 * @category Unit_Cases
 * @package  SOLID
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */
class NoteTest extends TestCase
{
    /**
     * Contructor case
     *
     * @return void
     */
    public function testContructor(): void
    {
        $note = new Note();

        $this->assertInstanceOf(ArrayCollection::class, $note->getVoiceMemos());
    }

    /**
     * Voice memo case
     *
     * @return void
     */
    public function testMemoVoice(): void
    {
        $note = new Note();

        $record = 'Record PSA recordings studio LTD - LLC';
        $note = $note->memoVoice($record);

        $this->assertSameSize([$record], $note->getVoiceMemos());
    }

    /**
     * User relation case
     *
     * @return void
     */
    public function testUserRelation(): void
    {
        $note = new Note();
        $note->setUser(new User());

        $this->assertInstanceOf(User::class, $note->getUser());
    }
}