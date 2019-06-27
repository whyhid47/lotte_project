<?php 
$date = date("Y-m-d H:i:s", mktime(date("m"), date("d"), date("Y"),date("H"),date("i") + 60,date("i")));
echo($date);
 ?>