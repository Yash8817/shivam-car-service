<?php require "top.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>
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
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="lib/flaticon/font/flaticon.css" rel="stylesheet">
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <style>
        .our_service .row.full-width {
            width: 100%;
        }

        .our_service .row {
            width: 1170px;
            margin-left: auto;
            margin-right: auto;
        }



        .our_service .row {
            width: 1170px;
            margin-left: auto;
            margin-right: auto;
        }

        .our_service .row:after {
            font-size: 0px;
            content: ".";
            display: block;
            height: 0px;
            visibility: hidden;
            clear: both;
        }


        .our_service h2.box-header {
            text-align: center;
        }

        .our_service h2 {
            font-size: 33px;
            line-height: 44px;
            font-weight: 300;
        }

        .our_service h2.box-header:after {
            width: 80px;
            margin-left: auto;
            margin-right: auto;
            margin-top: 20px;
        }

        .our_service .box-header:after {
            display: block;
            content: "";
            background: #1E69B8;
            width: 40px;
            height: 2px;
            margin-top: 13px;
        }

        .our_service p.description {
            font-family: 'Open Sans';
            font-size: 18px;
            font-weight: 300;
            line-height: 32px;
            padding: 0;
            margin-top: 34px;
            letter-spacing: 0px;
        }

        .our_service .align-center {
            text-align: center;
        }

        .our_service p {
            font-family: 'Open Sans';
            padding: 1em 0;
            color: #777;
            line-height: 26px;
        }

        .our_service .page-margin-top {
            margin-top: 50px;
        }

        .our_service ol,
        .our_service ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .our_service .clearfix:after {
            font-size: 0px;
            content: ".";
            display: block;
            height: 0px;
            visibility: hidden;
            clear: both;
        }

        .our_service .services-list li,
        .our_service .team-box {
            position: relative;
            float: left;
            width: 390px;
            background: #FFF;
            padding-bottom: 30px;
            overflow: hidden;
        }

        .our_service li {
            display: list-item;
            text-align: -webkit-match-parent;
        }

        .our_service ol,
        .our_service ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .our_service a {
            text-decoration: none;
            outline: none;
        }

        .our_service element.style {
            display: block;
        }

        .our_service .services-list img,
        .our_service .team-box img {
            max-width: 100%;
            height: auto;
        }

        .our_service a img {
            display: block;
            transition: opacity 0.3s ease 0s;
            opacity: 1;
            max-width: 100%;
            height: auto;
        }

        .our_service .services-list li:nth-child(3n+1) h4,
        .our_service .services-list li:nth-child(3n+1) p {
            border-left: none;
        }

        .our_service .services-list li h4 {
            border-left: 1px solid #E2E6E7;
            background: #F5F5F5;
            padding: 17px 15px 18px 20px;
        }

        .our_service h4 {
            font-size: 18px;
            line-height: 28px;
            font-family: 'Open Sans';
            color: #333;
            letter-spacing: 1px;
            margin: 0;
            padding: 0;
            font-weight: 600;
        }

        .our_service ol,
        .our_service ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .our_service .services-list li h4.box-header::after {
            content: none;
        }

        .our_service .box-header:after {
            display: block;
            content: "";
            background: #1E69B8;
            width: 40px;
            height: 2px;
            margin-top: 13px;
        }

        .our_service .row {
            display: grid;
        }

        .our_service h1 a,
        .our_service h2 a,
        .our_service h3 a,
        .our_service h4 a,
        .our_service h5 a,
        .our_service h6 a {
            color: #333;
            transition: opacity 0.3s ease 0s;
            opacity: 1;
        }

        .our_service a {
            text-decoration: none;
            outline: none;
        }

        .our_service .services-list li,
        .our_service .team-box {
            position: relative;
            float: left;
            width: 390px;
            background: #FFF;
            padding-bottom: 30px;
            overflow: hidden;
        }

        .our_service .services-list li h4 {
            border-left: 1px solid #E2E6E7;
            background: #F5F5F5;
            padding: 17px 15px 18px 20px;
        }

        .our_service .services-list li h4 span {
            float: right;
            color: #1E69B8;
            font-size: 20px;
            line-height: 24px;
        }

        .our_service .template-arrow-menu:before {
            content: ">";
        }

        .our_service [class^="template-"]:before,
        .our_service [class*=" template-"]:before {
            font-family: "template-cs" !important;
            font-style: normal !important;
            font-weight: normal !important;
            font-variant: normal !important;
            text-transform: none !important;
            vertical-align: middle;

            line-height: 1;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        .our_service .margin-top-40 {
            margin-top: 40px !important;
        }

        .our_service .padding-bottom-87 {
            padding-bottom: 87px;
        }

        .our_service .align-center {
            text-align: center;
        }

        .our_service .more,
        .our_service .more[type="submit"] {
            position: relative;
            color: #FFF;
            font-family: 'Open Sans';
            font-size: 14px;
            font-weight: 600;
            background: #1E69B8;
            padding: 19px 24px 20px;
            text-align: center;
            cursor: pointer;
            line-height: normal;
            letter-spacing: 1px;
            border: none;
        }

        .our_service a {
            text-decoration: none;
            outline: none;
        }

        .our_service .more::before {
            position: absolute;
            content: "";
            width: 5px;
            height: 100%;
            top: 0;
            left: 0;
            background: rgba(0, 0, 0, 0.1);
            transition: all 0.2s ease 0s;
            -webkit-transition: all 0.2s ease 0s;
            -moz-transition: all 0.2s ease 0s;
            z-index: 9;
        }
    </style>
</head>

<body>
    
    <!-- Page Header Start -->
    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2>Our Service</h2>
                </div>
                <div class="col-12">
                    <a href="">Home</a>
                    <a href="">Our Service</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Service Start -->
    <div class="service">
        <div class="container">



            <div class="our_service">
                <div class="row full-width page-padding-top-section">
                    <div class="row">
                        <h2 class="box-header">AUTO REPAIR SERVICES</h2>
                        <p class="description align-center">We offer a full range of garage services to vehicle owners located in
                            Ahmedabad area.<br>Our professinals know how to handle a wide range of car services.</p>
                        <ul class="services-list clearfix page-margin-top">
                            <li>
                                <a href="?page=service_engine_diagnostics" title="Engine Diagnostics">
                                    <img src="../shivam/img/1.jpg" alt="not" style="display: block;">
                                </a>
                                <h4 class="box-header"><a href="?page=service_engine_diagnostics" title="Engine Diagnostics">ENGINE
                                        DIAGNOSTICS<span class="template-arrow-menu"></span></a></h4>
                            </li>
                            <li>
                                <a href="?page=service_lube_oil_filters" title="Lube, Oil and Filters">
                                    <img src="../shivam/img/oil-filter.jpg" alt="" style="display: block; height:  259px;">
                                </a>
                                <h4 class="box-header"><a href="?page=service_lube_oil_filters" title="Lube, Oil and Filters">
                                        OIL AND FILTERS<span class="template-arrow-menu"></span></a></h4>
                            </li>
                            <li>
                                <a href="?page=service_belts_hoses" title="Belts and Hoses">
                                    <img src="../shivam/img/tire.jpg" alt="" style="display: block;  height:  259px;">
                                </a>
                                <h4 class="box-header"><a href="?page=service_belts_hoses" title="Belts and Hoses">TIRES REPLACEMENT<span class="template-arrow-menu"></span></a></h4>
                            </li>
                        </ul>

                        <ul class="services-list clearfix page-margin-top">
                            <li>
                                <a href="?page=service_engine_diagnostics" title="Engine Diagnostics">
                                    <img src="../shivam/img/car-wash.jpg" style="height: 260px; width: 385px;"  alt="not" style="display: block;">
                                </a>
                                <h4 class="box-header"><a href="?page=service_engine_diagnostics" title="Engine Diagnostics">Car wash<span class="template-arrow-menu"></span></a></h4>
                            </li>
                            <li>
                                <a href="?page=service_lube_oil_filters" title="Lube, Oil and Filters">
                                    <img src="../shivam/img/battery_replace.jpg" alt="" style="display: block; height:  259px;">
                                </a>
                                <h4 class="box-header"><a href="?page=service_lube_oil_filters" title="Lube, Oil and Filters">
                                        Battery replacement<span class="template-arrow-menu"></span></a></h4>
                            </li>
                            <li>
                                <a href="?page=service_belts_hoses" title="Belts and Hoses">
                                    <img src="../shivam/img/cooling_system.jpg" alt="" style="display: block;  height:  259px;">
                                </a>
                                <h4 class="box-header"><a href="?page=service_belts_hoses" title="Belts and Hoses">Cooling system<span class="template-arrow-menu"></span></a></h4>
                            </li>
                        </ul>
                      
                    </div>
                </div>
            </div>
        </div>

    </div>
    </div>
    <!-- Service End -->




    <?php require "foter.php" ?>