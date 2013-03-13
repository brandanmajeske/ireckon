<?php 
	$subHeader = 'Add To Your To-Do List';
	
	$errors = $data;

	if(isset($_GET['list_updated']) === true) {
		$subHeader = 'Your item has been added. Want to add another?';
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
		<label for="item_title">Item Title:</label>
		<input type="text" name="item_title" id="item_title" <?php if(isset($_POST['item_title']) === true ) {echo 'value="'.strip_tags($_POST['item_title']).'"';} ?>/>
		<br />

		<label for="category">Category:</label>
		<input type="text" name="category" id="category" <?php if(isset($_POST['category']) === true ) {echo 'value="'.strip_tags($_POST['category']).'"';} ?>/>
		
		<label for="item_text">Item Description:</label>
		<textarea name="item_text" id="item_text"><?php if(isset($_POST['item_text']) === true ) {echo strip_tags($_POST['item_text']); } ?></textarea>
		<br />
		<input type="submit" class="btn btn-primary" value="Submit">

	</p>
</form>