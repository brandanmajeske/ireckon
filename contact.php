<?php 
	//start session to track $_SESSION[] variables
	session_start();

	//Connect to the database
	require_once 'db.php';
	require_once 'ItemModel.php';
	require_once 'ItemView.php';
	require_once 'conf.inc.php';
	require_once 'AuthModel.php';
	require_once "AuthView.php";
	require_once "View.php";
	require_once 'ContactModel.php';

	/*if(!$_SESSION['username']){
		header('Location: auth.php');

	}else{*/

	$model = new ContactModel();
	$view = new View();
	$view->show('header');
	if(isset($_SESSION['username'])){
		$view->show('actions_list');
	}
	$model->postCheck();
	$errors = $model->postCheck('errors');
	$view->show('contact_form', $errors);
	$view->show('footer');

	//}


?>