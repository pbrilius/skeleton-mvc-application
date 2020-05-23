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

namespace PBG\Controller\API\Image;

use PBG\Controller\BaseController;
use Ramsey\Uuid\Uuid;

/**
 * Image stack
 * 
 * @category API
 * @package  Image
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */
class ImagePost extends BaseController
{
    /**
     * Invocation
     *
     * @param \Psr\Http\Message\ServerRequestInterface $request Request
     * @param array                                    $args    Arguments
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

        $uuid = Uuid::uuid6();
        $stmt = $pdo->prepare(
            'INSERT INTO `image` (`id`, `jpeg`, `label`) '
                . 'VALUES (:id, :jpeg, :label)'
        );
        $stmt->execute(
            [
                ':id' => $uuid,
                ':jpeg' => $request->getParsedBody()['jpeg'],
                ':label' => $request->getParsedBody()['label']
            ]
        );

        return [
            'id' => $uuid,
            'jpeg' => $request->getParsedBody()['jpeg'],
            'label' => $request->getParsedBody()['label']
        ];
    }
}
