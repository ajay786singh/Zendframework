<?php
include (APPLICATION_PATH."/forms/Files.php");
class AdminController extends Zend_Controller_Action 
{
    
    
    
    public $session;
    private $uploads = '/../uploads/images/';
    private $uploads_rel = '/images/thumbs/';

	protected $_model;
	public function init()
	{
		//for layout setting --------start--------------
		Zend_Layout::startMvc(APPLICATION_PATH . '/layouts/admin');
		$ZL = Zend_Layout::getMvcInstance();
		$ZL->setViewSuffix('php');
		$view = Zend_Layout::getMvcInstance()->getView();
		//for layout setting -------- end --------------
		
		$this->view = new Zend_View();
		$this->view->setScriptPath(APPLICATION_PATH.'/views/admin');
		$this->_getModel();
		$this->auth = new Zend_Session_Namespace('Zend_Auth_Admin');
		$controller = Zend_Controller_Front::getInstance();
		$this->view->baseUrl=$controller->getBaseUrl();
                $this->_loadModel('Upload.php');
		$this->_uploadthumnail=new Model_Upload;
		//$this->_loadModel('Standard.php');
		//$this->_users= new Model_Standard('user');
                $this->_loadModel('Admin.php');
                $this->_modelUser=new Model_Admin;
	
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
	//---------------------------------------------------------------------------------------------------------
   
    public function CheckSession()
    {	
        if($this->auth->admin_id=='' && !isset($this->auth->admin_id))
        $this->_redirect('/admin/login');
    }
    public function indexAction() 
    {	     
    $this->CheckSession();
    $view=$this->view;
    $totalusers=$this->_model->getTotalUsers();
    $view->totalusers=$totalusers;
    $this->_response->setBody($view->render('index.tpl.php'));
    }   
     
        public function loginAction() 
        {	
                $view=$this->view;
		if($this->getRequest()->isPost())
		{
                    $post=$this->_request->getPost();

                    $arr['username']=$post['username'];
                    $arr['password']=$post['password'];
		
                    $rs=$this->_model->CheckExist('admin',$arr);
                    if($rs)
                    {
                        $this->auth->admin_id=$rs['id'];
                        $this->auth->username=$rs['username'];
                        $this->auth->email=$rs['email'];
                        $this->_redirect('admin');
                    }
                    else
                    {
                            $this->_helper->layout->disableLayout();
                            $view->err='<p class="msg error">The password you have entered is incorrect.</p>';
                            $this->_response->setBody($view->render('login.tpl.php'));
                    }
                }    
		else{
		 $this->_helper->layout->disableLayout();
		 $this->_response->setBody($view->render('login.tpl.php'));
		 }
        }
        public function logoutAction() 
        {	
        unset($this->auth->admin_id, $this->auth->username, $this->auth->email,$this->auth->type);
        $this->_redirect('admin');
        }
        
        public function usersAction() 
        {	
            $this->CheckSession();
            $view=$this->view;
            
            if($this->getRequest()->isPost())
            {
                
                $post=$this->_request->getPost();
                if($post['mode']=='delete')
                {    
                    $uid=$post['id'];
                    $this->_model-> deleteuser($uid);
                    $view->msg="Successfully deleted";
                }
                else if($post['mode']=='add'){
                   $this->_model->saveusers($post);
                   $view->msg="Successfully added";
                }
                
                $results=$this->_model->getAllUsers();
                
                $paginator = Zend_Paginator::factory($results);
                $paginator->setCurrentPageNumber($this->_getParam('page'));
                $paginator->setPageRange(150);
                $paginator->setItemCountPerPage(5);
                
                $view->paginator=$paginator;
                
                $this->_response->setBody($view->render('user.tpl.php'));
                 
            }
            else if($_GET['add']=='true')
            {
                $this->_response->setBody($view->render('adduser.tpl.php'));
            }
            else
            {
                
                $results=$this->_model->getAllUsers();
                $paginator = Zend_Paginator::factory($results);
                $paginator->setCurrentPageNumber($this->_getParam('page'));
                $paginator->setPageRange(150);
                $paginator->setItemCountPerPage(5);
                    /*
                    * Assign to view
                    */
                    $this->view->paginator = $paginator;
                  
                $this->_response->setBody($view->render('user.tpl.php'));
            }
            
        }
        
        public function usereditAction() 
        {	
            $this->CheckSession();
            $view=$this->view;
            $id=$_GET['id'];
           
            
            
            if($this->getRequest()->isPost())
	    {
               $post=$this->_request->getPost();
               $update=$this->_model->updateuser($post,$id);
               if($update)
               {
                   $view->msg="User information updated";
               }else
               {
                   $view->msg="User information not updated";
               }
            }
            $results=$this->_model->getUser($id);
            $view->results=$results;
            
            $this->_response->setBody($view->render('useredit.tpl.php'));
        }
       
/************************************************************
 * 
 *  Controller For Media Page
 * 
 ***********************************************************/        
 
 public function libraryAction()
 {
        $this->CheckSession();
        $view=$this->view;
        $form = new Form_File();
        $request = $this->getRequest();
        $this->view->form = $form;
        if($this->_request->getPost())
        {     
                
                //determine filename and extension
                
                 if($_POST['file1']!="")
                {   
                $info = pathinfo($form->file1->getFileName(null,false));
                $filename = $info['filename'];
                
                $ext = $info['extension']?".".$info['extension']:"";
                
                $form->file1->addFilter(new Zend_Filter_File_Rename(array('target'=>time().$filename.$ext,"overwrite"=>true)));
                $name=$form->getValue('file1');
                }
                
            $this->_response->setBody($view->render('addmedia.tpl.php'));
            
        }
        else
        {
            if($_GET['add']=='true')
            {
            
            //$this->view->form = $form;
            $this->_response->setBody($view->render('addmedia.tpl.php'));
            }
            else if($_GET['edit']=='true')
            {
            $this->_response->setBody($view->render('editmedia.tpl.php'));
            }

            else
            {
            $results=$this->_model->getMedia();
            $count=count($results);
            $this->view->count=$count;
            $paginator = Zend_Paginator::factory($results);
            $paginator->setCurrentPageNumber($this->_getParam('page'));
            $paginator->setPageRange(150);
            $paginator->setItemCountPerPage(5);
            $this->view->paginator = $paginator;
            $this->_response->setBody($view->render('library.tpl.php'));
            } 
        }   
        
 }
        
/***************************************
 *  Property Management
 *  @manage=> New Property
 *  @manage=> Edit Property
 *  @manage=> Delete Property
 * 
 **************************************/       
 function propertyAction()
 {
     
 }
 function managepropertyAction()
 {
     $view=$this->view;
     $this->CheckSession();
     $action=$_REQUEST['action'];
     if($action=='new')
     {
         $this->addpropertyAction();
     }
     else if($action=='edit')
     {
         $this->editpropertyAction();
     }
     else
     {
        $where="";
        $results=$this->_model->getProperty($where);
        $count=count($results);
        $this->view->count=$count;
        $paginator = Zend_Paginator::factory($results);
        $paginator->setCurrentPageNumber($this->_getParam('page'));
        $paginator->setPageRange(150);
        $paginator->setItemCountPerPage(5);
        $this->view->paginator = $paginator;
       // var_dump($paginator);
     $this->_response->setBody($view->render('manageproperty.tpl.php'));
     }
 }
 
 function addpropertyAction()
 {
        $view=$this->view;
        if($this->getRequest()->isPost())
        {
            $data['landlord_id']=$_POST['landlord_id'];
            $data['title']=$_POST['title'];
            $data['summary']=$_POST['summary'];
            $data['location_id']=$_POST['location_id'];
            $data['status']=$_POST['status'];
            $data['created_on']=$_POST['created_on'];
            $result=$this->_model->addProperty($data);
            $where ='';
            $users=$this->_model->getAllUsers($where);
            $this->view->users=$users;
            $this->_redirect('/admin/manageproperty?action=edit&pid='.$result.'&edit=images');
        }else
        {
        // $where = "where user_type=2";
         $where ='';
         $users=$this->_model->getAllUsers($where);
         $this->view->users=$users;
         $this->_response->setBody($view->render('addproperty.tpl.php'));
        }
 }
 /*******************************
  * 
  * Function to edit property
  * @param: property id
  * 
  ******************************/
 function editpropertyAction()
 {
     $view=$this->view;
     $pid=$_REQUEST['pid'];
     $pdetails=$this->_model->getPropertyDetail($pid);
     $this->view->pdetails=$pdetails;
     $where ='';
     $users=$this->_model->getAllUsers($where);
     $this->view->users=$users;
     $this->_response->setBody($view->render('editproperty.tpl.php'));   
 }
 
 function imageAction()
 {
    $view=$this->view;
    $pid= $_REQUEST['pid'];
    $this->view->pid= $pid; 
    $this->_response->setBody($view->render('addimage.tpl.php'));
 }
 
 function uploadAction()
 {
        $view=$this->view;
        $allowed=array('jpg','png','gif','jpeg');
                
        if($this->getRequest()->isPost())
        { 
            echo $_POST['pid'];
            
            $files=$_FILES['uploaded_files'];
            var_dump($files);
//            $count=count($files['name']);
//            $this->view->count=$count;
//            //$upload=new Model_Upload;
//            $root1=$this->root=UPLOAD_PATH;
//            $root2=$this->root=UPLOAD_PATH."/images";
//            for($i=0;$i<=$count-1;$i++)
//            {
//                $filename=$files['name'][$i];
//                $newname=strtotime(date('Y-m-d H:i:s')).$filename;
//                $ext=substr(strrchr($files['name'][$i],'.'),1);
//                $tmpname=$files['tmp_name'][$i];
//                $filesize=$files['size'][$i];
//                $filetype=$files['type'][$i];
//                if(in_array($ext,$allowed))
//                {
//                    $filename."-".$i;
//                }
//                $destination=$root1.$newname;
//                @move_uploaded_file($tmpname,$destination);
//                $this->_uploadthumnail->set_directory("/var/www/ajay/rent/application/uploads/","/var/www/ajay/rent/application/uploads");
//                $this->_uploadthumnail->set_max_size(1800000);
//                $this->_uploadthumnail->set_tmp_name($tmpname);
//                $this->_uploadthumnail->set_file_size($filesize);
//                $this->_uploadthumnail->set_file_type($filetype);
//                $this->_uploadthumnail->set_file_name($newname);
//                $file=$this->_uploadthumnail->start_copy();
//                //$thumbname1=$file;
//                //$this->_uploadthumnail->set_thumbnail_name($thumbname1);
//                //$get=$this->_uploadthumnail->create_thumbnail();
//                //$this->_uploadthumnail->set_thumbnail_size(226,150); 
//            }    
                
        }
      //  $this->_response->setBody($view->render('addimage.tpl.php'));
      $this->_redirect('/admin/manageproperty?action=edit&pid='.$_REQUEST[pid].'&edit=images');
 }
       
        
}