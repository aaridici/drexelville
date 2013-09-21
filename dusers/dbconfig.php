<?
/*************************************************************************** 
* 
* Filename : dbconfig.php 
* Modified : 
* Copyright : (c) 2009 Lab-1 
* Version : 1.0 
* Written by : Lab1 in istanbul / TURKEY 
* 
***************************************************************************/
?>
<?php


$dbh=mysql_connect ("localhost", "**user**", "**pass***") or die ('I cannot connect to the database because: ' . mysql_error());
mysql_select_db("**db_name***");

?>