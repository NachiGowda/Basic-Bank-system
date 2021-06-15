<?php
$host='localhost';
$user='root';
$pass='';
$db='bank';

$conn=mysqli_connect($host,$user,$pass,$db);
if($conn){

echo" ";
}
  else{
 die("connection to this database failed due to " .mysqli_connect_error());
  }