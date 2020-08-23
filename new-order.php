<!DOCTYPE html>
<html lang="en" dir="rtl">
  <head>
    <meta charset="utf-8">
    <title>طلب جديد</title>
    <link rel="stylesheet" href="styles/new-order.css">
    <link rel="stylesheet" href="styles/header.css">
    <link rel="stylesheet" href="styles/footer.css">
    <script src="scripts/jquery.min.js"></script>
  </head>
  <body>

    <!-- HEADER -->
    <div class="header">

      <div class="header-layer">

        <div class="header-content">

          <div class="title">
            <p id="cafe-name">CiTiZeN</p>
            <p id="cafe-slogan">#هنغير_مزاجك</p>
          </div>

          <div class="nav-bar">
            <ul>
              <a href="index.php"><li><img src="images/order.svg"><br><span>جميع الطلبات</span></li></a>
              <a href="products.php"><li><img src="images/add.svg"><br><span>إضافة صنف</span></li></a>
              <a href="new-order.php"><li><img src="images/shopping-cart.svg"><br><span>طلب جديد</span></li></a>
            </ul>
          </div>

        </div>

      </div>

    </div>

    <!-- CONTENT -->
    <div class="content">
      <div class="content-content">

        <div class="add-order">
          <select class="order-select" name="order-select" id="order-select">
            <option value="الصنف">الصنف</option>
          </select>
          <input type="text" name="order-price" id="order-count" placeholder="العدد">
          <button type="button" name="addOrder" onclick="addOrder()">إضافة طلب</button>
        </div>

        <div class="orders">
          <table id="orders-table">
            <tr>
              <th>الصنف</th>
              <th>العدد</th>
              <th>إجمالي السعر</th>
              <th>حذف</th>
            </tr>
          </table>
        </div>

        <div class="order-pages" id="order-pages">
        </div>

      </div>
    </div>

    <!-- FOOTER -->
    <div class="footer">
      <p>Developed By: <a href="https://www.linkedin.com/in/muhammedayman/" target="_blank">Mohammed Ayman</a> (+201090658284)</p>
      <p>Designed By: <a href="https://www.linkedin.com/in/ali-elmala/" target="_blank">Ali El-Mala</a> (+201550639519)</p>
    </div>

    <!--SCRIPT-->
    <script src="scripts/add-order.js"></script>
    <?php include 'php/get-products.php'; ?>
    <script type="text/javascript">addOptions();</script>
    <script type="text/javascript">
    $(document).ready(function functionName() {
      $('#orders-table').on('click','img',function() {
        $orderid = $(this).attr('id');
        $(this).closest('tr').remove();
        deleteOrder($orderid);
      })
    });
    </script>

  </body>
</html>
