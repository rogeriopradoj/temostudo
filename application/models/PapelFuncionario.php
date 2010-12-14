<?php
class PapelFuncionario extends Zend_Db_Table_Abstract
{
    protected $_name = 'papeis_funcionario';
    protected $_referenceMap = array(
        'Papel' => array(
            'columns' => 'id_papel',
            'refTableClass' => 'Papel',
            'refColumns' => 'id',
        ),
        'Funcionario' => array(
            'columns' => 'id_funcionario',
            'refTableClass' => 'Funcionario',
            'refColumns' => 'matricula',
        ),
    );
}