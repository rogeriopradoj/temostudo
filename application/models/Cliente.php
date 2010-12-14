<?php
class Cliente extends Fgsl_Db_Table_Abstract
{
    protected $_name = 'clientes';
    protected $_dependentTables = array(
        'Pedido'
    );
    public function __construct()
    {
        parent::__construct();
        $this->_fieldKey = 'cpf';
        $this->_fieldNames = $this->_getCols();
        $this->_fieldLabels = array(
            'cpf' => 'CPF',
            'nome' => 'Nome',
            'senha' => 'Senha',
            'email' => 'e-mail',
        );
        $this->_lockedFields = array('cpf');
        $this->_orderField = 'nome';
        $this->_searchField = 'nome';
        $this->_selectOptions = array();
        $this->_typeElement = array(
            'nome' => Fgsl_Form_Constants::TEXT,
            'senha' => Fgsl_Form_Constants::PASSWORD,
        	'email' => Fgsl_Form_Constants::TEXT,
        );
        $this->_typeValue = array();
    }
}