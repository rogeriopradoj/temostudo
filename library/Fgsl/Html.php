<?php
/**
 * Fgsl Framework
 *
 * LICENSE
 *
 * This source file is subject to the new BSD license that is bundled
 * with this package in the file LICENSE.txt. 
 * If you did not receive a copy of the license, you can get it at www.fgsl.eti.br. 
 *
 * @category   Fgsl
 * @package    Fgsl_Html
 * @subpackage Fgsl_Html
 * @copyright  Copyright (c) 2009 Flávio Gomes da Silva Lisboa (http://www.fgsl.eti.br)
 * @license   New BSD License
 * @version    0.0.3
 */

/**
 * Fgsl_HTml
 */
class Fgsl_Html
{
	const COMPONENT_NAMESPACE = 'Fgsl_Html_';
	
	/**
	 * Calls a method of a decorator instance.	   
	 * @param $method
	 * @param $arguments
	 * @return unknown_type
	 */
	public function __call($method,$arguments)
	{
		// the suffix of $method is class name
		$filter = new Zend_Filter_Word_CamelCaseToUnderscore();
		$tokens =  $filter->filter($method);
		$tokens = explode('_',$tokens);
		$class = self::COMPONENT_NAMESPACE.$tokens[count($tokens)-1];
		
		$decorator = new $class();

		if (count($arguments) == 1)
		{
			return $decorator->$method($arguments[0]);			
	
		}
		elseif (count($arguments) == 2)
		{
			return $decorator->$method($arguments[0],$arguments[1]);						
		}				              
		else // more than 2 arguments, the method called has to expect an array         
		{
			return $decorator->$method($arguments);			
		}
	}
}
?>
