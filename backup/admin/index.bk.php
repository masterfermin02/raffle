
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Luis Rodriguez">
    <title>Rifas login</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.css" rel="stylesheet" crossorigin="anonymous">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

    </style>
    <!-- Custom styles for this template -->
    <link href="../css/floating-labels.css" rel="stylesheet">
  </head>

  <body>
    <form class="form-signin">
        <div class="text-center mb-4">
            <img class="mb-4" src="../img/demo-logo.png" alt="" width="72" height="72">
            <h1 class="h3 mb-3 font-weight-normal">Admin Login</h1>
        </div>

        <div class="form-label-group">
            <input type="text" id="Username" class="form-control" placeholder="Username" required autofocus>
            <label for="inputEmail">Username</label>
        </div>

        <div class="form-label-group">
            <input type="password" id="Password" class="form-control" placeholder="Password" required>
            <label for="inputPassword">Password</label>
        </div>

    <!-- <div class="checkbox mb-3">
        <label></label>
        <input type="checkbox" value="remember-me"> Remember me
        </label>
    </div> -->

        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
        <!-- <p class="mt-5 mb-3 text-muted text-center">&copy; 2017-2019</p> -->
    </form>
</body>
</html>
