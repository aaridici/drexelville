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
<style type="text/css">
<!--
.style1 {
	font-size: 80px;
	font-family: Algerian;
}
body {
	background-color: #CECECE;
	font-family: calibri;
}
.style4 {color: #006600}
-->
</style>
</head>

<body>
<div class="style1" id="header">DrexelVille</div>
<div id="inside3">
<div id="nested3">
  <p><h2 class="style4">Welcome to DrexelVille</h2></p>
  <p>DrexelVille is a map based click to play game. Your aim is to maximize your score by entertaining your character. However, your character also has his/her needs like eating, sleeping and maintaining a GPA above 1.00.</p>
  <p>There are several clickable locations on the map. For example below is the image of Powelton village.</p>
  <p><img src="images/row2-column4.jpg" width="66" height="43" /> By clicking on the image of Powelton village, you can bring your character to Powelton and interact with the with Powelton area. Each area offers several actions. For example, in Powelton you may choose to go to CaliPizza and eat something or you can Party.</p>
  <p>Most of the actions in this game result in random consequences. For example, sometimes you may eat a lot and sometimes you might grab a snack. Depending on how much you eat you will be charged differently. Yes, you have balance and you need to keep an eye on that. Going to Hans is free and unlimited but if you go to Hans too often your character's story might end too quickly.</p>
  <p>Depending on the place you go and the activity you choose to do, your hunger may go down (you get hungry), your hunger may go up (when you eat), your mood may go down (when you don't like the place or the action) or your mood may go up (when you enjoy yourself). Your mood and hunger are the main two sources that affect your score.</p>
  <p>Hopefully this much explanation is good enough for you for now. Now it is time to start a new game. </p>
  <div id="gameinitializer" style="text-align:center">
  <form action="newgame.php" method="post">
  <input type="submit" value="New Game" /><br />
  <? include('backbutton.php'); ?>
  </form>
  </div>
</div>
</div>
<div id="footer">
<? include('footer.php'); ?>
</div>
</body>
</html>
<?
}
?>