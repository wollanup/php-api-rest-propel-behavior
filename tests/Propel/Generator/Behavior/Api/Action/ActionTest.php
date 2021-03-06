<?php
/**
 * Created by PhpStorm.
 * User: steve
 * Date: 30/03/107
 * Time: 105:05
 */

namespace Propel\Generator\Behavior\Api\Action;

use Eukles\Action\ActionCustomMock;
use Eukles\Action\ActionInterface;
use Eukles\Action\ActionMock;
use Eukles\Action\ActionMockMock;
use Eukles\Container\ContainerMock;
use PHPUnit\Framework\TestCase;
use Propel\Generator\Util\QuickBuilder;
use Util\SetUp;

class ActionTest extends TestCase
{

    /**
     * @var QuickBuilder
     */
    protected $builder;

    public function setUp()
    {
        $this->builder = SetUp::load('schema-full', true);
    }

    /**
     *
     */
    public function testAction()
    {
        $r = $this->createMock('\\ApiTest1Action');
        $this->assertInstanceOf(ActionInterface::class, $r);
        $this->assertInstanceOf(ActionMock::class, $r);
        $this->assertInstanceOf('Base\\ApiTest1Action', $r);
    }
    
    public function testActionCreate()
    {
        /** @var ActionInterface $a */
        $a = \ApiTest1Action::create(new ContainerMock());

        $this->assertInstanceOf(\ApiTest1Action::class, $a);
    }
    
    public function testActionCreateQuery()
    {
        /** @var ActionInterface $a */
        $a     = new \ApiTest1Action(new ContainerMock());
        $query = $a->createQuery();
        $this->assertInstanceOf(\ApiTest1Query::class, $query);
    }
}
