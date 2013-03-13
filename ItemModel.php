<?php

class ItemModel {
	
	private $db;
	private  $result;

	
	public function __construct($dsn, $user, $pass) {
		$this->db = new \PDO($dsn, $user, $pass);
		$this->db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

	} // end __construct()


	public function getItemList(){
		$statement = $this->db->prepare("
			SELECT * FROM item
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

	public function displayItem(){
		$itemsearch = $_GET['itemsearch'];

		if(!$itemsearch){
			echo "Query Failed: No Item Search Selected";
		}else{
			$statement = $this->db->prepare("
				SELECT * FROM item WHERE itemtitle like '%$itemsearch%'
			");
			try{
				if($statement->execute()){
					$rows = $statement->fetchAll(\PDO::FETCH_ASSOC);
				}
			}
			catch(\PDOException $e){
				echo "Query Failed";
			}

			if(is_array($rows)){
				
				echo '<br/><h4>This is the item selected: ' . htmlentities($itemsearch). '</h4> <br />';
				
				foreach ($rows as $num => $row) {
					$dbdate = $row["itemdate"];
					$newdate = strtotime($dbdate);
						echo "<ul class=\"list\">
							<li><b>Item#</b>: ".$row["id"]." </li>
							<li><b>Category</b>: ".$row["itemtitle"]." </li>				
							<li><b>Date</b>: ".date("F d, Y", $newdate)." </li>
							<li><b>Description</b>: ".$row["itemtext"]." </li>
						</ul>";
					}
				}
			}
		}
	
}