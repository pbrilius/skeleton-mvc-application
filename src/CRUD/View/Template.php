<?php

/**
 * PHP version 7
 * 
 * @category Base
 * @package  Template
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */
namespace CRUD\View;

use Laminas\Diactoros\Stream;

/**
 * Base template
 * 
 * @category CRUD
 * @package  Engine
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */
class Template implements TemplateInterface
{
    use TemplateTrait;
    
    /**
     * Constructor device
     *
     * @param array $_variables Variables
     */
    public function __construct(array $_variables)
    {
        $this->_variables = $_variables;
    }

    /**
     * Throttling mechanism
     *
     * @param string $templateTarget Template target
     * 
     * @return void
     */
    public function throttle(string $templateTarget): void
    {
        
        $prependable = readfile($templateTarget);
        $replacementTemplate = '$%s = %s;';
        $_variables = $this->_variables;
        $parsedVariables = [];
        
        foreach ($_variables as $key => $variable) {
            if (is_string($variable)) {
                $variable = '\'' . $variable . '\'';
            }
            $parsedVariables []= sprintf($replacementTemplate, $key, $variable);
        }

        $replacement = implode("\n", $parsedVariables);

        preg_replace('/$\<\?php(\s+)/', $replacement, $prependable);
        
        $stream = new Stream('php://memory', 'w');
        $stream->write(include_once $templateTarget);

        $stream->rewind();

        $this->_interpretation = $stream->read(strlen($prependable));
        
    }

}