<?php

$server = "sql1.njit.edu"     ;
$uname = "rrr36" ;
$dbase  = "rrr36" ;
$password = "RV1oUgoVS" ;



try {
    $conn = new PDO("mysql:host=$server;dbname=$dbase", $uname, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully<br>";
    
    
$accounts = "select*from accounts where id < 6";
($STH = $conn->query($accounts));

$row_count = $STH->rowCount();
echo $row_count.' rows selected<br>';

  $out = "<table border = '1'><tr><th>id</th><th>email</th><th>fname</th><th>lname</th><th>phone</th><th>birthday</th><th>gender</th><th>password</th></tr>";

while($r = $STH->fetch(PDO::FETCH_ASSOC)){
  
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
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
$conn = null;
?>