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
//Dine at Hans
case 1:
$random = rand(5, 20);
$newHunger = $gamemyrowr["hunger"] + $random;
if($newHunger>100)
{
$newHunger = 100;
}
$moodRandom = ceil(-1*$random);
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

$sql = "UPDATE tb_game set hunger = '$newHunger', mood = '$newMood', score = '$newScore' WHERE username = '$username'";
$req = mysql_query($sql) or die();

if($random==-5)
{
$outPut = "<b>International cuisine at Hans today, but I shouldn't have had that many tacos!</b>";
}else{
if($random%3==0||3)
{
$outPut = "<b>Pizza and pasta... again!</b>";
}
if($random%3==1)
{
$outPut = "<b>Lo Mein! Hmmm, delicious.</b>";
}
if($random%3==2)
{
$outPut = "<b>Burgers, grilled cheese and french fries. So greasy...</b>";
}
}

break;
//Creese Cafe
case 2:
if($gamemyrowr["cash"]>=3)
{
$random1 = rand(4, 8);
$newHunger = $gamemyrowr["hunger"] + $random1;
if($newHunger>100)
{
$newHunger = 100;
}
$random2 = rand(5,10);
$moodRandom = $random2;
$newMood = $gamemyrowr["mood"] + $moodRandom;
if($newMood>100)
{
$newMood = 100;
}

$newCash = $gamemyrowr["cash"] - 3;

$multiplier = $gamemyrowr["multiplier"];
$addToScore = floor($multiplier * ($moodRandom*3 - $random1/2));
if($addToScore<0){
$addToScore = 0;
}
$newScore = $gamemyrowr["score"] + $addToScore;

$sql = "UPDATE tb_game set hunger = '$newHunger', mood = '$newMood', cash = '$newCash', score = '$newScore' WHERE username = '$username'";
$req = mysql_query($sql) or die();

if($moodRandom>6)
{
$outPut = "<b>Strawberry's and Banana. Awesome!</b>";
}else{
$outPut = "<b>Smoothies at Creese Cafe never dissappoints.</b>";
}
}else{
$outPut = "<b>You don't have enough money.</b>";
}

break;
//Mandell
case 3:
$random1 = rand(5, 8);
$newHunger = $gamemyrowr["hunger"] - $random1;
if($newHunger<0)
{
$newHunger = 0;
}
$random2 = rand(-10,10);
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
$addToScore = floor($multiplier * ($moodRandom*3 - $random1/2));
if($addToScore<0){
$addToScore = 0;
}
$newScore = $gamemyrowr["score"] + $addToScore;

$sql = "UPDATE tb_game set hunger = '$newHunger', mood = '$newMood', score = '$newScore' WHERE username = '$username'";
$req = mysql_query($sql) or die();

if($random2>0)
{
$outPut = "<b>Awesome play! I wonder what they're going to perform next.</b>";
}else{
$outPut = "<b>Zzzz... Oh what, it's over! (Clap clap)</b>";
}

break;

//Bookstore
case(4):
$random1 = rand(1, 4);
$newHunger = $gamemyrowr["hunger"] - $random1;
if($newHunger<0)
{
$newHunger = 0;
}

$random2 = rand(10,40);
if($gamemyrowr["cash"]>$random2)
{
$newCash = $gamemyrowr["cash"] - $random2;
if($random2>30)
{
$random3 = rand(-5,0);
$outPut = "<b>Holy! ".$random2." bucks for a book!</b>";
}else{
$outPut = "<b>Lets hope that I can carry all of these back.</b>";
$random3 = rand(0,5);
}
$moodRandom = $random3;
$newMood = $gamemyrowr["mood"] + $moodRandom;
if($newMood>100)
{
$newMood = 100;
}
if($newMood<0)
{
$newMood = 0;
}
}else{
$outPut = "<b>Ow man! You don't have enough money!</b>";
$moodRandom = -5;
$newMood = $gamemyrowr["mood"] + $moodRandom;
if($newMood>100)
{
$newMood = 100;
}
if($newMood<0)
{
$newMood = 0;
}
$newCash = $gamemyrowr["cash"];
}

$multiplier = $gamemyrowr["multiplier"];
$addToScore = $multiplier * ($moodRandom*2 + $random);
if($addToScore<0){
$addToScore = 0;
}
$newScore = $gamemyrowr["score"] + $addToScore;

$sql = "UPDATE tb_game set hunger = '$newHunger', mood = '$newMood', cash = '$newCash', score = '$newScore' WHERE username = '$username'";
$req = mysql_query($sql) or die();

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
<tr><td width="300" rowspan="7"><img src="images/hans.jpg" width="263" height="168" />
<?
//image cited:http://en.wikipedia.org/wiki/File:DSC00929.jpg
?>
</td>
<td><h3 align="center">Hans, Creese and MacAlister </h3></td>
</tr>
<tr>
<td><div align="center"><a href="hansandcreese.php?action=1">Dine at Hans</a></div></td>
</tr>
<tr>
<td><div align="center"><a href="hansandcreese.php?action=2">Get a Smoothie from Creese Cafe</a></div></td>
</tr>
<tr>
<td><div align="center"><a href="hansandcreese.php?action=3">See a Play at Mandell Theater</a></div></td>
</tr>
<tr>
  <td><div align="center"><a href="hansandcreese.php?action=4">Go to the Bookstore</a></div></td>
</tr>
<tr>
<td></td>
</tr>
<tr>
<td align="center">
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