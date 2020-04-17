<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
  require_once("../classes/global.php");
  $myusername = mysqli_real_escape_string($db, $_POST['inputUsername']);
  $mypassword = mysqli_real_escape_string($db, $_POST['inputPassword']);

  $sql = "SELECT id,`name` FROM users WHERE user = '$myusername' and pass = '$mypassword' LIMIT 1;";
  $result = $db->query($sql);
  $msg = "";

  if ($result->num_rows >= 1) {

    $row = $result->fetch_array(MYSQLI_ASSOC);
    $_SESSION['login_user'] = $myusername;
    $_SESSION['login_name'] = $row["name"];
    $_SESSION['auth'] = 1;
    header("location: rifas/");

  } else {
    $msg = "No valid user! Please confirm your credentials";
  }
}

?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Rifas - Login</title>
  <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="../css/sb-admin.css" rel="stylesheet">
</head>

<body class="bg-dark">

  <div class="container">
    <div class="card card-login mx-auto mt-5">

  <!-- PHP ERROR SHOW -->
    <?php
    if (!empty($msg)) {
      echo '
          <div class ="alert alert-danger">
            <strong> Error !</strong> ' . $msg . ' .
          </div>
      ';
    }
    ?>
    <!-- END A PHP ERROR -->

      <div class="card-header">Rifas - Login</div>
      <div class="card-body">
        <form action="" method="post">
          <div class="form-group">
            <div class="form-label-group">
              <input type="text" id="inputUsername" name="inputUsername" class="form-control" placeholder="Username" required="required" autofocus="autofocus">
              <label for="inputUsername">Username</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="password" id="inputPassword" name="inputPassword" class="form-control" placeholder="Password" required="required">
              <label for="inputPassword">Password</label>
            </div>
          </div>
          <input type="submit" class="btn btn-primary btn-block" value="Login">
        </form>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
</body>
</html>
