<?php
mysqli_connect("localhost", "#", "#") or die(mysqli_connect_errno());
mysql_select_db("#") or die(mysql_error());
$search = $_POST['id'];
$returnData = ""; 
$players = mysql_query("SELECT firstname FROM players WHERE firstname LIKE '%search%'");
while($player = mysql_fetch_array($players)) {
    $returnData .= "<div>" . $players["firstname"] . "</div>";
}
echo $returnData; 