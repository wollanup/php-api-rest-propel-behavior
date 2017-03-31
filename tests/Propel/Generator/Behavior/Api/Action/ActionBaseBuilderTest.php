<?php
/**
 * Created by PhpStorm.
 * User: steve
 * Date: 30/03/17
 * Time: 15:05
 */

namespace Propel\Generator\Behavior\Api\Action;

use Eukles\Propel\Generator\Behavior\Api\Action\ActionBaseBuilder;
use PHPUnit\Framework\TestCase;
use Propel\Generator\Util\QuickBuilder;
use Util\SetUp;

class ActionBaseBuilderTest extends TestCase
{

    /**
     * @var QuickBuilder
     */
    protected $builder;

    public function setUp()
    {
        $this->builder = SetUp::load('schema-small');
    }

    public function testGetClassFilePath()
    {
    
        $table             = $this->builder->getDatabase()->getTable("api_test_10");
        $actionBaseBuilder = new ActionBaseBuilder($table);
        $classPath         = $actionBaseBuilder->getClassFilePath();
        $this->assertEquals("/Base/ApiTest10Action.php", $classPath);
    
        $table             = $this->builder->getDatabase()->getTable("api_test_11");
        $actionBaseBuilder = new ActionBaseBuilder($table);
        $classPath         = $actionBaseBuilder->getClassFilePath();
        $this->assertEquals("prefix/Package/Base/ApiTest11Action.php", $classPath);
    }

    public function testGetDeclaredClasses()
    {
    
        $table             = $this->builder->getDatabase()->getTable("api_test_10");
        $actionBaseBuilder = new ActionBaseBuilder($table);
        $expect            = [
            'Psr\\Container'                 => ['ContainerInterface' => 'ContainerInterface',],
            'Eukles\\Service\\QueryModifier' => ['QueryModifierInterface' => 'QueryModifierInterface',],
            'Eukles\\Action'                 => ['ActionMock' => 'ActionMock',],
            ''                               => [
                'ApiTest10Action' => 'ChildApiTest10Action',
                'ApiTest10Query'  => 'ChildApiTest10Query',
            ],
        ];
        $this->assertEquals($expect, $actionBaseBuilder->getDeclaredClasses());
    
        $table             = $this->builder->getDatabase()->getTable("api_test_11");
        $actionBaseBuilder = new ActionBaseBuilder($table);
        $expect            = [
            'Psr\\Container'                 => ['ContainerInterface' => 'ContainerInterface',],
            'Eukles\\Service\\QueryModifier' => ['QueryModifierInterface' => 'QueryModifierInterface',],
            'Eukles\\Action'                 => ['ActionMock' => 'ActionMock',],
            'Prefix\\Package'                => [
                'ApiTest11Action' => 'ChildApiTest11Action',
                'ApiTest11Query'  => 'ChildApiTest11Query',
            ],
        ];
        $this->assertEquals($expect, $actionBaseBuilder->getDeclaredClasses());
    }

    public function testGetNamespace()
    {
        $table             = $this->builder->getDatabase()->getTable("api_test_10");
        $actionBaseBuilder = new ActionBaseBuilder($table);
        $this->assertEquals("Base", $actionBaseBuilder->getNamespace());
    
        $table             = $this->builder->getDatabase()->getTable("api_test_11");
        $actionBaseBuilder = new ActionBaseBuilder($table);
        $this->assertEquals("Prefix\\Package\\Base", $actionBaseBuilder->getNamespace());
    }
    
    public function testGetUnprefixedClassName()
    {
        $table             = $this->builder->getDatabase()->getTable("api_test_10");
        $actionBaseBuilder = new ActionBaseBuilder($table);
        $this->assertEquals("ApiTest10Action", $actionBaseBuilder->getUnprefixedClassName());
    
        $table             = $this->builder->getDatabase()->getTable("api_test_11");
        $actionBaseBuilder = new ActionBaseBuilder($table);
        $this->assertEquals("ApiTest11Action", $actionBaseBuilder->getUnprefixedClassName());
    }
}
