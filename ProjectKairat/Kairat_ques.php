<?php
mysql_connect("localhost","root","");
mysql_select_db("kairat_news");
$id = $_REQUEST["id"];
?>
Are sure you want to delete</br>
<a href="Kairat_delete.php?id= <?= $id ?>">Yes</a>
<a href="Kairat_admin.php">No</a>