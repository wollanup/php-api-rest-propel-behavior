<?php
/**
 * Created by PhpStorm.
 * User: steve
 * Date: 23/03/17
 * Time: 18:05
 */

namespace Propel\Generator\Behavior\Api;

use Eukles\Entity\EntityRequestInterface;
use Eukles\RouteMap\RouteMapInterface;
use PHPUnit\Framework\TestCase;
use Propel\Generator\Util\QuickBuilder;
use Propel\Runtime\Collection\ObjectCollection;
use Util\SetUp;

/**
 * Class ApiTest
 *
 * @package Propel\Generator\Behavior\Api
 */
class ApiTest extends TestCase
{

    /**
     * @var QuickBuilder
     */
    protected $builder;

    /**
     *
     */
    public function setUp()
    {
        $this->builder = SetUp::load('schema-full', true);
    }

    /**
     *
     */
    public function testCorePrefix()
    {
        $r = $this->createMock('Core\\Package\\ApiTest5RouteMap');
        $this->assertInstanceOf(RouteMapInterface::class, $r);
    }
    
    /**
     *
     */
    public function testCreatesApi1()
    {
        $this->assertTrue(class_exists('\Base\ApiTest1Request'));
        $this->assertTrue(class_exists('ApiTest1Action'));
        $this->assertTrue(class_exists('ApiTest1RouteMap'));
    }

    /**
     *
     */
    public function testCreatesApi2()
    {
        $this->assertTrue(class_exists('\Base\ApiTest2Request'));
        $this->assertTrue(class_exists('ApiTest2Action'));
        $this->assertTrue(class_exists('ApiTest2RouteMap'));
    }

    /**
     *
     */
    public function testCreatesApi3()
    {
        $this->assertTrue(class_exists('\Base\ApiTest3Request'));
        $this->assertTrue(class_exists('ApiTest3Action'));
        $this->assertTrue(class_exists('ApiTest3RouteMap'));
    }
    
    public function testCreatesApi4()
    {
        $this->assertTrue(class_exists('Prefix\Package\Base\ApiTest4Request'));
        $this->assertTrue(class_exists('Prefix\Package\ApiTest4Action'));
        $this->assertTrue(class_exists('Prefix\Package\ApiTest4RouteMap'));
    }

    /**
     *
     */
    public function testExportedRelations()
    {
        $test1 = new \ApiTest1;
        $test2 = new \ApiTest2;

        # Test with empty relation
        $this->assertEmpty($test1->exportPopulatedRelations());
        $this->assertEmpty($test2->exportPopulatedRelations());

        # Set data
        $test2->setApiTest1($test1);

        # Test with populated relation
        $this->assertArrayHasKey('ApiTest1', $test2->exportPopulatedRelations());
        $this->assertEquals($test1, $test2->exportPopulatedRelations()['ApiTest1']);

        # Inverse relation
        $this->assertArrayHasKey('ApiTest2s', $test1->exportPopulatedRelations());
        $this->assertInstanceOf(ObjectCollection::class, $test1->exportPopulatedRelations()['ApiTest2s']);
        $this->assertEquals($test2, $test1->exportPopulatedRelations()['ApiTest2s']->getFirst());
    }

    /**
     *
     */
    public function testMethodExportPopulatedRelationsExists()
    {
        $test1 = new \ApiTest1;
        $test2 = new \ApiTest2;

        # Test with empty relation
        $this->assertTrue(method_exists($test1, 'exportPopulatedRelations'));
        $this->assertTrue(method_exists($test2, 'exportPopulatedRelations'));
    }
    
    /**
     *
     */
    public function testPrefix()
    {
        $r = $this->createMock('Prefix\\Package\\ApiTest4RouteMap');
        $this->assertInstanceOf(RouteMapInterface::class, $r);
    }

    /**
     *
     */
    public function testRequestInterface()
    {
        $r = $this->createMock('\\ApiTest1Request');
        $this->assertInstanceOf(EntityRequestInterface::class, $r);
    }

    /**
     *
     */
    public function testRouteMapInterface()
    {
        $r = $this->createMock('\\ApiTest1RouteMap');
        $this->assertInstanceOf(RouteMapInterface::class, $r);
    }
}
