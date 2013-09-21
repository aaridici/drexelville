<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Feedback</title>
</head>

<body>
<table width="500" border="0">
  <tr>
    <th scope="col">Username</th>
    <th scope="col">Thoughts</th>
    <th scope="col">Improvement</th>
    <th scope="col">Likes</th>
    <th scope="col">Dislikes</th>
    <th scope="col">Difficulty</th>
    <th scope="col">Entertainment</th>
    <th scope="col">Visuals</th>
    <th scope="col">Playability</th>
  </tr>
<?
require('dbconfig.php');
$searchQuery = "SELECT * from tb_feedback ORDER BY username ASC";
$req = mysql_query($searchQuery) or die();
while ($data = mysql_fetch_array($req))
{
echo "<tr>";
echo "<td>".$data["username"]."</td>";
echo "<td>".$data["thoughts"]."</td>";
echo "<td>".$data["improvement"]."</td>";
echo "<td>".$data["likes"]."</td>";
echo "<td>".$data["dislikes"]."</td>";
echo "<td>".$data["difficulty"]."</td>";
echo "<td>".$data["entertainment"]."</td>";
echo "<td>".$data["visuals"]."</td>";
echo "<td>".$data["playability"]."</td>";
echo "</tr>";
}
mysql_close();
?>
</table>
</body>
</html>
