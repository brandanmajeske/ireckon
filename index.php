<?php 
	//start session to track $_SESSION[] variables
	session_start();

	//Connect to the database
	require_once 'db.php';
	require_once 'ItemModel.php';
	require_once 'conf.inc.php';
	require_once 'View.php';
	require_once 'ListItemsModel.php';


	if(!$_SESSION['username']){
		header('Location: auth.php');

	}else{

	$model = new ListItemsModel(MY_DSN, MY_USER, MY_PASS);
	$view = new View();
	
	$view->show('header');
	$view->show('actions_list');
	
	$model->get_item_list();
	$rows = $model->get_item_list('rows');
	$view->show('todo', $rows);
	

	// call function to show results of query
	//$model->getItemList();
	}
	$view->show('footer');

?>

