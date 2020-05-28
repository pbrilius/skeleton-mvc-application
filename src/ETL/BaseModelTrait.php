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
    private $_pdoBase;

    protected $limit = 32;
    
    /**
     * PDO
     *
     * @var \PDO
     */
    private $_pdoEtl;

    /**
     * PDO base getter
     *
     * @return \PDO|null
     */
    public function getPdoBase(): ?\PDO
    {
        return $this->_pdoBase;
    }
    
    /**
     * PDO ETL getter
     *
     * @return \PDO|null
     */
    public function getPdoEtl(): ?\PDO
    {
        return $this->_pdoEtl;
    }

}
