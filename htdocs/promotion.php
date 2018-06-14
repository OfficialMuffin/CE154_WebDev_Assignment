<?php
session_start();
?>
<!DOCTYPE HTML>

<html lang = "en">

<head>
	<meta charset="UTF-8">
	<title>Purchase</title>
	<style>
div.container {
    width: 100%;
    border: 1px solid gray;
}

header {
    padding: 1em;
    color: white;
    background-color: DodgerBlue;
    clear: left;
    text-align: center;
	margin-top: 2%;
}
	
footer {
    padding: 1em;
    color: white;
    background-color: DodgerBlue;
    text-align: center;
	margin-top: 1%;
}

article {
    margin-left: 170px;
    border-left: 1px solid gray;
    padding: 1em;
    overflow: hidden;
}

.navbar {
    overflow: hidden;
    background-color: #333;
    position: fixed; 
	left: 0; 
    top: 0; 
    width: 100%; 
	justify-content: space-around;
	display: flex;
}


.navbar a {
    float: left;
    border-right: 1px solid #bbb;
    display: block;
    color: #f2f2f2;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
    width: 450px;
}


.navbar a:hover {
    background: #ddd;
    color: black;
}

.sidebar nav {
	background-color: RoyalBlue;
	position: static;
	display: block;
    width: 60px;
	height: 540px;
}
.sidebar nav ul li a {
	color: #ffffff;
	text-align: center;
	font-family: arial;
}

.Purchase_Item {
	color: RoyalBlue;
	margin-left: 220px;
	font-size: 30px;	
}
.Purchase_Item p button a {
	text-decoration:none;
	color: #000000;
}

</style>
</head>


<body>
<div class="container">

<header>
<!-- Logo -->
<img src="/images/logo/2.png" alt="Logo 2">
   <h1>Purchase</h1>
   <?php
  
  $dbname = 'admin'; # Change to your username
  $dbuser = 'admin';
  $dbpass = 'Commander185';
  $dbhost = 'localhost';

  $link = mysqli_connect( $dbhost, $dbuser, $dbpass )
  or die( "Unable to Connect to '$dbhost'" );

  mysqli_select_db( $link, $dbname )
  or die("Could not open the db '$dbname'");
    
    
    if(isset($_SESSION['username'])) {
		echo "Welcome, User: {$_SESSION['username']}";
	} else {
		echo "User not logged in!";
	}
	?>
</header>

<div class="navbar">
    <a href="/index.php">Home</a>
	<a href="/books.php">Books</a>
	<a href="/music.php">Music</a>
	<a href="/games.php">Games</a>
	<a href="/dvd.php">DVD's</a>
	<a href="/user-login.php">User Login</a>
	<a href="/manager-login.php">Manager Login</a>
	<a href="/logout.php">Logout</a>
</div>

<article>
  <h2>Discount</h2>
</article>

<div class="Purchase_Item">
<?php
# Called from page when a 'purchase' is made
# Reports back the item_code and item_price
# These are passed to this script URL encoded

if(isset($_SESSION['username'])) {
$item_code = $_GET[ 'item_code' ];
$item_price = $_GET[ 'item_price' ];
echo "<p>Item Code = $item_code</p>\n";
echo "<p>Item Price = $item_price</p>\n";
echo "<p>We can now create an order or process in any way we
choose.</p>\n";

$promo_query = "SELECT code FROM promotion_code";
$promo_discount = "SELECT discount FROM promotion_code";
$result = mysqli_query( $link, $promo_query);

#Edit to show on one line
echo '<input type="text" name="promocode" size="20" maxlength="10" placeholder="Promotional Code Here..."> <?php $promo_code = "$promo_query"';
echo "<p><button><a href='/promotion.php'>Add Promotion Code</a></button></p>\n";
	if (promo_code == promo_query){
		echo "Coupon added to items";
			$percentoff = $item_price * ($promotion_code / 100);
			$new_total = $item_price - $percentoff;
			return $new_total;
			echo "Your new total is: ";
			echo ($new_total);
	} else {
		echo "You have entered a wrong promotion code! Please try again!";
	}
}
?>
</div>

<footer>Copyright &copy; lw17894</footer>

</div>
</body>
	
</html>