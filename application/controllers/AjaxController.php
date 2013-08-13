<?php
class AjaxController extends Zend_Controller_Action 
{
	protected $_model;
	public function init()
	{
		/*//for layout setting --------start--------------
		//Zend_Layout::startMvc(APPLICATION_PATH . '/adminLayouts/');
		$ZL = Zend_Layout::getMvcInstance();
		$ZL->setViewSuffix('php');

		//$view = Zend_Layout::getMvcInstance()->getView();*/
		//for layout setting -------- end --------------
		
		$this->view = new Zend_View();
		$this->view->setScriptPath(APPLICATION_PATH.'/views/admin');
		$this->_getModel();
		$this->auth = new Zend_Session_Namespace('Zend_Auth_Admin');
		$controller = Zend_Controller_Front::getInstance();
		$this->view->baseUrl=$controller->getBaseUrl();
		$this->_loadModel('Standard.php');
		$this->_users= new Model_Standard('user');
		$this->_loadModel('Users.php');
		$this->_modelUser=new Model_Users;
	
	}
	
	
	
	protected function _loadModel($file)
    {
		require_once APPLICATION_PATH . '/models/'.$file;   
	}	
	
	protected function _getModel()
    {
        if (null === $this->_model) {
            require_once APPLICATION_PATH . '/models/Admin.php';
			$this->_model=new Model_Admin;
        }
    }
	function landlordpropertyajaxAction()
	{		
		$view=$this->view;
		//$this->_redirect('admin/CheckSession');
		
		 $lanlordid = $this->_getParam('ignid');
		$page=$this->_model->sqllandlordpropertyshow($lanlordid);
		$view->landlordproperty=$page;
		$this->_response->setBody($view->render('detalsproperty.tpl.php'));
	} 
	
	
	
	
	}
?>