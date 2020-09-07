<!DOCTYPE html>
<html lang="en" dir="rtl">
  <head>
    <meta charset="utf-8">
    <title>الأصناف</title>
    <link rel="stylesheet" href="styles/products.css">
    <link rel="stylesheet" href="styles/header.css">
    <link rel="stylesheet" href="styles/footer.css">
    <script src="scripts/jquery.min.js"></script>
        <script type="text/javascript" src="scripts/add-product.js"></script>
  </head>
  <body>

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

    <div class="content">

      <div class="content-content">

        <div class="filter">
          <p>عرض بواسطة</p>
          <select class="product-type" name="product-type-filter" id="product-type-filter">
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
          </select>
          <button type="button" name="viewby" onclick="viewBy()">عرض</button>
          <button type="button" name="viewby" onclick="viewAll()" id="allview">عرض الكل</button>
        </div>

        <div class="add-product">
          <select class="productType" name="product-type" id="product-type">
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
          <input type="text" name="product-name" id="prodName" placeholder="الصنف">
          <input type="text" name="product-price" id="price" placeholder="السعر">
          <button type="button" name="addProduct" onclick="addProduct()">إضافة صنف</button>
        </div>

        <div class="products" id="products-table">
          <table id="fproducts-table">
            <tr>
              <th class="prod-name">اسم الصنف</th>
              <th class="prod-name">نوع الصنف</th>
              <th>السعر</th>
              <th>حذف</th>
            </tr>
          </table>
        </div>

        <div class="products-pages" id="products-pages">
        </div>

      </div>

    </div>

    <!-- FOOTER -->
    <div class="footer">
      <p>Developed By: <a href="https://www.linkedin.com/in/muhammedayman/" target="_blank">Mohammed Ayman</a> (+201090658284)</p>
    </div>

    <!--SCRIPT-->
    <?php include 'php/get-products.php'; ?>
    <script type="text/javascript">makeTable(1, productData)</script>
    <script type="text/javascript">
      filterData = productData;
      $(document).ready(function functionName() {
        $('#products-table').on('click','img',function() {
          $productnameDel = $(this).attr('proname');
          $(this).closest('tr').remove();
          deleteProduct($productnameDel);
        })
      });
    </script>

  </body>
</html>
