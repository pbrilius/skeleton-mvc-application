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

use PBG\Controller\API\Video\VideoUpdate;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ServerRequestInterface;

/**
 * Video update
 * 
 * @category Unit_Cases
 * @package  Controller
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */
class VideoUpdateTest extends TestCase
{
    /**
     * VIdeo update return type
     *
     * @return void
     */
    public function testArrayReturn(): void
    {
        $videoUpdate = $this
            ->getMockBuilder(VideoUpdate::class)
            ->disableOriginalConstructor()
            ->setMethods(['__invoke'])
            ->getMock();

        $request = $this->prophesize(ServerRequestInterface::class);
        $response = call_user_func(
            $videoUpdate,
            $request->reveal(),
            [
                'id' => hash('sha256', random_bytes(3))
            ]
        );

        $this->assertIsArray($response);
    }
}
