<?php
if ($_POST['username'] == "" ) {
?>
<form method=POST action=goodlogin.php>
<H1>Login</H1>
Username : <input type=text name=username></br>
Password : <input type=password name=password></br>
<input type=submit value="Login"><input type=reset>
</form>
<?php
} else {
?>
<?php
$Host= 'localhost';
$Dbname= 'mydb';
$User= 'root';
$Password= '123456';
$table = 'users';
$conn=@mysqli_connect("$Host","$User","$Password","$Dbname");
$sql="SELECT username,password from $table where username='".$_POST['username']."';";
//echo $sql;
$query=mysqli_query($conn, $sql);
$result=mysqli_fetch_array($query);
/*
if (!($result=mysql_fetch_array($query))) {
 echo "User/Password Failed";
 exit(0);
} 
*/
$password = $_POST['password'];
$username = $result['username'];
if(trim($username)=="" || trim($password)=="" || $password != $result['password'] ) {
    echo "Login failed";
}
else {
    # Start the session
    echo "$username:$password";
    session_start();
    $_SESSION['USER_NAME'] = $username;
    echo "<head> <meta http-equiv=\"Refresh\" content=\"0;url=home.php\" > </head>";
}
?>
<?php
} // End if of a form
?>