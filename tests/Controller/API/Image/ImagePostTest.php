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
namespace Tests\API\Image;

use PBG\Controller\API\Image\ImagePost;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ServerRequestInterface;

/**
 * Image stack
 * 
 * @category Unit_Cases
 * @package  Controller
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */
class ImagePostTest extends TestCase
{
    /**
     * Array return endpoint
     *
     * @return void
     */
    public function testArrayReturn(): void
    {
        $imagePost = $this
            ->getMockBuilder(ImagePost::class)
            ->disableProxyingToOriginalMethods()
            ->disableOriginalConstructor()
            ->setMethods(['__invoke'])
            ->getMock();

        $request = $this->prophesize(ServerRequestInterface::class);
        $response = call_user_func($imagePost, $request->reveal(), []);

        $this->assertIsArray($response);
    }
}