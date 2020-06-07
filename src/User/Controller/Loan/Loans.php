<?php

/**
 * PHP version 7
 * 
 * @category Controller
 * @package  Invokables
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */
namespace User\Controller\Loan;

use CRUD\Controller\BaseController;

/**
 * Admin stack
 * 
 * @category CRUD
 * @package  Loan
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */
class Loans extends BaseController
{
    /**
     * UX & UI
     *
     * @param \Psr\Http\Message\ServerRequestInterface $request Request
     * @param array                                    $args    Arguments
     * 
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function __invoke(\Psr\Http\Message\ServerRequestInterface $request, array $args): \Psr\Http\Message\ResponseInterface
    {
        $psrModel = $this->getCmsModel();
        $engine = $this->getTemplateEngine();
    }
}