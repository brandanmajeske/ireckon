<?php 
	//start session to track $_SESSION[] variables
	session_start();
	require_once 'conf.inc.php';
	require_once 'View.php';
	$view = new View();
	
	$view->show('header');
	$view->show('actions_list');
	$view->show('about');
	$view->show('footer');

?>

