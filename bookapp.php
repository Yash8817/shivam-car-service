<?php
session_start();
if (!isset($_SESSION["user_login"])) {
  // header('location: ../shivam/lockscreen/login-user.php');
  echo "<script>location.href = '../shivam/lockscreen/login-user.php';</script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <script>

  </script>
  <!--form -->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>SHIVAM CAR SERVICE</title>


  <link rel="stylesheet" href="fontsf/material-icon/css/material-design-iconic-font.min.css">

  <!-- <link rel="stylesheet" href="../shivam/css/scss/add.scss" > -->
  <link rel="stylesheet" href="css/style.css">


  <meta charset="utf-8">
  <title>AutoWash - Car Wash Website Template</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="Free Website Template" name="keywords">
  <meta content="Free Website Template" name="description">

  <!-- Favicon -->
  <link href="img/favicon.ico" rel="icon">

  <!-- Google Font -->
  <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
  <link href="lib/flaticon/font/flaticon.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


  <!-- Template Stylesheet -->
  <link href="css/style.css" rel="stylesheet">
  <style>
    * {
      box-sizing: border-box;
    }

    body {
      background-color: #f1f1f1;
    }

    #regForm {
      background-color: #ffffff;
      margin: 10px auto;
      font-family: Raleway;
      padding: 40px;
      width: 70%;
      min-width: 300px;
    }

    h1 {
      text-align: center;
    }

    input {
      padding: 10px;
      width: 100%;
      font-size: 17px;
      font-family: Raleway;
      border: 1px solid #aaaaaa;
    }

    /* Mark input boxes that gets an error on validation: */
    input.invalid {
      background-color: #ffdddd;
    }

    /* Hide all steps by default: */
    .tab {
      display: none;
    }

    button {
      background-color: #04AA6D;
      color: #ffffff;
      border: none;
      padding: 10px 20px;
      font-size: 17px;
      font-family: Raleway;
      cursor: pointer;
    }

    button:hover {
      opacity: 0.8;
    }

    #prevBtn {
      background-color: #bbbbbb;
    }

    /* Make circles that indicate the steps of the form: */
    .step {
      height: 15px;
      width: 15px;
      margin: 0 2px;
      background-color: #bbbbbb;
      border: none;
      border-radius: 50%;
      display: inline-block;
      opacity: 0.5;
    }

    .step.active {
      opacity: 1;
    }

    /* Mark the steps that are finished and valid: */
    .step.finish {
      background-color: #04AA6D;
    }
    select {
            width: 513px;
            padding: 5px 35px 5px 5px;
            font-size: 16px;
            border: 1px solid #CCC;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            padding: 10px;
            background-repeat: no-repeat;
            background-image: linear-gradient(45deg, transparent 50%, currentColor 50%), linear-gradient(135deg, currentColor 50%, transparent 50%);
            background-position: right 15px top 1em, right 10px top 1em;
            background-size: 5px 5px, 5px 5px;

        }
        #regForm {
            margin: 10px auto;
            width: 70%;
            min-width: 300px;
        }

        input {
            padding: 10px;
            width: 100%;
            border: 1px solid #aaaaaa;
        }

  
  </style>


</head>

