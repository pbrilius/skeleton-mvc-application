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

use PBG\Controller\API\Note\NoteUpdate;
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
class NoteUpdateTest extends TestCase
{
    /**
     * Array return case
     *
     * @return void
     */
    public function testArrayReturn(): void
    {
        $noteUpdate = $this
            ->getMockBuilder(NoteUpdate::class)
            ->disableOriginalConstructor()
            ->disableProxyingToOriginalMethods()
            ->setMethods(['__invoke'])
            ->getMock();

        $request = $this->prophesize(ServerRequestInterface::class);
        $response = call_user_func(
            $noteUpdate,
            $request->reveal(),
            [
                'id' => hash('tiger160,3', random_bytes(4))
            ]
        );

        $this->assertIsArray($response);
    }
}
