<?
require('dbconfig.php');
$username = $_COOKIE["username"];
$gamesqlr = "SELECT * FROM tb_game WHERE username = '$username'";
$gameresultr = mysql_query($gamesqlr);        
$gamemyrowr = mysql_fetch_array($gameresultr);
?>
<b>
<table>
<tr>
<td>GPA:</td>
<td>
<? 
$fontGPA = "black";
if($gamemyrowr["gpa"]<=(3.00)){
$fontGPA = "#CC3300";
}
if($gamemyrowr["gpa"]<=(2.00)){
$fontGPA = "red";
}
echo"<font color='$fontGPA'>".$gamemyrowr["gpa"]."</font>"; ?></td>
<td>Mood:</td>
<td>
<?
$fontMood = "black";
if($gamemyrowr["mood"]<=(40)){
$fontMood = "#CC3300";
}
if($gamemyrowr["mood"]<=(20)){
$fontMood = "red";
}
echo"<font color='$fontMood'>".$gamemyrowr["mood"]."</font>"; ?>
</td>
<td>Hunger:</td>
<td>
<?
$fontHunger = "black";
if($gamemyrowr["hunger"]<=(40)){
$fontHunger = "#CC3300";
}
if($gamemyrowr["hunger"]<=(20)){
$fontHunger = "red";
}
echo"<font color='$fontHunger'>".$gamemyrowr["hunger"]."</font>"; ?>
</td>
<td>Cash:</td>
<td><? echo $gamemyrowr["cash"]; ?></td>
<td>Score:</td>
<td><? echo round($gamemyrowr["score"]); ?></td>
<td width="20px"></td>
</tr>
</table>
</b>
<?
mysql_close();
?>