<?
if(isset($_COOKIE["username"]) && isset($_COOKIE["password"]))
{
?>
<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=main.php">
<?
}else{
if(isset($_POST["usernamer"])) {
$username = $_POST["usernamer"];
$password = $_POST["passwordr"];
require('dbconfig.php');
$users = mysql_query("SELECT * FROM tb_users WHERE username = '$username'");
$numberOfUsers = mysql_num_rows($users);
if($numberOfUsers>0)
{
?>
<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=alreadyregistered.php">
<?
mysql_close();
}else{
if(strlen($password)<4)
{
?>
<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=passtooshort.php">
<?
}else{
$password = md5(sha1($password));
$query = "INSERT INTO tb_users (username, password) VALUES('$username', '$password')";
mysql_query($query) or die(mysql_error());
mysql_close();
?>
<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=regsuccessful.php?username=<? echo $username; ?>">
<?
}
}
}else{
?>
<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=index.php">
<?
}
}
?>