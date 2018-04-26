<?php
define("three_days",60*60*24*3);
$remember=$_POST['remember'];

if(!isset($remember))
{
	setcookie("email",$_POST['email'],time()-3600);
     setcookie("password",$_POST['password'],time()-3600);
   }
else
{
setcookie("email",$_POST['email'],time()+three_days);
   setcookie("password",$_POST['password'],time()+three_days);
	
	
}
session_start();
$conn=mysql_connect("localhost","root","");
if(!$conn)
	die("Could not connect to server");
$selDB=mysql_select_db("sputnik",$conn);
if(!$selDB)
	die("Could not find database.");


$email=$_POST['email'];
$pass=$_POST['password'];



$q="select * from users where login='$email' and password='$pass'";

if(!($result=mysql_query($q,$conn)))
{
	print ("Could not excute query");
	die (mysql_error());
}
else{
$count = mysql_num_rows($result);  //to return no of rows returned

if($count ==1)
{
	$fount= mysql_fetch_assoc($result);
	$_SESSION['email']= $fount['email'];

	header("location:welcome.php");
}
else{
	print ("Invalid email or password.");
	
	
}

}
?>
