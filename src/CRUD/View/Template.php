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
        $prependable = file_get_contents($templateTarget);
        $replacementTemplate = '$%s = %s;';
        $_variables = $this->_variables;
        $parsedVariables = [];
        
        foreach ($_variables as $key => $variable) {
            if (is_string($variable)) {
                $variable = '\'' . $variable . '\'';
            }
            if (is_array($variable)) {
                $variable = var_export($variable, true);
            }
            $parsedVariables []= sprintf($replacementTemplate, $key, $variable);
        }

        $replacement = implode("\n", $parsedVariables);
        preg_match('/^\<\?php(\s+)/', $prependable, $matches);
        $formattedInterpretation = preg_replace('/^(\<\?php)(\s+)/', '$1 ' . $replacement . '$2', $prependable);
        
        $tmpStream = new Stream('php://temp', 'w');
        $tmpStream->write($formattedInterpretation);
        $tmpStream->rewind();
        $tmpFile = tempnam(dirname($templateTarget), 'temp_thr');
        $handle = fopen($tmpFile, 'w');
        fwrite($handle, $formattedInterpretation);
        
        ob_start();
        include_once $tmpFile;
        $html = ob_get_clean();
        fclose($handle);
        
        unlink($tmpFile);
        
        $stream = new Stream('php://memory', 'w');
        $stream->write($html);
        $stream->rewind();
        $this->_interpretation = $html;
        
        $this->_interpretation = $stream->read(strlen($formattedInterpretation));
    }

}