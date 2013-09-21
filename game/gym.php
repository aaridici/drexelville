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
//Exercise
case 1:
$random1 = rand(5, 10);
$newHunger = $gamemyrowr["hunger"] - $random1;
if($newHunger<0)
{
$newHunger = 0;
}
$random2 = rand(2,6);
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
$addToScore = $multiplier * ($moodRandom*2 - floor($random1/4));
if($addToScore<0){
$addToScore = 0;
}
$newScore = $gamemyrowr["score"] + $addToScore;

$sql = "UPDATE tb_game set hunger = '$newHunger', mood = '$newMood', score = '$newScore' WHERE username = '$username'";
$req = mysql_query($sql) or die();

if($random2>5)
{
$outPut = "<b>Getting back in shape. I feel good</b>";
}else{
if($random2%2)
{
$outPut = "<b>50 more than I'll be done!</b>";
}else{
$outPut = "<b>Oh I feel a lot better. Now I need a drink!</b>";
}
}
break;
//Play basketball
case 3:
$random1 = rand(10, 14);
$newHunger = $gamemyrowr["hunger"] - $random1;
if($newHunger<0)
{
$newHunger = 0;
}
$random2 = rand(5,20);
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
$addToScore = $multiplier * ($moodRandom*2 - floor($random1/4));
if($addToScore<0){
$addToScore = 0;
}
$newScore = $gamemyrowr["score"] + $addToScore;

$sql = "UPDATE tb_game set hunger = '$newHunger', mood = '$newMood', score = '$newScore' WHERE username = '$username'";
$req = mysql_query($sql) or die();

if($random2>14)
{
$outPut = "<b>Great game! Absolutely loved it. What a 3-pointer to win the game!</b>";
}else{
if($random2%2)
{
$outPut = "<b>Tired and thirsty... Wanna go to Northside?</b>";
}else{
$outPut = "<b>Damn it! Have did we lose...</b>";
}
}
break;
//Swim
case 4:
$random1 = rand(10, 14);
$newHunger = $gamemyrowr["hunger"] - $random1;
if($newHunger<0)
{
$newHunger = 0;
}
$random2 = rand(5,14);
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
$addToScore = $multiplier * ($moodRandom*2 - floor($random1/4));
if($addToScore<0){
$addToScore = 0;
}
$newScore = $gamemyrowr["score"] + $addToScore;

$sql = "UPDATE tb_game set hunger = '$newHunger', mood = '$newMood', score = '$newScore' WHERE username = '$username'";
$req = mysql_query($sql) or die();

if($random2>13)
{
$outPut = "<b>Laps after laps. Wow.</b>";
}else{
if($random2%2)
{
$outPut = "<b>I'm exhausted!</b>";
}else{
$outPut = "<b>How crowded was the pool. I feel like I couldn't exercise enough.</b>";
}
}
break;
//Work in the gym
case 5:
$random1 = rand(5, 12);
$newHunger = $gamemyrowr["hunger"] - $random1;
if($newHunger<0)
{
$newHunger = 0;
}
$random2 = rand(-10,5);
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
$earnedMoney = abs($random2)*2;
$newCash = $gamemyrowr["cash"] + $earnedMoney;

$multiplier = $gamemyrowr["multiplier"];
$addToScore = $multiplier * ($moodRandom*2 - floor($random1/4));
if($addToScore<0){
$addToScore = 0;
}
$newScore = $gamemyrowr["score"] + $addToScore;

$sql = "UPDATE tb_game set hunger = '$newHunger', mood = '$newMood', score = '$newScore', cash = '$newCash' WHERE username = '$username'";
$req = mysql_query($sql) or die();

if($random2>0)
{
$outPut = "<b>Working in the gym. Not so boring.</b>";
}else{
if($random2%2)
{
$outPut = "<b>I need my break, now!</b>";
}else{
$outPut = "<b>Uh, looks like everybody is in the gym today.</b>";
}
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
<tr><td width="300" rowspan="7"><img src="images/dac.JPG" border="0"  />
<?
//http://www.drexeldragons.com/images/2009/8/25/medium_ND3_3190.JPG
?>
</td>
<td><h3 align="center">Dac &amp; Rec </h3></td>
</tr>
<tr>
<td><div align="center"><a href="gym.php?action=1">Exercise </a></div></td>
</tr>
<tr>
<td><div align="center"><a href="gym.php?action=3">Play Basketball </a></div></td>
</tr>
<tr>
  <td><div align="center"><a href="gym.php?action=4">Swim in the Pool </a></div></td>
</tr>
<tr>
  <td><div align="center">Jobs</div></td>
</tr>
<tr>
  <td><div align="center"><a href="gym.php?action=5">Work in the Gym </a></div></td>
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