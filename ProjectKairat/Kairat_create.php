<?php
mysql_connect("localhost","root","");
mysql_select_db("kairat_news");
$model = $_REQUEST["new_name"];
$manufacturer = $_REQUEST["picture"];
$year = $_REQUEST["news"];
$a = 0;
if(!empty($model)){
	if(!empty($manufacturer)){
		if(!empty($year)){
				$a = 1;
			
		}
	}
}
if($a==1){
$query = "INSERT INTO `new` (`new_name`, `picture`, `news`) VALUES ('$model','$manufacturer','$year')";
mysql_query($query);
// echo $query;
header("location: Kairat_admin.php");
}
else{
echo "Oops, error. <a href='Kairat_admin.php'>Back</a>";
}
?>