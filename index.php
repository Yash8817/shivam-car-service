<?php require "top.php" ?>
<!DOCTYPE html>
<html lang="en">

<head>

  <style>
    .accordion {
      background-color: #eee;
      color: #444;
      cursor: pointer;
      padding: 18px;
      width: 100%;
      border: none;
      text-align: left;
      outline: none;
      font-size: 15px;
      transition: 1s;
      transition-delay: 0.9s;
    }

    .active,
    .accordion:hover {
      background-color: #ccc;
    }

    .panel {
      padding: 0 18px;
      display: none;
      background-color: white;
      overflow: hidden;
      transition: max-height 0.9s ease-out;

    }

    card .img {
      float: left;
      width: 100px;
      height: 100px;
      object-fit: cover;
    }

    .bookapp_row .row.gray {
      background: #F5F5F5;
    }

    .bookapp_row .row:after {
      font-size: 0px;
      content: ".";
      display: block;
      height: 0px;
      visibility: hidden;
      clear: both;
    }

    .bookapp_row .columns {
      position: relative;
      float: left;
      margin-left: 30px;
    }

    .bookapp_row .row.full-width {
      width: 100%;
    }

    .bookapp_row .row {
      width: 1170px;
      margin-left: auto;
      margin-right: auto;
    }

    .bookapp_row .announcement {

      margin-left: auto;
      margin-right: auto;
      padding: 35px 0;
    }


    .bookapp_row .clearfix:after {
      font-size: 0px;
      content: ".";
      display: block;
      height: 0px;
      visibility: hidden;
      clear: both;
    }

    .bookapp_row .announcement .vertical-align {
      height: 88px;
    }

    .bookapp_row .vertical-align {
      display: table-row;
    }

    .bookapp_row ol,
    .bookapp_row ul {
      list-style: none;
      padding: 0;
      margin: 0;
    }

    .bookapp_row .vertical-align-cell {
      display: table-cell;
      vertical-align: middle;
    }

    .bookapp_row .announcement h3 {
      margin-left: 118px;
    }


    .bookapp_row h3 {
      font-family: 'Open Sans';
      margin: 0;
      padding: 0;
      color: #333;
      font-weight: 600;
      letter-spacing: 1px;
    }

    .bookapp_row .more,
    .bookapp_row .more[type="submit"] {
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

    .bookapp_row a {
      text-decoration: none;
      outline: none;
    }

    .whyUs .row {
      width: 1170px;
      margin-left: auto;
      margin-right: auto;
    }

    .whyUs .page-margin-top-section {
      margin-top: 65px;
    }

    .whyUs h2.box-header {
      text-align: center;
    }

    .whyUs h2 {
      font-size: 33px;
      line-height: 44px;
      font-weight: 300;
    }

    .whyUs h2 {
      font-family: 'Open Sans';
      display: block;
      margin: 0;
      padding: 0;
      color: #333;
      font-weight: 600;
      letter-spacing: 1px;
    }

    .whyUs h2.box-header:after {
      width: 80px;
      margin-left: auto;
      margin-right: auto;
      margin-top: 20px;
    }

    .whyUs .box-header:after {
      display: block;
      content: "";
      background: #1E69B8;
      width: 40px;
      height: 2px;
      margin-top: 13px;
    }

    .whyUs p.description {
      font-family: 'Open Sans';
      font-size: 18px;
      font-weight: 300;
      line-height: 32px;
      padding: 0;
      margin-top: 34px;
      letter-spacing: 0px;
    }

    .whyUs .align-center {
      text-align: center;
    }

    .whyUs p {
      font-family: 'Open Sans';
      padding: 1em 0;
      color: #777;
      line-height: 26px;
    }

    .whyUs p {
      display: block;
      margin-block-start: 1em;
      margin-block-end: 1em;
      margin-inline-start: 0px;
      margin-inline-end: 0px;
    }

    .whyUs .page-margin-top {
      margin-top: 50px;
    }

    .whyUs .column:first-child,
    .whyUs .column.first,
    .whyUs .row.full-width>.column.column-1-2 .column-1-3:first-child {
      margin-left: 0;
    }

    .whyUs .column-1-3,
    .whyUs .column-2-3 .column-1-2 {
      width: 370px;
    }

    .whyUs .column {
      position: relative;
      float: left;
      margin-left: 30px;
    }

    .whyUs ol,
    .whyUs ul {
      list-style: none;
      padding: 0;
      margin: 0;
    }

    .whyUs ul {
      display: block;
      list-style-type: disc;
      margin-block-start: 1em;
      margin-block-end: 1em;
      margin-inline-start: 0px;
      margin-inline-end: 0px;
      padding-inline-start: 40px;
    }

    .whyUs .features-list li:first-child {
      margin-top: 0;
    }

    .whyUs .features-list.big li {
      text-align: center;
    }

    .whyUs .features-list li {
      float: left;
      width: 100%;
      margin-top: 50px;
    }

    .whyUs li {
      display: list-item;
      text-align: -webkit-match-parent;
    }

    .whyUs ol,
    .whyUs ul {
      list-style: none;
      padding: 0;
      margin: 0;
    }

    .whyUs .features-list.big li:before {
      clear: both;
      float: none;
      display: block;
      width: 60px;
      font-size: 60px;
      margin-left: auto;
      margin-right: auto;
      padding: 39px;
    }

    .whyUs .hexagon {
      position: relative;
      width: 116px;
      height: 66.97px;
      background-color: transparent;
      margin: 33.49px 0;
      border-left: solid 2px #1E69B8;
      border-right: solid 2px #1E69B8;
      box-sizing: border-box;
      -moz-box-sizing: border-box;
      -webkit-box-sizing: border-box;
      margin-left: auto;
      margin-right: auto;
      transform: rotate(0.0001deg);
      -webkit-transform: rotate(0.0001deg);
      -ms-transform: rotate(0.0001deg);
    }

    .whyUs .features-list.big li {
      text-align: center;
    }

    .whyUs .hexagon:before {
      top: -41.0122px;
      border-top: solid 2.8284px #1E69B8;
      border-right: solid 2.8284px #1E69B8;
    }

    .whyUs .hexagon:before,
    .whyUs .hexagon:after {
      content: "";
      position: absolute;
      z-index: 1;
      width: 82.02px;
      height: 82.02px;
      -webkit-transform: scaleY(0.5774) rotate(-45deg);
      -ms-transform: scaleY(0.5774) rotate(-45deg);
      transform: scaleY(0.5774) rotate(-45deg);
      background-color: inherit;
      left: 14.9878px;
      box-sizing: border-box;
      -moz-box-sizing: border-box;
      -webkit-box-sizing: border-box;
    }

    .whyUs .hexagon:after {
      bottom: -41.0122px;
      border-bottom: solid 2.8284px #1E69B8;
      border-left: solid 2.8284px #1E69B8;
    }


    .whyUs .hexagon {
      position: relative;
      width: 116px;
      height: 66.97px;
      background-color: transparent;
      margin: 33.49px 0;
      border-left: solid 2px #1E69B8;
      border-right: solid 2px #1E69B8;
      box-sizing: border-box;
      -moz-box-sizing: border-box;
      -webkit-box-sizing: border-box;
      margin-left: auto;
      margin-right: auto;
      transform: rotate(0.0001deg);
      -webkit-transform: rotate(0.0001deg);
      -ms-transform: rotate(0.0001deg);
    }

    .whyUs div {
      display: block;
    }

    .whyUs .features-list.big li {
      text-align: center;
    }

    .whyUs li {
      text-align: -webkit-match-parent;
    }

    .whyUs ul {
      list-style-type: disc;
    }


    .whyUs .hexagon:before {
      top: -41.0122px;
      border-top: solid 2.8284px #1E69B8;
      border-right: solid 2.8284px #1E69B8;
    }

    .whyUs .hexagon:before,
    .whyUs .hexagon:after {
      content: "";
      position: absolute;
      z-index: 1;
      width: 82.02px;
      height: 82.02px;
      -webkit-transform: scaleY(0.5774) rotate(-45deg);
      -ms-transform: scaleY(0.5774) rotate(-45deg);
      transform: scaleY(0.5774) rotate(-45deg);
      background-color: inherit;
      left: 14.9878px;
      box-sizing: border-box;
      -moz-box-sizing: border-box;
      -webkit-box-sizing: border-box;
    }

    .whyUs .hexagon:after {
      bottom: -41.0122px;
      border-bottom: solid 2.8284px #1E69B8;
      border-left: solid 2.8284px #1E69B8;
    }

    .whyUs .hexagon:before,
    .whyUs .hexagon:after {
      content: "";
      position: absolute;
      z-index: 1;
      width: 82.02px;
      height: 82.02px;
      -webkit-transform: scaleY(0.5774) rotate(-45deg);
      -ms-transform: scaleY(0.5774) rotate(-45deg);
      transform: scaleY(0.5774) rotate(-45deg);
      background-color: inherit;
      left: 14.9878px;
      box-sizing: border-box;
      -moz-box-sizing: border-box;
      -webkit-box-sizing: border-box;
    }

    .whyUs .features-list.big li h4 {
      margin-top: 66px;
    }

    .whyUs .features-list li h4 {
      padding-bottom: 5px;
    }

    .whyUs .page-margin-top {
      margin-top: 50px;
    }

    .whyUs h4 {
      font-size: 18px;
      line-height: 28px;
    }

    .whyUs h1,
    .whyUs h2,
    .whyUs h3,
    .whyUs h4,
    .whyUs h5,
    .whyUs h6 {
      font-family: 'Open Sans';
      margin: 0;
      padding: 0;
      color: #333;
      font-weight: 600;
      letter-spacing: 1px;
    }

    .whyUs .features-list.big li h4:after {
      margin-top: 20px;
      margin-left: auto;
      margin-right: auto;
    }

    .whyUs .box-header:after {
      display: block;
      content: "";
      background: #1E69B8;
      width: 40px;
      height: 2px;
      margin-top: 13px;
    }

    .whyUs .features-list li p {
      font-family: 'Open Sans';
      font-size: 14px;
      line-height: 24px;
      padding: 0;
      margin-top: 16px;
      margin-left: 78px;
    }

    .whyUs ol,
    .whyUs ul {
      list-style: none;
      padding: 0;
      margin: 0;
    }

    .whyUs .margin-top-67 {
      margin-top: 67px;
    }

    .whyUs .padding-bottom-20 {
      padding-bottom: 20px;
    }

    .whyUs .align-center {
      text-align: center;
    }

    .whyUs .more,
    .whyUs .more[type="submit"] {
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

    .whyUs a {
      text-decoration: none;
      outline: none;
    }

    .whyUs .more::before {
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

    .whyUs .more span {
      position: relative;
      z-index: 10;
    }

    .whyUs .row:after {
      font-size: 0px;
      content: ".";
      display: block;
      height: 0px;
      visibility: hidden;
      clear: both;
    }

    .whyUs .features-list.big li p {
      width: 95%;
      margin-left: auto;
      margin-right: auto;
    }

    .our_service .row.full-width {
      width: 100%;
    }

    .our_service .row {
      width: 1170px;
      margin-left: auto;
      margin-right: auto;
    }

    .our_service .page-padding-top-section {
      padding-top: 65px;
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
  <!-- Carousel Start -->


  <div class="carousel">
    <div class="container-fluid">
      <div class="owl-carousel">
        <div class="carousel-item">
          <div class="carousel-img">
            <img src="img/bg7.jpg" alt="Image">
          </div>
          <div class="carousel-text">
            <h3>WE WILL DO OUR BEST</h3>
            <h1>CAR SERVICING</h1>
            <p>
              Car service is a series of maintenance procedures carried out at a set time interval or after the vehicle has traveled a certain distance.
            </p>

          </div>
        </div>


        <div class="carousel-item">
          <div class="carousel-img">
            <img src="img/bg8.jpg" alt="Image">
          </div>
          <div class="carousel-text">
            <h3>WE WILL DO OUR BEST</h3>
            <h1>QUICK CAR WASH</h1>
            <p>
              It will get large chunks of dirt and debris off and do a decent job overall of cleaning the car.
            </p>

          </div>
        </div>


        <div class="carousel-item">
          <div class="carousel-img">
            <img src="img/bg1.jpg" alt="Image">
          </div>
          <div class="carousel-text">
            <h3>WE WILL DO OUR BEST</h3>
            <h1>ENGINE SERVICING</h1>
            <p>
              Keeping your vehicle running smoothly.
            </p>

          </div>
        </div>


        <div class="carousel-item">
          <div class="carousel-img">
            <img src="img/bg3.jpg" alt="Image">
          </div>
          <div class="carousel-text">
            <h3>WE WILL DO OUR BEST</h3>
            <h1>OIL CHANGE</h1>
            <p>
              The main function of motor oil is to reduce friction and wear on moving parts and to clean the engine from sludge and detergents.
            </p>

          </div>
        </div>

        <div class="carousel-item">
          <div class="carousel-img">
            <img src="img/bg4.jpg" alt="Image">
          </div>
          <div class="carousel-text">
            <h3>WE WILL DO OUR BEST</h3>
            <h1>CERAMIC COATING</h1>
            <p>
              Ceramic coating offers good protection to the car's surface.
            </p>

          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Carousel End -->

  <!-- boo appp row -->
  <div class="bookapp_row">
    <div class="row gray full-width">
      <div class="announcement clearfix">
        <ul class="columns no-width">
          <li class="column column-2-3">
            <div class="vertical-align">
              <div class="vertical-align-cell">
                <h3>MAKE AN APPOINTMENT NOW WITH OUR ONLINE FORM &nbsp;</h3>
              </div>


              <div class="vertical-align-cell ">

                <a class="more" href="../shivam/bookapp.php" title="MAKE AN APPOINTMENT"><span>

                    MAKE AN APPOINTMENT
                  </span></a>
              </div>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
  <!-- end -->

  <!-- why us -->



  <div class="whyUs">
    <div class="row page-margin-top-section">
      <div class="row">
        <h2 class="box-header">WHY CHOOSE US?</h2>
        <p class="description align-center">We are one of the leading auto repair shops serving customers in Tucson.<br>All mechanic services are performed by highly qualified mechanics.</p>
        <div class="row page-margin-top">
          <div class="column column-1-3">
            <ul class="features-list big">
              <li>
                <div class="hexagon">

                  <img src="img/personal_user.png" height="70" width="70"></br>


                </div>
                <h4 class="box-header page-margin-top">EVERY JOB IS PERSONAL</h4>
                <p>If you want the quality you would expect from the dealership, but with a more personal and friendly atmosphere, you have found it.</p>
              </li>
            </ul>
          </div>
          <div class="column column-1-3">
            <ul class="features-list big">
              <li>
                <div class="hexagon">
                  <img src="img/wrench-screwdriver.png" height="70" width="70"></br>

                </div>
                <h4 class="box-header page-margin-top">BEST MATERIALS</h4>
                <p>We have invested in all the latest specialist tools and diagnostic software that is specifically tailored for the software in your vehicle.</p>
              </li>
            </ul>
          </div>
          <div class="column column-1-3">
            <ul class="features-list big">
              <li>
                <div class="hexagon">
                  <img src="img/truck-tow.png" height="50" width="70"></br>
                </div>
                <h4 class="box-header page-margin-top">PROFESSIONAL STANDARDS</h4>
                <p>Our auto repair shop is capable of servicing a variety of models. We only do the work that is needed to fix your problem.</p>
              </li>
            </ul>
          </div>
        </div>
        <div class="align-center margin-top-67 padding-bottom-20">
          <a class="more" href="about.php" title="READ MORE"><span>READ MORE</span></a>
        </div>
      </div>
    </div>
  </div>
  <!--  -->


  <!-- our service -->



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
        <div class="align-center margin-top-40 padding-bottom-87">
          <a class="more" href="service.php" title="VIEW ALL SERVICES"><span>VIEW ALL SERVICES</span></a>
        </div>
      </div>
    </div>
  </div>

  <!--  -->





  <!-- Facts Start -->
  <div class="facts" data-parallax="scroll" data-image-src="img/facts.jpg">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-md-6">
          <div class="facts-item">
            <i class="fa fa-car"></i>
            <div class="facts-text">
              <h3 data-toggle="counter-up">20</h3>
              <p>car repaired per month</p>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <div class="facts-item">
            <i class="fa fa-user"></i>
            <div class="facts-text">
              <h3 data-toggle="counter-up">700</h3>
              <p>TIRES REPAIRED A YEAR</p>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <div class="facts-item">
            <i class="fa fa-users"></i>
            <div class="facts-text">
              <h3 data-toggle="counter-up">1000</h3>
              <p>Happy Clients</p>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <div class="facts-item">
            <i class="fa fa-check"></i>
            <div class="facts-text">
              <h3 data-toggle="counter-up">300</h3>
              <p>Projects Completed</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Facts End -->







  <!-- Price Start -->


  <div class="price">
    <div class="container">
      <div class="section-header text-center">
        <p>Service Plan</p>
        <h2>Choose Your Plan</h2>
      </div>



      <div class="row">

        <?php
        //for center hightlight
        $hilight_class = "featured-item";
        $cont = 1;
        $yes_class = "fa-check-circle";
        $no_class = "fa-times-circle";
        $select_mem = "SELECT * FROM membership_details LIMIT 3";

        $res = mysqli_query($con, $select_mem)  or die("quary failed:select_mem");
        if (mysqli_num_rows($res) > 0) {
          while ($row =  mysqli_fetch_array($res)) {


        ?>


            <div class="col-md-4">
              <div class="price-item <?php if ($cont == 2) echo $hilight_class; ?>">
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
                  <a class="btn btn-custom" href="bestplan.php">Book Now</a>
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
  </div>
  </div>


  <!-- Price End -->





  <!-- Testimonial Start -->
  <div class="testimonial">
    <div class="container">
      <div class="section-header text-center">
        <h2>Frequently Asked Questions</h2>
      </div>
      <?php
      $sql_qands = "SELECT * FROM qands LIMIT 5";
      $res_qands = mysqli_query($con, $sql_qands);
      if (mysqli_num_rows($res) > 0) {
        while ($row_qands = mysqli_fetch_assoc($res_qands)) {

      ?>

          <button class="accordion">
            <?php echo $row_qands['heading']; ?>
          </button>

          <div class="panel" style=" border-top: none; border: 1px solid black; border-end-end-radius :5px; border-bottom-left-radius:5px; border: spacing 5px;">
            <p>
              <?php echo $row_qands['description']; ?>
            </p>
          </div>
      <?php
        }
      }
      ?>

      <script>
        var acc = document.getElementsByClassName("accordion");
        var i;

        for (i = 0; i < acc.length; i++) {
          acc[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var panel = this.nextElementSibling;
            
            
            if (panel.style.display === "block") {
              panel.style.display = "none";
            } else {
              panel.style.display = "block";
            }
            
          });
        }
      </script>
    </div>
  </div>
  <!-- Testimonial End -->




  <!-- service start -->





  <!--  -->





  <!-- About Start -->
  <div class="">
    <div class="container">
      <div class="row align-items-center">


      </div>
    </div>
  </div>
  <!-- About End -->
  <?php require "foter.php" ?>
