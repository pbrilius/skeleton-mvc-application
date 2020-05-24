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

namespace CMS;

/**
 * Base trait for CMS
 * 
 * @category CMS
 * @package  API
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */
trait BaseControllerTrait
{
    /**
     * CMS model
     *
     * @var BaseModelInterface
     */
    private $_cmsModel;

    /**
     * CMS model getter
     *
     * @return BaseModelInterface
     */
    public function getCmsModel(): BaseModelInterface
    {
        return $this->_cmsModel;
    }
}