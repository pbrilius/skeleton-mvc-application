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
namespace PBG\Controller\API\Link;

use PBG\Controller\BaseController;

/**
 * Link stack
 * 
 * @category API
 * @package  Link
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */
class LinkUpdate extends BaseController
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

        $stmt = $pdo->prepare(
            'UPDATE `link` SET '
            . '`label` = :label, '
            . '`reference` = :reference '
            . 'WHERE `id` = :id'
        );
        $stmt->bindValue(':id', $args['id']);
        $stmt->bindValue(':label', $request->getQueryParams()['label']);
        $stmt->bindValue(':reference', $request->getQueryParams()['reference']);

        $stmt->execute();

        return [
            'id' => $args['id'],
            'label' => $request->getQueryParams()['label'],
            'reference' => $request->getQueryParams()['reference'],
        ];
    }
}