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
use ETL\Model\LoanModel;
use Psr\Http\Message\StreamInterface;

/**
 * ETL Command stack
 * 
 * @category CI
 * @package  CLI
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */
class LoanEtl extends BaseCommand
{

    /**
     * Loan model
     *
     * @var LoanModel
     */
    private $_loanModel;

    /**
     * ETL locating constructor
     *
     * @param StreamInterface $input      Input
     * @param StreamInterface $output     Output
     * @param string          $label      Label
     * @param LoanModel       $_loanModel Loan model
     */
    public function __construct(
        StreamInterface $input,
        StreamInterface $output,
        string $label,
        LoanModel $_loanModel
    ) {
        parent::__construct(
            $input,
            $output,
            $label
        );

        $this->_loanModel = $_loanModel;
    }

    /**
     * Execution
     *
     * @return void
     */
    public function execute(): void
    {
        $input = $this->getInput();
        $output = $this->getOutput();

        global $argv;

        $output->write('ETL C2C base.' . "\n");
        $output->write('Processing; executing....' . "\n");

        $_loanModel = $this->_loanModel;

        $_loanModel->baseUp();
        $output->write('Based up;' . "\n");
        $_loanModel->process();
        $output->write('Processed;' . "\n");
        $output->write('ETL C2C Complete. Loans aggregated by user, statistically based.');
    }
}
