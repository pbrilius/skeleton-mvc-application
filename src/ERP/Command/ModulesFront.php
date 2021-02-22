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
class ModulesFront extends BaseCommand
{
    /**
     * Modules preset
     *
     * @var array
     */
    private $_modules;

    /**
     * DI constructor
     *
     * @param StreamInterface $input   Input
     * @param StreamInterface $output  Output
     * @param string          $label   Label
     * @param array           $modules Modules
     */
    public function __construct(
        StreamInterface $input,
        StreamInterface $output,
        string $label,
        array $modules
    ) {
        parent::__construct(
            $input,
            $output,
            $label
        );

        $this->_modules = $modules;
    }

    /**
     * Execution
     *
     * @return void
     */
    public function execute(): void
    {
        $modules = $this->_modules;
        $output = $this->getOutput();

        $output->write('Modules - switched on:' . "\n");
        foreach ($modules as $module) {
            $output->write(strtolower($module) . "\n");
        }
    }
}