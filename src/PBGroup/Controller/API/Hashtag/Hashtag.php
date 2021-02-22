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

namespace PBG\Controller\API\Hashtag;

use PBG\Controller\BaseController;

/**
 * Hashtag stack
 * 
 * @category API
 * @package  Hashtag
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */
class Hashtag extends BaseController
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
         * @var \PDO $pdo
         */
        $pdo = $this->getPdo();

        $stmt = $pdo->prepare('SELECT * FROM `hashtag` WHERE `id` = :id');
        $stmt->execute(
            [
                ':id' => $args['id'],
            ]
        );
        $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        return $result;
    }
}
