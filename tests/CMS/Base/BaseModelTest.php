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
namespace Tests\CMS;

use CMS\BaseModel;
use CMS\BaseModelInterface;
use PHPUnit\Framework\TestCase;

/**
 * Base CMS stack
 * 
 * @category Unit_Cases
 * @package  Base_Model
 * @author   Povilas Brilius <pbrilius@gmail.com>
 * @license  eupl-1.1 https://help.github.com/en/github/creating-cloning-and-archiving-repositories/licensing-a-repository
 * @link     pbgroupeu.wordpress.com
 */
class BaseModelTest extends TestCase
{
    /**
     * Prerequisites case
     *
     * @return void
     */
    public function testPrerequisites(): void
    {
        $baseModel = $this
            ->getMockBuilder(BaseModel::class)
            ->disableOriginalConstructor()
            ->disableProxyingToOriginalMethods()
            ->setMethods(['getPdo'])
            ->getMock();

        $baseModel
            ->expects($this->once())
            ->method('getPdo')
            ->willReturn($this->prophesize(\PDO::class)->reveal());

        $this->assertInstanceOf(\PDO::class, $baseModel->getPdo());
        $this->assertObjectHasAttribute('table', $baseModel);

        $baseModel = $this
            ->getMockBuilder(BaseModel::class)
            ->disableOriginalConstructor()
            ->disableProxyingToOriginalMethods()
            ->setMethodsExcept(['getPdo'])
            ->getMock();

        $baseModel
            ->expects($this->once())
            ->method('single')
            ->willReturn([]);

        $baseModel
            ->expects($this->once())
            ->method('list')
            ->willReturn([]);

        $baseModel
            ->expects($this->once())
            ->method('post')
            ->willReturn([]);

        $baseModel
            ->expects($this->once())
            ->method('update')
            ->willReturn([]);

        $baseModel
            ->expects($this->once())
            ->method('delete')
            ->willReturn([]);

        $this->assertInstanceOf(BaseModelInterface::class, $baseModel);
        $this->assertIsArray(
            $baseModel->single(
                hash('sha3-224', random_bytes(2))
            )
        );
        $this->assertIsArray(
            $baseModel->list()
        );
        $this->assertIsArray(
            $baseModel->post(
                []
            )
        );
        $this->assertIsArray(
            $baseModel->update(
                [],
                hash('sha512/256', random_bytes(2))
            )
        );
        $this->assertIsArray(
            $baseModel->delete(
                hash('sha384', random_bytes(2))
            )
        );
    }
}