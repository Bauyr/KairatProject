<?php session_start();
	if(!isset($_SESSION['login'])){
		header("Location:Kairat.php?page=L");
	}
 ?>
<html>
<head>
	<meta charset="UTF-8"/>
	<title>FCKairat</title>
	<link rel="stylesheet" href="Carousel.css">
	<link rel="stylesheet" href="cssmenu/styles.css">
	<link rel="stylesheet" href="Site_Kairat.css">
	<script type="text/javascript" src="jquery-1.12.3.min.js"></script>
	<script type="text/javascript">
	$(document).ready(function(){
		setInterval(function(){
		$('#carousel ul').animate({marginLeft:'-950px'},2000,function(){
			$(this).find("li:last").after($(this).find("li:first"));
			$(this).css({marginLeft:0});
		});
	},5000);
	});
	</script>	
</head>

<body>
	<div class="Logout">
		<a class="Logout_a" href="logout.php">Log out</a>
	</div>

	<div class="body">

		
		<div class="base">
			<img class="Kairatlogo" src="Kairatlogo.jpg"></img>
			<img class="team" src="team.jpg"></img>
			<img class="Kairatlogo_1" src="Kairatlogo.jpg"></img>
		</div>


		

		<div id='cssmenu'>
			<ul>
			   <li><a href='Site_Kairat.php?page=glavnaya'><span>Главная</span></a></li>
			   <li class='active has-sub'><a href='#'><span>Команды</span></a>
			      <ul>
			         <li class='has-sub'><a href='Site_Kairat.php?page=sostav'><span>Состав</span></a>
			            
			         </li>
			         <li class='has-sub'><a href='#'><span>Product 2</span></a>
			            <ul>
			               <li><a href='#'><span>Sub Product</span></a></li>
			               <li class='last'><a href='#'><span>Sub Product</span></a></li>
			            </ul>
			         </li>
			      </ul>
			   </li>
			   <li><a href='Site_Kairat.php?page=TV'><span>Кайрат ТВ</span></a></li>
			   <li class='last'><a href='Site_Kairat.php?page=news'><span>Новости</span></a></li>
			</ul>
	</div>
	



		<?php
	if(isset($_GET['page']))
		$page = $_GET['page'];
	else{
		$page = "null";
		}

		if($page == "sostav"):?>
			<div class="table">
				<?php
					mysql_connect("localhost","root","");
					mysql_select_db("football");
					mysql_query("SET NAMES utf8");
					$query = "SELECT * FROM player";
					$result = mysql_query($query);
					
					while($row = mysql_fetch_assoc($result)){

						$pic = $row["pic"];
						?>
						<table class="player">
							<tr>
								<td class="imgtb" rowspan="7"><?php echo "<img class='Vratar' src = '$pic'>";?></td>
								<td class="esim"><?php echo $row["name"];?></td>
							</tr>
							<tr>
								<td class="tb"><b>Номер: </b><?php echo $row["number"];?></td>
							</tr>
							<tr>
								<td class="tb"><b>Ампула: </b><?php echo $row["position"];?></td>
							</tr>
							<tr>
								<td class="tb"><b>Страна: </b><?php echo $row["country"];?></td>
							</tr>
							<tr>
								<td class="tb"><b>Родился: </b><?php echo $row["birth"];?></td>
							</tr>
							<tr>
								<td class="tb"><b>Рост: </b><?php echo $row["height"];?></td>
							</tr>
							<tr>
								<td class="tb"><b>Вес: </b><?php echo $row["weight"];?></td>
							</tr>
						

						</table>
					<?php
					}

					?>

				
			</div>



			<div class="footer">
				<a>kjshfjdk</a>
			</div>







	<?php endif ?>



	<?php
		if($page == "news"):?>
			<div id="main">
				<div id="carousel">
					<ul>
						<li><img src="http://www.fckairat.kz/images/almatycity13.jpg"/></li>
						<li><img src="Almatyyellow.jpg"/></li>
						<li><img src="https://i.ytimg.com/vi/kFkEuhjYk6Y/maxresdefault.jpg"/></li>
						<li><img src="http://cs9390.userapi.com/u9316057/143840323/x_8d2a8b31.jpg"/></li>
						<li><img src="http://www.diapazon.kz/files/post/images/2016-04/normal/pl5AmFVVXoEH.jpg"/></li>
						<li><img src="http://www.fckairat.kz/upload/572b65fdafdff.jpg"/></li>

					</ul>
				</div>
		</div>
		<div class="novosti">
			<h2 class="novo">НОВОСТИ</h2>
		</div>
		<?php
					header( 'Content-Type: text/html; charset=utf-8' );
					mysql_connect("localhost","root","");
					mysql_select_db("Kairat_news");
					mysql_set_charset("utf8");
					$query = "SELECT * FROM new ORDER BY id DESC";
					$result = mysql_query($query);
					
					while($row = mysql_fetch_assoc($result)){

						$pic = $row["picture"];
						?>
						<div class="LLL">
							<div class="new_NAME"><br><a class="new_name"><?php echo $row["new_name"];?></a></br></div>
							<div class="pict_1"><?php echo "<img class='pict' src = '$pic'/>";?></div>
							<div class="NEWS"><a class="news"><?php echo $row["news"];?></a></div>
						</div>

					<?php
					}

					?>

	<?php endif ?>

	<?php
	if($page == "TV"):?>
			<?php
				
					mysql_connect("localhost","root","");
					mysql_select_db("kairattv");
					mysql_query("SET NAMES utf8");
					$query = "SELECT * FROM tv";
					$result = mysql_query($query);
					
					while($row = mysql_fetch_assoc($result)){

						$video = $row["video"];
						?>
						<div class="FFF">
							<div class="new_vid"><br><a class="new_name"><?php echo $row["name"];?></a></br></div>
								<video>
									<source src ="<?=$video?>" type="video/mp4"/>
								</video>
						</div>
					<?php
					}
					?>

		<?php endif ?>

	</div>	
</body>
</html>