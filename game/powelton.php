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
//Eat Food
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
$food = floor($random/3)." slices of pizza";
}else{
$food = floor($random/2)." pieces of chicken wings";
}
$outPut = "<b>You've visited CaliPizza and enjoyed ".$food.".</b>";
}else{
$outPut = "<b>You don't have enough money!</b>";
}
break;
//PARTY!
case 2:
$random1 = rand(5, 12);
$newHunger = $gamemyrowr["hunger"] - $random1;
if($newHunger<0)
{
$newHunger = 0;
}
$random2 = rand(-10,15);
$moodRandom = $random2;
$newMood = $gamemyrowr["mood"] + $moodRandom;
if($newMood>100)
{
$newMood = 100;
}
if($newMood<0)
{
$newMood = 0;
}

$random3 = rand(10, 50);
$gpaRandom = $random3;
$newGPA = $gamemyrowr["gpa"] - ($gpaRandom/100);

$multiplier = $gamemyrowr["multiplier"];
$addToScore =  floor($multiplier * ($moodRandom*3 - $random1/2 + $gpaRandom/10));
if($addToScore<0){
$addToScore = 0;
}
$newScore = $gamemyrowr["score"] + $addToScore;

$sql = "UPDATE tb_game set hunger = '$newHunger', mood = '$newMood', gpa = '$newGPA', score = '$newScore' WHERE username = '$username'";
$req = mysql_query($sql) or die();

if($moodRandom<0)
{
$outPut = "<b>Ew! You call that a party!</b>";
}else{
$outPut = "<b>Shots shots shots shots, shots shots shots, everybody!</b>";
}

break;
//Play in the park
case 3:
$random1 = rand(5, 10);
$newHunger = $gamemyrowr["hunger"] - $random1;
if($newHunger<0)
{
$newHunger = 0;
}
$random2 = rand(0,15);
$moodRandom = $random2;
$newMood = $gamemyrowr["mood"] + $moodRandom;
if($newMood>100)
{
$newMood = 100;
}
if($newMood<0)
{
$newMood = 0;
}

$multiplier = $gamemyrowr["multiplier"];
$addToScore = $multiplier * ($moodRandom*2 + $random);
if($addToScore<0){
$addToScore = 0;
}
$newScore = $gamemyrowr["score"] + $addToScore;

$sql = "UPDATE tb_game set hunger = '$newHunger', mood = '$newMood', score = '$newScore' WHERE username = '$username'";
$req = mysql_query($sql) or die();

$outPut = "<b>Nothing beats the feeling of rolling on the grass with your friends on a sunny day.</b>";
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
<tr><td width="300" rowspan="6"><img src="images/powelton.jpg" width="275" height="161" />
<?
//image cited:http://en.wikipedia.org/wiki/File:DSC00929.jpg
?>
</td>
<td><h3 align="center">Powelton</h3></td>
</tr>
<tr>
<td><div align="center"><a href="powelton.php?action=1">Go to CaliPizza</a></div></td>
</tr>
<tr>
<td><div align="center"><a href="powelton.php?action=2">Party!</a></div></td>
</tr>
<tr>
<td><div align="center"><a href="powelton.php?action=3">Play in the Park</a></div></td>
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