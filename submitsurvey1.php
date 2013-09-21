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
if(isset($_POST["gender"]))
{
require('dbconfig.php');
$username = $_COOKIE["username"];
$gender = $_POST["gender"];
$age = $_POST["age"];
$year = $_POST["year"];
$stresslevel = $_POST["stresslevel"];
$importance = $_POST["importance"];
$subject1 = $_POST["subject1"];
$subject2 = $_POST["subject2"];
$subject3 = $_POST["subject3"];
$subject4 = $_POST["subject4"];
$subject5 = $_POST["subject5"];
$subject6 = $_POST["subject6"];
$grade1 = $_POST["grade1"];
$grade2 = $_POST["grade2"];
$grade3 = $_POST["grade3"];
$grade4 = $_POST["grade4"];
$grade5 = $_POST["grade5"];
$grade6 = $_POST["grade6"];

$query = "INSERT INTO tb_survey (username, gender, year, age, stresslevel, importance, subject1, subject2, subject3, subject4, subject5, subject6, grade1, grade2, grade3, grade4, grade5, grade6) VALUES('$username', '$gender', '$year', '$age', '$stresslevel', '$importance', '$subject1', '$subject2', '$subject3', '$subject4', '$subject5', '$subject6', '$grade1', '$grade2', '$grade3', '$grade4', '$grade5', '$grade6')";
mysql_query($query) or die(mysql_error());

$sql = "UPDATE tb_users set survey1 = '1' WHERE username = '$username'";
$req = mysql_query($sql) or die();

echo "Your survey is submitted. Thank you.<br />";
include('initialgamemenu.php');
mysql_close();
}else{
echo "You haven't completed the survey. Please complete and submit the survey first.";
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