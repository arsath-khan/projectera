<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/login_style.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <meta charset="utf-8">
</head>
<body>
  <div id="main">
  <header>
   <div class="logo">'TrendY / ZonE'</div>
   <div class="menu">
     <ul>
      <li><a href="homepage.html">Home</a></li>
      <li><a href="#">About</a></li>
      <li><a href="#">Latest</a></li>
      <li><a href="#">Fashion</a></li>
      <li><a href="#">Blog</a></li>
    </ul>
    </div>
  </header>
  <div id="container">

   <form action="login.php" method="post">
     <input type="text" class="form-control" id="username" name="username" placeholder="Enter username">
    <input type="password" name="password" class="form-control" id="password" placeholder="Enter password">
    <input type="submit" name="submit" class="form-control" id="login" value="Login">
   </form>
   <a href="signup.php"><p id="signup">New user signup</p>
  </div>
</div>
</body>
</html>
<?php

include 'fun/dbConfig.php';
$username=$password=$username1=$password1="";



if(isset($_POST["submit"]))
{
  $username=$_POST["username"];
  $password=$_POST["password"];
	$select=$db->query("select username,password from user where username='$username'");

	if($select){
		echo "successfully.";
    while ($row = mysqli_fetch_assoc($select)) {
           $username1=$row['username'];
           $password1=$row['password'];
    }

     if($username==$username1 && $password==$password1){
       header("Location:homepage.html");
 }
     else{
       echo "false";
     }
	}else{
			echo "failed, please try again.";
	}
}


?>
