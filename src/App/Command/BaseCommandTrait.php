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
trait BaseCommandTrait
{
    /**
     * Stream output
     *
     * @var Stream
     */
    private $_output;

    /**
     * Input stream
     *
     * @var Stream
     */
    private $_input;

    /**
     * Output getter
     *
     * @return Stream
     */
    public function getOutput(): Stream
    {
        return $this->_output;
    }

    /**
     * Stream input getter
     *
     * @return Stream
     */
    public function getInput(): Stream
    {
        return $this->_input;
    }
}