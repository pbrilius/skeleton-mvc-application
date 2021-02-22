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
namespace CRUD\View;

/**
 * Template engine interface
 * 
 * @category Template
 * @package  Parsing
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */
interface EngineInterface
{
    /**
     * Parsing callback
     *
     * @param string $template  Template path
     * @param array  $variables Variables stack
     * 
     * @return string
     */
    public function parse(string $template, array $variables): string;

    /**
     * Loading phtml into object
     * 
     * @param string $template Template
     * 
     * @return void
     */
    function _load(string $template): void;
}
