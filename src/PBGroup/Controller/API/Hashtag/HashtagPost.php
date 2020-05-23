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
use Ramsey\Uuid\Uuid;

/**
 * Hashtag stack
 * 
 * @category API
 * @package  Hashtag
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */
class HashtagPost extends BaseController
{
    public function __invoke(\Psr\Http\Message\ServerRequestInterface $request, array $args): array
    {
        /**
         * PDO
         * 
         * @var \PDO $pdo PDO
         */
        $pdo = $this->getPdo();

        $stmt = $pdo->prepare(
            'INSERT INTO `hashtag` ('
            . '`id`, '
            . '`label`'
            . ') '
            . 'VALUES ('
            . ':id, '
            . ':label'
            . ')'
        );
        $uuid = Uuid::uuid1();
        $stmt->bindParam(':id', $uuid);
        $stmt->bindParam(':label', $request->getParsedBody()['label']);

        $stmt->execute();

        return [
            'id' => $uuid,
            'label' => $request->getParsedBody()['label'],
        ];
    }
}