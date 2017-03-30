<?php
/**
 * Created by PhpStorm.
 * User: steve
 * Date: 30/03/17
 * Time: 15:07
 */

namespace Util;

class SetUp
{
    
    /**
     * @var Builder[]
     */
    static $builder = [];
    static $classesBuilt = [];
    
    /**
     * @param      $xml
     *
     * @param bool $buildClasses
     *
     * @return Builder
     */
    public static function load($xml, $buildClasses = false)
    {
        static $initDone;
    
        if (!$initDone) {
            $initDone = true;
            require __DIR__ . '/routeMap.php';
            require __DIR__ . '/entityRequest.php';
            require __DIR__ . '/action.php';
            require __DIR__ . '/actionCustom.php';
            require __DIR__ . '/container.php';
        }
    
        if (!isset(self::$builder[$xml])) {
            $schema              = file_get_contents(__DIR__ . '/' . $xml . '.xml');
            self::$builder[$xml] = new Builder();
            self::$builder[$xml]->setSchema($schema);
        }
        if ($buildClasses && empty(self::$classesBuilt[$xml])) {
            self::$classesBuilt[$xml] = true;
            self::$builder[$xml]->buildClasses();
        }
    
        return self::$builder[$xml];
    }
}
