window.addEventListener("load", setup)

function setup() {
  // var removeButtons = document.getElementsByClassName("remove-button")
  // for (var i=0; i < removeButtons.length; i++){
  //   var currentButton = removeButtons[i]
  //   currentButton.addEventListener("click", removeItem)
  // }

  var amountInputs = document.getElementsByClassName("itemAmount")
  for (var i=0; i < amountInputs.length; i++){
    var currentInput = amountInputs[i]
    currentInput.addEventListener("change", changedAmount)
  }
}

// Add products to shopping cart


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
    // newRow.getElementsByClassName("remove-button")[0].addEventListener("click", removeItem)
    newRow.getElementsByClassName("itemAmount")[0].addEventListener("change", changedAmount)
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
