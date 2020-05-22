<?php

/**
 * PHP version 7
 * 
 * @category Controller
 * @package  Invokables
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */
namespace Tests\API\Note;

use PBG\Controller\API\Note\NotePost;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ServerRequestInterface;

/**
 * Note stack API
 * 
 * @category API
 * @package  Note
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */
class NotePostTest extends TestCase
{
    /**
     * Array return case
     *
     * @return void
     */
    public function testArrayReturn(): void
    {
        $notePost = $this
            ->getMockBuilder(NotePost::class)
            ->disableOriginalConstructor()
            ->disableProxyingToOriginalMethods()
            ->setMethods(['__invoke'])
            ->getMock();

        $request = $this->prophesize(ServerRequestInterface::class);
        $response = call_user_func($notePost, $request->reveal(), []);

        $this->assertIsArray($response);
    }
}