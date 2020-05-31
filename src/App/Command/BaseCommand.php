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
abstract class BaseCommand implements BaseCommandInterface
{
    use BaseCommandTrait;
    use LabelQR;

    /**
     * Default constructor - CLI
     *
     * @param StreamInterface $input  Input
     * @param StreamInterface $output Output
     * @param string          $label  Label
     */
    public function __construct(
        StreamInterface $input,
        StreamInterface $output,
        string $label
    ) {
        $this->_input = $input;
        $this->_output = $output;
        $this->label = $label;
    }

    /**
     * Execution
     *
     * @return void
     */
    abstract public function execute(): void;
}
