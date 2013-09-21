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
//Soccer
case 1:
$random1 = rand(5, 12);
$newHunger = $gamemyrowr["hunger"] - $random1;
if($newHunger<0)
{
$newHunger = 0;
}
$random2 = rand(5,12);
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

if($random2>10)
{
$outPut = "<b>Hattrick!!! Time to do the crocodile dance!</b>";
}else{
if($random2%2)
{
$outPut = "<b>Oh yes! That's how we play soccer! 5-0!</b>";
}else{
$outPut = "<b>Noooo... What an ugly last minute goal to concede.</b>";
}
}
break;
//Play Frisby
case 2:
$random1 = rand(5, 8);
$newHunger = $gamemyrowr["hunger"] - $random1;
if($newHunger<0)
{
$newHunger = 0;
}
$random2 = rand(2,5);
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

$outPut = "That was fun.";
break;
//Football
case 3:
$random1 = rand(5, 8);
$newHunger = $gamemyrowr["hunger"] - $random1;
if($newHunger<0)
{
$newHunger = 0;
}
$random2 = rand(-5,8);
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

if($random2<-4)
{
$outPut = "<b>Dislocated shoulder! What! Oh noes!</b>";
}else{
if($random2<1)
{
$outPut = "<b>Not a good day to play flag football.</b>";
}else{
$outPut = "<b>Yeah baby yeah baby hey!</b>";
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
<tr><td width="300" rowspan="7"><img src="images/buckley.jpg" border="0"  />
<?
//http://www.drexel.edu/univrel/digest/archive/012005/buckley.jpg
?>
</td>
<td><h3 align="center">Buckley Recreational </h3></td>
</tr>
<tr>
<td><div align="center"><a href="buckley.php?action=1">Play Soccer </a></div></td>
</tr>
<tr>
<td><div align="center"><a href="buckley.php?action=2">Play Ultimate Frisby </a></div></td>
</tr>
<tr>
<td><div align="center"><a href="buckley.php?action=3">Play Flag Football </a></div></td>
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