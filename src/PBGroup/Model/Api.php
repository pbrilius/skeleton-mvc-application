<?php

/**
 * PHP version 7
 * 
 * @category C2C
 * @package  Model
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */
namespace PBG\Model;

use CMS\BaseModel;

/**
 * API model
 * 
 * @category PBG
 * @package  REST
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */
class Api extends BaseModel
{
    protected $table = 'api';
}