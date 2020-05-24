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
     * Default constructor
     *
     * @param \PDO   $pdo   PDO
     * @param string $table Table
     */
    public function __construct(\PDO $pdo, string $table)
    {
        $this->_pdo = $pdo;
        $this->_table = $table;
    }
}