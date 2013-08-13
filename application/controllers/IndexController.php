<?php 
include_once 'BaseController.php';

class IndexController extends BaseController {
	
	//---------------------------------------------------------------------------------------------------------
    public function indexAction() 
    {	
	$view=$this->view;
	
        $this->_response->setBody($view->render('index/index.tpl.php')); 	
    }
	
	
}