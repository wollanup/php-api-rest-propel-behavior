<?php
/**
 * Created by PhpStorm.
 * User: steve
 * Date: 18/10/16
 * Time: 14:09
 */

namespace Eukles\Propel\Generator\Behavior\Api\Action;

use Eukles\Propel\Generator\Behavior\Api\Api;
use Propel\Generator\Builder\Om\AbstractOMBuilder;
use Propel\Generator\Model\Table;

class ActionBaseBuilder extends AbstractOMBuilder
{

    /**
     * @var bool
     */
    public $overwrite = true;

    /**
     * ActionBuilder constructor.
     *
     * @param Table $table
     */
    public function __construct(Table $table)
    {
        parent::__construct($table);
        $this->setGeneratorConfig($this->getTable()->getGeneratorConfig());
    }

    public function getNamespace()
    {
        $ns = $this->getTable()->getNamespace();

        return $ns . ($ns ? '\\' : '') . 'Base';
    }

    /**
     * Returns the qualified (prefixed) class name that is being built by the current class.
     * This method must be implemented by child classes.
     *
     * @return string
     */
    public function getUnprefixedClassName()
    {
        return $this->getStubObjectBuilder()->getUnprefixedClassName() . 'Action';
    }
    
    /**
     * This method adds the contents of the generated class to the script.
     *
     * This method is and should be overridden by the subclasses.
     *
     * Hint: Override this method in your subclass if you want to reorganize or
     * drastically change the contents of the generated object class.
     *
     * @param string &$script The script will be modified in this method.
     */
    protected function addClassBody(&$script)
    {
        $queryClass = $this->getStubObjectBuilder()->getObjectClassName() . "Query";
        $className  = $this->getUnprefixedClassName();
        $script .= "
    /**
     * @param ContainerInterface \$c
     *
     * @return {$className}
     */
    public static function create(ContainerInterface \$c)
    {
        return new {$className}(\$c);
    }

    /**
     * Returns a new Query object.
     * @param QueryModifierInterface \$qm Optional modifier to build the query with
     *
     * @return {$queryClass} Query object
     */
    public function createQuery(QueryModifierInterface \$qm = null)
	{
        if(\$qm){
			return \$qm->apply({$queryClass}::create());
		}
	
		return {$queryClass}::create();
	}        
";
    }
    
    /**
     * Closes class.
     *
     * @param string &$script
     */
    protected function addClassClose(&$script)
    {
    
        $script .= "
}";
    }
    
    /**
     * Opens class.
     *
     * @param string &$script
     */
    protected function addClassOpen(&$script)
    {
        $actionParentClass = $this->getParameterFromApiBehavior(Api::PARAM_ACTION_PARENT_CLASS);
        $shortParent       = substr(strrchr($actionParentClass, '\\'), 1);
    
        $script .= "use " . $actionParentClass . ";
use Eukles\\Service\\QueryModifier\\QueryModifierInterface;
use Psr\\Container\\ContainerInterface;
        
/**
 * Action class.
 *
 * This base class should not be modified as it's overwritten at build time.
 */
abstract class {$this->getUnprefixedClassName()} extends {$shortParent}   
{
";
    }
    
    private function getParameterFromApiBehavior($parameter)
    {
        return $this->getTable()->getBehavior('api')->getParameter($parameter);
    }
}
