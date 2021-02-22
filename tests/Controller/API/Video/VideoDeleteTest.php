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

use PBG\Controller\API\Video\VideoDelete;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ServerRequestInterface;

use function Sodium\randombytes_buf;

/**
 * Video delete
 * 
 * @category Unit_Cases
 * @package  Controller
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */
class VideoDeleteTest extends TestCase
{
    /**
     * Array return type
     *
     * @return void
     */
    public function testArrayReturn(): void
    {
        $videoDelete = $this
            ->getMockBuilder(VideoDelete::class)
            ->disableOriginalConstructor()
            ->setMethods(['__invoke'])
            ->getMock();

        $request = $this->prophesize(ServerRequestInterface::class);

        $response = call_user_func($videoDelete, $request->reveal(), ['id' => hash('whirlpool', random_bytes(3))]);
        $this->assertIsArray($response);
    }
}
