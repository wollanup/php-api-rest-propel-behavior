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

    const PARAM_action_class = 'action_class';
    const PARAM_entity_request_class = 'entity_request_class';
    const PARAM_route_map_class = 'route_map_class';
    const PARAM_ROUTES_PREFIX = 'auto_add_routes_prefix';
    const PARAM_SKIP_CLASSES = 'skip_classes';
    /**
     * @var array Parameters
     */
    protected $parameters = [
        self::PARAM_action_class         => 'Eukles\\Action\\ActionAbstract',
        self::PARAM_entity_request_class => 'Eukles\\Entity\\EntityRequestAbstract',
        self::PARAM_route_map_class      => 'Eukles\\RouteMap\\RouteMapAbstract',
        self::PARAM_ROUTES_PREFIX        => '',
        self::PARAM_SKIP_CLASSES         => false,
    ];
    /**
     * @var ObjectBuilder
     */
    private $builder;

    public function modifyDatabase()
    {
        foreach ($this->getDatabase()->getTables() as $table) {
            if ($table->hasBehavior($this->getId())) {
                // don't add the same behavior twice
                continue;
            }

            if (strpos($table->getName(), "_i18n")) {
                continue;
            }

            $b = clone $this;
            $table->addBehavior($b);
        }
    }

    public function hasAdditionalBuilders()
    {
        return $this->getParameter(self::PARAM_SKIP_CLASSES) !== "true";
    }

    public function getAdditionalBuilders()
    {
        $builders = [];
        if ($this->getParameter(self::PARAM_SKIP_CLASSES) === "true") {
            return [];
        }
        if ($this->getParameter(self::PARAM_action_class) !== "false") {
            $builders[] = 'Eukles\\Propel\\Generator\\Behavior\\Api\\Action\\ActionBaseBuilder';
            $builders[] = 'Eukles\\Propel\\Generator\\Behavior\\Api\\Action\\ActionBuilder';
        }
        if ($this->getParameter(self::PARAM_entity_request_class) !== "false") {
            $builders[] = 'Eukles\\Propel\\Generator\\Behavior\\Api\\Request\\RequestBaseBuilder';
            $builders[] = 'Eukles\\Propel\\Generator\\Behavior\\Api\\Request\\RequestBuilder';
        }
        if ($this->getParameter(self::PARAM_route_map_class) !== "false") {
            $builders[] = 'Eukles\\Propel\\Generator\\Behavior\\Api\\RouteMap\\RouteMapBuilder';
        }

        return $builders;
    }

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
