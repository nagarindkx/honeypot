<?php
  $username=$_POST['username'];
  $password=$_POST['password'];

  $host="localhost";
  $dbuser="root";
  $dbpass="123456";
  $dbname="mydb";
  $dbtable="users";

  $conn = @mysqli_connect("$host","$dbuser","$dbpass","$dbname");
  $sql = "SELECT count(*) FROM $dbtable WHERE username='$username' AND password = '$password' ";

  $query=mysqli_query($conn, $sql);
  $result=mysqli_fetch_array($query);
  $count=$result[0];

  if ( $count > 0 ) {
        echo " Hello $username ";
  } else {
        echo "Login Fail";
  }

  echo "<hr>";
  echo "SQL=$sql";

  mysqli_close($conn);
?>