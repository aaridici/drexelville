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
<?
if(isset($_POST["thoughts"])||isset($_POST["improvement"])||isset($_POST["likes"])||isset($_POST["dislikes"]))
{
require('dbconfig.php');
$username = $_COOKIE["username"];
$thoughts = $_POST["thoughts"];
$improvement = $_POST["improvement"];
$likes = $_POST["likes"];
$dislikes = $_POST["dislikes"];
$entertainment = $_POST["entertainment"];
$difficulty = $_POST["difficulty"];
$visuals = $_POST["visuals"];
$playability = $_POST["playability"];

$query = "INSERT INTO tb_feedback (username, thoughts, improvement, likes, dislikes, difficulty, entertainment, visuals, playability) VALUES('$username', '$thoughts', '$improvement', '$likes', '$dislikes', '$difficulty', '$entertainment', '$visuals', '$playability')";
mysql_query($query) or die(mysql_error());

echo "Your feedback is submitted. Thank you.<br />";
include('initialgamemenu.php');
mysql_close();
}else{
echo "You haven't completed the feedback. Please complete and submit the feedback form first.";
}
	
?>
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