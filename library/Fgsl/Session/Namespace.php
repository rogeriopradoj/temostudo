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
 * @package    Fgsl_Session
 * @subpackage Fgsl_Session_Namespace
 * @copyright  Copyright (c) 2009 Flávio Gomes da Silva Lisboa (http://www.fgsl.eti.br)
 * @license   New BSD License
 * @version    0.0.2
 */

/**
 * Fgsl_Session_Namespace
 */
class Fgsl_Session_Namespace
{
	const DEFAULT_NAMESPACE = 'session';
	
	private static $_configuredNamespace = self::DEFAULT_NAMESPACE;
	/**
	 * Create a namespace in session called session by default
	 * but that can be configured
	 * @return unknown_type
	 */
	public static function init($namespace = null)
	{
		self::$_configuredNamespace = is_null($namespace) ? self::DEFAULT_NAMESPACE : $namespace;		
		Zend_Registry::set(self::$_configuredNamespace,new Zend_Session_Namespace(self::$_configuredNamespace));
	}

	/**
	 * Get a value from the a namespace of session  
	 * @param string $key
	 * @return unknown_type
	 */
	public static function get($key)
	{
		$session = Zend_Registry::get(self::$_configuredNamespace);
		return $session->$key;
	}
	
	/**
	 * Set a value into a namespace of session
	 * @param $key
	 * @param $value
	 * @return unknown_type
	 */
	public static function set($key,$value)
	{
		$session = Zend_Registry::get(self::$_configuredNamespace);
		$session->$key = $value;
		Zend_Registry::set(self::$_configuredNamespace,$session);
	}
	
	/**
	 * Unset a value into a namespace of session
	 * @param $key
	 * @param $value
	 * @return unknown_type
	 */
	public static function remove($key)
	{
		$session = Zend_Registry::get(self::$_configuredNamespace);
		unset($session->$key);
		Zend_Registry::set(self::$_configuredNamespace,$session);
	}
	
	
}