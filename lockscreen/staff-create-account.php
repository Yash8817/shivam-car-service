<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<script src="https://unpkg.com/gijgo@1.9.11/js/gijgo.min.js" type="text/javascript"></script>
<link href="https://unpkg.com/gijgo@1.9.11/css/gijgo.min.css" rel="stylesheet" type="text/css" />

<!------ Include the above in your HEAD tag ---------->

<div class="container">
    <div class="row">

        <div class="col-md-8 col-md-offset-2">
            <form role="form" method="POST" action="#">

                <legend class="text-center">Staff Register</legend>

                <fieldset>
                    <legend>Account Details</legend>

                    <div class="form-group col-md-6">
                        <label for="first_name">First name</label>
                        <input type="text" class="form-control" name="" id="first_name" placeholder="First Name">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="last_name">Last name</label>
                        <input type="text" class="form-control" name="last_name" id="" placeholder="Last Name">
                    </div>

                    <div class="form-group col-md-12">
                        <label for="">Email</label>
                        <input type="email" class="form-control" name="" id="" placeholder="Email">
                    </div>

                    <!-- .address. -->

                    <div class="form-group col-md-12">
                        <label>Address</label>
                        <textarea placeholder="Enter Address Here.." rows="3" class="form-control"></textarea>
                    </div>



                    <!-- .. -->

                    <!-- Contact number-->

                    <div class="form-group col-md-12">
                        <label for="mobile">Contact No.</label>

                        <div class="input-group col-md-6">
                            <span class="input-group-addon">
                                <i class="">+91</i>
                            </span>
                            <input id="mobile" maxlength="10" name="mobile" placeholder="xxxxxxxxxxxx" class="form-control input-md " type="number" value={{mobile}}>

                        </div>

                    </div>

                    <!-- .. -->

                    <div class="form-group col-md-6">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="" id="password" placeholder="Password">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="confirm_password">Confirm Password</label>
                        <input type="password" class="form-control" name="" id="confirm_password" placeholder="Confirm Password">
                    </div>

                    <!--  sec ques-->

                    <div class="form-group col-md-6">
                        <label for="security">Select security question</label>
                        <select class="form-control" name="" id="security">
                            <option>In what city were you born?</option>
                            <option>What is the name of your favorite pet?</option>
                            <option>What is the name of your high school ?</option>
                            <option>What is the name of your high school ?</option>
                        </select>
                    </div>
                    <!-- .answerr. -->
                    <div class="form-group col-md-6">
                        <label for="">Answer</label>
                        <input type="text" class="form-control" name="ans" id="" placeholder="Answer">
                    </div>

                    <!--  -->

                </fieldset>

                <fieldset>
                    <legend>Job Description</legend>

                    <div class="form-group col-md-12">
                        <label>Work Description</label>
                        <textarea placeholder="Enter Work Description Here.." rows="2" class="form-control"></textarea>
                    </div>

                    <!-- date -->

                    <div class="form-group col-md-6">
                        <label for="jiondate">Join Date</label>

                        <div class="row">
                            <div class="col-md-12">
                                <input id="datepicker" width="270" />
                            </div>
                        </div>
                    </div>
                    <script>
                        $('#datepicker').datepicker({
                            uiLibrary: 'bootstrap'
                        });
                    </script>
                    <!--  -->

                    <!-- salary -->
                    <div class="form-group col-md-6">
                        <label for="salary">Salary</label>

                        <div class="input-group col-md-12">
                            <input id="salary" maxlength="6" name="salary" placeholder="Amount" class="form-control input-md " type="number">

                        </div>

                    </div>


                    <!-- radio button -->
                    <div class="form-group col-md-12">
                        <label for="salary">Select post </label>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" id="radio1" name="optradio" value="option1" checked>Attendee
                            <br>
                            <input type="radio" class="form-check-input" id="radio2" name="optradio" value="option2">Mechanics
                            


                        </div>
                    </div>
                     
                      



                </fieldset>


                <!--  -->
                <div class="form-group">
                    <div class="col-md-12 text-center">
                        <button type="submit" class="btn btn-primary btn-lg">
                            Add 
                        </button>
                    </div>
                </div>

            </form>
            
        </div>

    </div>
</div>
<br>
<hr>