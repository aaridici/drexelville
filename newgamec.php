<?
	require('dbconfig.php');
	$username = $_COOKIE["username"];
	$sql = "UPDATE tb_users set gameinprogress = '1' WHERE username = '$username'";
	$req = mysql_query($sql) or die();
	$checkIfGameExists = mysql_query("SELECT * FROM tb_game WHERE username = '$username'");
	$checkResult = mysql_num_rows($checkIfGameExists);
	if($checkResult>0) {
	$sqlQ = "DELETE FROM tb_game where username = '$username'";
	$reqQ = mysql_query($sqlQ) or die();
	}
	if($_POST["level"]=='easy') {
	$gamesqlr = "SELECT * FROM tb_levels WHERE level = 'easy'";
	$gameresultr = mysql_query($gamesqlr);        
	$gamemyrowr = mysql_fetch_array($gameresultr);
	$gpa = $gamemyrowr["gpa"];
	$mood = $gamemyrowr["mood"];
	$hunger = $gamemyrowr["hunger"];
	$cash = $gamemyrowr["cash"];
	$multiplier = $gamemyrowr["multiplier"];
	$query = "INSERT INTO tb_game (username, gpa, mood, hunger, cash, multiplier) VALUES('$username', '$gpa', '$mood', '$hunger', '$cash', '$multiplier')";
	mysql_query($query) or die(mysql_error());
	}
	if($_POST["level"]=='moderate') {
	$gamesqlr = "SELECT * FROM tb_levels WHERE level = 'moderate'";
	$gameresultr = mysql_query($gamesqlr);        
	$gamemyrowr = mysql_fetch_array($gameresultr);
	$gpa = $gamemyrowr["gpa"];
	$mood = $gamemyrowr["mood"];
	$hunger = $gamemyrowr["hunger"];
	$cash = $gamemyrowr["cash"];
	$multiplier = $gamemyrowr["multiplier"];
	$query = "INSERT INTO tb_game (username, gpa, mood, hunger, cash, multiplier) VALUES('$username', '$gpa', '$mood', '$hunger', '$cash', '$multiplier')";
	mysql_query($query) or die(mysql_error());
	}
	if($_POST["level"]=='hard') {
	$gamesqlr = "SELECT * FROM tb_levels WHERE level = 'hard'";
	$gameresultr = mysql_query($gamesqlr);        
	$gamemyrowr = mysql_fetch_array($gameresultr);
	$gpa = $gamemyrowr["gpa"];
	$mood = $gamemyrowr["mood"];
	$hunger = $gamemyrowr["hunger"];
	$cash = $gamemyrowr["cash"];
	$multiplier = $gamemyrowr["multiplier"];
	$query = "INSERT INTO tb_game (username, gpa, mood, hunger, cash, multiplier) VALUES('$username', '$gpa', '$mood', '$hunger', '$cash', '$multiplier')";
	mysql_query($query) or die(mysql_error());
	}
	mysql_close();
?>
<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=game/">