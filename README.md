# error-checking
Bug fixing
 
 In the following codes i get error message " Notice: A session had already been started - ignoring session_start() in C:\wamp\www\TASAF\session.php on line 2"
 <?php 
 @ob_start();
session_start();
 include("header.php");
  include("db_con.php");
  include("session.php");
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($connection,$_POST['username']);
      $mypassword = mysqli_real_escape_string($connection,$_POST['password']); 
      
      $sql = "SELECT * FROM tasaf_users WHERE user_name ='$myusername' AND pass_code ='$mypassword'";
      $result = mysqli_query($connection,$sql);
	  if(!$result){
	  echo "No results retrieved";
	  }
	  else
	  {echo "selection successifull";}
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         session_register("myusername");
         $_SESSION['login_user']=$myusername;
         
         header("location: tasaf_home.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
 
?>
 
<div form_container>
<form action="" name="loginForm" id="loginForm" class="loginForm">
<fieldset>
<legend>TASAF BMIS</legend>
    <input type="text" placeholder="Enter your Username hear" name="username" id="username" class="username" required>

    <input type="password" placeholder="Enter your Password here" name="password" id="password" class="password" required>
        
    <button type="submit" name="submit">Login</button>

</fieldset>
</form>

</div>

 <?php include("footer.php"); 
 session_destroy();
 ?>
 
 #I then created a new file named session.php to check if the session exist.
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
