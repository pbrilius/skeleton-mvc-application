<?php

/**
 * PHP version 7
 * 
 * @category Model
 * @package  Proceedings
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */
namespace ETL\Model;

use ETL\BaseModel;

/**
 * Media models stack
 * 
 * @category ETL
 * @package  Image
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */
class ImageModel extends BaseModel
{
    /**
     * Processing
     *
     * @return array
     */
    public function process(): array
    {
        /**
         * PDO
         * 
         * @var \PDO $pdo \PDO
         */
        $pdo = $this->getPdo();

        return [
            'Job' => __CLASS__,
            'status' => BaseModelStatuses::OK,
        ];
    }
}