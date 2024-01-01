<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login Sistem Pakar</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->  
  <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->  
  <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->  
  <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="css/util.css">
  <link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>

            


  <form onSubmit="validasi()" action="proseslogin.php" id="login" name="login" method="post"  >

  <div class="limiter">
   


    <div class="container-login100" style="background-image: url('images/bg-01.jpg');">
      <div class="wrap-login100">
        <form class="login100-form validate-form">
          <span class="login100-form-logo">
            <i class="zmdi zmdi-landscape"></i>


                   <?php if (isset($_GET['error'])) {
             

                  echo "<script>alert('Username dan password tidak sesuai!'); window.location = 'index.php'</script>"; 

              }
                  

                          ?>


          </span>

          <span class="login100-form-title p-b-34 p-t-27">
            Log in Sistem Pakar
          </span>


         

          <div class="wrap-input100 validate-input" data-validate = "Enter username">

            <input type="text" id="username" name="username" class="input100" autocomplete="off" placeholder="Username" required="required">

           
            <span class="focus-input100" data-placeholder="&#xf207;"></span>
          </div>

          <div class="wrap-input100 validate-input" data-validate="Enter password">
            
            <input type="password" id="password" name="password" class="input100" autocomplete="off" placeholder="Password" required="password">


            <span class="focus-input100" data-placeholder="&#xf191;"></span>
          </div>

          <div class="contact100-form-checkbox">
            <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
            <label class="label-checkbox100" for="ckb1">
              Remember me
            </label>
          </div>

          <div class="container-login100-form-btn">
            <button onclick="validasi()" class="login100-form-btn">
              Login
            </button>
          </div>

          <div class="text-center p-t-90">
            <a class="txt1" href="ayodaftar/index.php">
              Daftar Akun
            </a>
            <br>
            <a class="txt1" href="../index.html">
              Kembali kemenu utama
            </a>

          </div>
        </form>
      </div>
    </div>
  </div>
  

  <div id="dropDownSelect1"></div>
  

      <!-- JS -->
   <script type="text/javascript">
    function validasi() {
        var username = document.getElementById("username").value;
        var password = document.getElementById("password").value;
        
        if (username != "" && password!="") {
            return false;
            
        }else{
            alert('Anda harus mengisi data dengan lengkap !');

        }
    }
</script>
<!--===============================================================================================-->
  <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
  <script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
  <script src="vendor/bootstrap/js/popper.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
  <script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
  <script src="vendor/daterangepicker/moment.min.js"></script>
  <script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
  <script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
  <script src="js/main.js"></script>

</body>
</html>