<?php

$string = file('chat.txt');
$size = sizeof($string);

for($i = $size - 1; $i > $size - 5; $i--)
{
	echo $string[$i];
}

?>
