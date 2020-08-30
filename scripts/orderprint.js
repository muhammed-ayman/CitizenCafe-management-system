
tableData = []

//.setAttribute("type", "button");
function addData() {
  var totalprice = 0;
  for (var i = 0; i < tableData.length; i++) {
    var dataContent = tableData[i];
    var table = document.getElementById("printTable");
    var row = table.insertRow(i+1);
    var productname = row.insertCell(0);
    var number = row.insertCell(1);
    var price = row.insertCell(2);
    productname.innerHTML = dataContent["product"];
    number.innerHTML = dataContent["number"];
    price.innerHTML = dataContent["price"];
    totalprice += parseFloat(dataContent["price"]);
  }
  var dataContent = tableData[tableData.length];
  var table = document.getElementById("printTable");
  var row = table.insertRow(tableData.length+1);
  var productname = row.insertCell(0);
  var price = row.insertCell(1);
  price.setAttribute('colspan','2');
  productname.innerHTML = "الخدمة";
  serviceValue = Math.round((parseFloat(serviceValue)*totalprice)/100);
  price.innerHTML = serviceValue;
  totalprice += parseFloat(serviceValue);

  var table = document.getElementById("printTable");
  var row = table.insertRow(tableData.length+2);
  var productname = row.insertCell(0);
  var price = row.insertCell(1);
  price.setAttribute('colspan','2');
  productname.innerHTML = "إجمالي الحساب";
  price.innerHTML = totalprice;



}

function emptyDB() {
  $.ajax({
    type : "POST",
    url  : "./php/emptyorder.php",
    data : { ts : true},
    success: function(res){

    }});
}

function printcurorder() {
  var btn = document.getElementById('printButton');
  btn.style.visibility = "hidden";
  window.print();
  btn.style.visibility = "";
  emptyDB();
}
