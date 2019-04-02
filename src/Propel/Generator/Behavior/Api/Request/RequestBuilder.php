<?php
/**
 * Created by PhpStorm.
 * User: steve
 * Date: 18/10/16
 * Time: 14:09
 */

namespace Eukles\Propel\Generator\Behavior\Api\Request;

use Propel\Generator\Builder\Om\AbstractOMBuilder;
use Propel\Generator\Builder\Util\PropelTemplate;
use Propel\Generator\Model\Table;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveRecord\ActiveRecordInterface;

class RequestBuilder extends AbstractOMBuilder
{

    /**
     * @var bool
     */
    public $overwrite = false;
    protected $entityClassName;
    protected $mapClassName;
    protected $parentClassName;

    /**
     * RequestBuilder constructor.
     *
     * @param Table $table
     */
    public function __construct(Table $table)
    {
        parent::__construct($table);
        $this->setGeneratorConfig($this->getTable()->getGeneratorConfig());

        $this->mapClassName    = $this->declareClass($this->getTableMapClassName(true));
        $this->parentClassName = $this->declareClass(($this->getNamespace() ? ($this->getNamespace() . "\\") : '') . 'Base\\' . $this->getUnprefixedClassName());
        $this->entityClassName = $this->declareClass($this->getStubObjectBuilder()->getClassName());
        $this->declareClass(ActiveRecordInterface::class);
        $this->declareClass(ModelCriteria::class);
    }

    public function getNamespace()
    {

        return $this->getTable()->getNamespace();
    }

    /**
     * Returns the qualified (prefixed) classname that is being built by the current class.
     * This method must be implemented by child classes.
     *
     * @return string
     */
    public function getUnprefixedClassName()
    {
        return $this->getStubObjectBuilder()->getUnprefixedClassName() . 'Request';
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
 * List properties we read from client and those we send back to it.
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 */
class {$this->getUnprefixedClassName()} extends {$this->parentClassName}
{
";
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

}
