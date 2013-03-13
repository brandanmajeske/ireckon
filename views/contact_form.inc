<?php 
	$subHeader = 'Would you like to drop us a line?';
	
	$errors = $data;

	if(isset($_GET['sent']) === true) {
		$subHeader = 'Thanks for contacting us!';
	} else {

	if(empty($errors) === false){
		echo '<ul class="error">';
		foreach($errors as $error){
			echo '<li>'.$error.'</li>';
		}
		echo '</ul>';
	}
}

	echo '<h3>'.$subHeader.'</h3>';
?>

<form action="" method="post">

	<p>
		<label for="name">Name:</label>
		<input type="text" name="name" id="name" <?php if(isset($_POST['name']) === true ) {echo 'value="'.strip_tags($_POST['name']).'"';} ?>/>
		<br />

		<label for="email">Email:</label>
		<input type="text" name="email" id="email" <?php if(isset($_POST['email']) === true ) {echo 'value="'.strip_tags($_POST['email']).'"';} ?>/>
		
		<br />
		<label for="message">Message:</label>
		<textarea name="message" id="message"><?php if(isset($_POST['message']) === true ) {echo strip_tags($_POST['message']); } ?></textarea>
		<br />
		<input type="submit" class="btn btn-primary" value="Send">

	</p>
</form>