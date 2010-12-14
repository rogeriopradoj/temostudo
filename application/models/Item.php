<?php
class Item extends Fgsl_Db_Table_Abstract
{
    protected $_name = 'itens';
    protected $_referenceMap = array(
        'Pedido' => array(
            'columns' => 'id_pedido',
            'refTableClass' => 'Pedido',
            'refColumns' => 'id',
        ),
        'Produto' => array(
            'columns' => 'id_produto',
            'refTableClass' => 'Produto',
            'refColumns' => 'id',
        ),
    );
    public function __construct()
    {
        parent::__construct();
        $this->_fieldKey = '';
        $this->_fieldNames = $this->_getCols();
        $this->_fieldLabels = array(
            'id_pedido' => 'Pedido',
            'id_produto' => 'Produto',
            'preco' => 'Preço',
        );
        $this->_lockedFields = array();
        $this->_orderField = 'id_pedido';
        $this->_searchField = '';
        $this->_selectOptions = array();
        $this->_typeElement = array(
        	'id_pedido' => Fgsl_Form_Constants::SELECT,
        	'id_produto' => Fgsl_Form_Constants::SELECT,
        	'preco' => Fgsl_Form_Constants::TEXT,
        );
        $this->_typeValue = array(
            'id_pedido' => self::INT_TYPE,
            'id_produto' => self::INT_TYPE,
            'preco' => self::FLOAT_TYPE,
        );
    }
}