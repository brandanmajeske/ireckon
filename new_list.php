<?php 
session_start();

require_once 'db.php';
require_once 'ItemModel.php';
require_once 'conf.inc.php';
require_once 'View.php';
require_once 'NewListModel.php';

if(!$_SESSION['username']){
		header('Location: auth.php');
}else{


$model = new NewListModel(MY_DSN, MY_USER, MY_PASS);	
$view = new View();

$model->add_list_item();
//$errors = $model->add_list_item('errors');

$view->show('header');
$view->show('actions_list');
$view->show('add_list');

}
$view->show('footer');
?>