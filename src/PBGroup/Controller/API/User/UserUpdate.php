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
namespace PBG\Controller\API\User;

use PBG\Controller\BaseController;

/**
 * User stack
 * 
 * @category API
 * @package  User
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */
class UserUpdate extends BaseController
{
    /**
     * Inherited
     *
     * @param \Psr\Http\Message\ServerRequestInterface $request Reuqest
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
            'UPDATE `user` SET '
            . '`attributes` = :attributes '
            . '`confidential` = :confidential '
            . '`email` = :email '
            . '`hash` = :hash '
            . '`identifier` = :identifier '
            . '`redirectUri` = :redirectUri '
            . '`roles` = :roles '
            . 'WHERE `id` = :id'
        );

        $stmt->execute(
            [
                ':id' => $args['id'],
                ':attributes' => $queryParams['attributes'],
                ':confidential' => $queryParams['confidential'],
                ':email' => $queryParams['email'],
                ':hash' => $queryParams['hash'],
                ':identifier' => $queryParams['identifier'],
                ':redirectUri' => $queryParams['redirectUri'],
                ':roles' => $queryParams['roles']
            ]
        );

        return [
            'id' => $args['id'],
            'attributes' => $queryParams['attributes'],
            'confidential' => $queryParams['confidential'],
            'email' => $queryParams['email'],
            'hash' => $queryParams['hash'],
            'identifier' => $queryParams['identifier'],
            'redirectUri' => $queryParams['redirectUri'],
            'roles' => $queryParams['roles'],
        ];
    }
}