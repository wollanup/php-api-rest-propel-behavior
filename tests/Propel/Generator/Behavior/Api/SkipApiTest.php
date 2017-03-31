<?php
/**
 * Created by PhpStorm.
 * User: steve
 * Date: 23/03/17
 * Time: 18:05
 */

namespace Propel\Generator\Behavior\Api;

use PHPUnit\Framework\TestCase;
use Propel\Generator\Util\QuickBuilder;
use Util\SetUp;

/**
 * Class ApiTest
 *
 * @package Propel\Generator\Behavior\Api
 */
class SkipApiTest extends TestCase
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
        $this->builder = SetUp::load('schema-skip', true);
    }
    
    /**
     *
     */
    public function testSkip()
    {
        $this->assertTrue(class_exists('ApiTest20Action'));
        $this->assertFalse(class_exists('ApiTest21Action'));
    }
}
