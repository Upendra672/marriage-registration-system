<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (isset($_POST['submit'])) {
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $mobno = $_POST['mobno'];
  $add = $_POST['address'];
  $password = md5($_POST['password']);
  $ret = "select MobileNumber from tbluser where MobileNumber=:mobno";
  $query = $dbh->prepare($ret);
  $query->bindParam(':mobno', $mobno, PDO::PARAM_STR);
  $query->execute();
  $results = $query->fetchAll(PDO::FETCH_OBJ);
  if ($query->rowCount() == 0) {
    $sql = "Insert Into tbluser(FirstName,LastName,MobileNumber,Address,Password)Values(:fname,:lname,:mobno,:add,:password)";
    $query = $dbh->prepare($sql);
    $query->bindParam(':fname', $fname, PDO::PARAM_STR);
    $query->bindParam(':lname', $lname, PDO::PARAM_STR);
    $query->bindParam(':mobno', $mobno, PDO::PARAM_INT);
    $query->bindParam(':add', $add, PDO::PARAM_STR);

    $query->bindParam(':password', $password, PDO::PARAM_STR);
    $query->execute();
    $lastInsertId = $dbh->lastInsertId();
    if ($lastInsertId) {

      echo "<script>alert('You have signup  Succesfully');</script>";
      echo "<script type='text/javascript'> document.location ='login.php'; </script>";
    } else {

      echo "<script>alert('Something went wrong.Please try again');</script>";
    }
  } else {

    echo "<script>alert('This Mobile Number already exist. Please try again');</script>";
  }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>


  <title>Online Marriage Registration System || Sign Up page</title>
  <link rel="stylesheet" href="./css/loginn.css">



</head>

<body class="login-body">
  <div class="background">
    <div class="shape"></div>
    <div class="shape"></div>
  </div>
  <form action="" method="post" style="height:770px;" name="form">
    <h3>SignUp Here</h3>

    <label for="fname">First Name:</label>
    <input type="text" placeholder="First Name" id="fname" required="true" name="fname" value="">

    <label for="lname">Last Name:</label>
    <input type="text" placeholder="Last Name" id="lname" required="true" name="lname" value="">

    <label for="mobile">Mobile Number:</label>
    <input type="text" placeholder="Mobile Number" id="mobile" required="true" name="mobno" maxlength="10" pattern="[0-9]+">

    <label for="address">Address:</label>
    <input type="text" placeholder="Address" required="true" name="address" id="address" value="">

    <label for="password">Password</label>
    <input type="password" placeholder="Password" id="password" name="password" required="true" value="">

    <button type="submit" name="submit" onclick="phonenumber(document.form.mobno)">Sign up</button>
    <!-- <button class="btn btn-primary"> <a href="../index.php">Back Home</a></button> -->
    <div class="form-group mg-b-20" style="padding-top: 20px"><a href="login.php">Do you have an account ? || signin</a> </div>

    <div class="social">
      <div class="go"><i class="fab fa-google"></i> Google</div>
      <div class="fb"><i class="fab fa-facebook"></i> Facebook</div>
    </div>
  </form>
  <script>
    function phonenumber(inputtxt) {
      var phoneno = /^\d{10}$/;
      if (inputtxt.value.match(phoneno)) {
        return false;
      }
    }
  </script>
</body>

</html>