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
namespace Tests\ERM\Controller\API\Quality;

use App\Facilitator\BaseApiUnit;
use ERM\Controller\Quality\QualityPost;

/**
 * Quality API stack
 * 
 * @category Unit_Cases
 * @package  Controller
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */
class QualityPostTest extends BaseApiUnit
{
    /**
     * Callback case
     *
     * @return void
     */
    public function testCallback(): void
    {
        $qualityPost = $this
            ->getMockBuilder(QualityPost::class)
            ->disableOriginalConstructor()
            ->disableProxyingToOriginalMethods()
            ->setMethods(['__invoke'])
            ->getMock();

        $qualityPost
            ->expects($this->once())
            ->method('__invoke')
            ->willReturn([]);

        $response = call_user_func(
            $qualityPost,
            $this->requestMock,
            []
        );

        $this->assertIsArray($response);
        $this->assertEquals(0, sizeof($response));
    }
}