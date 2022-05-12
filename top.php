  <?php
    session_start();
    require "../shivam/lockscreen/connection.php";
    ?>

  <head>

      <title>
          SHIVAM CAR SERVICE
      </title>

      <meta charset="utf-8">
      <meta content="width=device-width, initial-scale=1.0" name="viewport">
      <meta content="Free Website Template" name="keywords">
      <meta content="Free Website Template" name="description">

      <!-- Favicon -->

      <link href="../shivam/icon/favicon.png" rel="icon" type="image/x-icon">
      <!-- Google Font -->
      <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

      <!-- CSS Libraries -->
      <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
      <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
      <link href="lib/flaticon/font/flaticon.css" rel="stylesheet">
      <link href="lib/animate/animate.min.css" rel="stylesheet">
      <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">




      <!-- Template Stylesheet -->
      <link href="css/style.css" rel="stylesheet">


  </head>
  <!-- Top Bar Start -->

  <div class="top-bar">
      <div class="container">
          <div class="row align-items-center">
              <div class="col-lg-4 col-md-12">
                  <div class="logo">
                      <a href="index.php">
                          <h1>Shivam<span>Service</span></h1>
                          <!-- <img src="img/logo.jpg" alt="Logo"> -->
                      </a>
                  </div>
              </div>
              <div class="col-lg-8 col-md-7 d-none d-lg-block">
                  <div class="row">
                      <div class="col-4">
                          <div class="top-bar-item">
                              <div class="top-bar-icon">
                                  <i class="far fa-clock"></i>
                              </div>
                              <div class="top-bar-text">
                                  <h3>Opening Hour</h3>
                                  <p>Mon - Fri, 8:00 - 9:00</p>
                              </div>
                          </div>
                      </div>
                      <div class="col-4">
                          <div class="top-bar-item">
                              <div class="top-bar-icon">
                                  <i class="fa fa-phone-alt"></i>
                              </div>
                              <div class="top-bar-text">
                                  <h3>Call Us</h3>
                                  <p>+91 9537496805 </p>
                              </div>
                          </div>
                      </div>
                      <div class="col-4">
                          <div class="top-bar-item">
                              <div class="top-bar-icon">
                                  <i class="far fa-envelope"></i>
                              </div>
                              <div class="top-bar-text">
                                  <h3>Email Us</h3>
                                  <p>shivamcar78@gmail.com</p>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  <!-- Top Bar End -->

  <!-- Nav Bar Start -->
  <div class="nav-bar">
      <div class="container">
          <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
              <a href="#" class="navbar-brand">MENU</a>
              <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                  <span class="navbar-toggler-icon"></span>
              </button>

              <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                  <div class="navbar-nav mr-auto">
                      <a href="index.php" class="nav-item nav-link ">Home</a>
                      <a href="service.php" class="nav-item nav-link ">Our Service</a>
                      <a href="bestplan.php" class="nav-item nav-link">Best plans</a>

                      <a href="about.php" class="nav-item nav-link">About</a>
                      <a href="contact.php" class="nav-item nav-link">Contact</a>

                      <?php
                        if (isset($_SESSION["user_login"])) {
                        ?><div class="dropdown show">
                              <a class="nav-link dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                  <?php
                                    $email = $_SESSION['user_login']; //getting this email using session
                                    $get_username = "SELECT * FROM user WHERE user_email = '$email'";
                                    $res = mysqli_query($con, $get_username);
                                    $username = mysqli_fetch_array($res);
                                    echo $username['user_name'];
                                    ?>

                              </a>

                              <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                  <a class="nav-link dropdown-item" href="profile.php">Profile Settings</a>
                                  <a class="nav-link dropdown-item" href="my-membership.php">Membership</a>
                                  <a class="nav-link dropdown-item" href="my-appointment.php">Appointment</a>
                                  <a class="nav-link dropdown-item" href="my-vehicle.php">Vehicle</a>
                                  <a class="nav-link dropdown-item" href="../shivam/lockscreen/log-out-user.php">Log out</a>
                              </div>
                          </div>
                      <?php
                        }
                        ?>



                  </div>
                  <div class="ml-auto">
                      <!-- <a class="btn btn-custom" href="../shivam/bookapp.php">Get Appointment</a> -->

                      <?php
                        if (isset($_SESSION["user_login"])) {
                        ?>
                          <a class="btn btn-custom" href="../shivam/bookapp.php">MAKE AN APPOINTMENT</a>
                          <a class="btn btn-custom" href="../shivam/lockscreen/log-out-user.php">logout</a>
                      <?php
                        } else {
                        ?>
                          <a class="btn btn-custom" href="../shivam/lockscreen/login-user.php">MAKE AN APPOINTMENT</a>
                          <a class="btn btn-custom" href="lockscreen/login-user.php">Login</a>
                      <?php
                        }
                        ?>
                  </div>

              </div>
          </nav>
      </div>
  </div>