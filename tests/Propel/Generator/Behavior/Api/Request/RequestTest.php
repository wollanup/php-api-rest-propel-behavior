<?php
/**
 * Created by PhpStorm.
 * User: steve
 * Date: 21/04/17
 * Time: 11:41
 */

namespace Propel\Generator\Behavior\Api\Request;

use Eukles\Entity\EntityRequestInterface;
use PHPUnit\Framework\TestCase;
use Propel\Generator\Util\QuickBuilder;
use Slim\Http\Environment;
use Slim\Http\Request;
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
        $e = Environment::mock();
        /** @var EntityRequestInterface $r */
        $r = new \ApiTest1Request(Request::createFromEnvironment($e));

        $this->assertSame('ApiTest1Action', $r->getActionClassName());
    }

    public function testGetNameOfParameterToAddPlural()
    {
        $this->assertSame('apiTest1s', \ApiTest1Request::getNameOfParameterToAdd(true));
    }

    public function testGetNameOfParameterToAddSingular()
    {
        $this->assertSame('apiTest1', \ApiTest1Request::getNameOfParameterToAdd());
    }
}
