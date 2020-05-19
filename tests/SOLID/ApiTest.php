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

use PBG\Entity\Api;
use PHPUnit\Framework\TestCase;

/**
 * SOLID API test case
 * 
 * @category Unit_Cases
 * @package  SOLID
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */
class ApiTest extends TestCase
{
    /**
     * ID property test
     *
     * @return void
     */
    public function testIdProperty(): void
    {
        $api = new Api();

        $this->assertObjectHasAttribute('_id', $api);
    }

    /**
     * Version property test
     *
     * @return void
     */
    public function testVersionProperty(): void
    {
        $api = new Api();

        $this->assertObjectHasAttribute('_version', $api);
    }

    /**
     * Release proeprty test
     *
     * @return void
     */
    public function testReleaseProperty(): void
    {
        $api = new Api();

        $this->assertObjectHasAttribute('_release', $api);
    }
}
