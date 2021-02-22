<?php

/**
 * PHP version 7
 * 
 * @category Base
 * @package  CLI
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */

namespace ERP\Command;

use App\Command\BaseCommand;
use Psr\Http\Message\StreamInterface;

/**
 * ETL Command stack
 * 
 * @category Debug
 * @package  Environment
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */
class EmbeddedFront extends BaseCommand
{
    /**
     * Embedded components - SBPC
     *
     * @var array
     */
    private $_embedded;

    /**
     * Dependency injection container
     *
     * @param StreamInterface $input     Input
     * @param StreamInterface $output    Output
     * @param string          $label     Label
     * @param array           $_embedded Embedded components set
     */
    public function __construct(
        StreamInterface $input,
        StreamInterface $output,
        string $label,
        array $_embedded
    ) {
        parent::__construct(
            $input,
            $output,
            $label
        );

        $this->_embedded = $_embedded;
    }

    /**
     * Execution
     *
     * @return void
     */
    public function execute(): void
    {
        $embedded = $this->_embedded;
        $output = $this->getOutput();

        $output->write('Embedded components - switched on:' . "\n");
        foreach ($embedded as $component) {
            $output->write(strtolower($component) . "\n");
        }
    }
}
