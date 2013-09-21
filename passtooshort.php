<?
if(isset($_COOKIE["username"]) && isset($_COOKIE["password"]))
{
?>
<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=main.php">
<?
}else{
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
.style3 {font-size: 36px}
-->
</style>
</head>

<body>
<div class="style1" id="header">DrexelVille</div>
<div id="inside">
<div id="nested">
<table width="100%" height="100%">
<tr>
<td width="400px" height="350px" background="images/left.png" align="center" valign="middle"><span class="style3">LOGIN</span><br /><? include('loginform.php'); ?></td>
<td width="51px" height="350px" background="images/middle.png"></td>
<td width="403px" height="350px" background="images/right.png" align="center" valign="middle"><span class="style3">REGISTER</span><br /><? include('registerform.php'); ?><br />Your password is too short...</td>
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