<?php
/**
 * Fgsl Framework
 *
 * LICENSE
 *
 * This source file is subject to the new BSD license that is bundled
 * with this package in the file LICENSE.txt.
 * If you did not receive a copy of the license, you can get it at www.fgsl.eti.br.
 * It depends on Zend_Form and Zend_Form_Element*
 *
 * @category   Fgsl
 * @package    Fgsl_Form
 * @subpackage Fgsl_Form_Edit
 * @copyright  Copyright (c) 2009 Flávio Gomes da Silva Lisboa (http://www.fgsl.eti.br)
 * @license   New BSD License
 * @version    0.0.3
 */

/**
 * Fgsl_Form_Edit
 */
class Fgsl_Form_Edit extends Zend_Form
{	
	
	const ACTION = 'ACTION';
	const MODEL = 'MODEL';
	const DATA = 'DATA';
	
	const INSERT_LABEL = 'insert';
	const EDIT_LABEL = 'edit';
	
	private $_options;
	
	public function __construct($options)
	{
		parent::__construct('edit');
		$this->_options = $options;
		$this->_prepareForm();		
	}

	/**
	 * Builds a form form data 
	 * @return unknown_type
	 */
	private function _prepareForm()
	{		
		!isset($this->_options) ? $this->_options = array() : null; 
		!isset($this->_options[self::DATA]) ? $this->_options[self::DATA] = array() : null;		
		
		$action = $this->_options[self::ACTION];
		$model = $this->_options[self::MODEL];

		$this->setAction($action);
		$this->setMethod('post');

		foreach($this->_options[self::DATA] as $fieldName => $fieldValue)
		{
			if ($model->isLocked($fieldName))
			{
				continue;
			}
			$typeElement = ($model->getTypeElement($fieldName));
			try {
				if ($typeElement == Fgsl_Form_Constants::TEXT)
				{
					$text = new Zend_Form_Element_Text($fieldName);					
				}
				if ($typeElement == Fgsl_Form_Constants::PASSWORD)
				{
					$text = new Zend_Form_Element_Password($fieldName);					
				}				
				if ($typeElement == Fgsl_Form_Constants::SELECT)
				{
					$text = new Zend_Form_Element_Select($fieldName);
					
					$selectOptions = $model->getSelectOptions($fieldName);					
					
					$text->addMultiOptions($selectOptions);
				}
				if ($typeElement == Fgsl_Form_Constants::CHECKBOX)
				{
					$text = new Zend_Form_Element_Checkbox($fieldName);		
				}				
				$text->setLabel($model->getFieldLabel($fieldName));				
				isset($this->_options[self::DATA][$fieldName]) ? $text->setValue($this->_options[self::DATA][$fieldName]) : '';

				if (isset($this->_options['readonly']))
				{
					if (array_key_exists($fieldName,$this->_options['readonly']))
					{						
						$text->setAttrib('readonly','readonly');		
					}
				}
				
				$this->addElement($text);
			}
			catch(Exception $e)
			{				
				return null;
			}
		}

		/**
		 * Stores primary key value into a HTML hidden element 
		 */
		if ($this->_options[self::DATA][$model->getFieldKey()] !== '')
		{
			$text = new Zend_Form_Element_Hidden($model->getFieldKey());
	
			$text->setValue($model->getKeyValue($this->_options[self::DATA]));

			$this->addElement($text);
		}

		$formType = $this->_options[self::DATA][$model->getFieldKey()] === '' ? $this->_getLabel(self::INSERT_LABEL) : $this->_getLabel(self::EDIT_LABEL);
		
		$text = new Zend_Form_Element_Submit(ucfirst($formType)); 	

		$this->addElement($text);
		
		$text = new Zend_Form_Element_Submit('Return');
		$text->setAttrib('name','return');		

		$this->addElement($text);		

		return $this;
	}
	
	/**
	 * Allows changing default button labels
	 * @param unknown_type $label
	 * @return unknown_type
	 */
	protected function _getLabel($label)
	{
		return $label;
	}
	
}
?>