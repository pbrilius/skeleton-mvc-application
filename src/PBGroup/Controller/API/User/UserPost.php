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
use Ramsey\Uuid\Uuid;

/**
 * User stack
 * 
 * @category API
 * @package  User
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */
class UserPost extends BaseController
{
    /**
     * Inherited
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
        $parsedBody = $request->getParsedBody();

        $uuid = Uuid::uuid1();
        
        $stmt = $pdo->prepare(
            'INSERT INTO `user` (`id`, `roles`, `attributes`, `confidential`, `email`, `hash`, `identifier`, `redirectUri`)
        VALUES (:roles, :attributes, :confidential, :email, :hash, :identifier, :redirectUri)'
        );
        $stmt->execute(
            [
                ':id' => $uuid,
                ':roles' => $parsedBody['roles'],
                ':attributes' => $parsedBody['attributes'],
                ':confidential' => $parsedBody['confidential'],
                ':email' => $parsedBody['email'],
                ':hash' => $parsedBody['hash'],
                ':identifier' => $parsedBody['identifier'],
                ':redirectUri' => $parsedBody['redirectUri'],
            ]
        );

        return [
            'id' => $uuid,
            'roles' => $parsedBody['roles'],
            'attributes' => $parsedBody['attributes'],
            'confidential' => $parsedBody['confidential'],
            'email' => $parsedBody['email'],
            'hash' => $parsedBody['hash'],
            'identifier' => $parsedBody['identifier'],
            'redirectUri' => $parsedBody['redirectUri'],
        ];
    }
}
