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
namespace PBG\Command;

use App\Command\BaseCommand;

/**
 * Base Command stack
 * 
 * @category CI
 * @package  CLI
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */
class FillUpBaseEtl extends BaseCommand
{
    /**
     * Execution
     *
     * @return void
     */
    public function execute(): void
    {
        $input = $this->getInput();
        $output = $this->getOutput();

        $output->write('This is ETL machinery. ');
        $output->write('So called aotonomous systems.');

        return;
    }
}