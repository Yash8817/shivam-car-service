<?php 
require "../shivam/lockscreen/connection.php";
 ?>

<?php
if(isset($_POST['c_id'])) {
    $c_id = mysqli_real_escape_string($con, $_POST['c_id']);
  $sql = "select * from maker where car_typecar_type_id= $c_id";
  $res = mysqli_query($con, $sql);
  if(mysqli_num_rows($res) > 0) {
    echo "<option value=''>------- Select --------</option>";
    while($row = mysqli_fetch_object($res)) {
      echo "<option value='".$row->maker_id."'>".$row->maker_name."</option>";
    }
  }
} else {
  header('location: ./');
}
?>