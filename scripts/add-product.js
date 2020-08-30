
// GLOBAL VARIABLES
var currpg = 1;


// PRODUCTS DATA
productData = []

// CONSTANT DATA TABLE
var filterData = []


// FILTER FUNCTIONS
function viewBy() {
  var productTypeFilter = document.getElementById('product-type-filter').value;
  if (productTypeFilter.length > 0) {
    productData = filterData;
    productData = productData.filter(({productType}) => !productType.includes(productTypeFilter)==false);
    changePage(1);
    document.getElementById('product-type-filter').value = "";
  } else {
    alert("اختر نوع الصنف");
  }
}

function viewAll() {
  productData = filterData;
  changePage(1);
  document.getElementById('product-type-filter').value = "";
}


// EMPTY INPUTS
function emptyInputs() {
  var proinp = document.getElementById('prodName');
  var priceinput = document.getElementById('price');
  proinp.value = "";
  priceinput.value = "";
  document.getElementById('product-type').value = "";
}

// CHECKING THE INPUT VALUES
function checkValues() {
  var proName = document.getElementById('prodName').value;
  var price = document.getElementById('price').value;
  var productType = document.getElementById('product-type').value;
  if (proName.length > 0 && price.length > 0 && productType.length > 0) {
    if (isNaN(price)) {
      alert('أدخل البيانات بشكل صحيح');
    } else {

      var isFound = 0;
      for (var i = 0; i < productData.length; i++) {
        var prod = productData[i]['productName'];
        if (prod === proName) {
          isFound = 1;
          console.log(prod);
        }
      }
      if (isFound == 0) {
        $.ajax({
          type : "POST",
          url  : "./php/add-product.php",
          data : { productName : proName, price : price, productType: productType},
          success: function(res){
            var prodD = {productName:proName, price:price, productType: productType};
            productData.unshift(prodD);
            emptyInputs();
            changePage(1,productData);
          }
        });
      } else {
        alert('الصنف موجود بالفعل');
      }
    }
  } else {
    alert('أدخل البيانات');
  }
}

// ADD PRODUCT
function addProduct() {
  checkValues();
}

// REMOVE ARRAY ELEMENT
function removeElement(array, elem) {
    var index = array.indexOf(elem);
    if (index > -1) {
        array.splice(index, 1);
    }
}

// DELETE PRODUCT
function deleteProduct(prname) {
  for (var i = 0; i < productData.length; i++) {
    var recdata = productData[i];
    if (recdata['productName'] == prname) {
      removeElement(productData, recdata);
      $.ajax({
        type : "POST",
        url  : "./php/delete-product.php",
        data : { productname : prname},
        success: function(res){
          var count = $('#products-table tr').length;
          if (count == 1) {
            currpg = currpg-1;
          }
          changePage(currpg,productData);
        }
      });
    }
  }
}

// PAGINATION SECTION:

// CHANGE PAGE
function changePage(pgnum) {
  var table = document.getElementById("fproducts-table");
  while (table.rows.length > 1) {
    table.deleteRow(1);
  }
  var btnDiv = document.getElementById('products-pages');
  btnDiv.innerHTML = "";
  currpg = pgnum;
  makeTable(pgnum, productData);
}

// CREATING BUTTON AND APPENDING IT WITH THE VALUE AND CLASS AS PARAMETERS
function createButton(val, clas, valnum) {
  if (val != "f" && val != "l") {
    var parentDiv = document.getElementById('products-pages');
    var btn = document.createElement("BUTTON");
    btn.innerHTML = val;
    btn.classList.add(clas);
    btn.value = valnum;
    btn.addEventListener("click", function(){
      changePage(valnum);
    });
    parentDiv.appendChild(btn);
  } else {
    if (val == "f") {
      var parentDiv = document.getElementById('products-pages');
      var btn = document.createElement("BUTTON");
      btn.innerHTML = "الأولي";
      btn.classList.add(clas);
      btn.value = valnum;
      btn.addEventListener("click", function(){
        changePage(valnum);
      });
      parentDiv.appendChild(btn);
    } else {
      var parentDiv = document.getElementById('products-pages');
      var btn = document.createElement("BUTTON");
      btn.innerHTML = "الأخيرة";
      btn.classList.add(clas);
      btn.value = valnum;
      btn.addEventListener("click", function(){
        changePage(valnum);
      });
      parentDiv.appendChild(btn);
    }
  }
}

// BUILDING BUTTONS:
function buildButtons(maxPages, currPage) {
  if (maxPages <=5 && maxPages > 1) {
    for (var i = 1; i <= maxPages; i++) {
      createButton(i,i,i);
    }
  } else if(maxPages > 1) {
    diff = maxPages-currPage;
    if (diff>2) {
      if (currPage != 2 && currPage != 1) {
        createButton('f','specialbtn',"1");
        for (var i = currPage-1; i <= currPage+1; i++) {
          createButton(i,i,i);
        }
        createButton('l','specialbtn',maxPages);
      }else {
        for (var i = 1; i <= 4; i++) {
          createButton(i,i,i);
        }
        createButton('l','specialbtn',maxPages);
      }
    } else {
      createButton('f','specialbtn',"1");
      for (var i = maxPages-3; i <= maxPages; i++) {
        createButton(i,i,i);
      }
    }
  }
}

// COUNT NUMBER OF PAGES
function initTable(data) {
  var dataCount = data.length;
  var btnNum = Math.floor(dataCount/5);
  if (dataCount/5 > btnNum) {
    btnNum += 1;
  }
  return btnNum;
}

// BUILDING TABLE
function buildTable(data) {

  for (var i = 0; i < data.length; i++) {
    var dataContent = data[i];
    var table = document.getElementById("fproducts-table");
    var row = table.insertRow(i+1);
    var productname = row.insertCell(0);
    var productTypeCell = row.insertCell(1);
    var price = row.insertCell(2);
    var del = row.insertCell(3);
    productname.innerHTML = dataContent["productName"];
    price.innerHTML = dataContent["price"];
    productTypeCell.innerHTML = dataContent["productType"];
    del.innerHTML = '<img src="images/delete.svg" proname = "'+dataContent["productName"]+'">';
  }
}


// SETUP TABLE MAKING IN A SPECIFIC PAGE
function makeTable(page, data) {
  endPoint = page*5;
  startPoint = endPoint-5;
  specificData = data.slice(startPoint, endPoint);
  buildTable(specificData);
  buildButtons(initTable(productData),page);
}
