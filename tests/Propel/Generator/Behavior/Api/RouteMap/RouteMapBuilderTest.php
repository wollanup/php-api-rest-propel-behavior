<?php
/**
 * Created by PhpStorm.
 * User: steve
 * Date: 30/03/107
 * Time: 105:05
 */

namespace Propel\Generator\Behavior\Api\RouteMap;

use Eukles\Propel\Generator\Behavior\Api\RouteMap\RouteMapBuilder;
use PHPUnit\Framework\TestCase;
use Propel\Generator\Util\QuickBuilder;
use Util\SetUp;

class RouteMapBuilderTest extends TestCase
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
        
        $table           = $this->builder->getDatabase()->getTable("api_test_10");
        $routeMapBuilder = new RouteMapBuilder($table);
        $classPath       = $routeMapBuilder->getClassFilePath();
        $this->assertEquals("ApiTest10RouteMap.php", $classPath);
        
        $table           = $this->builder->getDatabase()->getTable("api_test_11");
        $routeMapBuilder = new RouteMapBuilder($table);
        $classPath       = $routeMapBuilder->getClassFilePath();
        $this->assertEquals("prefix/Package/ApiTest11RouteMap.php", $classPath);
    }
    
    /**
     *
     */
    public function testGetDeclaredClasses()
    {
        $table           = $this->builder->getDatabase()->getTable("api_test_10");
        $routeMapBuilder = new RouteMapBuilder($table);
        $expect          = [
            'Eukles\\RouteMap' => ['RouteMapAbstract' => 'RouteMapAbstract',],
            ''                 => [
                'ApiTest10Action'  => 'ApiTest10Action',
                'ApiTest10Request' => 'ApiTest10Request',
            ],
        ];
        $this->assertEquals($expect, $routeMapBuilder->getDeclaredClasses());
        
        $table           = $this->builder->getDatabase()->getTable("api_test_11");
        $routeMapBuilder = new RouteMapBuilder($table);
        $expect          = [
            'Eukles\\RouteMap' => ['RouteMapAbstract' => 'RouteMapAbstract',],
            'Prefix\\Package'  => [
                'ApiTest11Action'  => 'ApiTest11Action',
                'ApiTest11Request' => 'ApiTest11Request',
            ],
        ];
        $this->assertEquals($expect, $routeMapBuilder->getDeclaredClasses());
    }
    
    public function testGetNamespace()
    {
        $table           = $this->builder->getDatabase()->getTable("api_test_10");
        $routeMapBuilder = new RouteMapBuilder($table);
        $this->assertEquals("", $routeMapBuilder->getNamespace());
        
        $table           = $this->builder->getDatabase()->getTable("api_test_11");
        $routeMapBuilder = new RouteMapBuilder($table);
        $this->assertEquals("Prefix\\Package", $routeMapBuilder->getNamespace());
    }
    
    public function testGetPackageName()
    {
        $table           = $this->builder->getDatabase()->getTable("api_test_10");
        $routeMapBuilder = new RouteMapBuilder($table);
        $this->assertEquals("apiTest10", $routeMapBuilder->getResourceName());
        
        $table           = $this->builder->getDatabase()->getTable("api_test_11");
        $routeMapBuilder = new RouteMapBuilder($table);
        $this->assertEquals("apiTest11", $routeMapBuilder->getResourceName());
    }
    
    public function testGetResourceName()
    {
        $table           = $this->builder->getDatabase()->getTable("api_test_10");
        $routeMapBuilder = new RouteMapBuilder($table);
        $this->assertEquals("apiTest10", $routeMapBuilder->getResourceName());
        
        $table           = $this->builder->getDatabase()->getTable("api_test_11");
        $routeMapBuilder = new RouteMapBuilder($table);
        $this->assertEquals("apiTest11", $routeMapBuilder->getResourceName());
    }
    
    public function testGetUnprefixedClassName()
    {
        $table           = $this->builder->getDatabase()->getTable("api_test_10");
        $routeMapBuilder = new RouteMapBuilder($table);
        $this->assertEquals("ApiTest10RouteMap", $routeMapBuilder->getUnprefixedClassName());
        
        $table           = $this->builder->getDatabase()->getTable("api_test_11");
        $routeMapBuilder = new RouteMapBuilder($table);
        $this->assertEquals("ApiTest11RouteMap", $routeMapBuilder->getUnprefixedClassName());
    }
}
