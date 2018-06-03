<?php
mysql_connect("localhost","root","");
mysql_select_db("kairat_news");
$id = $_REQUEST["id"];
$model = $_REQUEST["new_name"];
$manufacturer = $_REQUEST["picture"];
$year = $_REQUEST["news"];
$query = "UPDATE `new` SET `new_name`='$model',`picture`='$manufacturer',`news`='$year' WHERE `id`=$id";
mysql_query($query);
header("location: Kairat_admin.php");
?>