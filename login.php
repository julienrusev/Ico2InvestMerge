<?php
   include("config.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myusername = mysqli_real_escape_string($conn,$_POST['username']);
      $mypassword = mysqli_real_escape_string($conn,$_POST['password']); 
      
      $sql = "SELECT ID FROM login_form WHERE username = '$myusername' and password = '$mypassword'";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         session_start("ico2invest@gmail.com");
         $_SESSION['login_user'] = $myusername;
         
         header("location: include/welcome.php");
      }else {   echo '<script language="javascript">';
                echo 'alert("Wrong Password")';  //not showing an alert box.
                echo '</script>';;
            }
   }
?>