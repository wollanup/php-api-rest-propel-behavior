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

class RequestBaseBuilder extends AbstractOMBuilder
{

    /**
     * RequestBaseBuilder constructor.
     *
     * @param Table $table
     */
    public function __construct(Table $table)
    {
        parent::__construct($table);
        $this->setGeneratorConfig($this->getTable()->getGeneratorConfig());
    }

    /**
     * @return string
     */
    public function getNamespace()
    {
        $ns = $this->getTable()->getNamespace();

        return $ns . ($ns ? '\\' : '') . 'Base';
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

    public function renderTemplate($filename, $vars = [], $templateDir = '/templates/')
    {
        $filePath = __DIR__ . '/templates/' . $filename . '.template';
        $template = new PropelTemplate();
        $template->setTemplateFile($filePath);
        $vars = array_merge($vars, ['behavior' => $this]);

        return $template->render($vars);
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
        $script .= $this->renderTemplate('classBody',
            [
                'object' => $this->getObjectName(),
            ]);
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
use Eukles\\Entity\\EntityRequestAbstract;
use " . $this->getStubObjectBuilder()->getClassName() . " as " . $this->getStubObjectBuilder()->getObjectName() . "Record;
use " . $this->getStubObjectBuilder()->getClassName() . "Action as Action;
use " . $this->getTableMapClassName(true) . " as Map;
use Propel\\Runtime\\Map\\RelationMap;


/**
 * List properties we read from client and those we send back to it.
 *
 * This base class should not be modified as it's overwritten at build time.
 */
abstract class " . $this->getUnprefixedClassName() . " extends EntityRequestAbstract
{
    
";
    }
}
