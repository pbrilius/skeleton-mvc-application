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

/**
 * Image stack
 * 
 * @category API
 * @package  Image
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */
class ImageUpdate extends BaseController
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
            'UPDATE `image` SET '
                . '`jpeg` = :jpeg, '
                . '`label` = :label '
                . 'WHERE `id` = :id'
        );
        $stmt->bindParam(':jpeg', $request->getQueryParams()['jpeg']);
        $stmt->bindParam(':label', $request->getQueryParams()['label']);
        $stmt->bindParam(':id', $args['id']);

        $stmt->execute();

        return [
            'id' => $args['id'],
            'jpeg' => $request->getQueryParams()['jpeg'],
            'label' => $request->getQueryParams()['label'],
        ];
    }
}
