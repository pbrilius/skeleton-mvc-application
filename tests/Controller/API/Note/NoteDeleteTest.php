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

use PBG\Controller\API\Note\NoteDelete;
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
class NoteDeleteTest extends TestCase
{
    /**
     * Array return
     *
     * @return void
     */
    public function testArrayReturn(): void
    {
        $noteDelete = $this
            ->getMockBuilder(NoteDelete::class)
            ->disableOriginalConstructor()
            ->disableProxyingToOriginalMethods()
            ->setMethods(['__invoke'])
            ->getMock();
        $request = $this->prophesize(ServerRequestInterface::class);
        $response = call_user_func(
            $noteDelete,
            $request->reveal(),
            [
                'id' => hash('snefru256', random_bytes(5))
            ]
        );

        $this->assertIsArray($response);
    }
}
