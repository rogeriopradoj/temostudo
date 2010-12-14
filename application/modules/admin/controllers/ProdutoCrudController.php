<?php
//require_once '/opt/lampp/htdocs/temostudo/library/Fgsl/Crud/Controller/Abstract.php';
class Admin_ProdutoCrudController extends Fgsl_Crud_Controller_Abstract
{
    public function init()
    {
        parent::init();
        Zend_Loader::loadClass('Produto');
        $this->_useModules = true;
        $this->_uniqueTemplatesForApp = false;
        $this->_model = new Produto();
        $this->_title = 'Cadastro de Produtos';
        $this->_searchButtonLabel = 'Pesquisar';
        $this->_searchOptions = array('nome' => 'Nome');
        $this->_config();
    }
}