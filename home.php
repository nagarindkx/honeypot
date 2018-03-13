<?php
session_start();
if(!$_SESSION['USER_NAME']) {
echo "Need to login";
}
else {

$Host= 'localhost';
$Dbname= 'mydb';
$User= 'root';
$Password= '123456';
$table = 'users';

$conn=@mysqli_connect("$Host","$User","$Password","$Dbname");

$sql="SELECT username,password from $table where username='".$_POST['username']."';";

$query=mysqli_query($conn, $sql);

$result=mysqli_fetch_array($query);

if($_SERVER['REQUEST_METHOD'] == "POST") {
 $sql2="update $table set display_name='".$_POST['disp_name']."' where username='".$_SESSION['USER_NAME']."';";
 $query=mysqli_query($conn,$sql2);
 echo "Update Success";
}
else {
 if(strcmp($_SESSION['USER_NAME'],'admin')==0) {
  echo "Welcome admin<br><hr>";
  echo "List of user's are<br>";
  $sql = "select display_name from $table where username!='admin'";
  
  $query= mysqli_query($conn, $sql);
  while($result = mysqli_fetch_array($query)) {
    echo $result[0] . "<br>";
  }
}
else {
 echo "<form name=\"tgs\" id=\"tgs\" method=\"post\" action=\"home.php\">";
 echo "Update display name:<input type=\"text\" id=\"disp_name\" name=\"disp_name\" value=\"\">";
 echo "<input type=\"submit\" value=\"Update\">";
}
}
}
?>
</br>
<a href=goodlogin.php>Go to Login</a></br>
<a href=home.php>Go to Home</a></br>