<?php

/**
 * PHP version 7
 * 
 * @category Base
 * @package  Model
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */

namespace ETL;

/**
 * Base model for ETL
 * 
 * @category ETL
 * @package  Media
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */
trait BaseModelTrait
{
    /**
     * PDO
     *
     * @var \PDO
     */
    private $_pdo;

    /**
     * PDO getter
     *
     * @return void
     */
    public function getPdo(): \PDO
    {
        return $this->_pdo;
    }

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
