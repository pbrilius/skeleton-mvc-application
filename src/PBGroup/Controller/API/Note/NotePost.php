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

namespace PBG\Controller\API\Note;

use PBG\Controller\BaseController;
use Ramsey\Uuid\Uuid;

/**
 * Note stack API
 * 
 * @category API
 * @package  Note
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */
class NotePost extends BaseController
{
    /**
     * Inherited
     *
     * @param \Psr\Http\Message\ServerRequestInterface $request Request
     * @param array                                    $args    Arguments
     * 
     * @inheritDoc
     * 
     * @return array
     */
    public function __invoke(\Psr\Http\Message\ServerRequestInterface $request, array $args): array
    {
        /**
         * PDO
         * 
         * @var \PDO $pdo PDO
         */
        $pdo = $this->getPdo();

        $parsedBody = $request->getParsedBody();
        $stmt = $pdo->prepare(
            'INSERT INTO `note` '
                . '(`id`, `user`, `gmap`, `hashtags`, `images`, `links`, `text`) '
                . 'VALUES (:id, :user, :gmap, :hashtags, :images, :links, :text)'
        );

        $uuid = Uuid::uuid6();
        $stmt->bindValue(':id', $uuid);
        $stmt->bindValue(':user', $parsedBody['user']);
        $stmt->bindValue(':gmap', $parsedBody['gmap']);
        $stmt->bindValue(':hashtags', $parsedBody['hashtags']);
        $stmt->bindValue('images', $parsedBody['images']);
        $stmt->bindValue(':links', $parsedBody['links']);
        $stmt->bindParam(':text', $parsedBody['text']);

        $stmt->execute();

        return [
            'id' => $uuid,
            'user' => $parsedBody['user'],
            'gmap' => $parsedBody['gmap'],
            'hashtags' => $parsedBody['hashtags'],
            'images' => $parsedBody['images'],
            'links' => $parsedBody['links'],
            'text' => $parsedBody['text'],
        ];
    }
}
