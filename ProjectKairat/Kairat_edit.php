<?php
mysql_connect("localhost","root","");
mysql_select_db("kairat_news");
$id = $_REQUEST["id"];
$query = "SELECT * FROM new WHERE id=$id";
$result = mysql_query($query);
$row = mysql_fetch_array($result);
?>
<form action="Kairat_update.php">
			<label>NEW TITLE<br><input type="text" name="new_name" value="<?= $row['new_name'] ?>"/></br></label>
			<label>NEW PICTURE<br><input type="text" name="picture" value="<?= $row['picture'] ?>"/></br></label>
			<label>NEW NEWS<br><input type="text" name="news" value="<?= $row['news'] ?>"/></br></label>
			<input type="hidden" name="id" value="<?= $row['id'] ?>"/><br/>
			<input type="submit"/>
</form>