<?php

namespace FluidAdapter\SymfonyFluidBundle\ViewHelpers\Form;

use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractTagBasedViewHelper;

/**
 * Abstract Form View Helper. Bundles functionality related to direct property access of objects in other Form ViewHelpers.
 *
 * If you set the "property" attribute to the name of the property to resolve from the object, this class will
 * automatically set the name and value of a form element.
 *
 */
abstract class AbstractFormFieldViewHelper extends AbstractTagBasedViewHelper
{

    /**
     * Initialize arguments.
     *
     * @return void
     * @api
     */
    public function initializeArguments()
    {
        parent::initializeArguments();
        $this->registerArgument('name', 'string', 'Name of input tag');
        $this->registerArgument('value', 'mixed', 'Value of input tag');
    }

    /**
     * Renders a hidden field with the same name as the element, to make sure the empty value is submitted
     * in case nothing is selected. This is needed for checkbox and multiple select fields
     *
     * @return string the hidden field.
     */
    protected function renderHiddenFieldForEmptyValue()
    {
        return sprintf(
            '<input type="hidden" name="%s" value="" />',
            $this->arguments['name']
        );
    }
}
