<?php
class Estoque extends Fgsl_Db_Table_Abstract
{
    protected $_name = 'estoques';
    protected $_referenceMap = array(
        'Produto' => array(
            'columns'       => 'id_produto',
    		'refTableClass' => 'Produto',
            'refColumns'    => 'id',
        ),
    );
    public function __construct()
    {
        parent::__construct();
        $this->_fieldKey = 'id_produto';
        $this->_fieldNames = array();
        $this->_fieldNames[] = 'id_produto';
        $this->_fieldNames[] = 'nome';
        
        $cols = $this->_getCols();
        for ($i=1; $i<count($cols); $i++) {
            $this->_fieldNames[] = $cols[$i];
        }
        $this->_fieldLabels = array(
            'id_produto' => 'Id',
        'nome' => 'Nome',
            'quantidade' => 'Quantidade',
            'maximo' => 'Maximo',
            'minimo' => 'Mínimo',
            'reservada' => 'Reservada',
        );
        $this->_lockedFields = array(
            'id_produto',
            'reservada',
        );
        $this->_orderField = 'nome';
        $this->_searchField = 'nome';
        $this->_selectOptions = array();
        $this->_typeElement = array(
            'quantidade' => Fgsl_Form_Constants::TEXT,
            'maximo' => Fgsl_Form_Constants::TEXT,
        	'minimo' => Fgsl_Form_Constants::TEXT,
        );
        $this->_typeValue = array(
            'id_produto' => self::INT_TYPE,
        	'quantidade' => self::INT_TYPE,
        	'maximo'     => self::INT_TYPE,
        	'minimo'     => self::INT_TYPE,
            'reservada'  => self::INT_TYPE,
        );
    }
    public function setRelationships(array &$records)
    { 
        foreach ($records as $key => $value) {
            unset($recordes[$key]['remove']);
        }
    }
    public function getCustomSelect($where, $order, $limit)
    {
        $select = $this->getAdapter()->select();
        $select->from(
            array('e' => 'estoques'),
            array('id_produto','quantidade','maximo','minimo','reservada'));
        $select->join(array('p'=>'produtos'), 'e.id_produto = p.id', array('nome'));
        if ($where !== null) {
            $select->where($where);
        }
        $select->order($order);
        $select->limit($limit);
        return $select;
    }
    public function insert(array $data)
    {
        unset($data['nome']);
        parent::insert($data);
    }
    public function update(array $data, $where)
    {
        unset($data['nome']);
        parent::update($data, $where);
    }
}