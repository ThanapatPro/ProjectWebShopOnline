<?php 
include 'config/condb.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <title>Login</title>
</head>
<body>
   
    <!-- Section: Design Block -->
<section>
  <!-- Jumbotron -->
  <div class="px-5 py-5 pt-1 px-md-1 text-center text-lg-start container mt-5" >
    <div class="container">
    <h1 class="my-5 fw-bold ls-tight text-center">
            <span class="text-primary">LOGIN</span>
          </h1>
      <div class="row gx-lg-5 align-items-center">
        <div class="col-lg-3 mb-5 mb-lg-0">
        </div>

        <div class="col-lg-6 mb-5 mb-lg-0">
          <div class="card">
            <div class="card-body py-5 px-md-5">

              <form method="POST" action="login_check.php">
                <!-- Username input -->
                <div class="form-outline mb-4">
                    <label class="form-label">Username</label>
                    
                    <input type="username" name="username" class="form-control" required />
                </div>

                <!-- Password input -->
                <div class="form-outline mb-4">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" required />
                </div>

                <?php if (isset($_SESSION["error"])) : ?>
                  <div class="alert alert-danger d-flex align-items-center text-center" role="alert">
                    <svg class="bi flex-shrink-0 me-2 text-center" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                    <?php echo $_SESSION["error"]; ?>
                  </div>                
                <?php endif; ?>

                <!-- Submit button -->
                <div class="form-outline mb-0 text-center">
                    <button type="submit" class="btn btn-primary btn-block mb-4" style="width:100% ;" name="login">
                        Login
                    </button>
                </div>

                <div class="form-outline mb-0 text-center">
                <a href="index.php" class="btn btn-danger btn-block mb-4" style="width:100% ;">Cancel</a>
                </div>

                <div class="form-outline mb-4">
                    <a href="register.php">Register</a>
                </div>

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Jumbotron -->
</section>
<!-- Section: Design Block -->

</body>
</html>

<?php
   if (isset($_SESSION['error'])) {
   unset($_SESSION['error']);
   }
?>