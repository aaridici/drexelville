<?
if(isset($_COOKIE["username"]) && isset($_COOKIE["password"]))
{
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="stylesheet.css" rel="stylesheet" type="text/css" />
<title>
<?
require('dbconfig.php');
$sitesqlr = "SELECT * FROM tb_config";
$siteresultr = mysql_query($sitesqlr);        
$sitemyrowr = mysql_fetch_array($siteresultr);
$siteName=$sitemyrowr["title"];
echo $siteName;
mysql_close();
?></title>
<style type="text/css">
<!--
.style1 {
	font-size: 80px;
	font-family: Algerian;
}
body {
	background-color: #CECECE;
	font-family: calibri;
}
.style4 {color: #006600}
-->
</style>
</head>

<body>
<div class="style1" id="header">DrexelVille</div>
<div id="inside2">
<div id="nested2">
  <p><h2 class="style4">Welcome to DrexelVille</h2>
  <table width="100%"><tr><td width="25%"></td><td width="50%">
<?
require('dbconfig.php');
	$username = $_COOKIE["username"];
	$sql = "SELECT * from tb_users WHERE username = '$username'";
	$req = mysql_query($sql) or die();
	$data = mysql_fetch_array($req);
	if($data['survey1']==0)
	{
	echo "Our records indicate that you haven't taken the inital survey. Before you can begin playing the game you must complete the survey. Please click <font color=blue><b><a href=\"survey1.php\">here</a></b></font> to go to the survey.<br /><center>
<div id=\"initialgamemenu\"><table cellpadding=\"4\" cellspacing=\"0\" width=\"100%\"><tr><td align=\"center\"><a href=\"survey1.php\">Survey</a></td></tr>
<tr><td align=\"center\"><a href=\"/drexelville/logout.php\">Log out</a></td></tr>
</table>
</div>
</center>";
	}else{
	include('initialgamemenu.php');
	}
	mysql_close();
?>
</td>
<td width="25%">
<table>
<tr><td colspan="2"><b>Highscores</b></td></tr>
<?
require('dbconfig.php');
$searchQuery = "SELECT * from tb_scores ORDER BY score DESC";
$req = mysql_query($searchQuery) or die();
$counter = 0;
while ($data = mysql_fetch_array($req))
{
echo "<tr>";
echo "<td>".$data["username"]."</td>";
echo "<td>".round($data["score"])."</td>";
echo "</tr>";
if($counter>4){
break;
}
$counter++;
}
mysql_close();
?>
</table>
</td>
</tr>
</table>
</div>
</div>
<div id="footer">
<? include('footer.php'); ?>
</div>
</body>
</html>
<?
}
?>