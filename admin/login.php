<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

if (isset($_POST['login'])) {
  $username = $_POST['username'];
  $password = md5($_POST['password']);
  $sql = "SELECT ID FROM tbladmin WHERE UserName=:username and Password=:password";
  $query = $dbh->prepare($sql);
  $query->bindParam(':username', $username, PDO::PARAM_STR);
  $query->bindParam(':password', $password, PDO::PARAM_STR);
  $query->execute();
  $results = $query->fetchAll(PDO::FETCH_OBJ);
  if ($query->rowCount() > 0) {
    foreach ($results as $result) {
      $_SESSION['omrsaid'] = $result->ID;
    }

    if (!empty($_POST["remember"])) {
      //COOKIES for username
      setcookie("user_login", $_POST["username"], time() + (10 * 365 * 24 * 60 * 60));
      //COOKIES for password
      setcookie("userpassword", $_POST["password"], time() + (10 * 365 * 24 * 60 * 60));
    } else {
      if (isset($_COOKIE["user_login"])) {
        setcookie("user_login", "");
        if (isset($_COOKIE["userpassword"])) {
          setcookie("userpassword", "");
        }
      }
    }
    $_SESSION['login'] = $_POST['username'];
    echo "<script type='text/javascript'> document.location ='dashboard.php'; </script>";
  } else {
    echo "<script>alert('Invalid Details');</script>";
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

  <link rel="stylesheet" href="./css/Login.css">
  
  <title>Online Marriage Registration System|| Admin Sign In Page</title>
  
</head>

<body class="login-body">
<div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    <form action="" method="post">
        <h2>"Admin Login"</h2>
        <p>"Welcome to Admin Panel"</p>
        <h3>Login Here</h3>

        <label for="username">User Name:</label>
        <input type="text" placeholder="User Name" id="username" required="true" name="username" value="<?php if (isset($_COOKIE["user_login"])) {
                                                                                                                        echo $_COOKIE["user_login"];
                                                                                                                      } ?>" >

        <label for="password">Password</label>
        <input type="password" placeholder="Password" id="password" name="password" required="true" value="<?php if (isset($_COOKIE["userpassword"])) {
                                                                                                                          echo $_COOKIE["userpassword"];
                                                                                                                        } ?>">
                                                                                                                        
        <input type="checkbox" id="remember" name="remember" <?php if (isset($_COOKIE["user_login"])) { ?> checked <?php } ?> />    
                <span style="color: white">Remember me</span>
             
        <br>
        <button type="submit" name="login">Log In</button>
        <br>
        <div style="margin-top: 5px"><a href="forgot-password.php">Reset password</a></div>
    </form>
</body>

</html>



