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
use Ramsey\Uuid\Uuid;

/**
 * Video singular call
 * 
 * @category API
 * @package  Video
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */
class VideoPost extends BaseController
{
    /**
     * Video post endpoint
     *
     * @param ServerRequestInterface $request Request
     * @param array                  $args    Arguments
     * 
     * @return array
     */
    public function __invoke(ServerRequestInterface $request, array $args): array
    {
        $parsedBody = $request->getParsedBody();

        /**
         * PDO
         * 
         * @var \PDO $pdo PDO
         */
        $pdo = $this->getPdo();

        $stmt = $pdo->prepare('INSERT INTO `video_memo` (`id`, `record`, `note`) VALUES (:id, :record, :note)');
        $uuid = Uuid::uuid4();
        $stmt->execute(
            [
                ':id' => $uuid,
                ':record' => $parsedBody['record'],
                ':note' => $parsedBody['note'],
            ]
        );

        return [
            'id' => $uuid,
            'record' => $parsedBody['record'],
            'note' => $parsedBody['note'],
        ];

    }
}
