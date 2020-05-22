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

use PBG\Controller\API\Note\Note;
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
class NoteTest extends TestCase
{
    /**
     * Return type assertion
     *
     * @return void
     */
    public function testReturnArray(): void
    {
        $note = $this
            ->getMockBuilder(Note::class)
            ->disableOriginalConstructor()
            ->disableProxyingToOriginalMethods()
            ->setMethods(['__invoke'])
            ->getMock();

        $request = $this->prophesize(ServerRequestInterface::class);
        $response = call_user_func(
            $note,
            $request->reveal(),
            [
                'id' => hash('sha3-512', random_bytes(7)),
            ]
        );

        $this->assertIsArray($response);

    }
}
