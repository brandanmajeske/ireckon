<?php

function array_sanitize(&$item) {
	$item = mysql_real_escape_string($item);
}





?>