<?php 
	//start session to track $_SESSION[] variables
	session_start();

	//Connect to the database

	require_once 'db.php';
	require_once 'conf.inc.php';
	require_once 'View.php';
	require_once 'RegisterModel.php';

	$model = new RegisterModel(MY_DSN, MY_USER, MY_PASS);
	$view = new View();
	$view->show('header');

	$model->registerCheck();
	$errors = $model->registerCheck('errors');
	
	//$view->show('register_form', $errors);
	//$username = empty($_POST['username']) ? '' : strtolower(trim($_POST['username']));

	$success = isset($_GET['success']) ? $_GET['success'] : null;
	
	if (isset($success) === true && empty($error) === true){
		$view->show('action_list');
		$view->show('new_user');
	} else {
		$view->show('register_form', $errors);
	}	
	
	$view->show('footer');

?>