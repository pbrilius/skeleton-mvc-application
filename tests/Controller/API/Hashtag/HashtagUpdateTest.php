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

namespace Tests\API\Hashtag;

use PBG\Controller\API\Hashtag\HashtagUpdate;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ServerRequestInterface;

/**
 * Hashtag stack
 * 
 * @category Unit_Cases
 * @package  Controller
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */
class HashtagUpdateTest extends TestCase
{
    /**
     * Array return case
     *
     * @return void
     */
    public function testArrayReturn(): void
    {
        $hashtagUpdate = $this
            ->getMockBuilder(HashtagUpdate::class)
            ->disableOriginalConstructor()
            ->disableProxyingToOriginalMethods()
            ->setMethods(['__invoke'])
            ->getMock();
        $request = $this->prophesize(ServerRequestInterface::class);
        $response = call_user_func(
            $hashtagUpdate,
            $request->reveal(),
            [
                'id' => hash('snefru256', random_bytes(3)),
            ]
        );

        $this->assertIsArray($response);
    }
}
