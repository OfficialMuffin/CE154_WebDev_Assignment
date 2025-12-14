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
input[type="submit"] {
	text-decoration;none;
}
#p {
	color:red;
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
  
  $dbname = 'lw17894'; # Change to your username
  $dbuser = 'lw17894';
  $dbpass = 'obscure';
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
$item_code = $_GET[ 'item_code' ];
$item_price = $_GET[ 'item_price' ];
echo "<p>Item Code = " . htmlentities($item_code, ENT_QUOTES) . "</p>\n";
echo "<p>Item Price = $item_price</p>\n";

#If button of submit button is pressed
if ($_POST['submitcode']=='Add Promotion Code') {
  

  $dbname = 'lw17894'; # Change to your username
  $dbuser = 'lw17894';
  $dbpass = 'obscure';
  $dbhost = 'localhost';

  $link = mysqli_connect( $dbhost, $dbuser, $dbpass )
  or die( "Unable to Connect to '$dbhost'" );

  mysqli_select_db( $link, $dbname )
  or die("Could not open the db '$dbname'");


$promocode = $_POST['promocode'];

$promo_query = "SELECT * FROM promotion_code WHERE code='".$promocode."'";
$result = mysqli_query( $link, $promo_query);


if (mysqli_num_rows($result)==1){
		
		#Discount / 100 and subtracts from the item price
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
		echo "Code Accepted! <br />";
		$promodiscount = $item_price * ($row['discount']/100);
		$item_price = round($item_price - $promodiscount, 1, PHP_ROUND_HALF_UP);
	}
	
	#New item total after Discount applied
	echo "New item total: ", $item_price;
	#Subtracts one from item stock and adds one to item order
	$updatedb = "UPDATE inventory SET item_stock_count = item_stock_count - 1, item_order_count = item_order_count + 1 WHERE item_code = '".$item_code."'";
	$result = mysqli_query( $link, $test_query );

	#Add a delivery date to the order
	$customer_order = "INSERT INTO customer_order (order_date, delivered, shipping_date, customer_number) VALUES (now(), false, adddate(now(), interval 3 day),".$_SESSION['username'].")";
	mysqli_query($link, $customer_order);

	# Adding the order to the orders table in DB
	$order_number_query = "SELECT max(order_number) FROM customer_order";
	$result = mysqli_fetch_array(mysqli_query($link, $order_number_query), MYSQLI_ASSOC);
	$order_number = $result['max(order_number)'];
	$order_item = "INSERT INTO order_item VALUES('".$item_code."',".$item_price.",".$order_number.",1)";
	mysqli_query($link , $order_item);


} else {
		echo "<font color='red'>You have entered a wrong promotion code! Please try again!</font>";
	}
?>

<form action ="purchase.php?item_code=<?php echo $item_code; ?>&item_price=<?php echo $item_price; ?>" method="POST">
	<input type="text" name="promocode" size="40" maxlength="20" placeholder="Promotional Code Here...">
	<input type='submit' value='Add Promotion Code' name='submitcode'>
</form>




</div>

<footer>Copyright &copy; lw17894</footer>

</div>
</body>
	
</html>