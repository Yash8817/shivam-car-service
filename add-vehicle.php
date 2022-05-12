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
    </style>


</head>

<body style="background-color: aliceblue;">
    <?php require "top.php" ?>
    <div class="row">
        <div class="col-md-12">
            <div class="title text-center ">
                <div class="titleborder shadow">
                    <h1>Book appoiment <small>it's easy </small></h1>
                </div>
            </div>
        </div>
    </div>

    <form id="regForm" action="add-vehicle.php" method="POST">
        <!-- One "tab" for each step in the form: -->

<div class="add_vehicle"></div>
<!-- <form action="add-vehicle.php" method="POST"> -->
<label for="v_RTO">RTO number</label>
<p><input id="v_RTO" oninput="this.className = ''" name="v_RTO"></p>

<label for="v_chassis">Chassic number</label>
<p><input id="v_chassis" oninput="this.className = ''" name="v_chassis"></p>

<label for="v_model">Model name</label>
<p><input id="v_model" oninput="this.className = ''" name="v_model"></p>
<label for="v_year">Model year</label>
<p><input id="v_year" oninput="this.className = ''" name="v_year"></p>

<label for="v_maker">Maker name</label>
<p><input id="v_maker" oninput="this.className = ''" name="v_maker"></p>

<label for="v_type">select vehicle type</label>
<select name="v_type" id="v_type">
    <option value="" selected disabled> select your vehicle</option>
    <option value="sedan">sedan</option>
    <option value="SUV">SUV</option>
    <option value="VAN">VAN</option>
    <option value="crossover">crossover</option>
</select>

<!-- <button id="vehicle-add" class="btn btn-primary">
                Add vehicle
            </button> -->
<button type="button" name="add_vehicle" class="btn btn-primary" id="vehicle-add">Primary</button>
<!-- <a class="btn btn-primary" name="add_ve" role="button" id="vehicle-add">Link</a> -->

        <!-- </form> -->


    </div>
    </form>
    <script>
    
    

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

    </script>

    <?php require "foter.php" ?>

</body>
</hmml>



















