<body style="background-color: aliceblue;">
  <?php require "top.php" ?>
  <!-- Page Header Start -->
  <div class="page-header">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <h2 style="margin-bottom: 10px;">Book Appointment</h2>
        </div>
        <div class="col-12">
          <a href="../shivam/">Home</a>
          <a href="">Book appointment</a>
        </div>
      </div>
    </div>
  </div>
  <!-- Page Header End -->

  <form id="regForm" action="add-appoiment.php" method="POST">
    <!-- One "tab" for each step in the form: -->
    <div class="tab">
      <h1>personal details:</h1>
      <a href="../shivam/profile.php">
      <button type="button" class="edit-profile float-right"  >Update profile</button>
      </a>
      <?php
      $email = $_SESSION['user_login'];
      $sql = "SELECT * ,customer.customer_id   FROM user  JOIN customer on user.user_id = customer.Useruser_id  WHERE user_email ='$email'";
      $res = mysqli_query($con, $sql);
      if (mysqli_num_rows($res) > 0) {
        while ($row = mysqli_fetch_assoc($res)) {
      ?>
          <br>
          <input type="hidden" value="<?php echo $row['customer_id'];  ?>" name="c_id">
          <label for="fname">first name</label>
          <p><input placeholder="First name..." id="fname" value="<?php echo $row['user_name']; ?>" oninput="this.className = ''" name="fname"></p>
          <label for="u_no">phone number</label>
          <p><input placeholder="E-mail..." id="u_no" value="<?php echo $row['user_phone']; ?>" oninput="this.className = ''" name="email"></p>
          <label for="email">email</label>
          <p><input placeholder="Phone..." id="email" value="<?php echo $row['user_email']; ?>" oninput="this.className = ''" name="phone"></p>
          <label for="address">address</label>
          <p><input placeholder="address...." id="address" value="<?php echo $row['user_add']; ?>" oninput="this.className = ''" name="address"></p>

      <?php }
      } ?>
    </div>


    <div class="tab">
      <h1>personal details:</h1>
      <?php
      $sql1 = "SELECT *  FROM vehicle JOIN customer on vehicle.customer_id = customer.customer_id JOIN user ON user.user_id = customer.Useruser_id
          WHERE user.user_email = '$email'";
      $res1 = mysqli_query($con, $sql1);
      if (mysqli_num_rows($res1) > 0) {
      ?>
        <select name="vehicle_rto" id="car-type" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" oninput="this.className ='' ">
          <option value="" selected disabled>select your vehicle</option>
          
          <?php
          while ($row1 = mysqli_fetch_assoc($res1)) {
            echo "<option value='{$row1['rto_number']}'>{$row1['rto_number']}</option>";
          }
          ?>
        </select>
        OR
          <a href="../shivam/new_vehicle.php">
      <button type="button" class="edit-profile " style="margin-bottom: 20px;"  >Add vehicle</button>
      </a>
      <?php
      } else {
      ?>

<a href="../shivam/new_vehicle.php">
      <button type="button" class="edit-profile " style="margin-bottom: 20px;"  >Add vehicle</button>
      </a>
    </div>
    <!-- </form> -->

  <?php } ?>
  </div>



  <div class="tab">
    <h1>Appoiment time</h1>

    <label for="a_date">Date</label>
    <p><input type="date" min="<?php echo date("Y-m-d"); ?>" id="a_date" oninput="this.className = ''" name="a_date"></p>
    <label for="a_date">Time</label>
    <p><select id="a_date" oninput="this.className = ''" name="a_time">
    <option value="09:00:00">09:00 AM - 10:00 AM</option>
    <option value="10:00:00">10:00 AM - 1100 AM</option>
    <option value="11:00:00">11:00 AM - 12:00 AM</option>
    <option value="12:00:00">12:00 AM - 1:00 AM</option>
    <option value="01:00:00">1:00 AM - 2:00 AM</option>
    <option value="02:00:00">2:00 AM - 3:00 AM</option>
    <option value="03:00:00">3:00 AM - 4:00 AM</option>
    <option value="04:00:00">4:00 AM - 5:00 AM</option>
    <option value="05:00:00">5:00 AM - 6:00 AM</option>
    <option value="06:00:00">6:00 AM - 7:00 AM</option>
    
    
       </select>

  </div>





  <div style="overflow:auto;">
    <div>
      <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
      <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
    </div>
  </div>
  <!-- Circles which indicates the steps of the form: -->
  <div style="text-align:center;margin-top:40px;">
    <span class="step"></span>
    <span class="step"></span>
    <span class="step"></span>
    <span class="step"></span>
  </div>
  </form>

  <script>
    $(document).ready(function() {
      function LoadData(type, cat_id) {
        $.ajax({
          url: "load-type.php",
          type: "POST",
          data: {
            type: type,
            id: cat_id
          },
          success: function(data) {
            if (type == "statedata") {
              $("#state").html(data);
            } else if (type == "area") {
              $("#area").html(data);
            } else {
              $("#county").append(data);
            }
          }
        });
      }
      LoadData();

      $("#county").on("change", function() {

        var county = $("#county").val();

        if (county != "") {
          LoadData("statedata", county);
        } else {
          $("#state").html("");
          $("#area").html("");
        }


      });


      $("#state").on("change", function() {

        var state = $("#state").val();


        if (state != "") {
          LoadData("area", state);
        } else {
          $("#area").html("");
        }



      });

    });
  </script>


  <script>
    var currentTab = 0; // Current tab is set to be the first tab (0)
    showTab(currentTab); // Display the current tab

    function showTab(n) {
      // This function will display the specified tab of the form...
      var x = document.getElementsByClassName("tab");
      x[n].style.display = "block";
      //... and fix the Previous/Next buttons:
      if (n == 0) {
        document.getElementById("prevBtn").style.display = "none";
      } else {
        document.getElementById("prevBtn").style.display = "inline";
      }
      if (n == (x.length - 1)) {
        document.getElementById("nextBtn").innerHTML = "Submit";
      } else {
        document.getElementById("nextBtn").innerHTML = "Next";
      }
      //... and run a function that will display the correct step indicator:
      fixStepIndicator(n)
    }

    function nextPrev(n) {
      // This function will figure out which tab to display
      var x = document.getElementsByClassName("tab");
      // Exit the function if any field in the current tab is invalid:
      if (n == 1 && !validateForm()) return false;
      // Hide the current tab:
      x[currentTab].style.display = "none";
      // Increase or decrease the current tab by 1:
      currentTab = currentTab + n;
      // if you have reached the end of the form...
      if (currentTab >= x.length) {
        // ... the form gets submitted:
        document.getElementById("regForm").submit();
        return false;
      }
      // Otherwise, display the correct tab:
      showTab(currentTab);
    }

    function validateForm() {
      // This function deals with validation of the form fields
      var x, y, i, valid = true;
      x = document.getElementsByClassName("tab");
      y = x[currentTab].getElementsByTagName("input");
      // A loop that checks every input field in the current tab:
      for (i = 0; i < y.length; i++) {
        // If a field is empty...
        if (y[i].value == "") {
          // add an "invalid" class to the field:
          y[i].className += " invalid";
          // and set the current valid status to false
          valid = false;
        }
      }
      // If the valid status is true, mark the step as finished and valid:
      if (valid) {
        document.getElementsByClassName("step")[currentTab].className += " finish";
      }
      return valid; // return the valid status
    }

    function fixStepIndicator(n) {
      // This function removes the "active" class of all steps...
      var i, x = document.getElementsByClassName("step");
      for (i = 0; i < x.length; i++) {
        x[i].className = x[i].className.replace(" active", "");
      }
      //... and adds the "active" class on the current step:
      x[n].className += " active";
    }
  </script>

  <?php require "foter.php" ?>

</body>
</hmml>