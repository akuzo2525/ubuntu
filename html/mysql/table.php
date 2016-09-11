<?php

//$host = "mysql526.db.sakura.ne.jp";
$host = "localhost";
$user = "root";
$pass = "";
//$db = "cotuvideo_test";
//$tbl = "co";

print_r($_POST);
print_r($_REQUEST);
if(!isset($_POST{'table'}))
{
//	exit(0);
}
if(!isset($_REQUEST['database']))
{
	exit(0);
}
$database = $_REQUEST['database'];

mysql_connect($host, $user, $pass) or die(mysql_error());
//mysql_query("set names utf8") or die(mysql_error());
//mysql_select_db($db) or die(mysql_error());

echo "<html>\n";

echo "<head>\n";
echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">\n";
echo "<title>$table</title>\n";
echo "</head>\n";

echo "<body>\n";

$self = basename($_SERVER['PHP_SELF']);
echo "<h1><a href=\"$self?database=$database\">reload</a></h1>\n";

echo "<a href='http://akuzo.xyz:6080/nico/account' target=_blank>$table</a><br>";

$query = "SHOW TABLES FROM $database";
$result = mysql_query($query) or die(mysql_error());

$rows = mysql_num_rows($result);
echo "rows:".$rows."<br>\n";

echo "<table border=1>\n";

$cnt = 0;
while($row = mysql_fetch_assoc($result))
{
	if($cnt == 0)
	{
		echo "<tr>\n";
		$keys = array_keys($row);
		foreach($keys as $k)
		{
			echo "<td>\n";
			echo $k;
			echo "</td>\n";
		}
		echo "</tr>\n";
	}

	echo "<tr>\n";
	foreach($row as $key => $value)
	{
		echo "<td>\n";
		echo "<a href=\"select.php?database=$database&table=$value\" target=\"_blank\">".$value."</a>\n";
		echo "</td>\n";
	}
/*
	$timestamp = $row['timestamp'];
	$create_date = $row['create_date'];
	$co = $row['co'];
	$community_name = $row['community_name'];
	$user_id = $row['user_id'];
	$nickname = $row['nickname'];
	$image = $row['image'];
	$kaisetsu = $row['kaisetsu'];
	$count = $row['count'];

	echo "<td>$timestamp</td>\n";
	echo "<td>$create_date</td>\n";
	echo "<td><a href=\"http://com.nicovideo.jp/community/co$co\" target=\"_blank\">".$co."</a></td>\n";
	echo "<td>$community_name</td>\n";
	echo "<td>$user_id</td>\n";
	echo "<td>$nickname</td>\n";
	echo "<td>$image</td>\n";
	echo "<td>$kaisetsu</td>\n";
	echo "<td>$count</td>\n";

	$user_session = 'user_session=user_session_29807220_9f497eb58e03d26c6057c4a3b52698bab6030f815f89bbd5dce4db3d90d6e080';
	echo "<td>\n";
	echo "<img src=\"$image\">";
	echo "</td>\n";

	echo "<td>\n";
	echo "<form method=\"POST\" action=\"login.php\">\n";
	echo "<input type=\"hidden\" name=\"id\" value=\"$id\">\n";
	echo "<input type=\"submit\" value=\"login\">\n";
	echo "</form>\n";
	echo "</td>\n";

	$url = "http://com.nicovideo.jp/community/$co";
	echo "<td>\n";
	echo "<form method=\"POST\" action=\"community.php\">\n";
	echo "<input type=\"hidden\" name=\"id\" value=\"$id\">\n";
	echo "<input type=\"hidden\" name=\"url\" value=\"$url\">\n";
	echo "<input type=\"hidden\" name=\"session\" value=\"$user_session\">\n";
	echo "<input type=\"submit\" value=\"co\">\n";
	echo "</form>\n";
	echo "</td>\n";
*/
	echo "</tr>\n";
	$cnt++;
}
echo "</table>\n";
mysql_free_result($result);
mysql_close() or die(mysql_error());

echo "</body>\n";

echo "</html>\n";

?>
