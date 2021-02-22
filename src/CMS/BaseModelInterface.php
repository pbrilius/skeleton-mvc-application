<?php

/**
 * PHP version 7
 * 
 * @category Base
 * @package  Model
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */
namespace CMS;

/**
 * Base interface for CMS
 * 
 * @category CMS
 * @package  API
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */
interface BaseModelInterface
{
    /**
     * List entities
     *
     * @return array
     */
    public function list(): array;

    /**
     * Consume entity
     *
     * @param string $id ID
     * 
     * @return array
     */
    public function single(string $id): array;

    /**
     * Post entity
     * 
     * @param array $data Data
     *
     * @return array
     */
    public function post(array $data): array;

    /**
     * Update entity
     * 
     * @param array  $data Data
     * @param string $id   ID
     *
     * @return array
     */
    public function update(array $data, string $id): array;

    /**
     * Delete entity
     *
     * @param string $id ID
     * 
     * @return array
     */
    public function delete(string $id): array;
}