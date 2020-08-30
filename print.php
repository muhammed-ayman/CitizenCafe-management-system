<!DOCTYPE html>
<html lang="en" dir="rtl">
  <head>
    <meta charset="utf-8">
    <title>طباعة</title>
    <link rel="stylesheet" href="styles/print.css">
    <script type="text/javascript" src="scripts/orderprint.js"></script>
    <script type="text/javascript" src="scripts/jquery.min.js"></script>
  </head>
  <body>

    <button type="button" name="button" id="printButton" onclick="printcurorder()">طباعة</button>

    <div id="divPrint">
      <div class="header">
        <p id="cafename">CiTiZeN</p>
        <p id="cafeslogan">#هنغير_مزاجك</p>
        <hr>
      </div>
      <div class="details">
        <table id="printTable">
          <tr>
            <th>الصنف</th>
            <th>العدد</th>
            <th>السعر</th>
          </tr>
        </table>
        <div class="datedetails">
          <?php date_default_timezone_set('Africa/Cairo'); ?>
          <p><span>التاريخ:</span> <?php echo date("Y/m/d"); ?></p>
          <p dir="ltr"><?php echo strtoupper( date("h:i a")); ?><span id="timespan">:الوقت</span></p>
        </div>
      </div>
    </div>

    <?php require 'php/get-print-order.php'; ?>
    <script type="text/javascript">
      addData();
    </script>

  </body>
</html>
