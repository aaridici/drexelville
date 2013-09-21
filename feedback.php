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
<div id="inside3">
<div id="nested3">
<form name="feedback" action="submitfeedback.php" method="post">
<h2>Feedback</h2>
<h3>We appreciate your thoughts on our game. We would like to improve our game according to the feedback you'll give us. Thank you.</h3>
<table width="100%">
<tr>
<td width="50%">Your initial thoughts:</td>
<td width="50%">Areas to improve:</td>
</tr>
<tr>
<td><div align="center">
  <textarea name="thoughts" rows="5" cols="40"></textarea>
</div></td>
<td><div align="center">
  <textarea name="improvement" rows="5" cols="40"></textarea>
</div></td>
</tr>
<tr>
<td><div align="left">Things you liked the most:</div></td>
<td><div align="left">Things annoyed you the most:</div></td>
</tr>
<tr>
<td><div align="center">
  <textarea name="likes" rows="5" cols="40"></textarea>
</div></td>
<td><div align="center">
  <textarea name="dislikes" rows="5" cols="40"></textarea>
</div></td>
</tr>
<tr>
<td colspan="2">How would you rate our game (1 being the least, 5 being the most)</td>
</tr>
<tr>
<td>
  <div align="justify">Difficulty:
    <select name="difficulty">
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
      <option value="5">5</option>
    </select>
    <br />
    Entertainment:
  <select name="entertainment">
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
    <option value="5">5</option>
  </select>
  <br />
  </div></td>
<td>
  <div align="justify">Visuals:
    <select name="visuals">
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
      <option value="5">5</option>
    </select>
    <br />
    Playability:
  <select name="playability">
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
    <option value="5">5</option>
  </select>
  </div></td>
</tr>
</table>
<p align="right"><input type="submit" value="Submit" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
<p align="right"><? include('backbutton.php'); ?></p>
</form>

</div>
</div>
<div id="footer">
<? include('footer.php'); ?>
</div>
</body>
</html>