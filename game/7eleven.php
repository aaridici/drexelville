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
<?
if(isset($_GET["action"]))
{
require('dbconfig.php');
$username = $_COOKIE["username"];
$gamesqlr = "SELECT * FROM tb_game WHERE username = '$username'";
$gameresultr = mysql_query($gamesqlr);        
$gamemyrowr = mysql_fetch_array($gameresultr);

switch ($_GET["action"]){
//Chicken Wings
case 1:
if($gamemyrowr["cash"]>=3)
{
$random = rand(5, 15);
$price = 3;
$newMoney = $gamemyrowr["cash"] - $price;
$newHunger = $gamemyrowr["hunger"] + $random;
if($newHunger>100)
{
$newHunger = 100;
}
$moodRandom = floor($random/2);
$newMood = $gamemyrowr["mood"] + $moodRandom;
if($newMood>100)
{
$newMood = 100;
}

$multiplier = $gamemyrowr["multiplier"];
$addToScore = $multiplier * ($moodRandom*2 + $random);
if($addToScore<0){
$addToScore = 0;
}
$newScore = $gamemyrowr["score"] + $addToScore;

$sql = "UPDATE tb_game set cash = '$newMoney', hunger = '$newHunger', mood = '$newMood', score = '$newScore' WHERE username = '$username'";
$req = mysql_query($sql) or die();

$outPut = "<b>You got 6 pieces of chicken wings from 7-Eleven.</b>";

}else{
$outPut = "<b>You don't have enough money!</b>";
}
break;
//Coffee and Bagel
case 2:
if($gamemyrowr["cash"]>=3)
{
$random = rand(5, 10);
$price = 3;
$newMoney = $gamemyrowr["cash"] - $price;
$newHunger = $gamemyrowr["hunger"] + $random;
if($newHunger>100)
{
$newHunger = 100;
}
$moodRandom = floor($random/(1.5));
$newMood = $gamemyrowr["mood"] + $moodRandom;
if($newMood>100)
{
$newMood = 100;
}

$multiplier = $gamemyrowr["multiplier"];
$addToScore = $multiplier * ($moodRandom*2 + $random);
if($addToScore<0){
$addToScore = 0;
}
$newScore = $gamemyrowr["score"] + $addToScore;

$sql = "UPDATE tb_game set cash = '$newMoney', hunger = '$newHunger', mood = '$newMood', score = '$newScore' WHERE username = '$username'";
$req = mysql_query($sql) or die();

$outPut = "<b>You got a cup of coffee and a cream cheese bagel from 7-Eleven. Yum yum yum!</b>";

}else{
$outPut = "<b>You don't have enough money!</b>";
}
break;
//Doughnut
case 3:
if($gamemyrowr["cash"]>=1)
{
$random = rand(1, 3);
$price = 1;
$newMoney = $gamemyrowr["cash"] - $price;
$newHunger = $gamemyrowr["hunger"] + $random;
if($newHunger>100)
{
$newHunger = 100;
}
$moodRandom = $random * 2;
$newMood = $gamemyrowr["mood"] + $moodRandom;
if($newMood>100)
{
$newMood = 100;
}

$multiplier = $gamemyrowr["multiplier"];
$addToScore = $multiplier * ($moodRandom*2 + $random);
if($addToScore<0){
$addToScore = 0;
}
$newScore = $gamemyrowr["score"] + $addToScore;

$sql = "UPDATE tb_game set cash = '$newMoney', hunger = '$newHunger', mood = '$newMood', score = '$newScore' WHERE username = '$username'";
$req = mysql_query($sql) or die();

$outPut = "<b>Oh my! This is so good!</b>";

}else{
$outPut = "<b>You don't have enough money!</b>";
}
break;
default:
break;
}
//Game mechanism
if($gamemyrowr["mood"]<=0||$gamemyrowr["hunger"]<=0||$gamemyrowr["gpa"]<(1.00))
{
$finalScore = $newScore + $gamemyrowr["gpa"]*10 + $gamemyrowr["cash"];
$query = "INSERT INTO tb_scores (username, score) VALUES('$username', '$finalScore')";
mysql_query($query) or die(mysql_error());

$sqlQ = "DELETE FROM tb_game where username = '$username'";
$reqQ = mysql_query($sqlQ) or die();

$sql1 = "UPDATE tb_users set gameinprogress ='0' WHERE username = '$username'";
$req1 = mysql_query($sql1) or die();

if($finalScore>2000)
{
$outPut = "<b>Oh wow, game is over. What a game though. You scored ".$finalScore." points.</b>";
}else{
$outPut = "<b>Game is over. You scored ".$finalScore." points.</b>";
}
}
mysql_close();
}
?>
<div id="mainsmall">
<table width="900px" height="250px">
<tr><td width="20px"></td><td align="left"><? include('gamemenu.php'); ?> </td>
  <td align="right"><? include('status.php'); ?></td><td width="20px"></td>
</tr>
<tr>
<td width="20px"></td>
<td colspan="2" align="center">

<table id="innerTable" width="100%">
<tr><td valign="top" width="300" rowspan="6"><img src="images/seven_eleven_sm.jpg" width="280" height="169" /></td>
<td><h3 align="center">7-Eleven</h3></td>
</tr>
<tr>
<td><div align="center"><a href="7eleven.php?action=1">Buy Chicken Wings </a></div></td>
</tr>
<tr>
  <td><div align="center"><a href="7eleven.php?action=2">Grab a Coffee &amp; a Cream Chese Bagel </a></div></td>
</tr>
<tr>
  <td><div align="center"><a href="7eleven.php?action=3">Get a Doughnut </a></div></td>
</tr>
<tr>
  <td>&nbsp;</td>
</tr>
<tr>
<td><div align="center"> 
<?
echo "$outPut";
?></td>
</tr>
</table></td>
<td width="20"></td>
</tr>
</table>
</div>
<? include('footer.php'); ?>
</body>
</html>
<?
}
?>