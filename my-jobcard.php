<?php
require "../shivam/lockscreen/connection.php";
require "../shivam/vendor/autoload.php";

$j_id = $_GET['jid'];

$sql = "SELECT job_card.* ,user.user_name,user.user_phone , appointment.app_date , appointment.app_time , appointment.staffstaff_id , car_type.name , maker.maker_name ,  model.model_name , veh_color.color_name , vehicle.rto_number  FROM job_card JOIN appointment on appointment.appointment_id = job_card.appointmentappointment_id JOIN customer ON customer.customer_id = appointment.customercustomer_id   JOIN user ON user.user_id = customer.Useruser_id JOIN vehicle ON vehicle.rto_number = appointment.Vehicle_rto_number  JOIN veh_color ON veh_color.veh_color_id = vehicle.veh_color_id  JOIN model ON model.car_model_id = vehicle.modelcar_model_id JOIN maker ON maker.maker_id = model.Makermaker_id   JOIN car_type ON car_type.car_type_id = maker.car_typecar_type_id  WHERE job_card.jobcard_id = $j_id";


$subtotal = 0;


//service_price_total
$service_price_total = "SELECT sum(job_card_servics.price) as service_price FROM job_card_servics WHERE job_card_servics.Job_cardjobcard_id = $j_id";
$service_total = mysqli_query($con, $service_price_total);
$service_price = mysqli_fetch_assoc($service_total);
//parts_price_total
$parts_price_total = "SELECT SUM(job_card_parts.price * job_card_parts.part_used_qty) as parts_total FROM job_card_parts WHERE job_card_parts.Job_cardjobcard_id = $j_id";
$parts_total = mysqli_query($con, $parts_price_total);
$parts_price = mysqli_fetch_assoc($parts_total);
//total
$subtotal = $service_price["service_price"]  + $parts_price["parts_total"] ;

// $price=0.8333333333;
$taxRate=18;
$tax=$subtotal*$taxRate/100;
$total=$subtotal+$tax;
$calculatedTaxRate=(($total-$subtotal)/$subtotal)*100;

$labourcharge_sql = "SELECT job_card.labour_charge FROM job_card WHERE jobcard_id  =$j_id  ";
$labourcharge = mysqli_query($con, $labourcharge_sql);
$labour_charge_ary = mysqli_fetch_assoc($labourcharge);
$labour_charge = $labour_charge_ary['labour_charge'];

$total_bill = ceil($total + $labour_charge ); 

$AUTHORIZATION_DATE = date("d M Y");

$get_staff_name = "SELECT USER.user_name FROM user JOIN staff ON staff.Useruser_id = user.user_id  JOIN  appointment ON appointment.staffstaff_id = staff.staff_id JOIN job_card ON job_card.appointmentappointment_id = appointment.appointment_id WHERE job_card.jobcard_id = $j_id";
$get_staff = mysqli_fetch_assoc(mysqli_query($con,$get_staff_name));



$get_service = "SELECT servics.*,job_card_servics.price   FROM servics  JOIN job_card_servics ON servics.service_id = job_card_servics.Servicsservice_id WHERE job_card_servics.Job_cardjobcard_id = $j_id ";

$get_parts = "SELECT * ,  job_card_parts.part_used_qty FROM parts  JOIN job_card_parts ON  parts.parts_id =job_card_parts.partsparts_id WHERE job_card_parts.Job_cardjobcard_id = $j_id";

$res = mysqli_query($con, $sql);

$res_service = mysqli_query($con, $get_service);
$res_parts = mysqli_query($con, $get_parts);

