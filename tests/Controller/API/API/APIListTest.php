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

use PBG\Controller\API\API\ApiList;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ServerRequestInterface;

/**
 * Controller API - API List test case
 * 
 * @category Unit_Cases
 * @package  Controller
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */
class APIListTest extends TestCase
{
    /**
     * Correct return type test
     *
     * @return void
     */
    public function testArrayReturn(): void
    {
        $pdo = $this->prophesize(\PDO::class);
        $apiList = new ApiList($pdo->reveal());

        $serverRequest = $this->prophesize(ServerRequestInterface::class);
        $result = call_user_func($apiList, $serverRequest->reveal(), []);

        $this->assertIsArray($result);
    }
}