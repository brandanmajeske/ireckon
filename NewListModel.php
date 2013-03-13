<?php
class NewListModel {

	public $db;
	public function __construct($dsn, $user, $pass) {
		$this->db = new \PDO($dsn, $user, $pass);
		$this->db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
	}


	public function add_list_item(){
						
		//$errors = array();
		
		if(empty($_POST) === false){
			$required_fields = array('item_title', 'category', 'item_text');
			//echo '<pre>', print_r($_POST, true), '</pre>';

			foreach($_POST as $key=>$value) {
						if (empty($value) && in_array($key, $required_fields) === true) {
							$errors[] = 'Please fill out all fields';

							break;
				}
				
			}

			//return $errors;	
		}


		if(empty($_POST) === false && empty($errors) === true){

			$user_name 	= isset($_SESSION['username']) ? $_SESSION['username'] : null;
			$category 	= isset($_POST['category']) ? htmlentities($_POST['category']) : null;
			$item_title = isset($_POST['item_title']) ? htmlentities($_POST['item_title']) : null;
			$item_text = isset($_POST['item_text']) ? htmlentities($_POST['item_text']) : null;

			$statement = $this->db->prepare("
				INSERT INTO items (`user_name`,`category`,`item_title`, `item_text`) 
				VALUES ('$user_name', '$category', '$item_title', '$item_text');
				");
			
			try {
				if ($statement->execute()){
				header('Location: new_list.php?list_updated');
				}
			}
			catch(\PDOException $e){
				echo $e->getMessage();
			}

		}// end errors_empty

	}// end add_list

}// end class