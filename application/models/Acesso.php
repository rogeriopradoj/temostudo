<?php
class Acesso extends Fgsl_Db_Table_Abstract
{
    protected $_name = 'acessos';
    protected $_dependentTables = array(
        'AcessoPapel',
    );
    public function __construct()
    {
        parent::__construct();
        $this->_fieldKey = 'id';
        $this->_fieldNames = $this->_getCols();
        $this->_fieldLabels = array(
            'id' => 'Id',
        	'recurso' => 'Recurso',
            'privilegio' => 'Privilégio',
        );
        $this->_lockedFields = array(
            'id',
        );
        $this->_orderField = 'recurso';
        $this->_searchField = 'recurso';
        $this->_selectOptions = array();
        $this->_typeElement = array(
            'recurso' => Fgsl_Form_Constants::TEXT,
            'privilegio' => Fgsl_Form_Constants::TEXT,
        );
        $this->_typeValue = array(
            'id' => self::INT_TYPE,
        );
    }
}