<!DOCTYPE html>
<!-- Created By CodingNepal -->
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Order</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles.css">
  <link rel="canonical" href="https://getbootstrap.com/docs/4.4/examples/sign-in/">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css2?family=PT+Sans+Narrow:wght@700&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>

<body>
  <nav>
    <input type="checkbox" id="check">
    <label for="check" class="checkbtn">
      <i class="fas fa-bars"></i>
    </label>
    <label class="logo">Farm Vegetables</label>
    <ul>
      <li><a href="#">Home</a></li>
      <li><a href="profile.html">Profile</a></li>
      <li><a class="active" href="order.html">New Order </a></li>
      <li><a href="history.html">Order History</a></li>
      <li><a href="#">Logout</a></li>
    </ul>


  </nav>
  <section>
 <div class="veg-img col-lg-3">
          <img src="images/lemon.jpeg" class="vegetables-img" alt="Lemon">
          <p class="Vegetables-info">Lemon</p>
          <form>
            <div class="value-button " id="decrease" onclick="decreaseValue()" value="Decrease Value">-</div>
            <input type="number" id="number" value="0" />
            <div class="value-button add-btn" id="increase" onclick="increaseValue()" value="Increase Value">+</div>
          </form>

        </div>
		
		<table>
		<tr><img src="images/lemon.jpeg" class="vegetables-img" alt="Lemon"></tr><br>
		<tr>Lemon</tr><br>
		<tr><form>
            <div class="value-button " id="decrease" onclick="decreaseValue()" value="Decrease Value" style="padding:0.1px">-</div>
            <input type="number" id="number" value="0" />
            <div class="value-button add-btn" id="increase" onclick="increaseValue()" value="Increase Value" >+</div>
          </form>
</tr>
		</table>
		</section>

<script type="text/javascript">
function increaseValue() {
  var value = parseInt(document.getElementById('number').value, 10);
  value = isNaN(value) ? 0 : value;
  value++;
  document.getElementById('number').value = value;
}

function decreaseValue() {
  var value = parseInt(document.getElementById('number').value, 10);
  value = isNaN(value) ? 0 : value;
  value < 1 ? value = 1 : '';
  value--;
  document.getElementById('number').value = value;
}

</script>





  <div class="">
    <footer>
      <p class=" footer mt-5 mb-3 text-muted">&copy;2020 - Fresh Pharma</p>
    </footer>

</body>


</html>