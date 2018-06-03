<?php
mysql_connect("localhost","root","");
mysql_select_db("kairat_news");
$id = $_REQUEST["id"];
// echo $id;
$query = "DELETE FROM new WHERE id=$id";
mysql_query($query);
header("location: Kairat_admin.php");
// echo $query;
?>