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
namespace CMS;

use PBG\Controller\BaseControllerInterface;

/**
 * Base controller for CMS
 * 
 * @category CMS
 * @package  API
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */
abstract class BaseController implements BaseControllerInterface
{
    use BaseControllerTrait;

    /**
     * Base constructor
     *
     * @param BaseModelInterface $cmsModel CMS model
     */
    public function __construct(BaseModelInterface $cmsModel)
    {
        $this->_cmsModel = $cmsModel;
    }
} 