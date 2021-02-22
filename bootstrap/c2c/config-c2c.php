<?php

/**
 * C2C configuration file
 * 
 * PHP version 7
 * 
 * @category Framework
 * @package  Container
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository gpl-3.0
 * @link     pbgroup.wordpress.com
 */

$container->add(
    'c2c.config',
    [
        'loan.enterprise_interest_rates_share' => 0.1,
    ]
);
