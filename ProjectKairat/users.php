<?php
session_start();
if(isset($_SESSION['login']))
{
  header("location: Site_Kairat.php");
}
?>

<html>
<head>
  <meta charset="UTF-8"/>
  <style>
    .success{
      color:red;
    }.confirm_a{
      color:red;
      font-size:30px; 
    }
  </style>
</head>



<?php
  mysql_connect("localhost","root","");
  mysql_select_db("kaireg");
  

    $login= $_REQUEST['login'];
    $password= $_REQUEST['pass'];
    $password_2 = $_REQUEST["pass_1"];
    $name= $_REQUEST['name'];
    $surname= $_REQUEST['sname'];
    $email = $_REQUEST["mail"];
    
  
    
    $a = 0;
if($password==$password_2){
  $a=1;
}
if($a ==1){
  $query = "SELECT * FROM user_info WHERE login='$login'";
    $result = mysql_query($query);
    $myrow = mysql_fetch_array($result);

    if (!empty($myrow['id'])) 
      {
           exit ("Sorry, this login already exists");
       }
     
      $query2 = "INSERT INTO user_info (login,password,email,name, surname) VALUES('$login','$password','$email','$name', '$surname')";
           // echo $query2;
           $result2 = mysql_query ($query2);
    if ($result2=='TRUE')
      {
                 echo "<br><a class='success'>SUCCESS</a></br> <a class='main' href='Site_Kairat.php'>Main page</a>";
                 header("location:Kairat.php?page=");
      }
      else{
        echo "";
      }
    }
   else{
    echo "<div class='confirm'><a class='confirm_a'>You enter wrong confirm password</a></div>";
   }
?>