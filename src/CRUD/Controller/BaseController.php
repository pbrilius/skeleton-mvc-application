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
namespace CRUD\Controller;

use CMS\BaseControllerTrait as CmsTrait;
use CMS\BaseModelInterface;
use CRUD\View\EngineInterface;

/**
 * Base controller for Embedded SBPC
 * 
 * @category SBPC
 * @package  CRUD
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */
abstract class BaseController implements BaseControllerInterface
{
    use CmsTrait;
    use BaseControllerTrait;

    /**
     * Base default constructor
     *
     * @param BaseModelInterface $psrModel CMS model - PSR
     * @param EngineInterface    $engine   Template engine - phtml
     */
    public function __construct(BaseModelInterface $psrModel, EngineInterface $engine)
    {
        $this->_cmsModel = $psrModel;
        $this->_templateEngine = $engine;
    }
}