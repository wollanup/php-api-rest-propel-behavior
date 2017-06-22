<?php
/**
 * Created by PhpStorm.
 * User: steve
 * Date: 30/03/107
 * Time: 105:05
 */

namespace Propel\Generator\Behavior\Api\Request;

use Eukles\Propel\Generator\Behavior\Api\Request\RequestBuilder;
use PHPUnit\Framework\TestCase;
use Propel\Generator\Util\QuickBuilder;
use Util\SetUp;

class RequestBuilderTest extends TestCase
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
        
        $table          = $this->builder->getDatabase()->getTable("api_test_10");
        $requestBuilder = new RequestBuilder($table);
        $classPath      = $requestBuilder->getClassFilePath();
        $this->assertEquals("ApiTest10Request.php", $classPath);
        
        $table          = $this->builder->getDatabase()->getTable("api_test_11");
        $requestBuilder = new RequestBuilder($table);
        $classPath      = $requestBuilder->getClassFilePath();
        $this->assertEquals("prefix/Package/ApiTest11Request.php", $classPath);
    }
    
    /**
     *
     */
    public function testGetDeclaredClasses()
    {
        $table          = $this->builder->getDatabase()->getTable("api_test_10");
        $requestBuilder = new RequestBuilder($table);
    
        $expect = [
            'Map'                         => ['ApiTest10TableMap' => 'ApiTest10TableMap',],
            'Base'                        => ['ApiTest10Request' => 'BaseApiTest10Request',],
            ''                            => ["ApiTest10" => "ApiTest10"],
            'Propel\Runtime\ActiveRecord' => ["ActiveRecordInterface" => "ActiveRecordInterface"],
            'Propel\Runtime\ActiveQuery'  => ["ModelCriteria" => "ModelCriteria"],
        ];
    
        $this->assertEquals($expect, $requestBuilder->getDeclaredClasses());
        
        $table          = $this->builder->getDatabase()->getTable("api_test_11");
        $requestBuilder = new RequestBuilder($table);
        
        $expect = [
            'Prefix\\Package\\Map'        => ['ApiTest11TableMap' => 'ApiTest11TableMap',],
            'Prefix\\Package\\Base'       => ['ApiTest11Request' => 'BaseApiTest11Request',],
            'Prefix\\Package'             => ['ApiTest11' => 'ApiTest11',],
            'Propel\Runtime\ActiveRecord' => ["ActiveRecordInterface" => "ActiveRecordInterface"],
            'Propel\Runtime\ActiveQuery'  => ["ModelCriteria" => "ModelCriteria"],

        ];
        $this->assertEquals($expect, $requestBuilder->getDeclaredClasses());
    }
    
    public function testGetNamespace()
    {
        $table          = $this->builder->getDatabase()->getTable("api_test_10");
        $requestBuilder = new RequestBuilder($table);
        $this->assertEquals("", $requestBuilder->getNamespace());
        
        $table          = $this->builder->getDatabase()->getTable("api_test_11");
        $requestBuilder = new RequestBuilder($table);
        $this->assertEquals("Prefix\\Package", $requestBuilder->getNamespace());
    }
    
    public function testGetUnprefixedClassName()
    {
        $table          = $this->builder->getDatabase()->getTable("api_test_10");
        $requestBuilder = new RequestBuilder($table);
        $this->assertEquals("ApiTest10Request", $requestBuilder->getUnprefixedClassName());
        
        $table          = $this->builder->getDatabase()->getTable("api_test_11");
        $requestBuilder = new RequestBuilder($table);
        $this->assertEquals("ApiTest11Request", $requestBuilder->getUnprefixedClassName());
    }
}