if (mysqli_num_rows($res) > 0) {

    // // // // // // // // // // // // // // // // // // // // // // // // // // // // // // /
    $row = mysqli_fetch_assoc($res);
    $html = '
    
  
    <div style= "">
    <table cellpadding="0" cellspacing="0" style="width: 760px;; border-collapse:collapse;">
        <tbody>
            <tr style="height: 29px;;">
                <td colspan="4" style="width:274.2pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:middle;">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:12pt;">Shivam car Service&nbsp;</p>
                </td>
                <td colspan="5" rowspan="5" style="width:274.2pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:top;">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:right; font-size:26pt;"><img src="../shivam/img/logo.png" alt="image not found" style="width: 101px;"></p>
                </td>
            </tr>
            <tr style="height:14.4pt;">
                <td colspan="4" style="width:274.2pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:middle;">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:9pt;">Nr.Sarda school, memnagar&nbsp;</p>
                </td>
            </tr>
            <tr style="height:14.4pt;">
                <td colspan="4" style="width:274.2pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:middle;">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:9pt;">Ahmedabad &ndash; 380052&nbsp;</p>
                </td>
            </tr>
            <tr style="height:14.4pt;">
                <td colspan="4" style="width:274.2pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:middle;">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:9pt;"><span style="font-family:"Century Gothic"; color:#525252;">Company City, NY&nbsp;&nbsp;11101</span></p>
                </td>
            </tr>
            <tr style="height:14.4pt;">
                <td colspan="4" style="width:274.2pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:middle;">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:9pt;">8980197212.</p>
                </td>
            </tr>
            <tr style="height:14.4pt;">
                <td style="width: 16.5653%; padding-right: 5.4pt; padding-left: 5.4pt; vertical-align: bottom;">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:9pt;"><span style="font-family:"Century Gothic"; color:#525252;">&nbsp;</span></p>
                </td>
                <td colspan="2" style="width: 17.0213%; padding-right: 5.4pt; padding-left: 5.4pt; vertical-align: bottom;">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10pt;"><span style="font-family:"Times New Roman";">&nbsp;</span></p>
                </td>
                <td style="width: 16.1094%; padding-right: 5.4pt; padding-left: 5.4pt; vertical-align: bottom;">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10pt;"><span style="font-family:"Times New Roman";">&nbsp;</span></p>
                </td>
                <td colspan="2" style="width: 19.1014%; padding-right: 5.4pt; padding-left: 5.4pt; vertical-align: bottom;">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10pt;"><span style="font-family:"Times New Roman";">&nbsp;</span></p>
                </td>
                <td style="width: 15.0931%; padding-right: 5.4pt; padding-left: 5.4pt; vertical-align: bottom;">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10pt;"><span style="font-family:"Times New Roman";">&nbsp;</span></p>
                </td>
                <td colspan="2" style="width:84.2pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:bottom;">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10pt;"><span style="font-family:"Times New Roman";">&nbsp;</span></p>
                </td>
            </tr>
            <tr style="height:25pt;">
                <td style="width: 16.5653%; border-bottom: 0.75pt solid rgb(191, 191, 191); padding-right: 5.4pt; padding-left: 5.4pt; vertical-align: top;">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:16pt;"><strong><span style="font-family:"Century Gothic"; color:#808080;">&nbsp;</span></strong></p>
                </td>
                <td colspan="2" style="width: 17.0213%; border-bottom: 0.75pt solid rgb(191, 191, 191); padding-right: 5.4pt; padding-left: 5.4pt; vertical-align: top;">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:16pt;"><strong><span style="font-family:"Century Gothic"; color:#808080;">&nbsp;</span></strong></p>
                </td>
                <td style="width: 16.1094%; border-bottom: 0.75pt solid rgb(191, 191, 191); padding-right: 5.4pt; padding-left: 5.4pt; vertical-align: top;">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:16pt;"><strong><span style="font-family:"Century Gothic"; color:#808080;">&nbsp;</span></strong></p>
                </td>
                <td colspan="5" style="width: 274.2pt; border-bottom: 0.75pt solid rgb(191, 191, 191); padding-right: 5.4pt; padding-left: 5.4pt; vertical-align: middle; text-align: right;">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:left; font-size:20pt;"><span style="font-family:"Century Gothic";text-align: center; color:#8497b0;">JOB CARD</span></p>
                </td>
            </tr>
            <tr style="height:18pt;">
                <td style="width: 16.5653%; border-right: 0.75pt solid rgb(191, 191, 191); border-left: 0.75pt solid rgb(191, 191, 191); border-bottom: 0.75pt solid rgb(191, 191, 191); padding-right: 5.03pt; padding-left: 5.03pt; vertical-align: middle; background-color: rgb(214, 220, 228);">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:8pt;"><strong><span style="font-family:"Century Gothic";">CLIENT NAME</span></strong></p>
                </td>
                <td colspan="3" style="width: 33.4347%; border-right: 0.75pt solid rgb(191, 191, 191); border-bottom: 0.75pt solid rgb(191, 191, 191); padding-right: 5.03pt; padding-left: 5.4pt; vertical-align: middle;">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:9pt;"><span style="font-family:"Century Gothic";">&nbsp; ' . $row['user_name'] . ' </span></p>
                </td>
                <td colspan="2" style="width: 19.1014%; border-right: 0.75pt solid rgb(191, 191, 191); border-bottom: 0.75pt solid rgb(191, 191, 191); padding-right: 5.03pt; padding-left: 5.4pt; vertical-align: middle; background-color: rgb(214, 220, 228);">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:8pt;"><strong><span style="font-family:"Century Gothic";">JOB CARD NUMBER</span></strong></p>
                </td>
                <td colspan="3" style="width: 31.0506%; border-top: 0.75pt solid rgb(191, 191, 191); border-right: 0.75pt solid rgb(191, 191, 191); border-bottom: 0.75pt solid rgb(191, 191, 191); padding-right: 5.03pt; padding-left: 5.4pt; vertical-align: middle;">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:9pt;"><span style="font-family:"Century Gothic";">00' . $row['jobcard_id']   . '</span></p>
                </td>
            </tr>
            <tr style="height:18pt;">
                <td style="width: 16.5653%; border-right: 0.75pt solid rgb(191, 191, 191); border-left: 0.75pt solid rgb(191, 191, 191); border-bottom: 0.75pt solid rgb(191, 191, 191); padding-right: 5.03pt; padding-left: 5.03pt; vertical-align: middle; background-color: rgb(214, 220, 228);">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:8pt;"><strong><span style="font-family:"Century Gothic";">CLIENT PHONE</span></strong></p>
                </td>
                <td colspan="3" style="width: 33.4347%; border-top: 0.75pt solid rgb(191, 191, 191); border-right: 0.75pt solid rgb(191, 191, 191); border-bottom: 0.75pt solid rgb(191, 191, 191); padding-right: 5.03pt; padding-left: 5.4pt; vertical-align: middle;">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:9pt;"><span style="font-family:"Century Gothic";">&nbsp;' . $row['user_phone']  . '      </span></p>
                </td>
                <td colspan="2" style="width: 19.1014%; border-right: 0.75pt solid rgb(191, 191, 191); border-bottom: 0.75pt solid rgb(191, 191, 191); padding-right: 5.03pt; padding-left: 5.4pt; vertical-align: middle; background-color: rgb(214, 220, 228);">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:8pt;"><strong><span style="font-family: "Century Gothic";">JOB CARD</span> DATE</strong></p>
                </td>
                <td colspan="3" style="width: 31.0506%; border-top: 0.75pt solid rgb(191, 191, 191); border-right: 0.75pt solid rgb(191, 191, 191); border-bottom: 0.75pt solid rgb(191, 191, 191); padding-right: 5.03pt; padding-left: 5.4pt; vertical-align: middle;">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:9pt;"><span style="font-family:"Century Gothic";">&nbsp;12/12/2021</span></p>
                </td>
            </tr>
            <tr style="height:18pt;">
                <td style="width: 16.5653%; border-right: 0.75pt solid rgb(191, 191, 191); border-left: 0.75pt solid rgb(191, 191, 191); border-bottom: 0.75pt solid rgb(191, 191, 191); padding-right: 5.03pt; padding-left: 5.03pt; vertical-align: middle; background-color: rgb(234, 238, 243);">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:8pt;"><strong><span style="font-family:"Century Gothic";">APPOINTMENT DATE&nbsp;</span></strong></p>
                </td>
                <td colspan="2" style="width: 17.0213%; border-right: 0.75pt solid rgb(191, 191, 191); border-bottom: 0.75pt solid rgb(191, 191, 191); padding-right: 5.03pt; padding-left: 5.4pt; vertical-align: middle;">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:9pt;"><span style="font-family:"Century Gothic";">&nbsp;  ' . $row['app_date']   . '</span></p>
                </td>
                <td style="width: 16.1094%; border-right: 0.75pt solid rgb(191, 191, 191); border-bottom: 0.75pt solid rgb(191, 191, 191); padding-right: 5.03pt; padding-left: 5.4pt; vertical-align: middle; background-color: rgb(234, 238, 243);">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:8pt;"><strong>APPOINTMENT TIME</strong></p>
                </td>
                <td colspan="2" style="width: 19.1014%; border-right: 0.75pt solid rgb(191, 191, 191); border-bottom: 0.75pt solid rgb(191, 191, 191); padding-right: 5.03pt; padding-left: 5.4pt; vertical-align: middle;">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:9pt;"><span style="font-family:"Century Gothic";"><strong>&nbsp; ' . $row['app_time'] . ' </strong></span></p>
                </td>
                <td style="width: 15.0931%; border-right: 0.75pt solid rgb(191, 191, 191); border-bottom: 0.75pt solid rgb(191, 191, 191); padding-right: 5.03pt; padding-left: 5.4pt; vertical-align: middle; background-color: rgb(234, 238, 243);">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:8pt;"><strong><span style="font-family:"Century Gothic";">DATE of COMPLETION&nbsp;</span></strong></p>
                </td>
                <td colspan="2" style="width:84.2pt; border-right:0.75pt solid #bfbfbf; border-bottom:0.75pt solid #bfbfbf; padding-right:5.03pt; padding-left:5.4pt; vertical-align:middle;">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:9pt;"><span style="font-family:"Century Gothic";"><strong>&nbsp; ' . $row['completed_date'] . '</strong></span></p>
                </td>
            </tr>
            <tr style="height:5.35pt;">
                <td style="width: 16.5653%; padding-right: 5.4pt; padding-left: 5.4pt; vertical-align: bottom;">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:9pt;"><span style="font-family:"Century Gothic";"><strong>&nbsp;</strong></span></p>
                </td>
                <td colspan="2" style="width: 17.0213%; padding-right: 5.4pt; padding-left: 5.4pt; vertical-align: bottom;">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt;"><span style="font-family:"Times New Roman";"><strong>&nbsp;</strong></span></p>
                </td>
                <td style="width: 16.1094%; padding-right: 5.4pt; padding-left: 5.4pt; vertical-align: bottom;">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt;"><span style="font-family:"Times New Roman";"><strong>&nbsp;</strong></span></p>
                </td>
                <td colspan="2" style="width: 19.1014%; padding-right: 5.4pt; padding-left: 5.4pt; vertical-align: bottom;">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt;"><span style="font-family:"Times New Roman";"><strong>&nbsp;</strong></span></p>
                </td>
                <td style="width: 15.0931%; padding-right: 5.4pt; padding-left: 5.4pt; vertical-align: bottom;">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt;"><span style="font-family:"Times New Roman";"><strong>&nbsp;</strong></span></p>
                </td>
                <td colspan="2" style="width:84.2pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:bottom;">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt;"><span style="font-family:"Times New Roman";"><strong>&nbsp;</strong></span></p>
                </td>
            </tr>
            <tr style="height:18pt;">
                <td style="width: 16.5653%; border: 0.75pt solid rgb(191, 191, 191); padding-right: 5.03pt; padding-left: 5.03pt; vertical-align: middle; background-color: rgb(217, 217, 217);">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:8pt;"><br></p>
                </td>
                <td colspan="8" style="width: 83.1307%; border-top: 0.75pt solid rgb(191, 191, 191); border-right: 0.75pt solid rgb(191, 191, 191); border-bottom: 0.75pt solid rgb(191, 191, 191); padding-right: 5.03pt; padding-left: 5.4pt; vertical-align: middle; background-color: rgb(237, 237, 237); text-align: center;">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:8pt;"><strong><span style="font-family:"Century Gothic";">VEHICLE INFORMATION&nbsp;</span></strong></p>
                </td>
            </tr>
            <tr style="height:18pt;">
                <td style="width: 16.5653%; border-right: 0.75pt solid rgb(191, 191, 191); border-left: 0.75pt solid rgb(191, 191, 191); border-bottom: 0.75pt solid rgb(191, 191, 191); padding-right: 5.03pt; padding-left: 5.03pt; vertical-align: middle; background-color: rgb(217, 217, 217);">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:8pt;"><strong>VEHICLE RTO NUMBER</strong></p>
                </td>
                <td colspan="3" style="width: 33.4347%; border-top: 0.75pt solid rgb(191, 191, 191); border-right: 0.75pt solid rgb(191, 191, 191); border-bottom: 0.75pt solid rgb(191, 191, 191); padding-right: 5.03pt; padding-left: 5.4pt; vertical-align: middle;">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:9pt;"><span style="font-family:"Century Gothic";"><strong>&nbsp; ' . $row['rto_number'] . ' </strong></span></p>
                </td>
                <td colspan="2" style="width: 19.1014%; border-right: 0.75pt solid rgb(191, 191, 191); border-bottom: 0.75pt solid rgb(191, 191, 191); padding-right: 5.03pt; padding-left: 5.4pt; vertical-align: middle; background-color: rgb(217, 217, 217);">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:8pt;"><strong>MAKER</strong></p>
                </td>
                <td colspan="3" style="width: 31.0506%; border-top: 0.75pt solid rgb(191, 191, 191); border-right: 0.75pt solid rgb(191, 191, 191); border-bottom: 0.75pt solid rgb(191, 191, 191); padding-right: 5.03pt; padding-left: 5.4pt; vertical-align: middle;">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:9pt;"><span style="font-family:"Century Gothic";"><strong>&nbsp;  ' . $row['maker_name'] . '  </strong></span></p>
                </td>
            </tr>
            <tr style="height:18pt;">
                <td style="width: 16.5653%; border-right: 0.75pt solid rgb(191, 191, 191); border-left: 0.75pt solid rgb(191, 191, 191); border-bottom: 0.75pt solid rgb(191, 191, 191); padding-right: 5.03pt; padding-left: 5.03pt; vertical-align: middle; background-color: rgb(217, 217, 217);">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:8pt;"><strong>MODEL&nbsp;<br></strong></p>
                </td>
                <td colspan="3" style="width: 33.4347%; border-top: 0.75pt solid rgb(191, 191, 191); border-right: 0.75pt solid rgb(191, 191, 191); border-bottom: 0.75pt solid rgb(191, 191, 191); padding-right: 5.03pt; padding-left: 5.4pt; vertical-align: middle;">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:9pt;"><span style="font-family:"Century Gothic";"><strong>&nbsp;</strong> ' . $row['model_name'] . '</span></p>
                </td>
                <td colspan="2" style="width: 19.1014%; border-right: 0.75pt solid rgb(191, 191, 191); border-bottom: 0.75pt solid rgb(191, 191, 191); padding-right: 5.03pt; padding-left: 5.4pt; vertical-align: middle; background-color: rgb(217, 217, 217);">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:8pt;"><strong><span style="font-family: "Century Gothic";">COLOR</span>&nbsp;</strong></p>
                </td>
                <td colspan="3" style="width: 31.0506%; border-top: 0.75pt solid rgb(191, 191, 191); border-right: 0.75pt solid rgb(191, 191, 191); border-bottom: 0.75pt solid rgb(191, 191, 191); padding-right: 5.03pt; padding-left: 5.4pt; vertical-align: middle;">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:9pt;"><span style="font-family:"Century Gothic";"><strong>&nbsp;</strong>  ' . $row['color_name'] . '  </span></p>
                </td>
            </tr>
            <tr style="height:6.25pt;">
                <td style="width: 16.5653%; padding-right: 5.4pt; padding-left: 5.4pt; vertical-align: bottom;">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:9pt;"><span style="font-family:"Century Gothic";"><strong>&nbsp;</strong></span></p>
                </td>
                <td colspan="2" style="width: 17.0213%; padding-right: 5.4pt; padding-left: 5.4pt; vertical-align: bottom;">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10pt;"><span style="font-family:"Times New Roman";"><strong>&nbsp;</strong></span></p>
                </td>
                <td style="width: 16.1094%; padding-right: 5.4pt; padding-left: 5.4pt; vertical-align: bottom;">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10pt;"><span style="font-family:"Times New Roman";"><strong>&nbsp;</strong></span></p>
                </td>
                <td colspan="2" style="width: 19.1014%; padding-right: 5.4pt; padding-left: 5.4pt; vertical-align: bottom;">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10pt;"><span style="font-family:"Times New Roman";"><strong>&nbsp;</strong></span></p>
                </td>
                <td style="width: 15.0931%; padding-right: 5.4pt; padding-left: 5.4pt; vertical-align: bottom;">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10pt;"><span style="font-family:"Times New Roman";"><strong>&nbsp;</strong></span></p>
                </td>
                <td colspan="2" style="width:84.2pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:bottom;">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10pt;"><span style="font-family:"Times New Roman";"><strong>&nbsp;</strong></span></p>
                </td>
            </tr>
            <tr style="height:18pt;">
                <td colspan="7" style="width:464.2pt; border:0.75pt solid #bfbfbf; padding-right:5.03pt; padding-left:5.03pt; vertical-align:middle; background-color:#d6dce4;">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:8pt;"><strong><span style="font-family:"Century Gothic";">SERVICE DESCRIPTION</span></strong></p>
                </td>
                <td colspan="2" style="width:84.2pt; border-top:0.75pt solid #bfbfbf; border-right:0.75pt solid #bfbfbf; border-bottom:0.75pt solid #bfbfbf; padding-right:5.03pt; padding-left:5.4pt; vertical-align:middle; background-color:#d6dce4;">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:8pt;"><strong><span style="font-family:"Century Gothic";">AMOUNT</span></strong></p>
                </td>
            </tr>

         

';




    while ($service_details = mysqli_fetch_assoc($res_service)) {
        $html .= '
                <tr style="height:18pt;">
                <td colspan="7" style="width:464.2pt; border:0.75pt solid #bfbfbf; padding-right:5.03pt; padding-left:5.03pt; vertical-align:middle;">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:9pt;"><span style="font-family:"Century Gothic";"><strong>&nbsp;  ' .  $service_details["service_name"] . ' </strong></span></p>
                </td>
                <td colspan="2" style="width:84.2pt; border-right:0.75pt solid #bfbfbf; border-bottom:0.75pt solid #bfbfbf; padding-right:5.03pt; padding-left:5.4pt; vertical-align:middle; background-color:#ededed;">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:right; font-size:9pt;"><span style="font-family:"Century Gothic";"><strong>&nbsp;  ' .  $service_details["service_price"]   . '   </strong></span></p>
                </td>
            </tr>
';
    }


    $html .= '       <tr style="height:18pt;">
                <td colspan="6" style="width: 68.6455%; border: 0.75pt solid rgb(191, 191, 191); padding-right: 5.03pt; padding-left: 5.03pt; vertical-align: middle; background-color: rgb(214, 220, 228);">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:9pt;"><strong><span style="font-family:"Century Gothic";">&nbsp;</span></strong></p>
                </td>
                <td style="width: 15.0931%; border-right: 0.75pt solid rgb(191, 191, 191); border-bottom: 0.75pt solid rgb(191, 191, 191); padding-right: 5.03pt; padding-left: 5.4pt; vertical-align: middle; background-color: rgb(214, 220, 228);">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:8pt;"><strong><span style="font-family:"Century Gothic";">SERVICE TOTAL</span></strong></p>
                </td>
                <td colspan="2" style="width:84.2pt; border-right:0.75pt solid #bfbfbf; border-bottom:0.75pt solid #bfbfbf; padding-right:5.03pt; padding-left:5.4pt; vertical-align:middle; background-color:#d6dce4;">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:right; font-size:9pt;"><strong><span style="font-family:"Century Gothic";"> ' .  $service_price["service_price"]   . '   </span></strong></p>
                </td>
            </tr>
            <tr style="height:4.15pt;">
                <td style="width: 16.5653%; padding-right: 5.4pt; padding-left: 5.4pt; vertical-align: bottom;">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:right; font-size:9pt;"><strong><span style="font-family:"Century Gothic";">&nbsp;</span></strong></p>
                </td>
                <td colspan="2" style="width: 17.0213%; padding-right: 5.4pt; padding-left: 5.4pt; vertical-align: bottom;">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10pt;"><span style="font-family:"Times New Roman";"><strong>&nbsp;</strong></span></p>
                </td>
                <td style="width: 16.1094%; padding-right: 5.4pt; padding-left: 5.4pt; vertical-align: bottom;">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10pt;"><span style="font-family:"Times New Roman";"><strong>&nbsp;</strong></span></p>
                </td>
                <td colspan="2" style="width: 19.1014%; padding-right: 5.4pt; padding-left: 5.4pt; vertical-align: bottom;">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10pt;"><span style="font-family:"Times New Roman";"><strong>&nbsp;</strong></span></p>
                </td>
                <td style="width: 15.0931%; padding-right: 5.4pt; padding-left: 5.4pt; vertical-align: bottom;">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10pt;"><span style="font-family:"Times New Roman";"><strong>&nbsp;</strong></span></p>
                </td>
                <td colspan="2" style="width:84.2pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:bottom;">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10pt;"><span style="font-family:"Times New Roman";"><strong>&nbsp;</strong></span></p>
                </td>
            </tr>
            <tr style="height:18pt;">
                <td style="width: 16.5653%; border: 0.75pt solid rgb(191, 191, 191); padding-right: 5.03pt; padding-left: 5.03pt; vertical-align: middle; background-color: rgb(214, 220, 228);">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:8pt;"><strong><span style="font-family:"Century Gothic";">PART NUMBER</span></strong></p>
                </td>
                <td colspan="3" style="width: 33.4347%; border-top: 0.75pt solid rgb(191, 191, 191); border-right: 0.75pt solid rgb(191, 191, 191); border-bottom: 0.75pt solid rgb(191, 191, 191); padding-right: 5.03pt; padding-left: 5.4pt; vertical-align: middle; background-color: rgb(214, 220, 228);">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:8pt;"><strong><span style="font-family:"Century Gothic";">PART NAME</span></strong></p>
                </td>
                <td colspan="2" style="width: 19.1014%; border-top: 0.75pt solid rgb(191, 191, 191); border-right: 0.75pt solid rgb(191, 191, 191); border-bottom: 0.75pt solid rgb(191, 191, 191); padding-right: 5.03pt; padding-left: 5.4pt; vertical-align: middle; background-color: rgb(214, 220, 228);">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:8pt;"><strong><span style="font-family:"Century Gothic";">QUANTITY</span></strong></p>
                </td>
                <td style="width: 15.0931%; border-top: 0.75pt solid rgb(191, 191, 191); border-right: 0.75pt solid rgb(191, 191, 191); border-bottom: 0.75pt solid rgb(191, 191, 191); padding-right: 5.03pt; padding-left: 5.4pt; vertical-align: middle; background-color: rgb(214, 220, 228);">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:8pt;"><strong><span style="font-family:"Century Gothic";">PRICE PER UNIT</span></strong></p>
                </td>
                <td colspan="2" style="width:84.2pt; border-top:0.75pt solid #bfbfbf; border-right:0.75pt solid #bfbfbf; border-bottom:0.75pt solid #bfbfbf; padding-right:5.03pt; padding-left:5.4pt; vertical-align:middle; background-color:#d6dce4;">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:8pt;"><strong><span style="font-family:"Century Gothic";">AMOUNT</span></strong></p>
                </td>
            </tr>



';

    while ($parts_details = mysqli_fetch_assoc($res_parts)) {
        $html .= '

            <tr style="height:18pt;">
                <td style="width: 16.5653%; border-right: 0.75pt solid rgb(191, 191, 191); border-left: 0.75pt solid rgb(191, 191, 191); border-bottom: 0.75pt solid rgb(191, 191, 191); padding-right: 5.03pt; padding-left: 5.03pt; vertical-align: middle;">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:9pt;"><span style="font-family:"Century Gothic";"><strong>' .  $parts_details["parts_id"] . ' </strong></span></p>
                </td>
                <td colspan="3" style="width: 33.4347%; border-top: 0.75pt solid rgb(191, 191, 191); border-right: 0.75pt solid rgb(191, 191, 191); border-bottom: 0.75pt solid rgb(191, 191, 191); padding-right: 5.03pt; padding-left: 5.4pt; vertical-align: middle;">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:9pt;"><span style="font-family:"Century Gothic";"><strong>' .  $parts_details["part_name"] . '</strong></span></p>
                </td>
                <td colspan="2" style="width: 19.1014%; border-right: 0.75pt solid rgb(191, 191, 191); border-bottom: 0.75pt solid rgb(191, 191, 191); padding-right: 5.03pt; padding-left: 5.4pt; vertical-align: middle;">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:9pt;"><span style="font-family:"Century Gothic";"><strong> ' .  $parts_details["part_used_qty"] . ' </strong></span></p>
                </td>
                <td style="width: 15.0931%; border-right: 0.75pt solid rgb(191, 191, 191); border-bottom: 0.75pt solid rgb(191, 191, 191); padding-right: 5.03pt; padding-left: 5.4pt; vertical-align: middle;">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:9pt;"><span style="font-family:"Century Gothic";"><strong>' .  $parts_details["part_price"] . '</strong></span></p>
                </td>
                <td colspan="2" style="width:84.2pt; border-right:0.75pt solid #bfbfbf; border-bottom:0.75pt solid #bfbfbf; padding-right:5.03pt; padding-left:5.4pt; vertical-align:middle; background-color:#ededed;">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:right; font-size:9pt;"><span style="font-family:"Century Gothic";"><strong>' .  $parts_details["price"] . '</strong></span></p>
                </td>
            </tr>




.';
    }

    $html .= '

            <tr style="height:18pt;">
                <td colspan="6" style="width: 68.6455%; border: 0.75pt solid rgb(191, 191, 191); padding-right: 5.03pt; padding-left: 5.03pt; vertical-align: middle; background-color: rgb(214, 220, 228);">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:9pt;"><strong><span style="font-family:"Century Gothic";">&nbsp;</span></strong></p>
                </td>
                <td style="width: 15.0931%; border-right: 0.75pt solid rgb(191, 191, 191); border-bottom: 0.75pt solid rgb(191, 191, 191); padding-right: 5.03pt; padding-left: 5.4pt; vertical-align: middle; background-color: rgb(214, 220, 228);">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:8pt;"><strong><span style="font-family:"Century Gothic";">PARTS TOTAL</span></strong></p>
                </td>
                <td colspan="2" style="width:84.2pt; border-right:0.75pt solid #bfbfbf; border-bottom:0.75pt solid #bfbfbf; padding-right:5.03pt; padding-left:5.4pt; vertical-align:middle; background-color:#d6dce4;">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:right; font-size:9pt;"><strong><span style="font-family:"Century Gothic";">' .  $parts_price["parts_total"] . '</span></strong></p>
                </td>
            </tr>
            <tr style="height:6pt;">
                <td style="width: 16.5653%; padding-right: 5.4pt; padding-left: 5.4pt; vertical-align: bottom;">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:right; font-size:9pt;"><strong><span style="font-family:"Century Gothic";">&nbsp;</span></strong></p>
                </td>
                <td colspan="2" style="width: 17.0213%; padding-right: 5.4pt; padding-left: 5.4pt; vertical-align: bottom;">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10pt;"><span style="font-family:"Times New Roman";"><strong>&nbsp;</strong></span></p>
                </td>
                <td style="width: 16.1094%; padding-right: 5.4pt; padding-left: 5.4pt; vertical-align: bottom;">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10pt;"><span style="font-family:"Times New Roman";"><strong>&nbsp;</strong></span></p>
                </td>
                <td colspan="2" style="width: 19.1014%; padding-right: 5.4pt; padding-left: 5.4pt; vertical-align: bottom;">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10pt;"><span style="font-family:"Times New Roman";"><strong>&nbsp;</strong></span></p>
                </td>
                <td style="width: 15.0931%; padding-right: 5.4pt; padding-left: 5.4pt; vertical-align: bottom;">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10pt;"><span style="font-family:"Times New Roman";"><strong>&nbsp;</strong></span></p>
                </td>
                <td colspan="2" style="width:84.2pt; padding-right:5.4pt; padding-left:5.4pt; vertical-align:bottom;">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:center; font-size:10pt;"><span style="font-family:"Times New Roman";"><strong>&nbsp;</strong></span></p>
                </td>
            </tr>
            <tr style="height:21.6pt;">
                <td style="width: 16.5653%; border: 0.75pt solid rgb(191, 191, 191); padding-right: 5.03pt; padding-left: 5.03pt; vertical-align: middle; background-color: rgb(214, 220, 228);">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:8pt;"><strong><span style="font-family:"Century Gothic";">WORK ORDER COMPILED BY</span></strong></p>
                </td>
                <td colspan="3" style="width: 33.4347%; border-top: 0.75pt solid rgb(191, 191, 191); border-right: 0.75pt solid rgb(191, 191, 191); border-bottom: 0.75pt solid rgb(191, 191, 191); padding-right: 5.03pt; padding-left: 5.4pt; vertical-align: middle;">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:9pt;"><span style="font-family:"Century Gothic";"><strong>   '.  $get_staff['user_name'] .'  </strong></span></p>
                </td>
                <td colspan="2" style="width: 19.1014%; padding-right: 5.4pt; padding-left: 5.4pt; vertical-align: bottom;">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:9pt;"><span style="font-family:"Century Gothic";"><strong>&nbsp;</strong></span></p>
                </td>
                <td style="width: 15.0931%; border-top: 0.75pt solid rgb(191, 191, 191); border-left: 0.75pt solid rgb(191, 191, 191); border-bottom: 0.75pt solid rgb(191, 191, 191); padding-right: 5.4pt; padding-left: 5.03pt; vertical-align: middle; background-color: rgb(214, 220, 228);">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:8pt;"><strong><span style="font-family:"Century Gothic";">SUBTOTAL</span></strong></p>
                </td>
                <td colspan="2" style="width:84.2pt; border:0.75pt solid #bfbfbf; padding-right:5.03pt; padding-left:5.03pt; vertical-align:middle; background-color:#eaeef3;">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:right; font-size:9pt;"><span style="font-family:"Century Gothic";"><strong>' .   $subtotal  . '</strong></span></p>
                </td>
            </tr>
            <tr style="height:21.6pt;">
                <td style="width: 16.5653%; padding-right: 5.4pt; padding-left: 5.4pt; vertical-align: bottom;">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:right; font-size:9pt;"><span style="font-family:"Century Gothic";"><strong>&nbsp;</strong></span></p>
                </td>
                <td colspan="2" style="width: 17.0213%; padding-right: 5.4pt; padding-left: 5.4pt; vertical-align: bottom;">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt;"><span style="font-family:"Times New Roman";"><strong>&nbsp;</strong></span></p>
                </td>
                <td style="width: 16.1094%; padding-right: 5.4pt; padding-left: 5.4pt; vertical-align: bottom;">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:10pt;"><span style="font-family:"Times New Roman";"><strong>&nbsp;</strong></span></p>
                </td>
                <td colspan="2" style="width: 19.1014%; padding-right: 5.4pt; padding-left: 5.4pt; vertical-align: middle; background-color: rgb(255, 255, 255);">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:right; font-size:8pt;"><br></p>
                </td>
                <td style="width: 15.0931%; border-left: 0.75pt solid rgb(191, 191, 191); border-bottom: 0.75pt dotted rgb(191, 191, 191); padding-right: 5.4pt; padding-left: 5.03pt; vertical-align: middle; background-color: rgb(214, 220, 228);">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:8pt;"><strong><span style="font-family:"Century Gothic";">TAX RATE %</span></strong></p>
                </td>
                <td colspan="2" style="width:84.2pt; border-right:0.75pt solid #bfbfbf; border-left:0.75pt solid #bfbfbf; border-bottom:0.75pt dotted #bfbfbf; padding-right:5.03pt; padding-left:5.03pt; vertical-align:middle;">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:right; font-size:9pt;"><span style="font-family:"Century Gothic";"><strong> '.    $taxRate  .'  </strong></span></p>
                </td>
            </tr>
            <tr style="height:21.6pt;">
                <td style="width: 16.5653%; border: 0.75pt solid rgb(191, 191, 191); padding-right: 5.03pt; padding-left: 5.03pt; vertical-align: middle; background-color: rgb(214, 220, 228);">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:8pt;"><strong><span style="font-family:"Century Gothic";">WORK AUTHORIZED BY</span></strong></p>
                </td>
                <td colspan="3" style="width: 33.4347%; border-top: 0.75pt solid rgb(191, 191, 191); border-right: 0.75pt solid rgb(191, 191, 191); border-bottom: 0.75pt solid rgb(191, 191, 191); padding-right: 5.03pt; padding-left: 5.4pt; vertical-align: middle;">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:9pt;"><span style="font-family:"Century Gothic";"><strong>'.  $get_staff['user_name'] .'</strong></span></p>
                </td>
                <td colspan="2" style="width: 19.1014%; padding-right: 5.4pt; padding-left: 5.4pt; vertical-align: bottom; background-color: rgb(255, 255, 255);">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:right; font-size:12pt;"><span style="font-family:"Century Gothic";"><strong>&nbsp;</strong></span></p>
                </td>
                <td style="width: 15.0931%; border-left: 0.75pt solid rgb(191, 191, 191); border-bottom: 0.75pt solid rgb(191, 191, 191); padding-right: 5.4pt; padding-left: 5.03pt; vertical-align: middle; background-color: rgb(214, 220, 228);">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:8pt;"><strong><span style="font-family:"Century Gothic";">TOTAL TAX</span></strong></p>
                </td>
                <td colspan="2" style="width:84.2pt; border-right:0.75pt solid #bfbfbf; border-left:0.75pt solid #bfbfbf; border-bottom:0.75pt solid #bfbfbf; padding-right:5.03pt; padding-left:5.03pt; vertical-align:middle; background-color:#eaeef3;">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:right; font-size:9pt;"><span style="font-family:"Century Gothic";"><strong> '.   $tax  .'</strong></span></p>
                </td>
            </tr>
            <tr style="height:21.6pt;">
                <td style="width: 16.5653%; border-right: 0.75pt solid rgb(191, 191, 191); border-left: 0.75pt solid rgb(191, 191, 191); border-bottom: 0.75pt solid rgb(191, 191, 191); padding-right: 5.03pt; padding-left: 5.03pt; vertical-align: middle; background-color: rgb(214, 220, 228);">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:8pt;"><strong><span style="font-family:"Century Gothic";">AUTHORIZING&nbsp;</span><br><span style="font-family:"Century Gothic";">PARTY SIGNATURE</span></strong></p>
                </td>
                <td colspan="3" style="width: 33.4347%; border-top: 0.75pt solid rgb(191, 191, 191); border-right: 0.75pt solid rgb(191, 191, 191); border-bottom: 0.75pt solid rgb(191, 191, 191); padding-right: 5.03pt; padding-left: 5.4pt; vertical-align: middle;">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:9pt;"><span style="font-family:"Century Gothic";"><strong>&nbsp;</strong></span></p>
                </td>
                <td colspan="2" style="width: 19.1014%; padding-right: 5.4pt; padding-left: 5.4pt; vertical-align: middle; background-color: rgb(255, 255, 255);">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:right; font-size:8pt;"><br></p>
                </td>
                <td style="width: 15.0931%; border-left: 0.75pt solid rgb(191, 191, 191); border-bottom: 1pt solid rgb(191, 191, 191); padding-right: 5.4pt; padding-left: 5.03pt; vertical-align: middle; background-color: rgb(214, 220, 228);">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:8pt;"><strong><span style="font-family:"Century Gothic";">LABOUR CHARGES</span></strong></p>
                </td>
                <td colspan="2" style="width:84.2pt; border-right:0.75pt solid #bfbfbf; border-left:0.75pt solid #bfbfbf; border-bottom:1pt solid #bfbfbf; padding-right:5.03pt; padding-left:5.03pt; vertical-align:middle;">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:right; font-size:9pt;"><span style="font-family:"Century Gothic";"><strong>'. $labour_charge    .'</strong></span></p>
                </td>
            </tr>
            <tr style="height:21.6pt;">
                <td style="width: 16.5653%; border-right: 0.75pt solid rgb(191, 191, 191); border-left: 0.75pt solid rgb(191, 191, 191); border-bottom: 0.75pt solid rgb(191, 191, 191); padding-right: 5.03pt; padding-left: 5.03pt; vertical-align: middle; background-color: rgb(214, 220, 228);">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:8pt;"><strong><span style="font-family:"Century Gothic";">AUTHORIZATION&nbsp;</span><br><span style="font-family:"Century Gothic";">DATE</span></strong></p>
                </td>
                <td colspan="3" style="width: 33.4347%; border-top: 0.75pt solid rgb(191, 191, 191); border-right: 0.75pt solid rgb(191, 191, 191); border-bottom: 0.75pt solid rgb(191, 191, 191); padding-right: 5.03pt; padding-left: 5.4pt; vertical-align: middle;">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:9pt;"><span style="font-family:"Century Gothic";"><strong> '.  $AUTHORIZATION_DATE .'</strong></span></p>
                </td>
                <td colspan="2" style="width: 19.1014%; padding-right: 5.4pt; padding-left: 5.4pt; vertical-align: bottom;">
                    <p style="margin: top 0;; margin-bottom:0pt; font-size:9pt;"><span style="font-family:"Century Gothic";"><strong>&nbsp;</strong></span></p>
                </td>
                <td style="width: 20px; border-left: 0.75pt solid rgb(191, 191, 191); border-bottom: 0.75pt solid rgb(191, 191, 191); padding-right: 5.4pt; padding-left: 5.03pt; vertical-align: middle; background-color: rgb(214, 220, 228);">
                    <p style="margin-top:0pt; margin-bottom:0pt; font-size:8pt;"><strong><span style="font-family:"Century Gothic";">TOTAL</span></strong></p>
                </td>
                <td colspan="2" style="width: 112px;; border-right:1px solid #bfbfbf; border-left:0.75pt solid #bfbfbf; border-bottom:0.75pt solid #bfbfbf; padding-right:5.03pt; padding-left:5.03pt; vertical-align:middle; background-color:#d6dce4;">
                    <p style="margin-top:0pt; margin-bottom:0pt; text-align:right; font-size:9pt;"><span style="font-family:"Century Gothic";"><strong> '.  $total_bill  .'</strong></span></p>
                </td>
            </tr>
        </tbody>
    </table>
    <p style="margin-top:0pt; margin-bottom:0pt; font-size:8pt;"><strong><span style="font-family:"Century Gothic"; color:#a6a6a6;">&nbsp;</span></strong></p>
    <p><br></p>
    <div style="text-align :center; font-size:20px ;">Thank you!</div>
</div>
    ';
    // // // // // // // // // // // // // // // // // // // // // // // // // // // //
} else {
    $html = "no data found";
}

// echo $html;
$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML($html);
$file =   $row['user_name'] . time() . ".pdf";
$mpdf->Output($file, 'I');
