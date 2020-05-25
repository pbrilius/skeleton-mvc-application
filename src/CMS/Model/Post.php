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
 * Post model
 * 
 * @category CMS
 * @package  REST
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */
class Post extends BaseModel
{
    /**
     * Single post
     *
     * @param string $id ID
     * 
     * @return array
     */
    public function single(string $id): array
    {
        /**
         * PDO
         * 
         * @var \PDO $pdo PDO
         */
        $pdo = $this->getPdo();

        return [];
    }

    /**
     * List entities
     *
     * @return array
     */
    public function list(): array
    {
        return [];
    }

    /**
     * Post entity
     *
     * @param array $data Data
     * 
     * @return array
     */
    public function post(array $data): array
    {
        /**
         * PDO
         * 
         * @var \PDO $pdo PDO
         */
        $pdo = $this->getPdo();

        return [];
    }

    /**
     * Update entity
     *
     * @param array  $data Data
     * @param string $id   ID
     * 
     * @return array
     */
    public function update(array $data, string $id): array
    {
        /**
         * PDOP
         * 
         * @var \PDO $pdo PDO
         */
        $pdo = $this->getPdo();

        return [];
    }

    /**
     * Delete entity
     *
     * @param string $id ID
     * 
     * @return array
     */
    public function delete(string $id): array
    {
        /**
         * PDO
         * 
         * @var \PDO $pdo PDO
         */
        $pdo = $this->getPdo();

        return [];
    }
}
