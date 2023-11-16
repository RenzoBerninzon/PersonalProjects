<link rel="stylesheet" href="assets/css/popup_style.css">
<style>
  .footer1 {
    position: fixed;
    bottom: 0;
    width: 100%;
    color: #5c4ac7;
    text-align: center;
  }
</style>
<?php

include('./constant/layout/head.php');
include('./constant/connect.php');
session_start();

if (isset($_SESSION['userId'])) {
  header('location:'.$store_url.'dashboard.php');   
}

$errors = array();

if ($_POST) {

  $username = $_POST['username'];
	$password = md5($_POST['password']);
  $email = $_POST['email'];
  if (empty($email) || empty($password) || empty($username)) {
    if ($email == "") {
      $errors[] = "email is required";
    }

    if ($password == "") {
      $errors[] = "Password is required";
    }

    if($username == ""){
      $errors[] = "Username is required";
    }
  } else {

    
	
				$sql = "INSERT INTO users (username, password,email) 
				VALUES ('$username', '$password' , '$email')";
				//echo $sql;exit;
				if($connect->query($sql) === TRUE) {
					$valid['success'] = true;
					$valid['messages'] = "Successfully Added";	
					// header('location:fetchUser.php');
				} else {
					$valid['success'] = false;
					$valid['messages'] = "Error while adding the members";
				} ?>



        <div class="popup popup--icon -success js_success-popup popup--visible">
          <div class="popup__background"></div>
          <div class="popup__content">
            <h3 class="popup__content__title">
              Registro
              </h1>
              <p>Registro Exitoso</p>
              <p>

                <?php echo "<script>setTimeout(\"location.href = 'dashboard.php';\",1500);</script>"; ?>
              </p>
          </div>
        </div>
<?php } // /else
  } // /else not empty email // password
?>

<div id="main-wrapper">
  <div class="unix-login">

    <div class="container-fluid" style="background-image: url('assets/uploadImage/Logo/banner3.jpg');
 background-color: #ffffff;background-size:cover">
      <div class="row ">
        <div class="col-md-4">
          <div class="login-content ">
            <div class="login-form">
              <center><img src="./assets/uploadImage/Logo/logo.png" style="width: 300px;"></center><br>
              <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" id="loginForm" class="row">
                <div class="form-group col-md-12">
                  <label>Username</label>
                  <input type="username" id="username" name="username" class="form-control" placeholder="username" required="">
                </div>

                <div class="form-group col-md-12">
                  <label lass="col-sm-3 control-label">Correo</label>
                  <input type="text" name="email" id="email" class="form-control" placeholder="correo" pattern="[^@\s]+@[^@\s]+\.[^@\s]+" title="Invalid email address" required="">

                </div>
                <div class="form-group col-md-12">
                  <label>Contraseña</label>
                  <input type="password" id="password" name="password" class="form-control" placeholder="contraseña" required="">
                </div>
                



                <div class="col-md-12">
                  <button style="background-color: #102b49; border-radius: 50px;" type="submit" name="login" class=" f-w-600 text-white btn  btn-flat m-b-30 m-t-30">Registrar</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>




<script src="./assets/js/lib/jquery/jquery.min.js"></script>

<script src="./assets/js/lib/bootstrap/js/popper.min.js"></script>

<script src="./assets/js/jquery.slimscroll.js"></script>

<script src="./assets/js/sidebarmenu.js"></script>

<script src="./assets/js/lib/sticky-kit-master/dist/sticky-kit.min.js"></script>

<script src="./assets/js/custom.min.js"></script>

</div>
</body>

</html>