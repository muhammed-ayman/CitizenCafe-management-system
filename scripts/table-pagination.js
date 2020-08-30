
// DATA TABLE
var tableData = []

// CONSTANT DATA TABLE
var filterData = []

// FILTER FUNCTIONS
function viewBy() {
  var yearSelect = document.getElementById('year').value;
  var monthSelect = document.getElementById('month').value;
  var daySelect = document.getElementById('day').value;
  if (yearSelect.length > 0 && monthSelect.length > 0 && daySelect.length > 0) {
    tableData = filterData;
    var dateView = `${yearSelect}/${monthSelect}/${daySelect}`;
    tableData = tableData.filter(({date}) => !date.includes(dateView)==false);
    changePage(1);
    document.getElementById('year').value = "";
    document.getElementById('month').value = "";
    document.getElementById('day').value = "";
  } else {
    alert('اختر التاريخ بشكل صحيح');
  }
}

function viewAll() {
  tableData = filterData;
  changePage(1);
  document.getElementById('year').value = "";
  document.getElementById('month').value = "";
  document.getElementById('day').value = "";
}


// CHANGE PAGE
function changePage(pgnum) {
  var table = document.getElementById("all-orders-table");
  while (table.rows.length > 1) {
    table.deleteRow(1);
  }
  var btnDiv = document.getElementById('orders-pages');
  btnDiv.innerHTML = "";
  makeTable(pgnum, tableData);
}

// CREATING BUTTON AND APPENDING IT WITH THE VALUE AND CLASS AS PARAMETERS
function createButton(val, clas, valnum) {
  if (val != "f" && val != "l") {
    var parentDiv = document.getElementById('orders-pages');
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
      var parentDiv = document.getElementById('orders-pages');
      var btn = document.createElement("BUTTON");
      btn.innerHTML = "الأولي";
      btn.classList.add(clas);
      btn.value = valnum;
      btn.addEventListener("click", function(){
        changePage(valnum);
      });
      parentDiv.appendChild(btn);
    } else {
      var parentDiv = document.getElementById('orders-pages');
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
    var table = document.getElementById("all-orders-table");
    var row = table.insertRow(i+1);
    var timeCell = row.insertCell(0);
    var dateCell = row.insertCell(1);
    var tableName = row.insertCell(2);
    var productCell = row.insertCell(3);
    var productTypeCell = row.insertCell(4);
    var numberCell = row.insertCell(5);
    var priceCell = row.insertCell(6);
    timeCell.innerHTML = dataContent["time"];
    dateCell.innerHTML = dataContent["date"];
    tableName.innerHTML = dataContent["tableName"];
    productCell.innerHTML = dataContent["product"];
    productTypeCell.innerHTML = dataContent["productType"];
    numberCell.innerHTML = dataContent["number"];
    priceCell.innerHTML = dataContent["price"];
  }
}


// SETUP TABLE MAKING IN A SPECIFIC PAGE
function makeTable(page, data) {
  endPoint = page*5;
  startPoint = endPoint-5;
  specificData = data.slice(startPoint, endPoint);
  buildTable(specificData);
  buildButtons(initTable(data),page);
}
