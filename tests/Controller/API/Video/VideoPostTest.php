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

namespace Tests\API\Video;

use PBG\Controller\API\Video\VideoPost;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ServerRequestInterface;

/**
 * Video post - add
 * 
 * @category Unit_Cases
 * @package  Controller
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */
class VideoPostTest extends TestCase
{
    /**
     * Video post case
     *
     * @return void
     */
    public function testArrayReturn(): void
    {
        /**
         * Video post
         * 
         * @var VideoPost $videoPost Video post mock
         */
        $videoPost = $this
            ->getMockBuilder(VideoPost::class)
            ->disableOriginalConstructor()
            ->setMethods(['__invoke'])
            ->getMock();

        $serverRequest = $this->prophesize(ServerRequestInterface::class);
        $response = call_user_func($videoPost, $serverRequest->reveal(), []);

        $this->assertIsArray($response);
    }
}
