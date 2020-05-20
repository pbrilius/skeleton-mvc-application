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

use Doctrine\ORM\EntityManagerInterface;

/**
 * Base controller, requiring - fetching - prerequisites, such as ORM entity manager
 * 
 * @category ORM
 * @package  EM
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */
class BaseController
{
    /**
     * Entity manager
     *
     * @var EntityManagerInterface
     */
    private $_entityManager;
    
    /**
     * Default Base constructor
     *
     * @param EntityManagerInterface $entityManager Entity manager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->_entityManager = $entityManager;
    }

    /**
     * EM getter
     *
     * @return EntityManagerInterface
     */
    public function getEntityManager(): EntityManagerInterface
    {
        return $this->_entityManager;
    }
}