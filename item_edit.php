<?php 
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

/*$model->get_item_list();
$rows = $model->get_item_list('rows');
$view->show('todo', $rows);
$item = $model->display_item('itemdetail');*/


if(isset($_GET['delete'])){
	$item = $_GET['delete'];
	$model->delete_item($item);
	$view->show('item_deleted');
}

if(isset($_GET['itemupdate'])){
	$itemupdate = $_GET['itemupdate'];

	//print_r('UPDATE!');

	$itemupdate = $model->display_update_item($itemupdate);
	//$rows = $model->display_item('rows');
	//$view->show('single_item', $rows);
	$view->show('item_update', $itemupdate);


}

if(isset($_GET['updated'])){

	if($model->update_item()){
		$view->show('item_update_successful');
	}

}

}// end
$view->show('footer');

?>
