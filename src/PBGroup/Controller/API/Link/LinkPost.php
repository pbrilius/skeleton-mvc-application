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
use Ramsey\Uuid\Uuid;

/**
 * Link stack
 * 
 * @category API
 * @package  Link
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */
class LinkPost extends BaseController
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
            'INSERT INTO `link` ('
                . '`id`, '
                . '`label`, '
                . '`referece`'
                . ') '
                . 'VALUES ('
                . ':id, '
                . ':label, '
                . ':reference'
                . ')'
        );
        $uuid = Uuid::uuid4();
        $stmt->execute(
            [
                ':id' => $uuid,
                ':label' => $request->getParsedBody()['label'],
                ':reference' => $request->getParsedBody()['reference'],
            ]
        );

        return [
            'id' => $uuid,
            'label' => $request->getParsedBody()['label'],
            'reference' => $request->getParsedBody()['reference'],
        ];
    }
}
