<?php


if (isset($_POST['ts'])) {
  require 'db-connect.php';
  $sql = "DELETE FROM `printorder`";
  $conn->exec($sql);
}

?>
