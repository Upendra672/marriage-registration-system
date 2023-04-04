<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if (isset($_POST['submit'])) {
  $email = $_POST['email'];
  $mobile = $_POST['mobile'];
  $newpassword = md5($_POST['newpassword']);
  $sql = "SELECT Email FROM tbladmin WHERE Email=:email and MobileNumber=:mobile";
  $query = $dbh->prepare($sql);
  $query->bindParam(':email', $email, PDO::PARAM_STR);
  $query->bindParam(':mobile', $mobile, PDO::PARAM_STR);
  $query->execute();
  $results = $query->fetchAll(PDO::FETCH_OBJ);
  if ($query->rowCount() > 0) {
    $con = "update tbladmin set Password=:newpassword where Email=:email and MobileNumber=:mobile";
    $chngpwd1 = $dbh->prepare($con);
    $chngpwd1->bindParam(':email', $email, PDO::PARAM_STR);
    $chngpwd1->bindParam(':mobile', $mobile, PDO::PARAM_STR);
    $chngpwd1->bindParam(':newpassword', $newpassword, PDO::PARAM_STR);
    $chngpwd1->execute();
    echo "<script>alert('Your Password succesfully changed');</script>";
  } else {
    echo "<script>alert('Email id or Mobile no is invalid');</script>";
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

  <!-- custom stylesheet -->
  <link rel="stylesheet" href="./css/Login.css">

  <title>Admin || Forgot Password Page</title>

<!-- script -->
  <script type="text/javascript">
    function valid() {
      if (document.chngpwd.newpassword.value != document.chngpwd.confirmpassword.value) {
        alert("New Password and Confirm Password Field do not match  !!");
        document.chngpwd.confirmpassword.focus();
        return false;
      }
      return true;
    }
  </script>
</head>

<body class="login-body">
  <div class="background">
    <div class="shape"></div>
    <div class="shape"></div>
  </div>
  <form action="" method="post" method="post" name="chngpwd" onSubmit="return valid();" style="height: 560px">
    <h4> <b> Forgot Password || Change here </b></h4>

    <label for="email">Email:</label>
    <input type="email" placeholder="Email" id="email" required="true" name="email">


    <label for="mobile">Mobile Number:</label>
    <input type="text" placeholder="Mobile Number" id="mobile" required="true" name="mobile">

    <label for="newpass">New Password:</label>
    <input type="password" name="newpassword" id="newpass" placeholder="New Password" required="true" />

    <label for="password">Confirm Password:</label>
    <input type="password" placeholder="Confirm Password" id="password" name="confirmpassword" required="true" value="">
    <button type="submit" name="submit">Reset</button>
    <div style="padding-top: 5%"><a href="login.php"> Click here to login </a></div>
  </form>
</body>
</html>