<?php

/**
 * PHP version 7
 * 
 * @category TDD
 * @package  BDD
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */

namespace Tests\C2C\Controller\API\Currency;

use App\Facilitator\BaseApiUnit;
use C2C\Controller\API\Currency\CurrencyDelete;

/**
 * Currency API stack
 * 
 * @category Unit_Cases
 * @package  Controller
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */
class CurrencyDeleteTest extends BaseApiUnit
{
    /**
     * Invocation case
     *
     * @return void
     */
    public function testInvocation(): void
    {
        $currencyDelete = $this
            ->getMockBuilder(CurrencyDelete::class)
            ->disableOriginalConstructor()
            ->disableAutoReturnValueGeneration()
            ->disableProxyingToOriginalMethods()
            ->disableArgumentCloning()
            ->setMethods(['__invoke'])
            ->getMock();

        $currencyDelete
            ->expects($this->once())
            ->method('__invoke')
            ->willReturn([]);

        $resposne = call_user_func(
            $currencyDelete,
            $this->requestMock,
            [
                'id' => $this->id,
            ]
        );

        $this->assertIsArray($resposne);
        $this->assertGreaterThanOrEqual(0, $resposne);
    }
}
