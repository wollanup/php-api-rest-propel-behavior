<?php
/**
 * Created by PhpStorm.
 * User: steve
 * Date: 30/03/107
 * Time: 105:05
 */

namespace Propel\Generator\Behavior\Api\Action;

use Eukles\Propel\Generator\Behavior\Api\Action\ActionBuilder;
use PHPUnit\Framework\TestCase;
use Propel\Generator\Util\QuickBuilder;
use Util\SetUp;

class ActionBuilderTest extends TestCase
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
        
        $table         = $this->builder->getDatabase()->getTable("api_test_10");
        $actionBuilder = new ActionBuilder($table);
        $classPath     = $actionBuilder->getClassFilePath();
        $this->assertEquals("ApiTest10Action.php", $classPath);
        
        $table         = $this->builder->getDatabase()->getTable("api_test_11");
        $actionBuilder = new ActionBuilder($table);
        $classPath     = $actionBuilder->getClassFilePath();
        $this->assertEquals("prefix/Package/ApiTest11Action.php", $classPath);
    }
    
    public function testGetDeclaredClasses()
    {
        $table         = $this->builder->getDatabase()->getTable("api_test_10");
        $actionBuilder = new ActionBuilder($table);
        
        $expect = [
            'Psr\\Container'                 => ['ContainerInterface' => 'ContainerInterface',],
            'Eukles\\Service\\QueryModifier' => ['QueryModifierInterface' => 'QueryModifierInterface',],
            'Base'                           => ['ApiTest10Action' => 'BaseApiTest10Action',],
        ];
        $this->assertEquals($expect, $actionBuilder->getDeclaredClasses());
        
        $table         = $this->builder->getDatabase()->getTable("api_test_11");
        $actionBuilder = new ActionBuilder($table);
        
        $expect = [
            'Psr\\Container'                 => ['ContainerInterface' => 'ContainerInterface',],
            'Eukles\\Service\\QueryModifier' => ['QueryModifierInterface' => 'QueryModifierInterface',],
            'Prefix\\Package\\Base'          => ['ApiTest11Action' => 'BaseApiTest11Action',],
        ];
        $this->assertEquals($expect, $actionBuilder->getDeclaredClasses());
    }
    
    public function testGetNamespace()
    {
        $table         = $this->builder->getDatabase()->getTable("api_test_10");
        $actionBuilder = new ActionBuilder($table);
        $this->assertEquals("", $actionBuilder->getNamespace());
        
        $table         = $this->builder->getDatabase()->getTable("api_test_11");
        $actionBuilder = new ActionBuilder($table);
        $this->assertEquals("Prefix\\Package", $actionBuilder->getNamespace());
    }
    
    public function testGetUnprefixedClassName()
    {
        $table         = $this->builder->getDatabase()->getTable("api_test_10");
        $actionBuilder = new ActionBuilder($table);
        $this->assertEquals("ApiTest10Action", $actionBuilder->getUnprefixedClassName());
        
        $table         = $this->builder->getDatabase()->getTable("api_test_11");
        $actionBuilder = new ActionBuilder($table);
        $this->assertEquals("ApiTest11Action", $actionBuilder->getUnprefixedClassName());
    }
}
