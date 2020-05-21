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
use Ramsey\Uuid\Uuid;

/**
 * API return call
 * 
 * @category API
 * @package  Post
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */
class ApiPost extends BaseController
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

        $stmt = $pdo->prepare('INSERT INTO `api` (`id`, `release`, `version`) VALUES (:id, :release, :version)');

        $api = [];

        if ($stmt) {
            $uuid = Uuid::getFactory()->uuid1()->toString();

            $stmt->bindValue(':id', $uuid);
            $stmt->bindValue(':release', $request->getParsedBody()['release']);
            $stmt->bindValue(':version', $request->getParsedBody()['version']);
            $stmt->execute();

            $api['id'] = $uuid;
        }

        $api['release'] = $request->getParsedBody()['release'];
        $api['version'] = $request->getParsedBody()['version'];

        return $api;
    }
}