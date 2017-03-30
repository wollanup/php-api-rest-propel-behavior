<?php
/**
 * Created by PhpStorm.
 * User: steve
 * Date: 20/09/16
 * Time: 09:46
 */

namespace Eukles\Propel\Generator\Behavior\Api;

use Propel\Generator\Builder\Om\ObjectBuilder;
use Propel\Generator\Model\Behavior;
use Propel\Generator\Model\Table;

class Api extends Behavior
{

    const PARAM_ACTION_PARENT_CLASS = 'action_parent_class';
    const PARAM_ROUTES_PREFIX = 'auto_add_routes_prefix';
    /**
     * @var array
     */
    protected $additionalBuilders = [
        'Eukles\\Propel\\Generator\\Behavior\\Api\\Request\\RequestBaseBuilder',
        'Eukles\\Propel\\Generator\\Behavior\\Api\\Request\\RequestBuilder',
        'Eukles\\Propel\\Generator\\Behavior\\Api\\Action\\ActionBaseBuilder',
        'Eukles\\Propel\\Generator\\Behavior\\Api\\Action\\ActionBuilder',
        'Eukles\\Propel\\Generator\\Behavior\\Api\\RouteMap\\RouteMapBuilder',
    ];
    /**
     * @var array Parameters
     */
    protected $parameters = [
        self::PARAM_ACTION_PARENT_CLASS => 'Eukles\\Action\\ActionAbstract',
        self::PARAM_ROUTES_PREFIX       => '',
    ];
    /**
     * @var ObjectBuilder
     */
    private $builder;
    
    /**
     * @param ObjectBuilder $builder
     *
     * @return string
     */
    public function objectMethods(ObjectBuilder $builder)
    {
        $this->builder = $builder;
        $fks           = $this->getTable()->getForeignKeys();
        $referrers     = $this->getTable()->getReferrers();
        $hasFks        = count($fks) > 0 || count($referrers) > 0;
        $script        = "";

        $script .= "
/**
 * Returns array of relations which have been previously populated (performs NO query)
 * @return array 
 */
public function exportPopulatedRelations()
{
    \$r = [];
";
        if ($hasFks) {
            foreach ($fks as $fk) {
    
                $script .= "
    if(null !== \$this->{$builder->getFKVarName($fk)}){
        \$r['{$this->getRelationName($fk->getPhpName(), $fk->getForeignTable(), false)}'] = \$this->{$builder->getFKVarName($fk)};
    }
";
            }
            foreach ($referrers as $fk) {
                if ($fk->isLocalPrimaryKey()) {
                    $script .= "
    if(null !== \$this->{$builder->getPKRefFKVarName($fk)}){
        \$r['{$this->getRelationName($fk->getRefPhpName(), $fk->getTable(), false)}'] = \$this->{$builder->getPKRefFKVarName($fk)};
    }
";
                } else {
                    $script .= "
    if(null !== \$this->{$builder->getRefFKCollVarName($fk)}){
        \$r['{$this->getRelationName($fk->getRefPhpName(), $fk->getTable(), true)}'] = \$this->{$builder->getRefFKCollVarName($fk)};
    }
";
                }
            }
        }
        $script .= "
    return \$r;
}
";
    
        return $script;
    }
    
    /**
     * @param       $phpName
     * @param Table $table
     * @param       $plural
     *
     * @return string
     */
    protected function getRelationName($phpName, Table $table, $plural)
    {
        if ($phpName == "") {
            $phpName = $table->getPhpName();
        }
    
        if ($plural) {
            $phpName = $this->builder->getPluralizer()->getPluralForm($phpName);
        }
    
        return $phpName;
    }
}
