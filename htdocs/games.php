<?php
session_start();
?>
<!DOCTYPE HTML>

<html lang = "en">

	<head>
		<meta charset="UTF-8">
		<title>Games</title>
		<link rel="stylesheet" href="style.css">
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
	margin-top: 2%;
}

nav {
    float: left;
    max-width: 160px;
    margin: 0;
    padding: 1em;
}

nav ul {
    list-style-type: none;
    padding: 0;
}
   
nav ul a {
    text-decoration: none;
}

 
.navbar {
    overflow: hidden;
    background-color: #333;
    position: fixed; 
    top: 0; 
	left: 0; 
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
	height: 775px;
}
.sidebar nav ul li a {
	color: #ffffff;
	text-align: center;
	font-family: arial;
}


nav { display: inline-block; vertical-align: top; }
    .table-wrapper { display: inline-block; }


.sqltable {
    text-align: center;
    border: none;
    margin-left: 10px;
    font-size:20px;
    text-align: center;
}

.sqltable th {
    background-color: #006;
    color: #ffffff;
    
}
</style>
</head>
	
	

<body>
<div class="container">

<header>
<!-- Logo -->
<img src="/images/logo/2.png" alt="Logo 2">
   <h1>Games</h1>
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

<div class="sidebar">
<nav>
  <ul>
	<li><a href="/index.php">Home</a></li>
	<br>
    <li><a href="/books.php">Books</a></li>
	<br>
    <li><a href="/music.php">CD's</a></li>
	<br>
    <li><a href="/games.php">Games</a></li>
	<br>
	<li><a href="/dvd.php">DVD's</a></li>
	<br>
	<li><a href="/user-login.php">User Login</a></li>
	<br>
	<li><a href="/manager-login.php">Manager Login</a></li>	
  </ul>
</nav>
</div>


<div class="sqltable">
<?php
# 'Purchase' item in Database Table
# using hyperlink and URL encoding
$dbname = 'admin'; # Change to your username
  $dbuser = 'admin';
  $dbpass = 'Commander185';
  $dbhost = 'localhost';
$link = mysqli_connect( $dbhost, $dbuser, $dbpass )
or die( "Unable to Connect to '$dbhost'" );
mysqli_select_db( $link, $dbname )
or die("Could not open the db '$dbname'"); 
$test_query = "select * from inventory where item_group=1003 limit 6";
$result = mysqli_query( $link, $test_query);

echo '<table border="2">';

echo"<tr><th>Code</th><th>Image</th><th>Item</th><th>Author</th><th>Description</th><th>Price</th><th>Group</th><th>Location</th><th>Stock</th><th>Order</th></tr>\n";

while( $row = mysqli_fetch_array( $result, MYSQLI_ASSOC ) )
{
 echo "<tr>\n";
 echo '<td>', $row[ 'item_code' ], '</td>';
 if ($row[ 'item_image_loc' ] == "aa01-013.jpg") {
    echo '<td>', '<img src="images\aa01-013.jpg" height = "59px"/>', '</td>';
 }
 if ($row[ 'item_image_loc' ] == "aa01-014.jpg") {
    echo '<td>', '<img src="images\aa01-014.jpg" height = "59px"/>', '</td>';
 }
 if ($row[ 'item_image_loc' ] == "aa01-015.jpg") {
    echo '<td>', '<img src="images\aa01-015.jpg" height = "59px"/>', '</td>';
 }
 if ($row[ 'item_image_loc' ] == "aa01-016.jpg") {
    echo '<td>', '<img src="images\aa01-016.jpg" height = "59px"/>', '</td>';
 }
 if ($row[ 'item_image_loc' ] == "aa01-017.jpg") {
    echo '<td>', '<img src="images\aa01-017.jpg" height = "59px"/>', '</td>';
 }
 if ($row[ 'item_image_loc' ] == "aa01-018.jpg") {
    echo '<td>', '<img src="images\aa01-018.jpg" height = "59px"/>', '</td>';
 }
 echo
 '<td>', $row[ 'item_name' ], '</td>',
 '<td>', $row[ 'item_author' ], '</td>',
 '<td>', $row[ 'item_description' ], '</td>',
 '<td>', $row[ 'item_price' ], '</td>', "\n";

 echo
 '<td>', $row[ 'item_group' ], '</td>',
 '<td>', $row[ 'item_stock_location' ], '</td>',
 '<td>', $row[ 'item_stock_count' ], '</td>',
 '<td>', $row[ 'item_order_count' ], '</td>', "\n" ;
 echo "</tr>\n";
echo '<td><a href="purchase.php?item_code=' .
 $row[ 'item_code' ] .
 '&item_price=' . $row[ 'item_price' ] . '" style="text-decoration:none;"><br>Buy</a></td>';
 echo '<td><a href="review.php" style="text-decoration:none;"><br>Review</a></td>';
 echo "</tr>\n";
} 
echo '</table>';
mysqli_free_result( $result );
mysqli_close( $link );
?>
</div>

<footer>Copyright &copy; lw17894</footer>

</div>
</body>
	
</html>