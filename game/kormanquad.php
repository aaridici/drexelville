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

//Take a CS Class
case 1:
$random1 = rand(5, 9);
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
if($random2<0)
{
$random3 = rand(-10, 10);
}else{
$random3 = rand(10, 20);
}

$gpaRandom = $random3;
$newGPA = $gamemyrowr["gpa"] + ($gpaRandom/100);
if($newGPA>4.00)
{
$newGPA = 4.00;
}

$multiplier = $gamemyrowr["multiplier"];
$addToScore =  floor($multiplier * ($moodRandom*3 - $random1 + $gpaRandom/10));
if($addToScore<0){
$addToScore = 0;
}
$newScore = $gamemyrowr["score"] + $addToScore;

$sql = "UPDATE tb_game set hunger = '$newHunger', mood = '$newMood', gpa = '$newGPA', score = '$newScore' WHERE username = '$username'";
$req = mysql_query($sql) or die();

if($moodRandom<0)
{
$outPut = "<b>I hate CS!!!</b>";
}else{
$outPut = "<b>Oh wow. This was easy.</b>";
}
break;
//Chem Lecture
case 2:
$random1 = rand(5, 10);
$newHunger = $gamemyrowr["hunger"] - $random1;
if($newHunger<0)
{
$newHunger = 0;
}
$random2 = rand(-5,5);
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
if($random2<0)
{
$random3 = rand(-10, 5);
}else{
$random3 = rand(10, 15);
}

$gpaRandom = $random3;
$newGPA = $gamemyrowr["gpa"] + ($gpaRandom/100);
if($newGPA>4.00)
{
$newGPA = 4.00;
}

$multiplier = $gamemyrowr["multiplier"];
$addToScore =  floor($multiplier * ($moodRandom*3 - $random1 + $gpaRandom/10));
if($addToScore<0){
$addToScore = 0;
}
$newScore = $gamemyrowr["score"] + $addToScore;

$sql = "UPDATE tb_game set hunger = '$newHunger', mood = '$newMood', gpa = '$newGPA', score = '$newScore' WHERE username = '$username'";
$req = mysql_query($sql) or die();

if($moodRandom<0)
{
$outPut = "<b>\"The rate of change is defined by...\" Zzzz...</b>";
}else{
$outPut = "<b>Did he just put the whole table on fire?</b>";
}
break;
//Bio
case 3:
$random1 = rand(5, 8);
$newHunger = $gamemyrowr["hunger"] - $random1;
if($newHunger<0)
{
$newHunger = 0;
}
$random2 = rand(-3,8);
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
if($random2<0)
{
$random3 = rand(-5, 5);
}else{
$random3 = rand(5, 10);
}

$gpaRandom = $random3;
$newGPA = $gamemyrowr["gpa"] + ($gpaRandom/100);
if($newGPA>4.00)
{
$newGPA = 4.00;
}

$multiplier = $gamemyrowr["multiplier"];
$addToScore =  floor($multiplier * ($moodRandom*3 - $random1 + $gpaRandom/10));
if($addToScore<0){
$addToScore = 0;
}
$newScore = $gamemyrowr["score"] + $addToScore;

$sql = "UPDATE tb_game set hunger = '$newHunger', mood = '$newMood', gpa = '$newGPA', score = '$newScore' WHERE username = '$username'";
$req = mysql_query($sql) or die();

if($moodRandom<0)
{
$outPut = "<b>I... I don't get this. DNA polymerase does what?</b>";
}else{
$outPut = "<b>\"Hip hip\" Hoorey!</b>";
}
break;
//Business
case 4:
$random1 = rand(2, 9);
$newHunger = $gamemyrowr["hunger"] - $random1;
if($newHunger<0)
{
$newHunger = 0;
}
$random2 = rand(-4,6);
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
if($random2<0)
{
$random3 = rand(-4, 4);
}else{
$random3 = rand(4, 14);
}

$gpaRandom = $random3;
$newGPA = $gamemyrowr["gpa"] + ($gpaRandom/100);
if($newGPA>4.00)
{
$newGPA = 4.00;
}

$multiplier = $gamemyrowr["multiplier"];
$multiplier = $gamemyrowr["multiplier"];
$addToScore =  floor($multiplier * ($moodRandom*3 - $random1 + $gpaRandom/10));
if($addToScore<0){
$addToScore = 0;
}
$newScore = $gamemyrowr["score"] + $addToScore;

$sql = "UPDATE tb_game set hunger = '$newHunger', mood = '$newMood', gpa = '$newGPA', score = '$newScore' WHERE username = '$username'";
$req = mysql_query($sql) or die();

if($moodRandom<0)
{
$outPut = "<b>Hmmm... I smell frappuccino. Oh I'm sorry I forgot the class wasn't over yet.</b>";
}else{
$outPut = "<b>Let's get down to business! By business I mean Starbucks.</b>";
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
<tr><td valign="top" width="300" rowspan="6"><img src="images/kormanquad.jpg" width="288" height="170" />
<?
//http://media.collegepublisher.com/media/paper689/stills/233z8ckj.gif
?>
</td>
<td><h3 align="center">Korman Quad </h3></td>
</tr>
<tr>
<td><div align="center"><a href="kormanquad.php?action=1">Take a CS Class</a></div></td>
</tr>
<tr>
  <td><div align="center"><a href="kormanquad.php?action=2">Go to Chemistry Lecture</a></div></td>
</tr>
<tr>
  <td><div align="center"><a href="kormanquad.php?action=3">Go to Biology Lecture</a></div></td>
</tr>
<tr>
  <td><div align="center"><a href="kormanquad.php?action=4">Take a Business Class</a></div></td>
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