<?
if ($_POST['username']) {
$username=$_POST['username'];
$password=$_POST['password'];
if ($password==NULL) {
?>
<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=nopass.php">
<?
exit();
}else{
require('dbconfig.php');
$password = md5(sha1($password));
$query = mysql_query("SELECT username,password FROM tb_users WHERE username = '$username'") or die(mysql_error());
$data = mysql_fetch_array($query);
if($data['password'] != $password) {
?>
<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=wrongpass.php">
<?
exit();
}else{
$query = mysql_query("SELECT username,password FROM tb_users WHERE username = '$username'") or die(mysql_error());
$row = mysql_fetch_array($query);
$nicke=$row['username'];
$passe=$row['password'];

setcookie("username",$nicke,time()+864000);
setcookie("password",$passe,time()+864000);
}
}
?>
<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=main.php">
<?
exit();
}else{
?>
<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=index.php">
<?
}
?>