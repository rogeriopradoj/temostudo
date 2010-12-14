<?php
class Movimentacao extends Fgsl_Db_Table_Abstract
{
    protected $_name = 'movimentacoes';
    protected $_referenceMap = array(
        'Produto' => array(
            'columns' => 'id_produto',
            'refTableClass' => 'Produto',
            'refColumns' => 'id',
        ),
    );
    public function __construct()
    {
        parent::__construct();
        $this->_fieldKey = 'id_produto';
        $this->_fieldNames = $this->_getCols();
        $this->_fieldLabels = array(
            'id' => 'Id',
            'id_produto' => 'Produto',
            'quantidade' => 'Quantidade',
            'data' => 'Data',
            'tipo' => 'Tipo',
        );
        $this->_lockedFields = array('id');
        $this->_orderField = 'nome';
        $this->_searchField = 'nome';
        $this->_selectOptions = array();
        $this->_typeElement = array(
            'quantidade' => Fgsl_Form_Constants::TEXT,
            'data' => Fgsl_Form_Constants::TEXT,
            'tipo' => Fgsl_Form_Constants::TEXT,
        );
        $this->_typeValue = array(
            'id' => self::INT_TYPE,
            'id_produto' => self::INT_TYPE,
            'quantidade' => self::INT_TYPE,
        );
        $this->_join = array(
            array('p' => 'produtos'),
            'estoque.id_produto = p.id',
        );
        $this->_joinFieldNames = array('nome');
    }
}