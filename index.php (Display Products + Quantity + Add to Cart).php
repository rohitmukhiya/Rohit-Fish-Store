<?php include("config.php"); ?>
<header>
<h2>Rohit Fish Store</h2>
<p>Fresh from Water to Your Table</p>
</header>
<div class="container">
<h3>Available Fish</h3>
<div class="grid">

<?php
$result = $conn->query("SELECT * FROM products");
while($row = $result->fetch_assoc()){
?>

<div class="card">
<img src="uploads/<?php echo $row['image']; ?>" width="100%">
<h4><?php echo $row['name']; ?></h4>
<p>Rs <?php echo $row['price']; ?> /kg</p>
<input type="number" id="qty<?php echo $row['id']; ?>" placeholder="Kg" step="0.5" min="0.5">
<button onclick="addToCart('<?php echo $row['name']; ?>',<?php echo $row['price']; ?>,'qty<?php echo $row['id']; ?>')">Add to Cart</button>
</div>

<?php } ?>

</div>

<div class="container">
<h3>🛒 Your Cart</h3>
<ul id="cartItems"></ul>
<div class="total">Total: Rs. <span id="total">0</span></div>

<h4>Payment Options</h4>
<button onclick="placeOrder('COD')">Cash on Delivery</button>
<button onclick="showQR()">Pay with eSewa</button>

<div id="qrSection" style="display:none;">
<p>Scan & Pay with eSewa</p>
<img src="https://esewa.com.np/epay/main?esewaId=9705078030" class="qr">
</div>
</div>

<script>
let cart = [];
let total = 0;

function addToCart(name, price, qtyId){
    let qty = parseFloat(document.getElementById(qtyId).value);
    if(!qty || qty <= 0){
        alert("Enter quantity in KG");
        return;
    }
    let itemTotal = price * qty;
    cart.push({name, price, qty, itemTotal});
    total += itemTotal;
    updateCart();
}

function updateCart(){
    let cartItems = document.getElementById("cartItems");
    cartItems.innerHTML = "";
    cart.forEach(item => {
        let li = document.createElement("li");
        li.textContent = item.name + " (" + item.qty + "kg) - Rs. " + item.itemTotal;
        cartItems.appendChild(li);
    });
    let delivery = total < 1000 ? 100 : 0;
    let finalTotal = total + delivery;
    document.getElementById("total").innerHTML =
    "Subtotal: Rs " + total + "<br>Delivery: Rs " + delivery + "<br><b>Final Total: Rs " + finalTotal + "</b>";
}

function placeOrder(method){
    if(cart.length===0){ alert("Cart is empty!"); return; }
    let message="Order Details:%0A";
    cart.forEach(item => message+=item.name+" ("+item.qty+"kg) - Rs."+item.itemTotal+"%0A");
    let delivery = total < 1000 ? 100 : 0;
    let finalTotal = total + delivery;
    message+="Delivery: Rs "+delivery+"%0ATotal: Rs "+finalTotal+"%0APayment: "+method;
    window.open("https://wa.me/9779827995791?text="+message);
}

function showQR(){ document.getElementById("qrSection").style.display="block"; }
</script>
