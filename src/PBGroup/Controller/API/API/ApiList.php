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

namespace PBG\Controller\API\API;

use PBG\Controller\BaseController;
use Psr\Http\Message\ServerRequestInterface;

/**
 * API return call
 * 
 * @category API
 * @package  API
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */
class ApiList extends BaseController
{
    /**
     * API listing
     *
     * @param ServerRequestInterface $request Request
     * @param array                  $args    Arguments
     * 
     * @return array
     */
    public function __invoke(ServerRequestInterface $request, array $args): array
    {
        /**
         * PDO
         * 
         * @var \PDO $pdo
         */
        $pdo = $this->getPdo();

        $stmt = $pdo->prepare('SELECT * FROM `api` ORDER BY `release` DESC');

        $apis = [];

        if ($stmt) {
            $stmt->execute();
            $stmt->setFetchMode(\PDO::FETCH_ASSOC);
            
            $apis = $stmt->fetchAll();
        }

        return $apis;
    }
}
