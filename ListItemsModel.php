<?php

class ListItemsModel {
	
	private $db;
	private  $result;
	public $itemdetail;
	
	public function __construct($dsn, $user, $pass) {
		$this->db = new \PDO($dsn, $user, $pass);
		$this->db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

	} // end __construct()


	public function get_item_list(){
		$username = isset($_SESSION['username']) ? $_SESSION['username'] : null;
		$statement = $this->db->prepare("
			SELECT * FROM items WHERE user_name = '$username';
			");
		try {
			if ($statement->execute()){
				$rows = $statement->fetchAll(\PDO::FETCH_ASSOC);
				return $rows;
			}
		}
		catch(\PDOException $e){
			echo "Query Failed";
		}

	} // end getItemList()

	public function display_item(){
		$username = isset($_SESSION['username']) ? $_SESSION['username'] : null;
		$itemdetail = isset($_GET['itemdetail']) ? $_GET['itemdetail'] : null;

		if(!$itemdetail){
			echo "Item Detail Query Failed: No Item Search Selected";
		}else{
			$statement = $this->db->prepare("
				SELECT * FROM items WHERE item_title like '%$itemdetail%' AND user_name = '$username';
			");
			try{
				if($statement->execute()){
					$rows = $statement->fetchAll(\PDO::FETCH_ASSOC);
					return $rows;
					
				}
			}
			catch(\PDOException $e){
				echo "Query Failed";
			}
		}
	}// end display item

	// Is this function necessary?
/*	public function set_itemdisplay($item){
		$itemdisplay = $item;
		return $itemdisplay;
	}*/


	public function display_update_item($itemupdate){
		$username = isset($_SESSION['username']) ? $_SESSION['username'] : null;
		$itemupdate = $_GET['itemupdate'];

			if(empty($itemupdate)){
			echo "Query Failed: No Item Search Selected";
			}else{

				//Statement 1 - Get the item values

			$statement = $this->db->prepare("
				SELECT * FROM items WHERE item_title like '%$itemupdate%' AND user_name = '$username';
			");
			try{
				if($statement->execute()){
					$rows = $statement->fetchAll(\PDO::FETCH_ASSOC);
					//echo '<pre>',print_r($rows),'</pre>';
					return $rows;
					
				}
			}
			catch(\PDOException $e){
				echo "Query Failed";
			}
		}

	}// end edit item 

	
	public function update_item(){

		//$fields = '`'. implode('`, `', array_keys($_POST)) . '`';
		//print_r($_POST);

		$item_id = ($_POST['id']);
		$category = ($_POST['category']);
		$item_text = ($_POST['item_text']);
		$item_title = ($_POST['item_title']);

		//echo '<pre>',$item_id,' ',$category,' ',$item_title,' ',$item_text,'</pre>';

		$statement = $this->db->prepare("

				UPDATE items SET
				category = '$category',
				item_text = '$item_text',
				item_title = '$item_title'
				WHERE items.id = '$item_id'	


			");

			try{
				if($statement->execute()){
					return TRUE;		
				}
			}
			catch(\PDOException $e){
				echo "Query Failed";
			}

	}

	public function delete_item($item){
		$username = isset($_SESSION['username']) ? $_SESSION['username'] : null;
		
		if(!$item){
			echo "Query Failed: No Item Search Selected";
			}else{
			$statement = $this->db->prepare("
				DELETE FROM items WHERE item_title like '%$item%' AND user_name = '$username';
			");
			try{
				if($statement->execute()){
					
				}
			}
			catch(\PDOException $e){
				echo "Query Failed";
			}
		}
	}
	
} // end list item model