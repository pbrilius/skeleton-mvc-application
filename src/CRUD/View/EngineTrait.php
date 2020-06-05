<?php

/**
 * PHP version 7
 * 
 * @category CRUD
 * @package  View
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */
namespace CRUD\View;

/**
 * Base trait for Template engine
 * 
 * @category Template
 * @package  Engine
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */
trait EngineTrait
{
    private $_templatesPath = '';

    /**
     * Template
     *
     * @var Template
     */
    protected $template;
}