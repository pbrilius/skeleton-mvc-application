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
abstract class BaseModel implements BaseModelInterface
{
    use BaseModelTrait;
    
    /**
     * Base constructor
     *
     * @param \PDO $pdoBase PDO
     * @param \PDO $pdoEtl PDO
     */
    public function __construct(\PDO $pdoBase, \PDO $pdoEtl)
    {
        $this->_pdo = $pdoBase;
        $this->_pdo = $pdoEtl;
    }

    
    /**
     * Processing callable
     *
     * @return array
     */
    abstract public function process(): array;

}