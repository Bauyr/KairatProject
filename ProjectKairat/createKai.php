<?php
mysql_connect("localhost","root","");
mysql_select_db("kaireg");
$login = $_REQUEST["login"];
$password = $_REQUEST["pass"];
$password_2 = $_REQUEST["pass_1"];
$email = $_REQUEST["mail"];
$name = $_REQUEST["name"];
$surname = $_REQUEST["sname"];
$a = 0;
if($password==$password_2){
	$a=1;
}


if($a==1){
	if($password.length<8){
		$query = "INSERT INTO `user_info` (`login`, `password`, `email`, `name`, `surname`) VALUES ('$login','$password','$email', `name`, `surname`)";
		mysql_query($query);
		header("location: Site_Kairat.php");
	}
	else{
		?>
		<script>alert('Your password length is less than 8');</script>
	<?php
		}
	}
else{
?>
<script>alert('You enter wrong your Confirm password');</script>

<?php
}
?>