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
namespace ETL;

use PBG\Controller\BaseControllerInterface;

/**
 * Base controller for ETL
 * 
 * @category ETL
 * @package  Media
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */
abstract class BaseController implements BaseControllerInterface
{
    use BaseControllerTrait;
    
    /**
     * ETL model getter
     *
     * @return BaseModelInterface
     */
    public function getEtlModel(): BaseModelInterface
    {
        return $this->_etlModel;
    }
}