<?php

$host="localhost"; // Host name 
$username="root"; // Mysql username
$password=""; // Mysql password 
$db_name="pi"; // Database name
$tbl_name="financial_advisor"; // Table name

// Connect to server and select databse.
mysql_connect("$host", "$username", "$password")or die("cannot connect");
mysql_select_db("$db_name")or die("cannot select DB");

// username and password sent from form 
$myusername=$_POST['username'];

// To protect MySQL injection (more detail about MySQL injection)
$myusername = stripslashes($myusername);
$myusername = mysql_real_escape_string($myusername);
$sql="SELECT * FROM $tbl_name WHERE fa_email='$myusername'";
$result=mysql_query($sql);

// Mysql_num_row is counting table row
$count=mysql_num_rows($result);

// If result matched $myusername and $mypassword, table row must be 1 row
if($count==1){

    header('Location:dashboard.html');
    die();
}
else {
    echo "Wrong Username or Password";
}
?>