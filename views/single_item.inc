<?php

$rows = $data;

$itemdetail= $_GET['itemdetail'];

echo '<h3>Selected Item: ' . htmlentities($itemdetail). '</h3>';

foreach ($rows as $num => $row) {
	echo "<ul class='single_list_item'>
			<li><b>Item Title</b>: ".$row["item_title"]." </li>
			<li><b>Category</b>: ".$row["category"]." </li>				
			<li><b>Description</b>: ".$row["item_text"]." </li>
		</ul>";
	}