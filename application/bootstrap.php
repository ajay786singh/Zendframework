<?php

defined('APPLICATION_PATH')
    or define('APPLICATION_PATH', dirname(__FILE__));
defined('APPLICATION_ENVIRONMENT')
    or define('APPLICATION_ENVIRONMENT', 'development');

define('SITE_TITLE', 'RENT');
define("BASE_URL", "http://192.168.1.233/ajay/rent");
define("ADMIN_URL", "http://192.168.1.233/ajay/rent/admin");
 //defined('UPLOAD_PATH') || define('UPLOAD_PATH', APPLICATION_PATH . '/uploads'); 
 // Define upload path
if (!defined('UPLOAD_PATH'))
        define('UPLOAD_PATH', realpath(dirname(__FILE__)) . '/uploads/');
date_default_timezone_set('Asia/Calcutta');
// FRONT CONTROLLER - Get the front controller.
// The Zend_Front_Controller class implements the Singleton pattern, which is a
// design pattern used to ensure there is only one instance of
// Zend_Front_Controller created on each request.
$frontController = Zend_Controller_Front::getInstance();

// controller directory.
$frontController->setControllerDirectory(APPLICATION_PATH . '/controllers');
// dependent on your organization and site's needs.
$frontController->setParam('env', APPLICATION_ENVIRONMENT);


$router = new Zend_Controller_Router_Rewrite();
$frontController->setRouter($router)->setBaseUrl(); // set the base url!


// Set disable view default directory
Zend_Controller_Front::getInstance()->setParam('noViewRenderer', true);
// Don't user the error handler. It messes stuff up.

/*$configArray = array(
			'webhost' =>'localhost',
			'database'=>array('adapter' => 'mysqli',
			'params'=>array(
			'host'=>'localhost',
			'username' =>'planetd2_planet',
			'password' =>'planet',
			'dbname' =>'planetd2_planetdacha')
			)
			);*/
			
			$configArray = array(
			'webhost' =>'localhost',
			'database'=>array('adapter' => 'mysqli',
			'params'=>array(
			'host'=>'localhost',
			'username' =>'root',
			'password' =>'norefresh',
			'dbname' =>'zrent')
			)
			);			
			
			
$configuration = new Zend_Config($configArray);
$dbAdapter = Zend_Db::factory($configuration->database);

Zend_Db_Table_Abstract::setDefaultAdapter($dbAdapter);


$registry = Zend_Registry::getInstance();
$registry->configuration = $configuration;
$registry->dbAdapter     = $dbAdapter;
$registry->configArray=$configArray;

Zend_Session::start();

$auth = new Zend_Session_Namespace('Zend_Auth');

unset($frontController, $view, $configuration, $dbAdapter, $registry);


