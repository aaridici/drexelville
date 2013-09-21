<center>
<div id="initialgamemenu">
<table cellpadding="4" cellspacing="0" width="100%">
<?
if($data['gameinprogress']==1)
{
echo "<tr><td align=\"center\"><a href=\"game/\">Continue</a></td></tr>";
}
?>
<tr><td align="center"><a href="newgame.php">New Game</a></td></tr>
<tr><td align="center"><a href="howtoplay.php">How to Play</a></td></tr>
<?
$result = mysql_query("SELECT COUNT(*) FROM tb_scores where username='$username'");
$num_rows = mysql_num_rows($result);
if($num_rows>0)
{
echo "<tr><td align=\"center\"><a href=\"/drexelville/survey2.php\">Take Survey 2</a></td></tr>";
}
?>
<tr><td align="center"><a href="feedback.php">Feedback</a></td></tr>
<tr><td align="center"><a href="/drexelville/logout.php">Log out</a></td></tr>
</table>
</div>
</center>