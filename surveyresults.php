<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Survey</title>
</head>

<body>
<table width="500" border="0">
  <tr>
    <th scope="col">Username</th>
    <th scope="col">Gender</th>
    <th scope="col">Year</th>
    <th scope="col">Age</th>
    <th scope="col">Stress Level</th>
    <th scope="col">Importance</th>
    <th scope="col">Subject1</th>
    <th scope="col">Grade1</th>
    <th scope="col">Subject2</th>
    <th scope="col">Grade2</th>
    <th scope="col">Subject3</th>
    <th scope="col">Grade3</th>
    <th scope="col">Subject4</th>
    <th scope="col">Grade4</th>
    <th scope="col">Subject5</th>
    <th scope="col">Grade5</th>
    <th scope="col">Subject6</th>
    <th scope="col">Grade6</th>
  </tr>
<?
require('dbconfig.php');
$searchQuery = "SELECT * from tb_survey ORDER BY username ASC";
$req = mysql_query($searchQuery) or die();
while ($data = mysql_fetch_array($req))
{
echo "<tr>";
echo "<td>".$data["username"]."</td>";
echo "<td>".$data["gender"]."</td>";
echo "<td>".$data["year"]."</td>";
echo "<td>".$data["age"]."</td>";
echo "<td>".$data["stresslevel"]."</td>";
echo "<td>".$data["importance"]."</td>";
echo "<td>".$data["subject1"]."</td>";
echo "<td>".$data["grade1"]."</td>";
echo "<td>".$data["subject2"]."</td>";
echo "<td>".$data["grade2"]."</td>";
echo "<td>".$data["subject3"]."</td>";
echo "<td>".$data["grade3"]."</td>";
echo "<td>".$data["subject4"]."</td>";
echo "<td>".$data["grade4"]."</td>";
echo "<td>".$data["subject5"]."</td>";
echo "<td>".$data["grade5"]."</td>";
echo "<td>".$data["subject6"]."</td>";
echo "<td>".$data["grade6"]."</td>";
echo "</tr>";
}
mysql_close();
?>
</table>
</body>
</html>
