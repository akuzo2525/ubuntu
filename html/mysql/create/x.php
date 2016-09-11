<?php

$url="localhost";
$usr="nico";
$host="%";
$pass="";

mysql_connect('localhost','root','') or dir(mysql_error());

$query="GRANT ALL PRIVILEGES ON *.* TO '$usr'@'$host' WITH GRANT OPTION";
echo "$query\n";
$result=mysql_query($query) or die(mysql_error());
echo "result=$result\n"

mysql_close() or dir(mysql_error());

?>
