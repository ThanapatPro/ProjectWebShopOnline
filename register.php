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
    <title>Register</title>
</head>
<body>
   
    <!-- Section: Design Block -->
<section>
  <!-- Jumbotron -->
  <div class="px-5 py-5 pt-1 px-md-1 text-center text-lg-start container mt-5">
    <div class="container">
    <h1 class="my-5 fw-bold ls-tight text-center">
            <span class="text-primary">CREATE ACCOUNT</span>
          </h1>
      <div class="row gx-lg-5 align-items-center">
        <div class="col-lg-3 mb-5 mb-lg-0">
        </div>

        <div class="col-lg-6 mb-5 mb-lg-0">
          <div class="card">
            <div class="card-body py-5 px-md-5">

            <!-- form -->
            <form method="POST" action="register_check.php">

            <?php if (isset($_SESSION['err_password'])) : ?>
              <div class="alert alert-danger d-flex align-items-center text-center" role="alert">
                  <svg class="bi flex-shrink-0 me-2 text-center" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                    <?php echo $_SESSION['err_password']; ?>
              </div>                
            <?php endif; ?>

            <!-- first and last names -->
            <div class="row">
                  <div class="col-md-6 mb-4">
                    <div class="form-outline">
                        <label class="form-label">First name</label>
                        <input type="text" name="re_fname" class="form-control" required/>
                    </div>
                  </div>
                  <div class="col-md-6 mb-4">
                    <div class="form-outline">
                        <label class="form-label">Last name</label>
                        <input type="text" name="re_lname" class="form-control" required/>
                    </div>
                  </div>
                </div>

                <!-- phone number -->
                <div class="form-outline mb-4">
                    <label class="form-label">Email</label>
                    <input type="text" name="re_email" class="form-control" required />
                </div>

                <!-- Username input -->
                <div class="form-outline mb-4">
                    <label class="form-label">Username</label>
                    <input type="text" name="re_username" class="form-control" required />
                </div>

                <!-- Password input -->
                <div class="form-outline mb-4">
                    <label class="form-label">Password</label>
                    <input type="password" name="re_password" class="form-control" required />
                      </br>
                    <label class="form-label">Confirm Password</label>
                    <input type="password" name="re_cp" class="form-control" required />
                </div>
                
                <!-- Submit button -->
                <div class="form-outline mb-4 text-center">
                    <button type="submit" class="btn btn-primary btn-block mb-4" style="width:100% ;" name="re_submit">Register</button>
                </div>

                <!-- regiter -->
                <div class="form-outline mb-4">
                    <a href="login.php">Cancel</a>
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
   if (isset($_SESSION['err_password'])) {
   unset($_SESSION['err_password']);
   }
?>