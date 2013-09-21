<?
$username = $_GET["username"];
require('dbconfig.php');

$query = mysql_query("SELECT password FROM tb_users WHERE username = '$username'") or die(mysql_error());
$row = mysql_fetch_array($query);
$password = $row["password"];
setcookie("username",$username,time()+864000);
setcookie("password",$password,time()+864000);
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
  <p><h2 class="style4">Registration succesfull!</h2>
  <p><br />
    However, before you begin playing the game we ask you to complete a survey.
    </p>
 </p>
  <p>Please click <a href="survey1.php"><i><b>here</b></i></a> to take the survey.      <br />
    </p>
</div>
</div>
<div id="footer">
<? include('footer.php'); ?>
</div>
</body>
</html>