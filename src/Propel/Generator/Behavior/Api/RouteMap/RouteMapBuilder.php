<?php
/**
 * Created by PhpStorm.
 * User: steve
 * Date: 18/10/16
 * Time: 14:09
 */

namespace Eukles\Propel\Generator\Behavior\Api\RouteMap;

use Eukles\Propel\Generator\Behavior\Api\Api;
use Propel\Generator\Builder\Om\AbstractOMBuilder;
use Propel\Generator\Model\Table;

class RouteMapBuilder extends AbstractOMBuilder
{

    /**
     * @var bool
     */
    public $overwrite = false;
    public $resource;
    protected $actionClassName;
    protected $requestClassName;

    /**
     * RouteMapBuilder constructor.
     *
     * @param Table $table
     */
    public function __construct(Table $table)
    {
        parent::__construct($table);
        $this->setGeneratorConfig($this->getTable()->getGeneratorConfig());
        $this->declareClass("Eukles\\RouteMap\\RouteMapAbstract");
        $this->actionClassName  = $this->declareClass($this->getStubObjectBuilder()->getClassName() . "Action");
        $this->requestClassName = $this->declareClass($this->getStubObjectBuilder()->getClassName() . "Request");
    }

    /**
     * @return mixed
     */
    public function getPackageName()
    {
        $p = explode('.', $this->getPackage());

        return lcfirst(array_pop($p));
    }

    public function getResourceName()
    {
        return lcfirst($this->getStubObjectBuilder()->getUnprefixedClassName());
    }

    public function getUnprefixedClassName()
    {
        return $this->getStubObjectBuilder()->getUnprefixedClassName() . 'RouteMap';
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
        $prefix = '';
        if ($this->getParameterFromApiBehavior(Api::PARAM_ROUTES_PREFIX) === "true") {
            $ns = explode('\\', $this->getNamespace());
            array_pop($ns);
            $prefix = array_pop($ns);
            if ($prefix === 'Core') {
                $prefix = '';
            } else {
                $prefix = lcfirst($prefix);
            }
        }
    
        $script .= "        
/**
 * RouteMap class
 *
 */
class " . $this->getUnprefixedClassName() . " extends RouteMapAbstract   
{
    /**
     * @var string|{$this->actionClassName}
     */
    protected \$actionClass = {$this->actionClassName}::class;

    /**
     * @var string|{$this->requestClassName}
     */
    protected \$requestClass = {$this->requestClassName}::class;
    /**
     * @var string
     */
    protected \$resourceName = '" . $this->getResourceName() . "';
    /**
     * @var string
     */
    protected \$packageName = '" . $this->getPackageName() . "';
    /**
     * @var string
     */
    protected \$routesPrefix = '" . $prefix . "';


     /**
      * @inheritdoc
      */
     protected function initialize()
     {
         // TODO : Add your routes here 
     }
";
    }

    private function getParameterFromApiBehavior($parameter)
    {
        return $this->getTable()->getBehavior('api')->getParameter($parameter);
    }
}
