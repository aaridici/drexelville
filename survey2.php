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
<form name="survey2" action="submitsurvey2.php" method="post">
<table width="100%" height="100%">
<tr>
<td width="425">Rank your current stress level<br />
  (1 being least stressed, 5 being most stressed)<br />
&nbsp;<select name="stresslevel">
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
</select></td>
<td>
If you have taken any exams after you have taken the first survey and if you know your grade please enter up to 6 exams below.<br />
<p align="center">Subject | Grade</p>
<p align="center">
<input type="text" name="subject1" />:<input type="text" name="grade1" />
<input type="text" name="subject2" />:<input type="text" name="grade2" />
<input type="text" name="subject3" />:<input type="text" name="grade3" />
<input type="text" name="subject4" />:<input type="text" name="grade4" />
<input type="text" name="subject5" />:<input type="text" name="grade5" />
<input type="text" name="subject6" />:<input type="text" name="grade6" />
</p>
</td>
</tr>
<tr>
<td width="425">How important is your stress level in relation to doing well at Drexel University?<br />
&nbsp;<select name="importance">
<option value="1">Not important at all</option>
<option value="2">Not so important</option>
<option value="3">Somewhat important</option>
<option value="4">Pretty important</option>
<option value="5">Crucial</option>
</select></td><td><center><input type="submit" value="Submit" />
</center></td>
</tr>
</table>
*All the information provided is confidential. Information provided will be treated with respect.
</form>
</div>
</div>
<div id="footer">
<? include('footer.php'); ?>
</div>
</body>
</html>