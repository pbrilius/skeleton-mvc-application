<?php

/**
 * PHP version 7
 * 
 * @category Base
 * @package  Controller
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */
namespace PBG\Controller;

use Psr\Http\Message\ServerRequestInterface;

/**
 * Base controller, requiring - fetching - prerequisites, such as ORM entity manager
 * 
 * @category ORM
 * @package  Invocation
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */
interface BaseControllerInterface
{
    /**
     * Invocation call
     *
     * @param ServerRequestInterface $request Request
     * @param array                  $args    Argument
     * 
     * @return array
     */
    public function __invoke(ServerRequestInterface $request, array $args): array;
}