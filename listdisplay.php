<?php 
	session_start();
	//Connect to database
	require_once 'db.php';
	require_once 'View.php';
	require_once 'ListItemsModel.php';


	if(!$_SESSION['username']){
		header('Location: auth.php');
	}


	$model = new ListItemsModel(MY_DSN, MY_USER, MY_PASS);
	$view = new View();
	$view->show('header');
	$view->show('actions_list');

	$itemdetail = isset($_GET['itemdetail'])? $_GET['itemdetail'] : null;
	

	$model->display_item();
	$rows = $model->display_item('rows');
	$view->show('single_item', $rows);
	$view->show('list_edit', $itemdetail);
	
	//if(isset($_GET['']))



	$view->show('footer');

?>



