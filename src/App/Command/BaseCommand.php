<?php

/**
 * PHP version 7
 * 
 * @category Base
 * @package  Job
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */
namespace App\Command;

use Laminas\Diactoros\Stream;

/**
 * Base Command stack
 * 
 * @category CI
 * @package  CLI
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */
abstract class BaseCommand implements BaseCommandInterface
{
    use BaseCommandTrait;

    /**
     * Default constructor - CLI
     *
     * @param Stream $input  Input
     * @param Stream $output Output
     */
    public function __construct(Stream $input, Stream $output)
    {
        $this->_input = $input;
        $this->_output = $output;
    }

    /**
     * Execution
     *
     * @param Stream $input  Input
     * @param Stream $output Output
     * 
     * @return void
     */
    abstract public function execute(Stream $input, Stream $output): void;
}