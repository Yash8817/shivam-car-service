<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PHP OTP Login Form</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="otp.css">
   
</head>

<body>
    <div class="container">
        <div class="login-form ">

            <form method="POST">
                <h2 class="text-center">OTP verification</h2>
                <p class="text-center">Enter your email address</p>
                <div class="form-group first_box">
                    <input type="text" id="email" name='email' class="form-control" placeholder="Email" required="required">
                    <td id="message">
                    <td>
                        <span id="email_error" class="field_error"></span>
                </div>
                <div class="form-group first_box">
                    <button id="liveAlertBtn" type="button" class="btn btn-primary btn-block" onclick="send_otp()">Send
                        OTP</button>
                </div>
                <div class="form-group second_box">
                    <input type="text" id="otp" class="form-control" placeholder="OTP" required="required">
                    <span id="otp_error" class="field_error"></span>
                </div>
                <div class="form-group second_box">
                    <button type="button" name="Send_Otp" class="btn btn-primary btn-block" onclick="submit_otp()">Submit OTP</button>
                </div>
                <div class="link forget-pass text-center "><a href="login-user.php">Back to login</a></div>

            </form>
            <div id="liveAlertPlaceholder"></div>

        </div>
    </div>

    <script>
        var alertPlaceholder = document.getElementById('liveAlertPlaceholder')
        var alertTrigger = document.getElementById('liveAlertBtn')

        function alert(message, type) {
            var wrapper = document.createElement('div')
            wrapper.innerHTML = '<div class="alert alert-' + type + ' alert-dismissible" role="alert">' + message + '</div>'
            alertPlaceholder.append(wrapper)
        }

        if (alertTrigger) {
            alertTrigger.addEventListener('click', function() {
                alert('OTP has been send to your account.', 'success')
            })
        }

        setTimeout(function() {
            $('#liveAlertPlaceholder').fadeOut('normal');
        }, 5000); // <-- time in milliseconds




        function send_otp() {
            var email = jQuery('#email').val();
            jQuery.ajax({
                url: 'mail.php.',
                type: 'post',
                data: 'email=' + email,
                success: function(result) {
                    if (result == "yes") {
                        alert("send");
                        // jQuery('.second_box').show();
                        // jQuery('.first_box').hide();
                    }
                    if (result == "not_exist") {
                        jQuery('#email_error').html('Please enter valid email');
                    }
                }
            });
        }

        function submit_otp() {
            var otp = jQuery('#otp').val();
            jQuery.ajax({
                url: 'check_otp.php',
                type: 'post',
                data: 'otp=' + otp,
                success: function(result) {
                    if (result == 1) {
                        window.location = 'change-password.php'
                    }
                    if (result == 0) {
                        jQuery('#otp_error').html('Please enter valid otp');
                    }
                }
            });
        }
    </script>
    <style>
        .second_box {
            display;
        }

        .field_error {
            color: red;
        }
    </style>
</body>

</html>