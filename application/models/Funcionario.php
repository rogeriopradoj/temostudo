<?php
class Funcionario extends Fgsl_Db_Table_Abstract
{
	protected $_name = 'funcionarios';
	protected $_dependentTables = array('PapelFuncionario');
	public function __construct()
	{
		parent::__construct();
		$this->_fieldKey = 'matricula';
		$this->_fieldNames = $this->_getCols();
		$this->_fieldLabels = array(
			'id' => 'Id',
			'nome' => 'Nome',
			'apelido' => 'Apelido',
			'senha' => 'Senha',
		);
		$this->_lockedFields = array('id');
		$this->_orderField = 'nome';
		$this->_searchField = 'nome';
		$this->_selectOptions = array();
		$this->_typeElement = array(
			'nome' => Fgsl_Form_Constants::TEXT,
			'apelido' => Fgsl_Form_Constants::TEXT,
			'senha' => Fgsl_Form_Constants::PASSWORD,
		);
		$this->_typeValue = array(
			'matricula' => self::INT_TYPE
		);
	}
}