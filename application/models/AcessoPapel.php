<?php
class AcessoPapel extends Zend_Db_Table_Abstract
{
    protected $_name = 'acessos_papel';
    protected $_referenceMap = array(
        'Acesso' => array(
            'columns' => 'id_acesso',
            'refTableClass' => 'Acesso',
            'refColumns' => 'id',
        ),
        'Papel' => array(
            'columns' => 'id_papel',
            'refTableClass' => 'Papel',
            'refColumns' => 'id',
        ),
    );
}