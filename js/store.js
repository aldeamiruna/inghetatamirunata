if(document.readyState == 'loading') {
	document.addEventListener('DOMContentLoaded', ready)
} else {
	ready()
}

// init -> false => arrays are not initialized
// productNames = []
// productQuantities = []
var init = false

function ready() {


	var checkoutButton = document.getElementsByClassName('checkout-button')[0]
	checkoutButton.addEventListener('click', addToCart)

	var removeCartItemButtons = document.getElementsByClassName('btn-danger')
	// console.log(removeCartItemButtons)
	for (var i = 0; i < removeCartItemButtons.length; i++) {
	    var button = removeCartItemButtons[i]
	    button.addEventListener('click', removeCartItem)
	}

	var quantityInputs = document.getElementsByClassName('quantity')
		for (var i = 0; i < quantityInputs.length; i++) {
				var input = quantityInputs[i]
				input.addEventListener('change', quantityChanged)
		}

	// on ready, cart details are updated
	if(!init) {
		updateCartTotal()
	}

}

function removeCartItem(event) {
	var buttonClicked = event.target

	//console.log(buttonClicked)

	// on remove, get the parent node of the buttonClicked
	// product name is the 'h3' item in the parent node
	var parent = buttonClicked.parentNode.parentNode
	var productName = parent.querySelector('h3').textContent
	console.log(productName)
	//console.log(productNames.indexOf(productName))

	// store the index of the removed element
	var indexRemove = productNames.indexOf(productName)
	// remove the product and quantity from arrays
	productNames.splice(indexRemove,1)
	productQuantities.splice(indexRemove,1)

	// update the the $_SESSION['shopping_cart']
	removeCartItemPHP(productName)

	buttonClicked.parentElement.parentElement.remove()
	console.log('removed')

	updateCartTotal()
}

function quantityChanged(event) {
			var input = event.target
			if (isNaN(input.value) || input.value <= 0){
					input.value = 1
			}
		updateCartTotal()
}


var productNames = []
var productQuantities = []

function updateCartNumberIcon() {
	var itemNumber = 0
	var icon = document.getElementById('cart_items_number')

	for(var i = 0; i < productQuantities.lengt; i++) {
		itemNumber += productQuantities[i]
		console.log(itemNumber)
	}

	icon.innerText = itemNumber


}

// global var to store delivery ammount and discount
var delivery
var discount
var cartTotal
var total

function updateCartTotal() {

	var icon = document.getElementById('cart_items_number')

    var cartItemContainer = document.getElementsByClassName('table')[0]
    var cartRows = cartItemContainer.getElementsByClassName('cart-row')
	total = 0
    for (var i = 0; i < cartRows.length; i++) {
        var cartRow = cartRows[i]

		// iterate through cart rows and get each element
		var productElement = cartRow.getElementsByClassName('product-name')[0]
        var priceElement = cartRow.getElementsByClassName('price')[0]
		var quantityElement = cartRow.getElementsByClassName('product-quantity')[0]
		var price = parseFloat(priceElement.textContent.replace(' RON', ''))
		var quantity = quantityElement.value

		var rowTotal = cartRow.getElementsByClassName('total')[0]

		// array is always actualised
		if(productQuantities[i] != quantity) {
			console.log("diff")
			updateQuantityPHP(productElement.textContent, quantity)
		}

		if(!init) {
			productNames.push(productElement.textContent)
			productQuantities.push(quantity)
		}



		total = total + (price * quantity)
    }

	// updateCartNumberIcon()


	// we initialised the arrays
	init = true


	var subTotalElement = document.getElementById('subtotal-price')
	var deliveryElement = document.getElementById('delivery-price')
	var discountElement = document.getElementById('discout-price')
	var totalElement = document.getElementById('total-price')

	if(total >= 50) {
		deliveryElement.innerText = formatCurrency(0)
	} else {
		deliveryElement.innerText = formatCurrency(12)
	}
	subTotalElement.innerText = formatCurrency(total)

	delivery = parseFloat(deliveryElement.textContent.replace(' RON',''))
	discount = parseFloat(discountElement.textContent.replace(' RON',''))

	// total = total + delivery - discount
	cartTotal = total + delivery - discount
	totalElement.innerText = formatCurrency(total + delivery - discount)

	console.log(delivery)
	console.log(discount)
	console.log(totalElement)
}

function formatCurrency(number) {
	return number.toFixed(2) + ' RON'
}

function updateQuantityPHP(productName, quantity) {

	const xhr = new XMLHttpRequest();

	var message = "";
	message = message.concat("change=true");
	message = message.concat("&product_name=");
	message = message.concat(productName);
	message = message.concat("&product_quantity=");
	message = message.concat(quantity);

	xhr.open("POST", "store_handler.php");
	xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhr.send(message);

	xhr.onload = function () {
	  console.log('DONE: ', xhr.status);
	};

	console.log(message);
}

function removeCartItemPHP(productName) {

	const xhr = new XMLHttpRequest();

	var message = "";
	message = message.concat("remove=true");
	message = message.concat("&product_name=");
	message = message.concat(productName);

	xhr.open("POST", "store_handler.php");
	xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhr.send(message);

	xhr.onload = function () {
	  console.log('DONE: ', xhr.status);
	};

	console.log(message);
}

function addToCart() {
	const xhr = new XMLHttpRequest();

	var message = "";
	message = message.concat("checkout=true");
	message = message.concat("&delivery=");
	message = message.concat(delivery);
	message = message.concat("&discount=");
	message = message.concat(discount);
	message = message.concat("&subTotal=");
	message = message.concat(total);
	message = message.concat("&cartTotal=");
	message = message.concat(cartTotal);

	xhr.open("POST", "store_handler.php");
	xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhr.send(message);

	xhr.onload = function () {
	  console.log('DONE: ', xhr.status);
	};

	console.log(message);
}
