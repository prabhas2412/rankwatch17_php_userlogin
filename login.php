<?php
include('./conn.php');
  session_start(); 


?>

<?php

if(isset($_GET['a']))
{
	session_destroy();
	
}


if(isset($_POST['login']))   
{
     $user = $_POST['user'];
     $pass = $_POST['pass'];
	 
	 $query="SELECT * FROM data WHERE email='$user' AND password='$pass'";
	 $num=mysql_num_rows(mysql_query($query));
	 

      if($num==1) 
         {                                   

          $_SESSION['use']=$user; 
		  echo '<script type="text/javascript"> window.open("home.php","_self");</script>';

        }

        else
        {
            echo "invalid UserName or Password";        
        }
}


if(isset($_SESSION['use']) && isset($_GET['a']) )  
 {
    echo "<a href='./login.php?a=yes'>Log Out</a>";
 }else{
	 
	 echo "Login";
	 
 }
 ?>
<html>
<head>

<title> Login Page   </title>

</head>

<body>

<form action="" method="post">

    <table width="200" border="0">
  <tr>
    <td>  UserName</td>
    <td> <input type="text" name="user" > </td>
  </tr>
  <tr>
    <td> PassWord  </td>
    <td><input type="password" name="pass"></td>
  </tr>
  <tr>
    <td> <input type="submit" name="login" value="LOGIN"></td>
    <td></td>
  </tr>
</table>
</form>

</body>
</html>