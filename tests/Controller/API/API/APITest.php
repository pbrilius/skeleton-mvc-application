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
namespace Tests\API\API;

use PBG\Controller\API\API\Api;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ServerRequestInterface;

/**
 * Controller API - API singular test case
 * 
 * @category Unit_Cases
 * @package  Controller
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */
class APITest extends TestCase
{
    /**
     * Correct return type test
     *
     * @return void
     */
    public function testArrayReturn(): void
    {
        $pdo = $this->prophesize(\PDO::class);
        $api = new Api($pdo->reveal());

        $serverRequest = $this->prophesize(ServerRequestInterface::class);
        $result = call_user_func($api, $serverRequest->reveal(), ['id' => hash('sha512', random_bytes(2))]);

        $this->assertIsArray($result);
    }
}