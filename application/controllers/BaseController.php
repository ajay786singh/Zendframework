<?php 

abstract class BaseController extends Zend_Controller_Action {
    
    protected $_model;
	public function init()
	{
		//for layout setting --------start--------------

		Zend_Layout::startMvc(APPLICATION_PATH . '/layouts/');

		$ZL = Zend_Layout::getMvcInstance();

		$ZL->setViewSuffix('php');
		$view = Zend_Layout::getMvcInstance()->getView();
		//for layout setting -------- end --------------

		Zend_Loader::loadClass('Zend_View');

		$this->view = new Zend_View();
		$this->view->setScriptPath(APPLICATION_PATH.'/views');
		$this->_getModel();
		$this->auth = new Zend_Session_Namespace('Zend_Auth');
		$controller = Zend_Controller_Front::getInstance();
		$this->view->baseUrl=$controller->getBaseUrl();
	////////////////////////////Module include//////////////////////
		$this->_loadModel('Users.php');
		$this->_loadModel('Calendar.php');
		$this->_calendar=new Model_Calendar;
		$this->_loadModel('Upload.php');
		$this->_uploadthumnail=new Model_Upload;
		 

	//////////////// calendar////////////
	}
protected function _loadModel($file)
{
	require_once APPLICATION_PATH . '/models/'.$file;   
}
protected function _getModel()
{
        if (null === $this->_model) {
            require_once APPLICATION_PATH . '/models/Users.php';
			$this->_model = new Model_Users();
        }
}	
	//---------------------------------------------------------------------------------------------------------
}