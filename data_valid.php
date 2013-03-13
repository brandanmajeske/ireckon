<?php 

require_once 'general.php';

function user_exists($username) {

	$db = new \PDO(MY_DSN, MY_USER, MY_PASS);
	$db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
	$statement = $db->prepare("
		SELECT * FROM users WHERE user_name ='$username';
		");

	try {
		if ($statement->execute()){
			$result = $statement->fetch(\PDO::FETCH_BOUND);
			return $result;
			}
		}
	catch(\PDOException $e){
		echo "Query Failed";
		}
}


function email_exists($email) {

	$db = new \PDO(MY_DSN, MY_USER, MY_PASS);
	$db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
	$statement = $db->prepare("
		SELECT * FROM users WHERE email ='$email';
		");

	try {
		if ($statement->execute()){
			$result = $statement->fetch(\PDO::FETCH_BOUND);
			return $result;
			}
		}
	catch(\PDOException $e){
		echo "Query Failed";
		}

}

function register_user($register_data){
	$db = new \PDO(MY_DSN, MY_USER, MY_PASS);
	$db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
	
	
	//$register_data['password'] = md5($register_data['password'].$register_data['salt']);
	$user_name =  strtolower($register_data['user_name']);
	$salt = $register_data['salt'];
	$password = $register_data['password'];
	$email = strtolower($register_data['email']);
	$full_name = strtolower($register_data['full_name']);

	$fields = '`'. implode('`, `', array_keys($register_data)) . '`';
	

	$statement = $db->prepare("
		INSERT INTO users ($fields) 
		VALUES ('$user_name', MD5(CONCAT('$salt', '$password')), 
			'$full_name', '$salt', '$email');
		");

	try {
		if ($statement->execute()){
			//echo 'User Regration Successful!';
			header('Location: register.php?success');
			}
		}
	catch(\PDOException $e){
		echo $e->getMessage();
	}
}

