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
//Chick fil a
case 1:
if($gamemyrowr["cash"]>=5)
{
$random = rand(5, 15);
if($gamemyrowr["cash"]<$random)
{
$random = 5;
}
$newMoney = $gamemyrowr["cash"] - $random;
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

if($random%2==0)
{
$food = floor($random/3)." pieces of chicken nuggets";
}else{
$food = floor($random/2)." a CharGrilled";
}
$outPut = "<b>You've visited Chick-fil-A and enjoyed ".$food.".</b>";
}else{
$outPut = "<b>You don't have enough money!</b>";
}
break;
//Currito
case 2:
if($gamemyrowr["cash"]>=5)
{
$random = rand(5, 15);
if($gamemyrowr["cash"]<$random)
{
$random = 5;
}
$newMoney = $gamemyrowr["cash"] - $random;
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

if($random%4==0)
{
$food = floor($random/3)." a nice Burrito";
}else{
if($random%4==1)
{
$food = floor($random/2)." a Custom Bowl";
}else{
if($random%4==2)
{
$food = floor($random/2)." a large Smoothie";
}
else{
$food = floor($random/2)." a nice snack Burrito";
}
}
}
$outPut = "<b>You've visited Currito and enjoyed ".$food.".</b>";
}else{
$outPut = "<b>You don't have enough money!</b>";
}

break;
//Subway
case 3:
if($gamemyrowr["cash"]>=5)
{
$random = 5;
$newMoney = $gamemyrowr["cash"] - $random;
$newHunger = $gamemyrowr["hunger"] + $random*2;
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

if($random%4==0)
{
$food = floor($random/3)." a foot long Cordon Blue";
}else{
if($random%4==1)
{
$food = floor($random/2)." a six inch Turkey sub with two chocolate cookies";
}else{
if($random%4==2)
{
$food = floor($random/2)." a Meatball Marinara on a foot long italian bread";
}
else{
$food = floor($random/2)." a foot long Chicken Teriyaki";
}
}
}
$outPut = "<b>You've visited Subway and enjoyed ".$food.".</b>";
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
<tr><td width="300" rowspan="6"><img src="images/northside.jpg" width="200" height="150" />
<?
//image cited:http://en.wikipedia.org/wiki/File:DSC00929.jpg
?>
</td>
<td><h3 align="center">Northside Dining Terrace </h3></td>
</tr>
<tr>
<td><div align="center"><a href="northside.php?action=1">Go to Chickfila </a></div></td>
</tr>
<tr>
<td><div align="center"><a href="northside.php?action=2">Go to Currito</a></div></td>
</tr>
<tr>
<td><div align="center"><a href="northside.php?action=3">Go to Subway</a></div></td>
</tr>
<tr>
<td></td>
</tr>
<tr>
<td align="center">
<?
echo "$outPut";
?>
</td>
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