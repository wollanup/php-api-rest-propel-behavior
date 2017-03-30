<?php
/**
 * Created by PhpStorm.
 * User: steve
 * Date: 23/03/17
 * Time: 18:05
 */

namespace Propel\Generator\Behavior\Api;

use Eukles\Action\ActionAbstract;
use Eukles\Action\ActionCustom;
use Eukles\Action\ActionInterface;
use Eukles\Entity\EntityRequestInterface;
use Eukles\RouteMap\RouteMapInterface;
use PHPUnit\Framework\TestCase;
use Propel\Generator\Util\QuickBuilder;
use Propel\Runtime\Collection\ObjectCollection;

/**
 * Class ApiTest
 *
 * @package Propel\Generator\Behavior\Api
 */
class ApiTest extends TestCase
{

    /**
     * @var
     */
    protected static $generatedSQL;

    /**
     *
     */
    public function setUp()
    {
        if (!class_exists('\Eukles\RouteMap\RouteMapAbstract')) {
            require __DIR__ . '/../../../../util/routeMap.php';
        }
        if (!class_exists('\Eukles\Entity\EntityRequestAbstract')) {
            require __DIR__ . '/../../../../util/entityRequest.php';
        }
        if (!class_exists('\Eukles\Action\ActionAbstract')) {
            require __DIR__ . '/../../../../util/action.php';
        }
        if (!class_exists('\Eukles\Action\ActionCustom')) {
            require __DIR__ . '/../../../../util/actionCustom.php';
        }

        if (!class_exists('\ApiTest1')) {
            $schema  = <<<EOF
<database name="api_behavior_test_0">
    <table name="api_test_1">
        <column name="id" required="true" primaryKey="true" autoIncrement="true" type="INTEGER" />
        <behavior name="api" />
    </table>
    
    <table name="api_test_2">
        <column name="id" required="true" primaryKey="true" autoIncrement="true" type="INTEGER" />
        <column name="api_test_1_id" required="true" type="INTEGER" />
        <foreign-key foreignTable="api_test_1">
			<reference local="api_test_1_id" foreign="id"/>
		</foreign-key>
        <behavior name="api" />
    </table>
    
    <table name="api_test_3">
        <column name="id" required="true" primaryKey="true" autoIncrement="true" type="INTEGER" />
        <foreign-key foreignTable="api_test_1">
			<reference local="id" foreign="id"/>
		</foreign-key>
        <behavior name="api" />
    </table>
    
    <table name="api_test_4" namespace="Prefix\Package">
        <column name="id" required="true" primaryKey="true" autoIncrement="true" type="INTEGER" />
        <behavior name="api">
            <parameter name="auto_add_routes_prefix" value="true" />
        </behavior>
    </table>
    
    <table name="api_test_5" namespace="Core\Package">
        <column name="id" required="true" primaryKey="true" autoIncrement="true" type="INTEGER" />
        <behavior name="api">
            <parameter name="auto_add_routes_prefix" value="true" />
        </behavior>
    </table>
    
    <table name="api_test_6">
        <column name="id" required="true" primaryKey="true" autoIncrement="true" type="INTEGER" />
        <behavior name="api">
            <parameter name="action_parent_class" value="\Eukles\Action\ActionCustom" />
        </behavior>
    </table>

</database>
EOF;
            $builder = new QuickBuilder();
            $builder->setSchema($schema);
            self::$generatedSQL = $builder->getSQL();
            $builder->build();
        }
    }

    /**
     *
     */
    public function testAction()
    {
        $r = $this->createMock('\\ApiTest1Action');
        $this->assertInstanceOf(ActionInterface::class, $r);
        $this->assertInstanceOf(ActionAbstract::class, $r);
        $this->assertInstanceOf('Base\\ApiTest1Action', $r);
    }

    public function testActionCustom()
    {
        $r = $this->createMock('\\ApiTest6Action');
        $this->assertInstanceOf(ActionInterface::class, $r);
        $this->assertInstanceOf(ActionCustom::class, $r);
        $this->assertInstanceOf('Base\\ApiTest6Action', $r);
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
