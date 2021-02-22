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
namespace CMS;

/**
 * Base model for CMS
 * 
 * @category CMS
 * @package  API
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
     * Table
     *
     * @var string
     */
    protected $table;

    /**
     * PDO getter
     *
     * @return \PDO
     */
    public function getPdo(): \PDO
    {
        return $this->_pdo;
    }
}