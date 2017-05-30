<?php
session_start();
   include("db_con.php");
   
   $user_check = $_SESSION['login_user'];
   
   $ses_sql = mysqli_query($connection,"select user_name from tasaf_users where user_name = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   
   $login_session = $row['user_name'];
   
   if(!isset($_SESSION['login_user'])){
     // header("location:index.php");
   }
?>