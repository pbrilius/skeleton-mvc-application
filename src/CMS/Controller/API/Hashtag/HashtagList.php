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
namespace CMS\Controller\API\Hashtag;

use CMS\BaseController;
use CMS\BaseModelInterface;

/**
 * CMS stack
 * 
 * @category API
 * @package  Hashtag
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */
class HashtagList extends BaseController
{
    /**
     * List invocation
     *
     * @param \Psr\Http\Message\ServerRequestInterface $request Request
     * @param array                                    $args    Arguments
     * 
     * @return array
     */
    public function __invoke(\Psr\Http\Message\ServerRequestInterface $request, array $args): array
    {
        /**
         * CMS Model
         * 
         * @var BaseModelInterface $cmsModel CMS
         */
        $cmsModel = $this->getCmsModel();
        $list = $cmsModel->list();

        return $list;
    }
}