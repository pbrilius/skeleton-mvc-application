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
 * Page model
 * 
 * @category CMS
 * @package  REST
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */
class Page extends BaseModel
{
    /**
     * Single page
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
     * List pages
     *
     * @return array
     */
    public function list(): array
    {
        $pdo = $this->getPdo();

        return [];
    }

    /**
     * Post page
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
    }

    /**
     * Update page
     *
     * @param array  $data Data
     * @param string $id   ID
     * 
     * @return array
     */
    public function update(array $data, string $id): array
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
     * Delete page
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