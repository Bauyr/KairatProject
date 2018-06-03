<?php
session_start();
if(isset($_SESSION['login']))
{
  header("location: Site_Kairat.php");
}
else if(isset($_SESSION['password']))
{
  header("location: Kairat_admin.php");
 }
?>

<html>
<head>
	<meta charset="UTF-8"/>
	<title>FCKairat</title>

	<style>
		video{

				position: fixed;
				z-index: -100;
				width: auto;
				height: auto;
				min-width: 100%;
				min-height: 100%;
				top: 50%;
	    		left: 50%;

	    		transform: translateX(-50%) translateY(-50%);
				
			

			
		}
		@media screen and (min-width:480px min-height:480px){
			video{
				position: fixed;
				z-index: -100;
				width: auto;
				height: auto;
				min-width: 100%;
				min-height: 100%;
				top: 50%;
	    		left: 50%;

	    		transform: translateX(-50%) translateY(-50%);
				}

		}
		.Sign{
			color:black;
		}
		a{
			display: inline-block;
			margin-left:25px;
			text-decoration: none;
			color:white; 
		}
		.logpass{
			margin-top: 15%;
		}
		.logpass_1{
			margin-top:10%;
		}
		.label{
			color:white;
			display: block;
			width: 200px;
			margin-left:42%;
			margin-top:10px; 
			font-size:20px; 
			
		}
		.label_2{
			color:black;
			display: block;
			width: 100px;
			margin-left:45%;
			margin-top:20px; 
			font-size:20px; 
			font-weight: bold;
		}
		.inlog{
			height:30px; 
			width:200px;
			opacity:0.4;
			font-size:20px;  
		}
		
	</style>
</head>

<body>
	<video id="bgvideo" autoplay loop>
		<source src="«Кайрат» - «Шахтер»- день до матча.mp4" type="video/webm"/>
    	<source src="«Кайрат» - «Шахтер»- день до матча.mp4" type="video/mp4"/>
	</video>

	<?php
		$menpage = [["type"=>"sign","login"=>"Login","password"=>"Password"],
					["type"=>"lo","login"=>"Login","password"=>"Password","password_1"=>"Confirm password","email"=>"Email","name"=>"Name","surname"=>"Surname"]];
					?>

	<div class="Sign">
			
			<a href="Kairat.php?page=S">SIGN UP</a>
			<a href="Kairat.php?page=L">LOG IN</a>
		
	</div>


	<?php

	


	if(isset($_GET['page']))
		$page = $_GET['page'];
	else{
		$page = "null";
	}

	foreach ($menpage as $key) {
		if($page == "L" && $key["type"] == "sign"): ?>
		<div class="logpass">
			<form action="logKairat.php">
				<label class="label"><?= $key["login"]?>
					<input class="inlog" name="login" type="text"/>
				</label>


				<label class="label"><?= $key["password"]?>
					<input class="inlog" name="password" type="password"/>
				</label>

				<input class="label_2" type="submit" value="Submit"/>
			</form>
		</div>

		
		<?php
		elseif($page == "S" && $key["type"]=="lo"):?>
			<div class="logpass_1">
				<form action="users.php">
				<label class="label"><?= $key["login"]?>
					<input class="inlog" name="login" type="text"/>
				</label>

				<label class="label"><?= $key["password"]?>
					<input class="inlog" name="pass" type="password"/>
				</label>


				<label class="label"><?= $key["password_1"]?>
					<input class="inlog" name="pass_1" type="password"/>
				</label>

				<label class="label"><?= $key["email"]?>
					<input class="inlog" name="mail" type="text"/>
				</label>

				<label class="label"><?= $key["name"]?>
					<input class="inlog" name="name" type="text"/>
				</label>

				<label class="label"><?= $key["surname"]?>
					<input class="inlog" name="sname" type="text"/>
				</label>

				<input class="label_2" type="submit" value="Submit"/>
			</form>

		</div>
		<?php endif ?>
	<?php	
	}
	?>
	

	

	

</body>
</html>