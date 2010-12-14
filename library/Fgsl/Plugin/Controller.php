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
 * @package    Fgsl_Plugin
 * @subpackage Fgsl_Plugin
 * @copyright  Copyright (c) 2009 Flávio Gomes da Silva Lisboa (http://www.fgsl.eti.br)
 * @license   New BSD License
 * @version    0.0.3
 */

/**
 * Fgsl_Plugin_Controller
 * 
 * This plugin depends on existence of a model that implements Fgsl_Route_Ruler_Interface 
 */
class Fgsl_Plugin_Controller extends Zend_Controller_Plugin_Abstract
{
	protected $_routeRuler;
	
	/**
	 * This constructor expects a key whose name is the value of constant ROUTE_RULER, that 
	 * must be a class that implements Fgsl_Route_Ruler_Interface.
	 */
	public function __construct()
	{
		$routeRuler = ROUTE_RULER;
		if (empty($routeRuler))
		{
			throw new Fgsl_Exception('Constant ROUTE_RULER is not defined');
			return;	
		}
		
    	$this->_routeRuler = Fgsl_Session_Namespace::get(ROUTE_RULER);
		
	}
	
	public function routeStartup(Zend_Controller_Request_Abstract $request)
    {
    	if ($this->_routeRuler->hasRouteStartup())
    	{
			$newRoute = $this->_routeRuler->getRouteStartup($this->getCurrentRoute($request));
			$this->setNewRoute($newRoute);
    	}
    }
    
    public function routeShutdown(Zend_Controller_Request_Abstract $request)
    {  	
    	if ($this->_routeRuler->hasRouteShutdown())
    	{
			$newRoute = $this->_routeRuler->getRouteShutdown($this->getCurrentRoute($request));
			$this->setNewRoute($newRoute);			
    	}    	
    }

    public function preDispatch(Zend_Controller_Request_Abstract $request)
    {    	
    	if ($this->_routeRuler->hasRoutePreDispatch())
    	{
			$newRoute = $this->_routeRuler->getRoutePreDispatch($this->getCurrentRoute($request));
			$this->setNewRoute($newRoute);			
    	}    	
    }
    
    public function posDispatch(Zend_Controller_Request_Abstract $request)
    {    	
    	if ($this->_routeRuler->hasRoutePosDispatch())
    	{
			$newRoute = $this->_routeRuler->getRoutePosDispatch($this->getCurrentRoute($request));
			$this->setNewRoute($newRoute);			
    	}    	
    }    
    
    /**
     * Sets a new route based on required model called RouteRuler
     * @param array $currentRoute
     * @return unknown_type
     */
    protected function setNewRoute($newRoute)
    {
    	$this->getRequest()->setModuleName($newRoute['module']);
    	$this->getRequest()->setControllerName($newRoute['controller']);
    	$this->getRequest()->setActionName($newRoute['action']);
    }
    
    /**
     * Returns original route 
     * @return unknown_type
     */
    protected function getCurrentRoute(Zend_Controller_Request_Abstract $request)
    {
    	$currentRoute = array();
    	$currentRoute['module'] = $request->getModuleName();
		$currentRoute['controller'] = $request->getControllerName();
    	$currentRoute['action'] = $request->getActionName();
  	
    	return $currentRoute;    	
    }    
}
?>