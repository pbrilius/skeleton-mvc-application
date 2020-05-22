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
 * Video delete call
 * 
 * @category API
 * @package  Video
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */
class VideoDelete extends BaseController
{
    /**
     * Video delete call
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

        $stmt = $pdo->prepare('DELETE FROM `video_memo` WHERE `id` = :id');
        $stmt->execute(
            [
                ':id' => $args['id'],
            ]
        );

        return [];
    }
}
