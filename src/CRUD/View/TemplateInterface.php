<?php

/**
 * PHP version 7
 * 
 * @category Base
 * @package  CRUD
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */

namespace CRUD\View;

/**
 * Template target interface
 * 
 * @category Template
 * @package  Target
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */
interface TemplateInterface
{
    /**
     * Load the tempalte phtml and assign variables
     * 
     * @param string $templateTarget Template target
     * 
     * @return void
     */
    public function throttle(string $templateTarget): void;
}
