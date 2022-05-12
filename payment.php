<?php

require_once "../shivam/lockscreen/connection.php";


if (isset($_GET['mid']) && isset($_GET['purchase']) && isset($_GET['mem_duration']) && isset($_GET['payment_succes']) == 1) 
{
    session_start();
    $email = $_SESSION['user_login']; //getting this email using session
    $get_username = "SELECT customer.* FROM customer JOIN user ON user.user_id  = customer.Useruser_id WHERE user.user_email ='$email'";
    $res = mysqli_query($con, $get_username);
    $username = mysqli_fetch_array($res);
    $customer_id = $username['customer_id'];
    $mem_duration = $_GET['mem_duration'];
    $price = $_GET['price'];
    $start_date = date('Y-m-d');
    $newDate = date('Y-m-d', strtotime($start_date . ' + 3 months'));
    $mid = $_GET['mid'];
    $is_active = 1;
    $payment = 1;



    $check_mem = "SELECT * FROM membership WHERE membership.customercustomer_id = $customer_id AND membership.membership_details_id = $mid";
    if (mysqli_num_rows(mysqli_query($con,  $check_mem)) > 0) {
        echo "<script>alert('membership is active already !');</script>";
    } else {
        $purcha_membershi_sql = "INSERT INTO membership(membership_id,customercustomer_id,membership_details_id,start_date,end_date,is_active,payment)
        VALUES ('','$customer_id','$mid','$start_date' ,'$newDate','$is_active','$price')";
        if (mysqli_query($con, $purcha_membershi_sql)) {
            echo "<script> location.href=' my-membership.php'; </script>";
        } else {
            die("error in purchase membership...");
        }
    }

?>
<?php



}
?>


<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <script>
        $(function($) {
            $('[data-numeric]').payment('restrictNumeric');
            $('.cc-number').payment('formatCardNumber');
            $('.cc-exp').payment('formatCardExpiry');
            $('.cc-cvc').payment('formatCardCVC');
            $.fn.toggleInputError = function(erred) {
                this.parent('.form-group').toggleClass('has-error', erred);
                return this;
            };
            $('form').submit(function(e) {
                e.preventDefault();
                var cardType = $.payment.cardType($('.cc-number').val());
                $('.cc-number').toggleInputError(!$.payment.validateCardNumber($('.cc-number').val()));
                $('.cc-exp').toggleInputError(!$.payment.validateCardExpiry($('.cc-exp').payment('cardExpiryVal')));
                $('.cc-cvc').toggleInputError(!$.payment.validateCardCVC($('.cc-cvc').val(), cardType));
                $('.cc-brand').text(cardType);
                $('.validation').removeClass('text-danger text-success');
                $('.validation').addClass($('.has-error').length ? 'text-danger' : 'text-success');
            });
        });
    </script>
    <style>
    .padding {
        padding: 5rem !important
    }

    .form-control:focus {
        box-shadow: 10px 0px 0px 0px #ffffff !important;
        border-color: #4ca746
    }
</style>
</head>



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.payment/3.0.0/jquery.payment.min.js"></script>
<div class="padding">
    <div class="row">
        <div class="container-fluid d-flex justify-content-center">
            <div class="col-sm-8 col-md-6">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6"> <span>CREDIT/DEBIT CARD PAYMENT</span> </div>
                            <div class="col-md-6 text-right" style="margin-top: -5px;"> <img src="https://img.icons8.com/color/36/000000/visa.png"> <img src="https://img.icons8.com/color/36/000000/mastercard.png"> <img src="https://img.icons8.com/color/36/000000/amex.png"> </div>
                        </div>
                    </div>
                    <label for="PaymentAmount">Payment amount</label>
                    <span>Rs.</span>
                  <span><?php echo $_GET['price'] ?></span>
                    <div class="card-body" style="height: 350px">
                        <div class="form-group"> <label for="cc-number" class="control-label">CARD NUMBER</label> <input id="cc-number" type="tel" class="input-lg form-control cc-number" autocomplete="cc-number" placeholder="•••• •••• •••• ••••" required> </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group"> <label for="cc-exp" class="control-label">CARD EXPIRY</label> <input id="cc-exp" type="tel" class="input-lg form-control cc-exp" autocomplete="cc-exp" placeholder="•• / ••" required> </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group"> <label for="cc-cvc" class="control-label">CARD CVC</label> <input id="cc-cvc" type="tel" class="input-lg form-control cc-cvc" autocomplete="off" placeholder="••••" required> </div>
                            </div>
                        </div>
                        <div class="form-group"> <label for="numeric" class="control-label">CARD HOLDER NAME</label> <input type="text" class="input-lg form-control"> </div>
                        <div class="form-group"><a href="payment.php?mid=<?php echo $_GET['mid'] ?>&purchase=1&mem_duration=<?php echo $_GET['mem_duration']; ?>&price=<?php echo $_GET['price']; ?>&payment_succes=1"> <input value="MAKE PAYMENT" type="button" class="btn btn-success btn-lg form-control" style="font-size: .8rem;"> </div></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




