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
</head>
<body>
<div id="main">
<table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0" style="padding:0xp;">
<tr height="22px">
<td width="20"></td>
<td align="left"><? include('gamemenu.php'); ?></td>
<td align="right"><? include('status.php'); ?></td>
<td width="20"></td>
</tr>
<tr>
<td></td>
<td colspan="2" align="center">
<?
include('map.php');
?>
</td>
<td></td>
</tr>
</table>

</div>
</body>
</html>
<?
}
?>