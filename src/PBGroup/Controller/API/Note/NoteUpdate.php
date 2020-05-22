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

/**
 * Note stack API
 * 
 * @category API
 * @package  Note
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */
class NoteUpdate extends BaseController
{
    /**
     * Note update
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
        $queryParams = $request->getQueryParams();
        $stmt = $pdo->prepare(
            'UPDATE `note` SET '
                . '`gmap` = :gmap, '
                . '`hashtags` = :hashtags, '
                . '`images` = :images, '
                . '`links` = :links, '
                . '`text` = :text '
                . 'WHERE `id` = :id'
        );

        $stmt->execute(
            [
                ':id' => $args['id'],
                ':gmap' => $queryParams['gmap'],
                ':hashtags' => $queryParams['hashtags'],
                ':images' => $queryParams['images'],
                ':links' => $queryParams['links'],
                ':text' => $queryParams['text'],
            ]
        );
        
        return [
            'id' => $args['id'],
            'gmap' => $queryParams['gmap'],
            'hashtags' => $queryParams['hashtags'],
            'images' => $queryParams['images'],
            'links' => $queryParams['links'],
            'text' => $queryParams['text'],
        ];
    }
}
