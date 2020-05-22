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

namespace Tests\API\Note;

use PBG\Controller\API\Note\NoteList;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ServerRequestInterface;

/**
 * Note stack
 * 
 * @category Unit_Cases
 * @package  Controller
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */
class NoteListTest extends TestCase
{
    /**
     * Array return case
     *
     * @return void
     */
    public function testArrayReturn(): void
    {
        $noteList = $this
            ->getMockBuilder(NoteList::class)
            ->disableOriginalConstructor()
            ->disableProxyingToOriginalMethods()
            ->setMethods(['__invoke'])
            ->getMock();
        $request = $this->prophesize(ServerRequestInterface::class);
        $response = call_user_func($noteList, $request->reveal(), []);

        $this->assertIsArray($response);
    }
}
