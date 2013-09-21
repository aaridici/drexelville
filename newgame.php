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
<script type="text/javascript">
function toggleEasyForward(){
document.getElementById("easy").style.display = 'block';
document.getElementById("moderate").style.display = 'none';
document.getElementById("hard").style.display = 'none';
}
function toggleModerateForward(){
document.getElementById("easy").style.display = 'none';
document.getElementById("moderate").style.display = 'block';
document.getElementById("hard").style.display = 'none';
}
function toggleHardForward(){
document.getElementById("easy").style.display = 'none';
document.getElementById("moderate").style.display = 'none';
document.getElementById("hard").style.display = 'block';
}
function toggleAllBackward(){
document.getElementById("easy").style.display = 'none';
document.getElementById("moderate").style.display = 'none';
document.getElementById("hard").style.display = 'none';
}
</script>
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
<div id="inside">
<div id="nested">
  <p><h2 class="style4">New Game Options</h2><br>
  <table width="100%">
  <tr>
  <td width="200px"></td>
  <td valign="middle"><br /><br />
  <? 
  include('newgamemenu.php');
  echo "<br />";
  require('dbconfig.php');
  $username = $_COOKIE["username"];
  $checkIfGameExists = mysql_query("SELECT * FROM tb_game WHERE username = '$username'");
  $checkResult = mysql_num_rows($checkIfGameExists);
  if($checkResult>0) {
  echo "<font color=Red>You have a game in progress. If you start a new game, your progress will be lost.</font><br><br><br>";
  }
  mysql_close();
  ?>
  </td>
  <td width="200px">
  <div id="easy" style="display:none; border:thin; border-style:dashed; background-color:#E5E5E5;">
  <?
	require('dbconfig.php');
	$gamesqlr = "SELECT * FROM tb_levels WHERE level = 'easy'";
	$gameresultr = mysql_query($gamesqlr);        
	$gamemyrowr = mysql_fetch_array($gameresultr);
  ?>
  <table width="100%">
  <tr>
  <td colspan="2" align="center"><b>Easy<b/></td>
  </tr>
  <tr>
  <td>GPA:</td><td><? echo $gamemyrowr["gpa"]; ?></td>
  </tr>
  <tr>
  <td>Mood:</td><td><? echo $gamemyrowr["mood"]; ?>%</td>
  </tr>
  <tr>
  <td>Hunger:</td><td><? echo $gamemyrowr["hunger"]; ?>%</td>
  </tr>
  <tr>
  <td>Cash:</td><td>$<? echo $gamemyrowr["cash"]; ?></td>
  </tr>
  <tr>
  <td>Multiplier:</td><td>x<? echo $gamemyrowr["multiplier"]; ?></td>
  </tr>
  </table>
  <?
  mysql_close();
  ?>
  </div>
  <div id="moderate" style="display:none; border:thin; border-style:dashed; background-color:#E5E5E5;">
  <?
	require('dbconfig.php');
	$gamesqlr = "SELECT * FROM tb_levels WHERE level = 'moderate'";
	$gameresultr = mysql_query($gamesqlr);        
	$gamemyrowr = mysql_fetch_array($gameresultr);
  ?>
  <table width="100%">
  <tr>
  <td colspan="2" align="center"><b>Moderate</b></td>
  </tr>
  <tr>
  <td>GPA:</td><td><? echo $gamemyrowr["gpa"]; ?></td>
  </tr>
  <tr>
  <td>Mood:</td><td><? echo $gamemyrowr["mood"]; ?>%</td>
  </tr>
  <tr>
  <td>Hunger:</td><td><? echo $gamemyrowr["hunger"]; ?>%</td>
  </tr>
  <tr>
  <td>Cash:</td><td>$<? echo $gamemyrowr["cash"]; ?></td>
  </tr>
  <tr>
  <td>Multiplier:</td><td>x<? echo $gamemyrowr["multiplier"]; ?></td>
  </tr>
  </table>
  <?
  mysql_close();
  ?>
  </div>
  <div id="hard" style="display:none; border:thin; border-style:dashed; background-color:#E5E5E5;">
  <?
	require('dbconfig.php');
	$gamesqlr = "SELECT * FROM tb_levels WHERE level = 'hard'";
	$gameresultr = mysql_query($gamesqlr);        
	$gamemyrowr = mysql_fetch_array($gameresultr);
  ?>
  <table width="100%">
  <tr>
  <td colspan="2" align="center"><b>Hard</b></td>
  </tr>
  <tr>
  <td>GPA:</td><td><? echo $gamemyrowr["gpa"]; ?></td>
  </tr>
  <tr>
  <td>Mood:</td><td><? echo $gamemyrowr["mood"]; ?>%</td>
  </tr>
  <tr>
  <td>Hunger:</td><td><? echo $gamemyrowr["hunger"]; ?>%</td>
  </tr>
  <tr>
  <td>Cash:</td><td>$<? echo $gamemyrowr["cash"]; ?></td>
  </tr>
  <tr>
  <td>Multiplier:</td><td>x<? echo $gamemyrowr["multiplier"]; ?></td>
  </tr>
  </table>
  <?
  mysql_close();
  ?>
  </div>
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