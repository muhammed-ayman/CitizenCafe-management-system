<?php
if (isset($_GET['service'])) {
  $serviceValue = $_GET['service'];
  $tableName = $_GET['tableName'];
  echo '<script type="text/javascript">var serviceValue='.$serviceValue.'</script>';
  require 'db-connect.php';
  $sql = "SELECT * FROM `instantorder` WHERE `tableName` ='$tableName'";
  $res = $conn->query($sql);
  foreach ($res as $row) {
    $prodata = new stdClass;
    $prodata->product =$row[2];
    $prodata->number =$row[4];
    $prodata->price =strval($row[5]);
    $product = json_encode($prodata, JSON_UNESCAPED_UNICODE);
    echo '<script type="text/javascript">tableData.unshift('.$product.')</script>';
  }
}

?>
