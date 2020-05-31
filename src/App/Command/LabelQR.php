<?php

/**
 * PHP version 7
 * 
 * @category Base
 * @package  Job
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */
namespace App\Command;

/**
 * Base Command stack
 * 
 * @category CI
 * @package  CLI
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */
trait LabelQR
{
    protected $label = 'Default command label';

    /**
     * Label getter
     *
     * @return string
     */
    public function getLabel(): string
    {
        return $this->label;
    }
}