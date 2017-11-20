<?php

include('./conn.php');

echo "<a href='./login.php'> Login </a>";
		 
if(isset($_GET['submit']))
{
	$fname=$_GET['fname'];
	$email=$_GET['email'];
	$password=$_GET['password'];
	$mobile=$_GET['mob'];
	$age=$_GET['age'];
	$gender=$_GET['gender'];
	$address=$_GET['adr'];
	$country=$_GET['country'];
	$state=$_GET['state'];
	
	$query="INSERT INTO data (fname,email,password,mobile,age,gender,address,country,state) VALUES ('$fname','$email','$password','$mobile',
	'$age','$gender','$address','$country','$state')";
	$result=mysql_query($query);
	if($result)
		echo "User Registered";
	else
		echo mysql_error();
}

?>

<script src="jquery.min.js"></script>

<script type="text/javascript">
function validateForm() {
    var x = document.forms["myForm"]["fname"].value;
    if (x == "") {
        alert("Name must be filled out");
        return false;
    }
    var x = document.forms["myForm"]["email"].value;
    if (x == "") {
        alert("Name must be filled out");
        return false;
    }
	var x = document.forms["myForm"]["password"].value;
    if (x == "") {
        alert("Name must be filled out");
        return false;
    }
}
</script>

<script type="text/javascript">
$(document).ready(function(){
    $('#country').on('change',function(){
        var countryID = $(this).val();
        if(countryID){
            $.ajax({
                type:'POST',
                url:'ajaxData.php',
                data:'country_id='+countryID,
                success:function(html){
                    $('#state').html(html);
                }
            }); 
        }else{
            $('#state').html('<option value="">Select Country First</option>');
        }
    });
    
});
</script>

<style>
.tf{
	padding:5px;
	border-radius:5px;
	font-size:16px;
	border:1px solid #CCC;
	width:300px;
}
#ta{
	padding:5px;
	border-radius:5px;
	font-size:16px;
	width:300px;
	height:150px;
	border:1px solid #CCC;
</style>

<table>
<form  name="myForm" onsubmit="return validateForm()">
<tr><td>Full Name</td><td><input type="text" name="fname" class="tf" placeholder="Enter Full Name"></td></tr>
<tr><td>E-Mail</td><td><input type="text" name="email" class="tf" placeholder="Enter Valid E-Mail"></td></tr>
<tr><td>Password</td><td><input type="password" name="password" class="tf"  placeholder="********"></td></tr>
<tr><td>Mobile No</td><td><input type="text" name="mob" class="tf" placeholder="Enter Mobile Number"></td></tr>
<tr><td>Age</td><td><input type="text" name="age" class="tf" placeholder="Enter Age"></td></tr>
<tr><td>Gender</td><td>

<select name="gender" class="tf">
	<option value="">Select Gender</option>
	<option value="male">Male</option>
	<option value="female">Female</option>

</select>

</td></tr>
<tr><td>Address</td><td><textarea name="adr" id="ta" placeholder="Enter Address"></textarea></td></tr>


<?php
//Include database configuration file
include('dbconf.php');

//Get all country data
$query = $db->query("SELECT * FROM countries WHERE status = 1 ORDER BY country_name ASC");

//Count total number of rows
$rowCount = $query->num_rows;
?>
<tr><td>Country</td>
<td>
<select name="country" id="country" class="tf">
    <option value="">Select Country</option>
    <?php
    if($rowCount > 0){
        while($row = $query->fetch_assoc()){ 
            echo '<option value="'.$row['country_id'].'">'.$row['country_name'].'</option>';
        }
    }else{
        echo '<option value="">Country not available</option>';
    }
    ?>
</select>
</td>
</tr>


<tr><td>State</td>
<td>
<select name="state" id="state" class="tf">
    <option value="">Select State</option>
</select>
</td>
</tr>
<tr><td></td><td><input type="submit" name="submit"></td></tr>

</form>
</table>