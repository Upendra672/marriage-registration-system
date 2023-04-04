<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if(isset($_POST['login'])) 
  {
    $mobno=$_POST['mobno'];
    $password=md5($_POST['password']);
    $sql ="SELECT ID FROM tbluser WHERE MobileNumber=:mobno and Password=:password";
    $query=$dbh->prepare($sql);
    $query->bindParam(':mobno',$mobno,PDO::PARAM_STR);
$query-> bindParam(':password', $password, PDO::PARAM_STR);
    $query-> execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);
    if($query->rowCount() > 0)
{
foreach ($results as $result) {
$_SESSION['omrsuid']=$result->ID;
}


$_SESSION['login']=$_POST['mobno'];
echo "<script type='text/javascript'> document.location ='dashboard.php'; </script>";
} else{
echo "<script>alert('Invalid Details');</script>";
}
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
   
    <title>Online Marriage Registration System||Sign in page</title>
  <link rel="stylesheet" href="./css/login.css">

    
  </head>
<body class="login-body">
<div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    <form action="" method="post">
        <h3>Login Here</h3>

        <label for="mobile">Mobile Number:</label>
        <input type="text" placeholder="Mobile Number" id="mobile" required="true" name="mobno" maxlength="10" pattern="[0-9]+" >

        <label for="password">Password</label>
        <input type="password" placeholder="Password" id="password" name="password" required="true" value="">
        <br>
        <div style="padding-top: 0px"><a href="forgot-password.php">Reset password</a></div>
        <button type="submit" name="login">Log In</button>
        <div style="padding-top: 5%"><a href="signup.php">Not registered yet | Click here for registration </a></div>
        <div class="social">
          <div class="go"><i class="fab fa-google"></i>  Google</div>
          <div class="fb"><i class="fab fa-facebook"></i>  Facebook</div>
        </div>
    </form>
</body>
</html>



