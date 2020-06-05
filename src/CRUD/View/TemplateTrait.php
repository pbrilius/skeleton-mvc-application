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
 * Base trait for Template target
 * 
 * @category Template
 * @package  Target
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */
trait TemplateTrait
{
    /**
     * Variables stack
     *
     * @var array
     */
    private $_variables;

    /**
     * Interpretation
     *
     * @var string
     */
    private $_interpretation = '';

    /**
     * Interpretation getter
     *
     * @return string
     */
    public function getInterpretation(): string
    {
        return $this->_interpretation;
    }
}