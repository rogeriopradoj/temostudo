<?php
class Produto extends Fgsl_Db_Table_Abstract
{
    protected $_name = 'produtos';
    protected $_dependentTables = array(
        'Estoque',
        'Item',
        'Movimentacao',
    );
    protected $_referenceMap = array(
        'Promocao' => array(
            'columns' => 'id_promocao',
            'refTableClass' => 'Promocao',
            'refColumns' => 'id',
        ),
    );    
    public function __construct()
    {
        parent::__construct();
        $this->_fieldKey = 'id';
        $this->_fieldNames = $this->_getCols();
        $this->_fieldLabels = array(
            'id' => 'Id',
            'nome' => 'Nome',
            'preco' => 'Preço',
            'id_promocao' => 'Promoção',
        );
        $this->_lockedFields  = array('id');
        $this->_orderField    = 'nome';
        $this->_searchField   = 'nome';
        $this->_selectOptions = array();
        $this->_typeElement   = array(
            'nome'  => Fgsl_Form_Constants::TEXT,
            'preco' => Fgsl_Form_Constants::TEXT,
        	'id_promocao' => Fgsl_Form_Constants::SELECT,
        );
        $this->_typeValue = array(
        	'id' => self::INT_TYPE,
            'preco' => self::FLOAT_TYPE,
        );
    }
}