<?php

$server = "sql1.njit.edu"     ;
$uname = "rrr36" ;
$dbase  = "rrr36" ;
$password = "RV1oUgoVS" ;

( $db = mysqli_connect ( $server, $uname, $password, $dbase ) );
if (mysqli_connect_errno())
{
  echo"Failed to connect to MYSQL ". mysqli_connect_error();
  exit();
}
print "Successfully connected to MySQL<br><br>";
mysqli_select_db( $dbase );

$accounts = "select*from accounts where id < 6";
($table = mysqli_query($db,$accounts)) or die (mysqli_error());

$rows = mysqli_num_rows($table);
echo "Rows in the table: $rows<br>";
  $out = "<table border = '1'><tr><th>id</th><th>email</th><th>fname</th><th>lname</th><th>phone</th><th>birthday</th><th>gender</th><th>password</th></tr>";
while($r = mysqli_fetch_array($table)){
  
  $id = $r['id'];
  $email = $r['email'];
  $fname = $r['fname'];
  $lname = $r['lname'];
  $phone = $r['phone'];
  $birthday = $r['birthday'];
  $gender = $r['gender'];
  $pass = $r['password'];
  
  $out .= "<tr><td>$id</td>";
  $out .= "<td>$email</td>";
  $out .= "<td>$fname</td>";
  $out .= "<td>$lname</td>";
  $out .= "<td>$phone</td>";
  $out .= "<td>$birthday</td>";
  $out .= "<td>$gender</td>";
  $out .= "<td>$pass</td></td>";  
}
 $out .= "</table>";
 echo $out;

?>