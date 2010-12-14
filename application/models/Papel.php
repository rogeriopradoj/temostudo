<?php
class Papel extends Fgsl_Db_Table_Abstract
{
	protected $_name = 'papeis';
	protected $_dependentTables = array('PapelFuncionario');
	public function __construct()
	{
		parent::__construct();
		$this->_fieldKey = 'id';
		$this->_fieldNames = $this->_getCols();
		$this->_fieldLabels = array(
			'id' => 'Id',
			'nome' => 'Nome',
		);
		$this->_lockedFields = array('id');
		$this->_orderField = 'nome';
		$this->_searchField = 'nome';
		$this->_selectOptions = array();
		$this->_typeElement = array(
			'nome' => Fgsl_Form_Constants::TEXT,
		);
		$this->_typeValue = array(
			'id' => self::INT_TYPE,
		);
	}
}