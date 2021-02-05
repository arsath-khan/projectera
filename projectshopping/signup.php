<?php

include 'fun/dbConfig.php';
$username1=$username=$password=$gender=$country=$state=$email=$address="";
$age=$mobile=$pincode=0;


if(isset($_POST["submit"]))
{

  $username=$_POST["username"];
  $password=$_POST["password"];
  $gender=$_POST["gender"];
  $age=$_POST["age"];
  $country=$_POST["country"];
  $state=$_POST["state"];
  $email=$_POST["email"];
  $mobile=$_POST["mobile"];
  $address=$_POST["address"];
  $pincode=$_POST["pincode"];


  $fetch=$db->query("select * from user");
  $total_count = mysqli_num_rows($fetch);

  $select=$db->query("select username from user where username='$username'");
  while ($row = mysqli_fetch_assoc($select)) {
            $username1=$row['username'];
    }



  if($total_count==0 || $username1!=$username){
    $insert=$db->query("INSERT INTO user(username,password,gender,age,country,state,email,mobile,address,pincode)
    VALUES('$username','$password','$gender','$age','$country','$state','$email','$mobile','$address','$pincode')");

        if($insert)
        {
           header("Location:response.php?name=success.png&response=Register successfuly&color=lightgreen");
        }
        else
        {
          echo "failed, please try again.";
        }
    }

    else{
      header("Location:response.php?name=fail.png&response=Registration Failed&color=red");
    }

}

?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/signup_style.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/bootstrap.css">
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
        <li><a href="#">Products</a></li>
        <li><a href="#">Fashion</a></li>
        <li><a href="#">Blog</a></li>
      </ul>
      </div>
    </header>
  <div id="container">
   <form action="#" method="post">
     <div id="form">

   <div id="form1">
    <input type="text" class="form-control" id="username" name="username" placeholder="Enter username" required>
    <input type="password"  class="form-control" id="password" name="password" placeholder="Enter password" required>
    <select id="gender" name="gender" class="form-control" required>
      <option value="male">Male</option>
      <option value="female">Female</option>
      <option value="transgender">Transgender</option></select>
      <input type="text"  class="form-control" id="email" name="email" placeholder="E-mail" required>
      <input type="number" class="form-control" id="mobile" name="mobile" placeholder="Mobile" required>

    </div>

    <div id="form2">
    <input type="number" class="form-control" name="age" id="age" placeholder="Enter age" required>
    <input type="text"  class="form-control" id="country" name="country" placeholder="Enter country" required>
    <input type="text" class="form-control" id="state" name="state" placeholder="Enter state" required>
    <textarea  class="form-control" id="address" name="address" placeholder="Address" required></textarea>
    <input type="number" class="form-control" id="pincode" name="pincode" placeholder="Pincode" required>

    </div>
  </div>
  <input type="submit" name="submit" class="form-control" id="signup" value="Signup">
   </form>
   <a href="login.php"><p id="login">Exist User Login</p>
  </div>
</div>
</body>
</html>
