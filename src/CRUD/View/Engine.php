<?php

/**
 * PHP version 7
 * 
 * @category CRUD
 * @package  Engine
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */
namespace CRUD\View;

/**
 * Template parsing engine for Embedded SBPC
 * 
 * @category SBPC
 * @package  CRUD
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */
class Engine implements EngineInterface
{
    use EngineTrait;

    /**
     * Constructor of the engine
     *
     * @param string $templatePath Template path
     */
    public function __construct(string $templatePath)
    {
        $this->_templatesPath = $templatePath;
    }

    /**
     * Parsing caller
     *
     * @param string $template  Template
     * @param array  $variables Variables
     * 
     * @return string
     */
    public function parse(string $template, array $variables): string
    {
        $templateTarget = new Template($variables);
        $this->template = $templateTarget;

        $this->_load($template);
        
        return $this->template->getInterpretation();
    }

    /**
     * Template load up callback
     *
     * @param string $template Template
     * 
     * @return void
     */
    function _load(string $template): void
    {
        /**
         * Template host
         * 
         * @var Template $templateHost
         */
        $templateHost = $this->template;

        $templateHost->throttle($template);

        $this->template = $templateHost;
    }

}