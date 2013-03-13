<?php

$errors = $data;
	
if(empty($errors) === false){
		echo '<ul class="error">';
		foreach($errors as $error){
			echo '<li>'.$error.'</li>';
		}
		echo '</ul>';
	}

?>

<h3>Register</h3>

<p>Please fill in all fields below.</p>
<form action="" method="post">

	<label>Username:</label>
	<input type="text" name="user_name" <?php if(isset($_POST['user_name']) === true ) {echo 'value="'.strip_tags($_POST['user_name']).'"';} ?> />

	<label>Password:</label> 
	<input type="password" name="password" />

	<label>Confirm Password:</label>
	<input type="password" name="password_confirm" />

	<label>Full Name:</label>
	<input type="text" name="full_name" <?php if(isset($_POST['full_name']) === true ) {echo 'value="'.strip_tags($_POST['full_name']).'"';} ?> />
	
	<label>Email:</label>
	<input type="text" name="email" <?php if(isset($_POST['email']) === true ) {echo 'value="'.strip_tags($_POST['email']).'"';} ?> />

	<br />
	<input type="submit" class="btn btn-primary" value="Register" />


</form>


<!-- <?php if(isset($_POST['name']) === true ) {echo 'value="'.strip_tags($_POST['name']).'"';} ?> -->