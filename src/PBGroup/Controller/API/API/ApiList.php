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

use App\Repository\ApiRepository;
use Doctrine\ORM\EntityManagerInterface;
use PBG\Controller\BaseController;
use PBG\Entity\Api as EntityApi;
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
     * 
     * @return array
     */
    public function __invoke(ServerRequestInterface $request): array
    {
        /**
         * PDO
         * 
         * @var \PDO $pdo
         */
        $pdo = $this->getPdo();

        $apis = $pdo->exec('SELECT * FROM `api` ORDER BY `release` DESC LIMIT 1');
        var_export($apis);
        exit;
        return $apis;
    }
}
