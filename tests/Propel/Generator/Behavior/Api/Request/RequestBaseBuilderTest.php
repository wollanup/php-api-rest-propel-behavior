<?php
/**
 * Created by PhpStorm.
 * User: steve
 * Date: 30/03/17
 * Time: 15:05
 */

namespace Propel\Generator\Behavior\Api\Request;

use Eukles\Propel\Generator\Behavior\Api\Request\RequestBaseBuilder;
use PHPUnit\Framework\TestCase;
use Propel\Generator\Util\QuickBuilder;
use Util\SetUp;

class RequestBaseBuilderTest extends TestCase
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
        
        $table              = $this->builder->getDatabase()->getTable("api_test_10");
        $requestBaseBuilder = new RequestBaseBuilder($table);
        $classPath          = $requestBaseBuilder->getClassFilePath();
        $this->assertEquals("/Base/ApiTest10Request.php", $classPath);
        
        $table              = $this->builder->getDatabase()->getTable("api_test_11");
        $requestBaseBuilder = new RequestBaseBuilder($table);
        $classPath          = $requestBaseBuilder->getClassFilePath();
        $this->assertEquals("prefix/Package/Base/ApiTest11Request.php", $classPath);
    }
    
    public function testGetDeclaredClasses()
    {
        
        $table              = $this->builder->getDatabase()->getTable("api_test_10");
        $requestBaseBuilder = new RequestBaseBuilder($table);
        $expect             = [
            'Eukles\\Entity'       => ['EntityRequestMock' => 'EntityRequestMock',],
            'Propel\\Runtime\\Map' => ['RelationMap' => 'RelationMap',],
            'Map'                  => ['ApiTest10TableMap' => 'ApiTest10TableMap',],
            ''                     => [
                'ApiTest10'       => 'ChildApiTest10',
                'ApiTest10Action' => 'ChildApiTest10Action',
            ],
        ];
        $this->assertEquals($expect, $requestBaseBuilder->getDeclaredClasses());
        
        $table              = $this->builder->getDatabase()->getTable("api_test_11");
        $requestBaseBuilder = new RequestBaseBuilder($table);
        $expect             = [
            'Eukles\\Entity'       => ['EntityRequestMock' => 'EntityRequestMock',],
            'Propel\\Runtime\\Map' => ['RelationMap' => 'RelationMap',],
            'Prefix\\Package\\Map' => ['ApiTest11TableMap' => 'ApiTest11TableMap',],
            'Prefix\\Package'      => [
                'ApiTest11'       => 'ChildApiTest11',
                'ApiTest11Action' => 'ChildApiTest11Action',
            ],
        ];
        $this->assertEquals($expect, $requestBaseBuilder->getDeclaredClasses());
    }
    
    public function testGetNamespace()
    {
        $table              = $this->builder->getDatabase()->getTable("api_test_10");
        $requestBaseBuilder = new RequestBaseBuilder($table);
        $this->assertEquals("Base", $requestBaseBuilder->getNamespace());
        
        $table              = $this->builder->getDatabase()->getTable("api_test_11");
        $requestBaseBuilder = new RequestBaseBuilder($table);
        $this->assertEquals("Prefix\\Package\\Base", $requestBaseBuilder->getNamespace());
    }
    
    public function testGetUnprefixedClassName()
    {
        $table              = $this->builder->getDatabase()->getTable("api_test_10");
        $requestBaseBuilder = new RequestBaseBuilder($table);
        $this->assertEquals("ApiTest10Request", $requestBaseBuilder->getUnprefixedClassName());
        
        $table              = $this->builder->getDatabase()->getTable("api_test_11");
        $requestBaseBuilder = new RequestBaseBuilder($table);
        $this->assertEquals("ApiTest11Request", $requestBaseBuilder->getUnprefixedClassName());
    }
}
