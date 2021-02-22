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
declare(strict_types=1);

namespace CRUD\Controller;

use CRUD\View\EngineInterface;

/**
 * Base trait for Embedded SBPC
 * 
 * @category Embedded
 * @package  CRUD
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */
trait BaseControllerTrait
{
    /**
     * Template engine
     *
     * @var EngineInterface
     */
    private $_templateEngine;

    /**
     * Template engine getter
     *
     * @return EngineInterface
     */
    public function getTemplateEngine(): EngineInterface
    {
        return $this->_templateEngine;
    }
}