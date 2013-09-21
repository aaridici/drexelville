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
function toggleEasyBackward(){
document.getElementById("easy").style.display = 'none';
document.getElementById("moderate").style.display = 'none';
document.getElementById("hard").style.display = 'none';
}
function toggleModerateForward(){
document.getElementById("easy").style.display = 'none';
document.getElementById("moderate").style.display = 'block';
document.getElementById("hard").style.display = 'none';
}
function toggleModerateBackward(){
document.getElementById("easy").style.display = 'none';
document.getElementById("moderate").style.display = 'none';
document.getElementById("hard").style.display = 'none';
}
function toggleHardForward(){
document.getElementById("easy").style.display = 'none';
document.getElementById("moderate").style.display = 'none';
document.getElementById("hard").style.display = 'block';
}
function toggleHardBackward(){
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
<div id="inside2">
<div id="nested2">
  <p><h2 class="style4">New Easy Game</h2><br>
  <div id="gameinitializer" style="text-align:center">
  <form action="newgamec.php" method="post">
  <input type="submit" value="Start" /><br />
  <? include('backbutton.php'); ?>
  <input type="hidden" value="easy" name="level" />
  </form>
  Click start to begin a new easy game.
  </div>
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