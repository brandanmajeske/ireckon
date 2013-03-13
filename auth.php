<?php 
session_start();

require_once "db.php"; 
require_once "AuthModel.php";
//require_once "AuthView.php";
require_once 'conf.inc.php';
require_once 'View.php';

$model = new AuthModel(MY_DSN, MY_USER, MY_PASS);
$view = new View();

$username = empty($_POST['username']) ? '' : strtolower(trim($_POST['username']));
$password = empty($_POST['password']) ? '' : trim($_POST['password']);

if(isset($_SESSION['username'])){
	$user = '';
	$contentPage = 'success';
}else{			
	$user = '';
	$contentPage = 'login_form';
}



if (!empty($username) && !empty($password)) {
	$user = $model->getUserByNamePass($username, $password);
	if (is_array($user)) {
		$contentPage = 'success';
		$_SESSION['username'] = $username;

		}
	}

$view->show('header');
if (!isset($_SESSION['username'])){
	$view->show($contentPage, $user);
} else if(isset($_SESSION['username'])){
	$view->show('actions_list');
	$view->show($contentPage, $user);
}
$view->show('footer');