<?php
/**
 * Created by PhpStorm.
 * User: steve
 * Date: 21/04/17
 * Time: 11:41
 */

namespace Propel\Generator\Behavior\Api\Request;

use Eukles\Container\ContainerMock;
use Eukles\Entity\EntityRequestInterface;
use PHPUnit\Framework\TestCase;
use Propel\Generator\Util\QuickBuilder;
use Util\SetUp;

class RequestTest extends TestCase
{
    
    /**
     * @var QuickBuilder
     */
    protected $builder;
    
    public function setUp()
    {
        $this->builder = SetUp::load('schema-full', true);
    }
    
    public function testAction()
    {
        $r = $this->createMock('\\ApiTest1Request');
        $this->assertInstanceOf(EntityRequestInterface::class, $r);
        $this->assertInstanceOf('Base\\ApiTest1Request', $r);
    }
    
    public function testGetActionClassName()
    {
        /** @var EntityRequestInterface $r */
        $r = new \ApiTest1Request(new ContainerMock());
        
        $this->assertSame('ApiTest1Action', $r->getActionClassName());
    }
    
    public function testGetNameOfParameterToAddPlural()
    {
        /** @var EntityRequestInterface $r */
        $r = new \ApiTest1Request(new ContainerMock());
        
        $this->assertSame('apiTest1s', $r->getNameOfParameterToAdd(true));
    }
    
    public function testGetNameOfParameterToAddSingular()
    {
        /** @var EntityRequestInterface $r */
        $r = new \ApiTest1Request(new ContainerMock());
        
        $this->assertSame('apiTest1', $r->getNameOfParameterToAdd());
    }
}
