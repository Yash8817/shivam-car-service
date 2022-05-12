<!DOCTYPE html>
<html lang="en">

<body>
    <?php require "top.php" ?>
    <!-- Page Header Start -->
    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>Best Plan</h2>
                </div>
                <div class="col-12">
                    <a href="">Home</a>
                    <a href="">Best Plan</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Price Start -->
    <div class="price">
        <div class="container">
            <div class="section-header text-center">
                <p>Washing Plan</p>
                <h2>Choose Your Plan</h2>
            </div>
            <div class="row">

                <?php
                //for center hightlight
                $hilight_class = "featured-item";
                $cont = 1;
                $yes_class = "fa-check-circle";
                $no_class = "fa-times-circle";
                $select_mem = "SELECT * FROM membership_details ";

                $res = mysqli_query($con, $select_mem)  or die("quary failed:select_mem");
                if (mysqli_num_rows($res) > 0) {
                    while ($row =  mysqli_fetch_array($res)) {


                ?>


                        <div class="col-md-4">
                            <div class="price-item <?php if ($cont == 2) echo $hilight_class; ?>">
                                <br>
                                <div class="price-header">
                                    <h3>
                                        <?php $cont++;
                                        echo $row['mem_name']; ?>
                                    </h3>
                                    <h2><span>₹</span><strong>
                                            <?php echo $row['price']; ?>
                                        </strong></h2>
                                </div>
                                <div class="price-body">
                                    <ul>
                                        <li style="font-size: larger;">Duration :
                                            <?php echo $row['mem_duration']; ?> months
                                        </li>
                                        <li><i class="far fa-check-circle"></i>Labour disscount :
                                            <?php echo $row['Labour_discount'];  ?>%
                                        </li>
                                        <li><i class="far <?php if ($row['all_filter_check'] == 1) {
                                                                echo $yes_class;
                                                            } else {
                                                                echo $no_class;
                                                            } ?> "></i>All filter check</li>
                                        <li><i class="far <?php if ($row['tire_rotation'] == 1) {
                                                                echo $yes_class;
                                                            } else {
                                                                echo $no_class;
                                                            } ?>"></i>Tire rotation</li>
                                        <li><i class="far <?php if ($row['no_road_assist'] == 1) {
                                                                echo $yes_class;
                                                            } else {
                                                                echo $no_class;
                                                            } ?>"></i>Road assistance</li>
                                    </ul>
                                </div>
                                <div class="price-footer">
                                    <a class="btn btn-custom" href="payment.php?mid=<?php echo $row['mem_details_id'] ?>&purchase=1&mem_duration=<?php echo $row['mem_duration']; ?>&price=<?php echo $row['price']; ?>">Book Now</a>
                                </div>
                            </div>
                        </div>


                <?php


                    }
                }
                ?>
            </div>

        </div>
    </div>
    <!-- Price End -->
    <?php require "foter.php" ?>