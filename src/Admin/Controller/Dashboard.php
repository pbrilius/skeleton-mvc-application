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

namespace Admin\Controller;

use CMS\BaseModelInterface;
use CRUD\Controller\BaseController;
use Laminas\Diactoros\Response;
use Laminas\Diactoros\Stream;

/**
 * Admin stack
 * 
 * @category CRUD
 * @package  Dashboard
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */
class Dashboard extends BaseController
{
    /**
     * Invocation
     *
     * @param \Psr\Http\Message\ServerRequestInterface $request Request
     * @param array                                    $args    Arguments
     * 
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function __invoke(\Psr\Http\Message\ServerRequestInterface $request, array $args): \Psr\Http\Message\ResponseInterface
    {
        /**
         * PSR model
         * 
         * @var BaseModelInterface $cmsModel
         */
        $cmsModel = $this->getCmsModel();
        $engine = $this->getTemplateEngine();

        $apis = $cmsModel->list();

        $stream = new Stream('php://memory', 'w');
        $stream->write(
            $engine->parse(
                'dashboard.phtml',
                [
                    'title' => 'Demo dashboard page',
                    'pageIntro' => 'Hello, called at ' . (new \DateTime())->format('Y-m-d H:i:s') . ' by a ' . __CLASS__,
                    'header' => 'Hi, user, this is admin role, demo site for hybrid engine purposes',
                    'apis' => $apis,
                ]
            )
        );
        $response = new Response($stream);

        return $response;
    }
}
