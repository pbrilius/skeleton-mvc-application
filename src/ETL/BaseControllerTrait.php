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
 * Base trait for ETL
 * 
 * @category ETL
 * @package  Media
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */
trait BaseControllerTrait
{
    /**
     * ETL model
     *
     * @var BaseModelInterface
     */
    private $_etlModel;

    /**
     * ETL model getter
     *
     * @return BaseModelInterface|null
     */
    public function getEtlModel(): ?BaseModelInterface
    {
        return $this->_etlModel;
    }
}