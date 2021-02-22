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
namespace Tests\Controller\ETL;

use ETL\Controller\MediaImageController;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ServerRequestInterface;

/**
 * Video delete
 * 
 * @category Unit_Cases
 * @package  Controller
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */
class MediaImageControllerTest extends TestCase
{
    /**
     * Return type case
     *
     * @return void
     */
    public function testReturnType(): void
    {
        $mediaImageController = $this
            ->getMockBuilder(MediaImageController::class)
            ->disableOriginalConstructor()
            ->disableProxyingToOriginalMethods()
            ->setMethods(['__invoke'])
            ->getMock();

        $request = $this->prophesize(ServerRequestInterface::class);
        $response = call_user_func(
            $mediaImageController,
            $request->reveal(),
            [
                'id' => hash('sha512/256', random_bytes(3)),
            ]
        );

        $this->assertIsArray($response);
    }
}