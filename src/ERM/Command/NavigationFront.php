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

namespace ERM\Command;

use App\Command\BaseCommand;
use League\Route\Router;
use Psr\Http\Message\StreamInterface;

/**
 * ETL Command stack
 * 
 * @category Debug
 * @package  CLI
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */
class NavigationFront extends BaseCommand
{
    /**
     * Router
     *
     * @var Router
     */
    private $_router;

    /**
     * DI constructor
     *
     * @param StreamInterface $input  Input
     * @param StreamInterface $output Output
     * @param string          $label  Label
     * @param Router          $router Router
     */
    public function __construct(
        StreamInterface $input,
        StreamInterface $output,
        string $label,
        Router $router
    ) {
        parent::__construct(
            $input,
            $output,
            $label
        );

        $this->_router = $router;
    }

    /**
     * Execution
     *
     * @return void
     */
    public function execute(): void
    {
        $router = $this->_router;
        
        $output = $this->getOutput();

        $output->write('Exporting router: ');
        $output->write(get_class($router));
    }
}
