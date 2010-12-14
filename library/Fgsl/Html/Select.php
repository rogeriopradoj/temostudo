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
 * @subpackage Fgsl_Html_Select
 * @copyright  Copyright (c) 2010 Flávio Gomes da Silva Lisboa (http://www.fgsl.eti.br)
 * @license   New BSD License
 * @version    0.0.2
 */

/**
 * Fgsl_Html_Select
 */
require('Tag.php');
class Fgsl_Html_Select
{
	protected $_tag;
	
	public function __construct()
	{
		$this->_tag = new Fgsl_Html_Tag();
	}
	/**
	 * Create a HTML select box with data of an array
	 * @param $data
	 * @return unknown_type
	 */
	public function createSelect(array $data, array $properties = null)
	{
		$options = '';
		foreach($data as $id => $option)
		{
			$options.= $this->_tag->getTag('option',array('id'=> $id),$option);
		}
		$html.= $this->_tag->getTag('select',$properties);

		return $html;		
	}
}	

?>
