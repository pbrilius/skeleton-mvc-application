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

namespace Tests\ERM\Controller\API\Quantity;

use App\Facilitator\BaseApiUnit;
use ERM\Controller\API\Quantity\QuantityDelete;

/**
 * Quantity API stack
 * 
 * @category Unit_Cases
 * @package  Controller
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */
class QuantityDeleteTest extends BaseApiUnit
{
    /**
     * Callback case
     *
     * @return void
     */
    public function testCallback(): void
    {
        $quantityDelete = $this
            ->getMockBuilder(QuantityDelete::class)
            ->disableOriginalConstructor()
            ->disableProxyingToOriginalMethods()
            ->setMethods(['__invoke'])
            ->getMock();

        $quantityDelete
            ->expects($this->once())
            ->method('__invoke')
            ->willReturn([]);

        $response = call_user_func(
            $quantityDelete,
            $this->requestMock,
            [
                'id' => $this->id,
            ]
        );

        $this->assertIsArray($response);
        $this->assertEquals(0, sizeof($response));
    }
}
