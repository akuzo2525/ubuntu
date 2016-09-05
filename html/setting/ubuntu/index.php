<?php
echo "<html>\n";
echo "<head>\n";
echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">";
echo "<title>setting</title>";
echo "</head>\n";
echo "<body>\n";

$dir = ".";
$files = scandir($dir);
echo "<div align=center><font size=8>\n";
echo "[ubuntu]<br>\n";
foreach($files as $file)
{
	if(strpos($file, '.') === FALSE)
	{
		echo "<a href='$file'>$file</a><br>\n";
	}
}
echo "</font></div>\n";

echo "</body>\n";
echo "</html>\n";
?>
