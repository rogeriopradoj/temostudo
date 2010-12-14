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
 * @copyright  Copyright (c) 2009 Flávio Gomes da Silva Lisboa (http://www.fgsl.eti.br)
 * @license   New BSD License
 * @version    0.0.1
 */

/**
 * Fgsl_Html_Tag
 */
class Fgsl_Html_Tag
{
	/**
	 * Creates a tag HTML according to arguments.
	 * 
	 * @param $name tag name
	 * @param $properties 
	 * @param $content 
	 * @param $newLine 
	 * @param $tab if there is tab 
	 * @param $numTabs tabs account
	 * @return unknown_type
	 */
	public function getTag($name,array $properties = null,$content,$newLine = true,$tab = false , $numTabs = 0)
	{
		$tag = '';
		$tag .= ($tab ? str_repeat("\t",$numTabs): "");
		$tag .= $this->openTag($name,$properties);
		$tag .= $content.$this->closeTag($name);
		$tag .= ($newLine ? "\n" : ""); 
		
		return $tag;
	}
	
	private function openTag($name,array $properties)
	{
		$contentProperties = '';
		
		if ($properties !== null)
		{
			foreach ($properties as $propertyName => $propertyValue)
			{
				$contentProperties = " $propertyName = \"$propertyValue\"";
			}
		}
		
		$openTag = "<$name$contentProperties>";
		return $openTag;
	}
	
	private function closeTag($name)
	{
		return "</$name>";
	}
	
}
?>