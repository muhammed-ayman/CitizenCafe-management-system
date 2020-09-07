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
          <div class="upper-add-order">
            <select class="table-number" id="table-number" onchange="changeTable();">
              <option value="طاولة 1">طاولة 1</option>
              <option value="طاولة 2">طاولة 2</option>
              <option value="طاولة 3">طاولة 3</option>
              <option value="طاولة 4">طاولة 4</option>
              <option value="طاولة 5">طاولة 5</option>
              <option value="طاولة 6">طاولة 6</option>
              <option value="طاولة 7">طاولة 7</option>
              <option value="طاولة 8">طاولة 8</option>
              <option value="طاولة 9">طاولة 9</option>
              <option value="طاولة 10">طاولة 10</option>
              <option value="طاولة 11">طاولة 11</option>
              <option value="طاولة 12">طاولة 12</option>
              <option value="طاولة 13">طاولة 13</option>
              <option value="طاولة 14">طاولة 14</option>
              <option value="طاولة 15">طاولة 15</option>
              <option value="طاولة 16">طاولة 16</option>
              <option value="طاولة 17">طاولة 17</option>
              <option value="طاولة 18">طاولة 18</option>
              <option value="طاولة 19">طاولة 19</option>
              <option value="طاولة 20">طاولة 20</option>
              <option value="أحمد فيصل">أحمد فيصل</option>
              <option value="أحمد السيد">أحمد السيد</option>
              <option value="اسلام">اسلام</option>
              <option value="أحمد الجندي">أحمد الجندي</option>
              <option value="مدحت">مدحت</option>
              <option value="عمرو">عمرو</option>
              <option value="عزت">عزت</option>
              <option value="النسور">النسور</option>
              <option value="لاند مارك">لاند مارك</option>
              <option value="معرض القرش">معرض القرش</option>
              <option value="Staff 1">Staff 1</option>
              <option value="Staff 2">Staff 2</option>
              <option value="Staff 3">Staff 3</option>
              <option value="Takeaway 1">Takeaway 1</option>
              <option value="Takeaway 2">Takeaway 2</option>
              <option value="Takeaway 3">Takeaway 3</option>
              <option value="PS room 1">PS room 1</option>
              <option value="PS room 2">PS room 2</option>
              <option value="PS room 3">PS room 3</option>
            </select>
            <input type="text" name="service" placeholder="خدمة (%)" id="serviceValue">
            <button type="button" name="saveOrder" onclick="saveOrder()" id="saveorder">حفظ الطلب</button>
            <button type="button" name="printOrder" onclick="printOrder()" id="printorder">طباعة الطلب</button>
          </div>
          <select class="product-type" name="product-type-filter" id="product-type-filter" onchange="changeOptions();">
            <option value="">نوع الصنف</option>
            <option value="شاي ومشروبات ساخنة">شاي ومشروبات ساخنة</option>
            <option value="اسبريسو">اسبريسو</option>
            <option value="قهوة تركي">قهوة تركي</option>
            <option value="كوكتيلات">كوكتيلات</option>
            <option value="عصائر طازجة">عصائر طازجة</option>
            <option value="ايس كريم">ايس كريم</option>
            <option value="مشروبات مثلجة">مشروبات مثلجة</option>
            <option value="مشروبات غازية">مشروبات غازية</option>
            <option value="ميلك شيك">ميلك شيك</option>
            <option value="حلويات">حلويات</option>
            <option value="مخبوزات">مخبوزات</option>
            <option value="حساب قديم">حساب قديم</option>
          </select>
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
              <th>نوع الصنف</th>
              <th class="del-cell">العدد</th>
              <th class="totalprice-cell">إجمالي السعر</th>
              <th class="del-cell">حذف</th>
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
    </div>

    <!--SCRIPT-->
    <script src="scripts/add-order.js"></script>
    <?php include 'php/get-products.php'; ?>
    <?php include 'php/get-instant-order.php'; ?>
    <script type="text/javascript">
    filterTempData = tempData;
    filterData = productData;
    changeTable();
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
