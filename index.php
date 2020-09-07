<!DOCTYPE html>
<html lang="" dir="rtl">
  <head>
    <meta charset="utf-8">
    <title>جميع الطلبات</title>
    <link rel="stylesheet" href="styles/index.css">
    <link rel="stylesheet" href="styles/header.css">
    <link rel="stylesheet" href="styles/footer.css">
    <script type="text/javascript" src="scripts/table-pagination.js"></script>
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

        <div class="filter">
          <p>عرض بواسطة</p>
          <select class="year" name="month" id="year">
            <option value="">السنة</option>
            <option value="2020">2020</option>
            <option value="2021">2021</option>
            <option value="2022">2022</option>
            <option value="2023">2023</option>
            <option value="2024">2024</option>
            <option value="2025">2025</option>
            <option value="2026">2026</option>
            <option value="2027">2027</option>
            <option value="2028">2028</option>
            <option value="2029">2029</option>
            <option value="2030">2030</option>
          </select>
          <select class="month" name="month" id="month">
            <option value="">الشهر</option>
            <option value="01">1</option>
            <option value="02">2</option>
            <option value="03">3</option>
            <option value="04">4</option>
            <option value="05">5</option>
            <option value="06">6</option>
            <option value="07">7</option>
            <option value="08">8</option>
            <option value="09">9</option>
            <option value="10">10</option>
            <option value="11">11</option>
            <option value="12">12</option>
          </select>
          <select class="day" name="day" id="day">
            <option value="">اليوم</option>
            <option value="01">1</option>
            <option value="02">2</option>
            <option value="03">3</option>
            <option value="04">4</option>
            <option value="05">5</option>
            <option value="06">6</option>
            <option value="07">7</option>
            <option value="08">8</option>
            <option value="09">9</option>
            <option value="10">10</option>
            <option value="11">11</option>
            <option value="12">12</option>
            <option value="13">13</option>
            <option value="14">14</option>
            <option value="15">15</option>
            <option value="16">16</option>
            <option value="17">17</option>
            <option value="18">18</option>
            <option value="19">19</option>
            <option value="20">20</option>
            <option value="21">21</option>
            <option value="22">22</option>
            <option value="23">23</option>
            <option value="24">24</option>
            <option value="25">25</option>
            <option value="26">26</option>
            <option value="27">27</option>
            <option value="28">28</option>
            <option value="29">29</option>
            <option value="30">30</option>
            <option value="31">31</option>
          </select>
          <button type="button" name="viewby" onclick="viewBy()">عرض</button>
          <button type="button" name="viewby" onclick="viewAll()" id="allview">عرض الكل</button>
        </div>

        <div class="content-table">
          <table id="all-orders-table">
            <tr>
              <th>الوقت</th>
              <th>التاريخ</th>
              <th>الطاولة</th>
              <th>الصنف</th>
              <th>نوع الصنف</th>
              <th>العدد</th>
              <th>اﻹجمالي</th>
            </tr>
          </table>
        </div>

        <div class="orders-pages" id="orders-pages">
        </div>

      </div>

    </div>

    <!-- FOOTER -->
    <div class="footer">
      <p>Developed By: <a href="https://www.linkedin.com/in/muhammedayman/" target="_blank">Mohammed Ayman</a> (+201090658284)</p>
    </div>


    <?php require 'php/get-orders.php'; ?>
    <script type="text/javascript">
      filterData = tableData;
      // SETUP THE INITIAL TABLE
      makeTable(1,tableData);
    </script>

  </body>
</html>
