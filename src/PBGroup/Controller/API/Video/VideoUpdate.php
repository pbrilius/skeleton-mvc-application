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

namespace PBG\Controller\API\Video;

use PBG\Controller\BaseController;
use Psr\Http\Message\ServerRequestInterface;

/**
 * API delete
 * 
 * @category API
 * @package  API
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */
class VideoUpdate extends BaseController
{
    /**
     * Video update call
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

        $stmt = $pdo->prepare('UPDATE `video_memo` SET `note` = :note, `record` = :record WHERE `id` = :id');
        $queryParams = $request->getQueryParams();
        $stmt->execute(
            [
                ':id' => $queryParams['id'],
                ':note' => $queryParams['note'],
                ':record' => $queryParams['record'],
            ]
        );

        return [
            'id' => $queryParams['id'],
            'note' => $queryParams['note'],
            'record' => $queryParams['record'],
        ];
    }
}
