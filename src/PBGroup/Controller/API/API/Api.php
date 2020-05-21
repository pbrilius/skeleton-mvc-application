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
 * API - single - return call
 * 
 * @category API
 * @package  API
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */
class Api extends BaseController
{
    /**
     * API singular retrieval
     *
     * @param ServerRequestInterface $request Request
     * 
     * @return array
     */
    public function __invoke(ServerRequestInterface $request): array
    {
        var_dump($request->getServerParams());
        exit;
        /**
         * PDO
         * 
         * @var \PDO $pdo
         */
        $pdo = $this->getPdo();

        $stmt = $pdo->prepare('SELECT * FROM `api` WHERE `id` = :id');
        // $stmt->bindParam(':id', $request->getServerParams())

        $apis = [];

        if ($stmt) {
            $stmt->execute();
            $stmt->setFetchMode(\PDO::FETCH_ASSOC);
            
            $apis = $stmt->fetchAll();
        }

        return $apis;
    }
}