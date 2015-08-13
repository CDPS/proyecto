<?php

session_start();

require 'php_facebook_sdk4/config/facebook.php';
require 'php_facebook_sdk4/vendor/autoload.php';

use Facebook\FacebookSession;
use Facebook\FacebookRedirectLoginHelper;
use Facebook\FacebookRequest;
use Facebook\FacebookResponse;
use Facebook\GraphObject;
use Facebook\FacebookRequestExeception;

FacebookSession::setDefaultApplication($config['app_id'], $config['app_secret']);
$helper = new FacebookRedirectLoginHelper('http://localhost/testreference1.1/');

try {

	$session = $helper->getSessionFromRedirect();

	if ($session) {
	# code...
		$_SESSION['facebook']= $session->getToken();
		header('Location: http://localhost/testreference1.1/');
	}
	
	if(isset($_SESSION['facebook']))
	{
		$session = new FacebookSession($_SESSION['facebook']);
		$request = new FacebookRequest($session,'GET','\me');
		$response = $request->execute();
		$graphObjectClass=$response->getGraphObject(GraghUser::className());

		$facebook_user= $graphObjectClass;
		
	}
} catch (FacebookRequestExeception $ex) {
	
}catch (Exception $e) {
	
}



