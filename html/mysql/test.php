<?php

if(isset($_POST{'mail'}))
{
	$mail = $_POST{'mail'};
	if(isset($_POST{'password'}))
	{
		$password = $_POST{'password'};
	}
	else
	{
		$password = "****";
	}
	echo "mail=$mail<br>";
	echo "password=$password<br>";
	$query =
	"INSERT INTO $db.$tbl("
		.  "create_date"
		.", mail"
		.", password"
	.") VALUES("
		.  "now()"
		.", '$mail'"
		.", '$password'"
	.")";
	mysql_query($query) or die(mysql_error()."<br>\n$query");
}

echo "<form method=\"POST\" action=\"".$_SERVER['PHP_SELF']."\">\n";
echo "<input type=\"text\" name=\"mail\">\n";
echo "<input type=\"text\" name=\"password\">\n";
echo "<input type=\"submit\"><br>\n";
echo "</form>\n";

if(isset($_REQUEST['cmd']))
{
	$cmd = $_REQUEST['cmd'];
	echo "cmd=$cmd<br>";
}


$query = "desc $db.$tbl";
$result = mysql_query($query) or die(mysql_error());
$rows = mysql_num_rows($result);
echo "rows:".$rows."<br>\n";
echo "<tr>\n";
while($row=mysql_fetch_assoc($result))
{
	$field = $row['Field'];
	echo "<td>$field</td>\n";
}
echo "</tr>\n";

//$query = "select * from $db.$tbl order by id limit 256";
$query = "select * from $db.$tbl where user_id > 0 order by timestamp desc limit 256";
//$query = "select * from $db.$tbl where user_id is null and count < 10 order by id limit 256";
$result = mysql_query($query) or die(mysql_error());

$rows = mysql_num_rows($result);
echo "rows:".$rows."<br>\n";


echo "<hr>\n";
echo '#'.htmlspecialchars('/"/', ENT_QUOTES)."#<br>\n";
echo '#'.htmlspecialchars('a.ozuka@gmail.com', ENT_QUOTES)."#<br>\n";

?>
