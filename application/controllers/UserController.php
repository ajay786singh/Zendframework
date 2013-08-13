<?php 
class UserController extends Zend_Controller_Action 
{
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
public function indexAction() 
{	
        $view=$this->view;
        $this->_response->setBody($view->render('user/index.tpl.php'));
}

public function registerAction() 
 {	
            $view=$this->view;
            if($this->getRequest()->isPost())
		{
			$post=$this->_request->getPost();
			if($this->_model->saveusers($post))
			{
				//$this->_redirect('users/login/msg/success');
                            
                            $view->msg="Successfully submitted";
			}
			else
			{
				$view->msg="Error: Email ID is allready exist";
				$view->post=$post;
			} 			
		}
            $this->_response->setBody($view->render('user/register.tpl.php'));
 }


}