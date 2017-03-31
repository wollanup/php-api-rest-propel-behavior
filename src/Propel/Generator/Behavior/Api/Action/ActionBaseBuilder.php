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
use Propel\Generator\Builder\Om\ClassTools;
use Propel\Generator\Model\Table;

class ActionBaseBuilder extends AbstractOMBuilder
{

    /**
     * @var bool
     */
    public $overwrite = true;
    protected $shortActionName;
    protected $shortChildName;
    protected $shortParentName;
    protected $shortQueryName;

    /**
     * ActionBuilder constructor.
     *
     * @param Table $table
     */
    public function __construct(Table $table)
    {
        parent::__construct($table);
        $this->setGeneratorConfig($this->getTable()->getGeneratorConfig());

        $this->declareClass("Psr\\Container\\ContainerInterface");
        $this->declareClass("Eukles\\Service\\QueryModifier\\QueryModifierInterface");
        $this->shortParentName = $this->declareClass($this->getParameterFromApiBehavior(Api::PARAM_ACTION_PARENT_CLASS));
        $shortName             = $this->getTable()->getPhpName();
        $ns                    = $this->getTable()->getNamespace();
        if ($ns) {
            $ns .= "\\";
        }
        $this->shortActionName = $this->declareClass("{$ns}{$shortName}Action");
        $this->shortQueryName  = $this->declareClass("{$ns}{$shortName}Query");

    }
    
    /**
     * @return string
     */
    public function getClassFilePath()
    {
        return ClassTools::createFilePath($this->getPackagePath() . '/Base', $this->getUnqualifiedClassName());
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
        $script .= "
    /**
     * @param ContainerInterface \$c
     *
     * @return {$this->shortActionName}
     */
    public static function create(ContainerInterface \$c)
    {
        return new {$this->shortActionName}(\$c);
    }

    /**
     * Returns a new Query object.
     * @param QueryModifierInterface \$qm Optional modifier to build the query with
     *
     * @return {$this->shortQueryName} Query object
     */
    public function createQuery(QueryModifierInterface \$qm = null)
	{
        if(\$qm){
			return \$qm->apply({$this->shortQueryName}::create());
		}
	
		return {$this->shortQueryName}::create();
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
    
        $script .= "
/**
 * Action class.
 *
 * This base class should not be modified as it's overwritten at build time.
 */
abstract class {$this->getUnprefixedClassName()} extends {$this->shortParentName}   
{
";
    }
    
    private function getParameterFromApiBehavior($parameter)
    {
        return $this->getTable()->getBehavior('api')->getParameter($parameter);
    }
}
