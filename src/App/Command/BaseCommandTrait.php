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

use Psr\Http\Message\StreamInterface;

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
     * @var StreamInterface
     */
    private $_output;

    /**
     * Input stream
     *
     * @var StreamInterface
     */
    private $_input;

    /**
     * Output getter
     *
     * @return StreamInterface
     */
    public function getOutput(): StreamInterface
    {
        return $this->_output;
    }

    /**
     * Stream input getter
     *
     * @return StreamInterface
     */
    public function getInput(): StreamInterface
    {
        return $this->_input;
    }
}