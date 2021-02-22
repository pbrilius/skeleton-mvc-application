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
namespace PBG\Controller;

use PDO;

/**
 * Base controller, requiring - fetching - prerequisites, such as ORM entity manager
 * 
 * @category ORM
 * @package  PDO
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */
abstract class BaseController implements BaseControllerInterface
{
    /**
     * Database PDO
     *
     * @var PDO
     */
    private $_pdo;

    /**
     * Default base constructor
     *
     * @param PDO $pdo PDO
     */
    public function __construct(PDO $pdo)
    {
        $this->_pdo = $pdo;
    }

    /**
     * PDO getter
     *
     * @return PDO
     */
    public function getPdo(): PDO
    {
        return $this->_pdo;
    }

}