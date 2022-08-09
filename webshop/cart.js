window.addEventListener("load", setup)

function setup() {
  var removeButtons = document.getElementsByClassName("remove-button")
  for (var i=0; i < removeButtons.length; i++){
    var currentButton = removeButtons[i]
    currentButton.addEventListener("click", removeItem)
  }
  
  var amountInputs = document.getElementsByClassName("itemAmount")
  for (var i=0; i < amountInputs.length; i++){
    var currentInput = amountInputs[i]
    currentInput.addEventListener("change", changedAmount)
  }
  
  document.getElementById("affentheater").addEventListener("click", addAffentheater);
  document.getElementById("baerenstark").addEventListener("click", addBaerenstark);
  document.getElementById("eintagsfliege").addEventListener("click", addEintagsfliege);
  document.getElementById("eselsbruecke").addEventListener("click", addEselsbruecke);
  document.getElementById("frueherVogel").addEventListener("click", addFrueherVogel);
  document.getElementById("hundemuede").addEventListener("click", addHundemuede);
  document.getElementById("nachteule").addEventListener("click", addNachteule);
  document.getElementById("naschkatze").addEventListener("click", addNaschkatze);
  document.getElementById("schneckentempo").addEventListener("click", addSchneckentempo);
}

// Add products to shopping cart

function addAffentheater(){ // Zum cart.js array hinzufuegen
  addNewItem ("<a href='details-affentheater.html'>Affentheater</a>", 19.99);
  updatePrice();
}
function addBaerenstark(){
  addNewItem("<a href='details-baerenstark.html'>Bärenstark</a>", 24.99);
  updatePrice();
}
function addEintagsfliege(){
  addNewItem("<a href='details-eintagsfliege.html'>Eintagsfliege</a>", 19.99)
  updatePrice()
}
function addEselsbruecke(){
    addNewItem ("<a href='details-eselsbruecke.html'>Eselsbrücke</a>", 19.99)
    updatePrice()
}
function addFrueherVogel(){
    addNewItem("<a href='details-frueher_vogel.html'>Früher Vogel</a>", 24.99) 
    updatePrice()
}
function addHundemuede(){
    addNewItem("<a href='details-hundemuede.html'>Hundemüde</a>", 19.99)
    updatePrice()
}
function addNachteule(){
    addNewItem ("<a href='details-nachteule.html'>Nachteule</a>", 19.99)
    updatePrice()
}
function addNaschkatze(){
    addNewItem("<a href='details-naschkatze.html'>Naschkatze</a>", 24.99) 
    updatePrice()
}
function addSchneckentempo(){
    addNewItem("<a href='details-schneckentempo.html'>Schneckentempo</a>", 19.99)
    updatePrice()
}

function addNewItem (name, price){ // showNewItem zum Anzeigen des Arrays + onclick auf cart logo show 
    var newRow = document.createElement("tr")
    var contents = `
    <td><span class='itemName'>${name}</span></td>
    <td><input type="number" class="itemAmount" value="1"></td>
    <td>${price}</td>
    <td></td>
    <td><button type="button" class="remove-button">Entfernen</td>`
    newRow.innerHTML = contents
    var cart = document.getElementById("warenkorb")
    cart.append(newRow)
    newRow.getElementsByClassName("remove-button")[0].addEventListener("click", removeItem)
    newRow.getElementsByClassName("itemAmount")[0].addEventListener("change", changedAmount)
  }
  
  function removeItem(event){
    var clicked_button = event.target
    clicked_button.parentElement.parentElement.remove()
    updatePrice()
  }
  
  function changedAmount(event){
    var newInput = event.target
    if(newInput.value <= 0){
      newInput.value = 1
    }
    updatePrice()
  } 
  
  function updatePrice(){
    var table = document.getElementById("warenkorb");
    var sum = 0;
    var amount = 0;
  
    for (var i = 1; i < table.rows.length; i++) {
      var currentAmount = parseInt(table.rows[i].cells[1].firstChild.value)
      var price = currentAmount * parseFloat(table.rows[i].cells[2].innerHTML)
      table.rows[i].cells[3].innerHTML = Math.round(price * 100) / 100
      sum += price
      amount += currentAmount
  
      document.getElementById("totalPrice").innerHTML = Math.round(sum * 100) / 100
    }
  
    if (document.getElementById("warenkorb").rows.length <= 1) {
      document.getElementById("totalPrice").innerHTML = 0
    }
  }
  
  updatePrice();



/* Calculate Sum of Shopping Cart */
var table = document.getElementById("warenkorb");
var sum = 0;
var amount = 0;

for (var i = 1; i < 3; i++) {
    var price = table.rows[i].cells[1].innerHTML * table.rows[i].cells[2].innerHTML;
    table.rows[i].cells[3].innerHTML = price;
    sum += price;
    table.rows[3].cells[3].innerHTML = sum;

    amount += parseInt(table.rows[i].cells[1].innerHTML);
    table.rows[3].cells[1].innerHTML = amount;
}