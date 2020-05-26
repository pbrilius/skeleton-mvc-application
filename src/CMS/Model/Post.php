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
    protected $table = 'post';
}
