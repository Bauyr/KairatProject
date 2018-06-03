<?php
mysql_connect("localhost","root","");
mysql_select_db("kairat_news");

$query = "SELECT * FROM new ORDER BY id";
$result = mysql_query($query);
$num = mysql_num_rows($result);
echo $num;
for ($i=0;$i<$num;$i++){
$row = mysql_fetch_array($result);?>
	<?= $row["new_name"]?> <?= $row["picture"]?> <?= $row["news"]?>
	<a href="ques.php?id= <?= $row['id']?>">Delete</a>
	<a href="edit.php?id=<?= $row['id']?>">Edit</a> <br/>
<?php
	}
?>
<form action="Kairat_update.php">
	<label>NEW TITLE<br><input type="text" name="new_name" value="<?= $row['new_name'] ?>"/></br></label>
	<label>NEW PICTURE<br><input type="text" name="picture" value="<?= $row['picture'] ?>"/></br></label>
	<label>NEW NEWS<br><input type="text" name="news" value="<?= $row['news'] ?>"/></br></label>
						<input type="submit"/>
</form>