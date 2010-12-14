<?php
class Promocao extends Fgsl_Db_Table_Abstract
{
    protected $_name = 'promocoes';
    protected $_dependentTables = array(
        'Produto'
    );
    public function __construct()
    {
        parent::__construct();
        $this->_fieldKey = 'id';
        $this->_fieldNames = $this->_getCols();
        $this->_fieldLabels = array(
            'id' => 'Id',
            'nome' => 'Nome',
            'operador' => 'Operador',
            'fator' => 'Fator',
        );
        $this->_lockedFields  = array('id');
        $this->_orderField    = 'nome';
        $this->_searchField   = 'nome';
        $this->_selectOptions = array(
            'operador' => array(
                '-' => '-',
        		'*' => '*',
                'n' => 'n',
            ),
        );
        $this->_typeElement   = array(
            'nome'  => Fgsl_Form_Constants::TEXT,
            'operador' => Fgsl_Form_Constants::SELECT,
        	'fator' => Fgsl_Form_Constants::TEXT,
        );
        $this->_typeValue = array(
        	'fator' => self::FLOAT_TYPE,
        );
    }
}