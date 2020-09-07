
// GLOBAL VARIABLES
var currpg = 1;


// PRODUCTS DATA
var productData = []

// CONSTANT DATA TABLE
var filterData = []

// TEMPORARY data
var tempData = []

// CONSTANT DATA TABLE
var filterTempData = []

// CHANGE TABLE
function changeTable() {
  tempData = filterTempData;
  var tableNameFilter = document.getElementById('table-number').value;
  tempData = tempData.filter(({tableName}) => !tableName.includes(tableNameFilter)==false);
  changePage(1);
}

// REMOVE OLD OPTIONS
function removeOldOptions() {
  var sel = document.getElementById('order-select');
  for (var i = 1; i < sel.length; i++) {
    sel.remove(i);
  }
}

// ADD OPTIONS
function addOptions() {
  removeOldOptions();
  // ADD NEW OPTIONS
  for (var i = 0; i < productData.length; i++) {
    var proname = productData[i]['productName'];
    var option = document.createElement("option");
    option.text = proname;
    option.value = proname;
    var selection = document.getElementById('order-select');
    selection.appendChild(option);
  }
}

// CHANGE PRODUCTS OPTION BASED ON PRODUCT TYPE
function changeOptions() {
  var productsType = document.getElementById('product-type-filter').value;
  if (productsType.length > 0) {
    productData = filterData;
    productData = productData.filter(({productType}) => !productType.includes(productsType)==false);
    addOptions();
  } else{
    removeOldOptions();
  }
}

// PRINT ORDER
function printOrder() {
  var count = $('#orders-table tr').length;
  if (count > 1) {
    var serviceValue = document.getElementById('serviceValue').value;
    if (serviceValue.length > 0) {
      if (isNaN(serviceValue)==false) {
        var tableName = document.getElementById('table-number').value;
        window.open("./print.php?service="+serviceValue+"&tableName="+tableName, '_blank');
      } else{
        alert('تأكد من كتابة فيمة الخدمة بشكل صحيح');
      }
    } else{
      alert('تأكد من كتابة قيمة الخدمة');
    }
  } else{
    alert('تأكد من وجود طلبات');
  }
}

// SAVE ORDER
function saveOrder() {
  var count = $('#orders-table tr').length;
  if (count > 1) {
    for (var i = 0; i < tempData.length; i++) {
      var curdat = tempData[i];
      $.ajax({
        type : "POST",
        url  : "./php/add-order.php",
        data : { product : curdat['product'], productType: curdat['productType'], tableName: curdat['tableName'], number:curdat['number'], price : curdat['price']},
      });
      $.ajax({
        type : "POST",
        url  : "./php/delete-instant-order.php",
        data : {id: curdat['id'], tableNumber: curdat['tableName']},
      });
    }
    alert('تم حفظ الطلب بنجاح');
    tempData = [];
    changePage(1,tempData);
  } else {
    alert('تأكد من وجود طلبات');
  }
}

// EMPTY INPUTS
function emptyInputs() {
  var ordercount = document.getElementById('order-count');
  document.getElementById('product-type-filter').value = "";
  ordercount.value = "";
  $(document).ready(function(e) {
    $('#order-select').val('الصنف');
  });
}

// CHECKING THE INPUT VALUES
function checkValues() {
  var ordercount = document.getElementById('order-count').value;
  var orderselect = $("select.order-select").children("option:selected").val();
  var orderProductType = document.getElementById('product-type-filter').value;
  var currTableName = document.getElementById('table-number').value;
  if (orderselect != 'الصنف' && isNaN(ordercount)==false && ordercount != 0) {
    var totalPrice = ordercount;
    for (var i = 0; i < productData.length; i++) {
      if (orderselect == productData[i]['productName']) {
        totalPrice = totalPrice * parseFloat(productData[i]['price']);
        break;
      }
    }
    var orderid = tempData.length + 1;
    var initData = {product: orderselect, productType: orderProductType, number: ordercount, price: totalPrice, id: orderid, tableName: currTableName};
    tempData.unshift(initData);
    filterTempData.unshift(initData);
    emptyInputs();
    changePage(1,tempData);
    $.ajax({
      type : "POST",
      url  : "./php/add-instant-order.php",
      data : {id: orderid, productName : orderselect, tableName:currTableName, number:ordercount, price : totalPrice, productType: orderProductType}
    });
  } else {
    alert('أدخل البيانات بطريقة صحيحة');
  }
}

// ADD ORDER
function addOrder() {
  checkValues();
}

// REMOVE ARRAY ELEMENT
function removeElement(array, elem) {
    var index = array.indexOf(elem);
    if (index > -1) {
        array.splice(index, 1);
    }
}

// DELETE ORDER
function deleteOrder(orderindex) {
  for (var i = 0; i < tempData.length; i++) {
    recruDat = tempData[i];
    if (recruDat['id'] == orderindex) {
      recdata = tempData[i];
      break;
    }
  }
  removeElement(tempData, recdata);
  var count = $('#orders-table tr').length;
  if (count == 1) {
    currpg = currpg-1;
  }
  changePage(currpg);
  var tableName = document.getElementById('table-number').value;
  $.ajax({
    type : "POST",
    url  : "./php/delete-instant-order.php",
    data : {id: orderindex, tableNumber: tableName}
  });
}


// PAGINATION SECTION:

// CHANGE PAGE
function changePage(pgnum) {
  var table = document.getElementById("orders-table");
  while (table.rows.length > 1) {
    table.deleteRow(1);
  }
  var btnDiv = document.getElementById('order-pages');
  btnDiv.innerHTML = "";
  currpg = pgnum;
  makeTable(pgnum, tempData);
}

// CREATING BUTTON AND APPENDING IT WITH THE VALUE AND CLASS AS PARAMETERS
function createButton(val, clas, valnum) {
  if (val != "f" && val != "l") {
    var parentDiv = document.getElementById('order-pages');
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
      var parentDiv = document.getElementById('order-pages');
      var btn = document.createElement("BUTTON");
      btn.innerHTML = "الأولي";
      btn.classList.add(clas);
      btn.value = valnum;
      btn.addEventListener("click", function(){
        changePage(valnum);
      });
      parentDiv.appendChild(btn);
    } else {
      var parentDiv = document.getElementById('order-pages');
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
    var table = document.getElementById("orders-table");
    var row = table.insertRow(i+1);
    var productname = row.insertCell(0);
    var productTypeCell = row.insertCell(1);
    var number = row.insertCell(2);
    var price = row.insertCell(3);
    var del = row.insertCell(4);
    productname.innerHTML = dataContent["product"];
    productTypeCell.innerHTML = dataContent["productType"];
    number.innerHTML = dataContent["number"];
    price.innerHTML = dataContent["price"];
    del.innerHTML = '<img src="images/delete.svg" id="'+dataContent['id']+'">';
    del.classList.add("del-cell");
    number.classList.add("del-cell");
    price.classList.add("totalprice-cell");
  }
}


// SETUP TABLE MAKING IN A SPECIFIC PAGE
function makeTable(page, data) {
  endPoint = page*5;
  startPoint = endPoint-5;
  specificData = data.slice(startPoint, endPoint);
  buildTable(specificData);
  buildButtons(initTable(tempData),page);
}
