<?php

/**
 * PHP version 7
 * 
 * @category CMS
 * @package  Model
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */

namespace CMS\Model;

use CMS\BaseModel;

/**
 * Hashtag model
 * 
 * @category CMS
 * @package  REST
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */
class Hashtag extends BaseModel
{
    /**
     * Single hashtag
     *
     * @param string $id ID
     * 
     * @return array
     */
    public function single(string $id): array
    {
        $pdo = $this->getPdo();
        $table = $this->getTable();

        $stmt = $pdo->prepare('SELECT * FROM :table WHERE `id` = :id');
        $stmt->bindValue(':table', $table);
        $stmt->bindValue(':id', $id);
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    /**
     * List entities
     *
     * @return array
     */
    public function list(): array
    {
        $pdo = $this->getPdo();
        $table = $this->getTable();

        $stmt = $pdo->prepare('SELECT * FROM :table');
        $stmt->execute(
            [
                ':table' => $table,
            ]
        );
        
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    /**
     * Post to entity
     *
     * @param array $data Data
     * 
     * @return array
     */
    public function post(array $data): array
    {
        return [];
    }

    /**
     * Update entity
     *
     * @param array  $data Data
     * @param string $id   Entity ID
     * 
     * @return array
     */
    public function update(array $data, string $id): array
    {
        return [];
    }

    /**
     * Delete data
     *
     * @param string $id ID
     * 
     * @return array
     */
    public function delete(string $id): array
    {
        return [];
    }
}
