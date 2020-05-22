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

use PBG\Controller\API\API\APIDelete;
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
class APIDeleteTest extends TestCase
{
    /**
     * Actual return type
     *
     * @return void
     */
    public function testArrayReturn(): void
    {
        $serverRequest = $this->prophesize(ServerRequestInterface::class);

        $apiDelete = $this
            ->getMockBuilder(APIDelete::class)
            ->disableOriginalConstructor()
            ->setMethods(['__invoke'])
            ->getMock();

        $response = call_user_func($apiDelete, $serverRequest->reveal(), ['id' => hash('sha512', random_bytes(2))]);

        $this->assertIsArray($response);
    }
}