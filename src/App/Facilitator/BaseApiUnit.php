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
namespace App\Facilitator;

use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ServerRequestInterface;
use Ramsey\Uuid\Uuid;

/**
 * Base API stack
 * 
 * @category Unit_Cases
 * @package  Controller
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */
class BaseApiUnit extends TestCase
{
    /**
     * Generated ID
     *
     * @var string
     */
    protected $id;

    /**
     * Request mock
     *
     * @var ServerRequestInterface
     */
    protected $requestMock;
    
    /**
     * Boot up case
     *
     * @return void
     */
    public function setUp(): void
    {
        $id = Uuid::uuid1();
        $this->id = $id->toString();

        $request = $this
            ->prophesize(ServerRequestInterface::class)
            ->reveal();
        $this->requestMock = $request;

        $this->assertPreConditions();
    }

    /**
     * Power off case
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->id);
        unset($this->requestMock);

        $this->assertPostConditions();
    }
}