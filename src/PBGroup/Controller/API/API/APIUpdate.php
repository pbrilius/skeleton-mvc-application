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
 * @package  Delete
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */
class APIUpdate extends BaseController
{
    /**
     * Undocumented function
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
         * @var \PDO $pdo PDO
         */
        $pdo = $this->getPdo();
        $queryParams = $request->getQueryParams();
        
        $stmt = $pdo->prepare('UPDATE `api` SET `release` = :release, `version` = :version WHERE `id` = :id');
        $stmt->bindValue(':release', $queryParams['release']);
        $stmt->bindValue(':version', $queryParams['version']);
        $stmt->bindValue(':id', $args['id']);

        $stmt->execute();

        return [
            'id' => $args['id'],
            'release' => $queryParams['release'],
            'version' => $queryParams['version'],
        ];
    }
}
