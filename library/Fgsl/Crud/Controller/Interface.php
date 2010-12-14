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
 * @package    Fgsl_Crud
 * @subpackage Fgsl_Crud_Controller_Interface
 * @copyright  Copyright (c) 2009 Flávio Gomes da Silva Lisboa (http://www.fgsl.eti.br)
 * @license   New BSD License
 * @version    0.0.1
 */

/**
 * Fgsl_Crud_Controller_Interface
 */
interface Fgsl_Crud_Controller_Interface
{
	public function init();
	
	public function indexAction();

	public function listAction();

	public function insertAction();

	public function editAction();

	public function getEditForm(array $data,$action,$model);

	public function saveAction();

	public function save(array $data, array $unlockedData);

	public function removeAction();
	
	public function _config();
	
	public function getUrl();
	
	public function configureViewAssign();
}
?>