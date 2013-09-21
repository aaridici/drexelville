<?

if(isset($_COOKIE["username"]) && isset($_COOKIE["password"]))
{

$_COOKIE["username"] = "";
setcookie(username,"x",time() - 864000);

$_COOKIE["password"] = "";
setcookie(password,"x",time() - 864000);

?>
<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=index.php">
<?
}else{
?>
<META HTTP-EQUIV="REFRESH" CONTENT="0;URL=index.php">
<?
}
?>