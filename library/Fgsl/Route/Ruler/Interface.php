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
 * @package    Fgsl_Route_Ruler
 * @subpackage Fgsl_Route_Ruler_Interface
 * @copyright  Copyright (c) 2010 Flávio Gomes da Silva Lisboa (http://www.fgsl.eti.br)
 * @license   New BSD License
 * @version    0.0.1
 */

/**
 * Fgsl_Route_Ruler_Interface
 */
interface Fgsl_Route_Ruler_Interface
{
	public function hasRouteStartup();
	public function hasRouteShutdown();
 	public function hasRoutePreDispatch();
 	public function hasRoutePosDispatch();
 	public function getRouteStartup($currentRoute);
 	public function getRouteShutdown($currentRoute);
 	public function getRoutePreDispatch($currentRoute);
 	public function getRoutePosDispatch($currentRoute);	
}

