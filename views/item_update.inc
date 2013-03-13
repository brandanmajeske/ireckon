<?php

$rows = $data;

$subHeader = "Update the Item: ". ($rows[0]['item_title']);

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

<form action="item_edit.php?updated" method="POST">

<p>
	<input class="hidden" type="text" name="id" id="id" <?php echo 'value="'.strip_tags(($rows[0]['id'])).'"'; ?>/>

	<label for="item_title">Item Title:</label>
	<input type="text" name="item_title" id="item_title" <?php echo 'value="'.strip_tags(($rows[0]['item_title'])).'"'; ?>/>
	<br />

	<label for="category">Category:</label>
	<input type="text" name="category" id="category" <?php echo 'value="'.strip_tags(($rows[0]['category'])).'"'; ?>/>
	
	<label for="item_text">Item Description:</label>
	<textarea name="item_text" id="item_text"><?php echo strip_tags(($rows[0]['item_text'])); ?></textarea>
	<br />
	<input type="submit" class="btn btn-primary" value="Update">

</p>
</form>