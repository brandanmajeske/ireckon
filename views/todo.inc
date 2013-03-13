<?php

echo '<h3>Your To-Do List Items</h3>';
echo '<p>Click on an item to view the details.</p>';

$rows = $data;
foreach ($rows as $num => $row){
$item = $row['item_title'];
echo "<a class='list_item' href='listdisplay.php?itemdetail=". htmlentities($item)."'><i class='icon-arrow-right'></i>".' '.$item."</a>" . "<br /> ";
}

