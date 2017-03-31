<?php
/**
 * Created by PhpStorm.
 * User: steve
 * Date: 30/03/17
 * Time: 15:07
 */

namespace Util;

use Propel\Generator\Util\QuickBuilder;

class SetUp
{

    /**
     * @var QuickBuilder[]
     */
    static $builder = [];
    static $classesBuilt = [];

    /**
     * @param      $xml
     *
     * @param bool $buildClasses
     *
     * @return QuickBuilder
     */
    public static function load($xml, $buildClasses = false)
    {
        static $initDone;
    
        if (!$initDone) {
            $initDone = true;
            require __DIR__ . '/RouteMapMock.php';
            require __DIR__ . '/EntityRequestMock.php';
            require __DIR__ . '/ActionMock.php';
            require __DIR__ . '/ContainerMock.php';
        }
    
        if (!isset(self::$builder[$xml])) {
            $schema              = file_get_contents(__DIR__ . '/' . $xml . '.xml');
            self::$builder[$xml] = new QuickBuilder();
            self::$builder[$xml]->setSchema($schema);
        }
        if ($buildClasses && empty(self::$classesBuilt[$xml])) {
            self::$classesBuilt[$xml] = true;
            self::$builder[$xml]->buildClasses();
        }
    
        return self::$builder[$xml];
    }
}
