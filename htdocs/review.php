<?php
session_start();
?>
<!DOCTYPE HTML>

<html lang = "en">

<head>
	<meta charset="UTF-8">
	<title>Reviews</title>
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

  /* The navigation bar */
.navbar {
    overflow: hidden;
    background-color: #333;
    position: fixed; /* Set the navbar to fixed position */
	left: 0; /* Removing the space from the left side of the navbar */
    top: 0; /* Position the navbar at the top of the page */
    width: 100%; /* Full width */
	justify-content: space-around; /* Spaces out links */
	display: flex; /* Spaces out links */
}

/* Links inside the navbar */
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

/* Change background when hovered over */
.navbar a:hover {
    background: #ddd;
    color: black;
}

.sidebar nav {
	background-color: RoyalBlue;
	position: static;
	display: block;
    width: 60px;
	height: 505px;
}
.sidebar nav ul li a {
	color: #ffffff;
	text-align: center;
	font-family: arial;
}

.sqltable {
    text-align: center;
    margin-left: 175px;
    border: none;
    font-size:35px;
    text-align: center;
}

.sqltable th {
    background-color: #006;
    color: #ffffff;
	width: 10%;
	
}

input[type="radio"] {
	display:inline-block;
}

input[type="submit"] {
	display:inline-block;
	width: 50%;
}

.reviewstable {
	float:left;
	width: 25%;
	
}
</style>
</head>


<body>
<div class="container">

<header>
<!-- Logo -->
<img src="/images/logo/2.png" alt="Logo 2">
   <h1>Reviews</h1>
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
  <h2>Latest Reviews</h2>
</article>

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
$test_query = "select * from review";
$result = mysqli_query( $link, $test_query);

############Add reviews################
#echo '<table border="2" cellspacing="10" style="float:left;">';
#echo '<input type="radio" name="rating"
      #value="5" /> 5 <input type="radio" name="rating" value="4" /> 4
      #<input type="radio" name="rating" value="3" /> 3 <input type="radio"
      #name="rating" value="2" /> 2 <input type="radio" name="rating" value="1" /> 1</p>';
#if if(isset($_SESSION['username'])) {
	 #$reviewupdate = "INSERT INTO review (    ) VALUES (    )";
	#echo "<button><a href='<?php $updatetable = mysql_query($reviewupdate)'>Add Review</a></button>\n";	
#} else {
	#echo "You are not logged in to add a review!";
#}
echo "</table>";

#Results of the reviews
echo '<table border="2" cellspacing="10">';
echo"<tr><th>Review Number</th><th>Customer Number</th><th>Item Code</th><th>Rating</th></tr>\n";

while( $row = mysqli_fetch_array( $result, MYSQLI_ASSOC ) )
{
 echo "<tr>\n";
 echo '<td>', $row[ 'review_number' ], '</td>',
 '<td>', $row[ 'customer_number' ], '</td>',
 '<td>', $row[ 'item_code' ], '</td>',
 '<td>', $row[ 'rating' ], '</td>', "\n";
 echo "</tr>\n";
 echo "</tr>\n";
} 
echo '</table>';

echo "<br>";

echo '<table style="width:80% text-align:center">
  <tr>
	<th>Enter Your Customer Number</th>
    <th>Enter Item Code</th>
    <th>How would you rate this product?</th> 
	<th></th>
  </tr>
  <form>
  <tr>
	<td><input type="text" name="customer_number"/></td>
    <td><input type="text" name="item_code"/></td>
    <td><input type="radio" name="review" value="1"/>1<input type="radio" name="review" value="2"/>2<input type="radio" name="review" value="3"/>3<input type="radio" name="review" value="4"/>4<input type="radio" name="review" value="5"/>5</td>
	<td><form action="/path/to/your/script.php" method="POST"><input type="submit" name="submitReview" value="Submit Your Review"></form></td>
  </tr>
  </form>
</table>';

mysqli_free_result( $result );
mysqli_close( $link );
?>
</div>


<footer>Copyright &copy; lw17894</footer>

</div>
</body>
	
</html>