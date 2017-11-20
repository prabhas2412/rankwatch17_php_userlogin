<?php   session_start();  

include('./conn.php');
?>

<html>
  <head>
       <title> Home </title>
  </head>
  <body>
  
  <style>
		tr{
			padding:5px;
		}
		td{
			padding:5px;
		}
  </style>
  
<?php
      if(!isset($_SESSION['use'])) // If session is not set then redirect to Login Page
       {
           header("Location:Login.php");  
       }
	   $user=$_SESSION['use'];
	   $query="SELECT * FROM data WHERE email='$user'";
	   $run=mysql_fetch_array(mysql_query($query));
	   
	   echo '<h2><center> Details of the User</center> </h2>';

		echo '<table>
			<tr><td>Full Name</td><td>'.$run['fname'].'</td></tr>
			<tr><td>Email</td><td>'.$run['email'].'</td></tr>
			<tr><td>Mobile No.</td><td>'.$run['mobile'].'</td></tr>
			<tr><td>Age</td><td>'.$run['age'].'</td></tr>
			<tr><td>Gender</td><td>'.$run['gender'].'</td></tr>
			<tr><td>Address</td><td>'.$run['address'].'</td></tr>';
			
			$q="SELECT * FROM countries WHERE country_id='".$run['country']."'";
			$r=mysql_fetch_array(mysql_query($q));
			
			echo'<tr><td>Country</td><td>'.$r['country_name'].'</td></tr>';
			
			$q="SELECT * FROM states WHERE state_id='".$run['state']."'";
			$r=mysql_fetch_array(mysql_query($q));
			
			echo'<tr><td>Country</td><td>'.$r['state_name'].'</td></tr>
		</table>';
	   
	   
	   
          echo "<a href='login.php?a=yes'> Logout</a> "; 
		  </center>
?>