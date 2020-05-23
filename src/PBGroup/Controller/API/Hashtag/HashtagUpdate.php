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
class HashtagUpdate extends BaseController
{
    /**
     * Invocation
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
        $stmt = $pdo->prepare(
            'UPDATE `hashtag` SET '
            . '`label` = :label '
            . 'WHERE `id` = :id'
        );
        $stmt->bindValue(':id', $args['id']);
        $stmt->bindParam(':label', $request->getQueryParams()['label']);
        $stmt->execute();

        return [
            'id' => $args['id'],
            'label' => $request->getQueryParams()['label'],
        ];
    }
}