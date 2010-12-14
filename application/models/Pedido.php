<?php
class Pedido extends Fgsl_Db_Table_Abstract
{
    protected $_name = 'pedidos';
    protected $_dependentTables = array('Item');
    protected $_referenceMap = array(
        'Cliente' => array(
            'columns' => 'cpf',
        	'refTableClass' => 'Cliente',
    		'refColumns' => 'cpf',
        ),
    );
    public function __construct()
    {
        parent::__construct();
        $this->_fieldKey = 'cpf';
        $this->_fieldNames = $this->_getCols();
        $this->_fieldLabels = array(
            'id' => 'Id',
            'data' => 'Data',
            'status' => 'Status',
            'cpf' => 'cpf',
        );
        $this->_lockedFields = array('id');
        $this->_orderField = 'data';
        $this->_searchField = 'cpf';
        $this->_selectOptions = array();
        $this->_typeElement = array(
            'data' => Fgsl_Form_Constants::TEXT,
            'status' => Fgsl_Form_Constants::CHECKBOX,
            'cpf' => Fgsl_Form_Constants::TEXT,
        );
        $this->_typeValue = array(
            'status' => self::BOOLEAN_TYPE
        );
    }
}