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
 * @subpackage Fgsl_Html_Table
 * @copyright  Copyright (c) 2010 Flávio Gomes da Silva Lisboa (http://www.fgsl.eti.br)
 * @license   New BSD License
 * @version    0.0.3
 */

/**
 * Fgsl_Html_Table
 */
require('Tag.php');
class Fgsl_Html_Table
{
	protected $_tag;
	
	public function __construct()
	{
		$this->_tag = new Fgsl_Html_Tag();
	}
	/**
	 * Create a HTML table with data of an array
	 * @param $data
	 * @return unknown_type
	 */
	public function createTable(array $data, array $properties = null)
	{
		if (empty($data)) return '';
		
		$voidArray = array();		
		
		$html = '';

		$line = '';
		
		foreach($data as $record) 
		{			
			foreach($record as $fieldName => $value)
			{
				$line.= $this->_tag->getTag('th',$voidArray,$fieldName);
			}
			break;		
		}
		$html .= $this->_tag->getTag('thead',$voidArray,$line);
		
		foreach($data as $record) 
		{
			$line = '';		
			foreach($record as $key => $value)
			{				
				$value = empty($value) ? '&nbsp;' : $value;
				$line.= $this->_tag->getTag('td',$voidArray,$value);
			}
			$html.= $this->_tag->getTag('tr',$voidArray,$line);		
		}
		
		$html = $this->_tag->getTag('table',$properties == null ? array('border'=>1) : $properties ,$html);

		return $html;		
	}
}	

?>
