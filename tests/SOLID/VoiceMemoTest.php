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

use PBG\Entity\VoiceMemo;
use PHPUnit\Framework\TestCase;

/**
 * Voice memo unit
 * 
 * @category Unit_Cases
 * @package  SOLID
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */
class VoiceMemoTest extends TestCase
{
    /**
     * User ID case
     *
     * @return void
     */
    public function testId(): void
    {
        $voiceMemo = new VoiceMemo();

        $this->assertObjectHasAttribute('_id', $voiceMemo);
    }

    /**
     * Record case
     *
     * @return void
     */
    public function testRecord(): void
    {
        $voiceMemo = new VoiceMemo();

        $this->assertObjectHasAttribute('_record', $voiceMemo);
    }

    /**
     * Note case
     *
     * @return void
     */
    public function testNote(): void
    {
        $voiceMemo = new VoiceMemo();

        $this->assertObjectHasAttribute('_note', $voiceMemo);
    }
}