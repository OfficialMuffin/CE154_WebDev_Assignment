<?php
session_start();
?>
<!DOCTYPE HTML>

<html lang = "en">

<head>
	<meta charset="UTF-8">
	<title>Home</title>
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
	margin-top: 15%;
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
	float:left;
	display: block;
    width: 175px;
	height: 556px;
}
.sidebar nav ul li a {
	text-decoration:none;
	color: #ffffff;
	text-align: center;
	font-family: arial;
}
.sidebar li {
	list-style-type: none;
	padding: 0px 0px;
}

.searchbox {
  float: right;
  margin-top: 1%;
}

.searchbutton:hover {
  background-color: #ffffff;
}

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
<img src="/images/logo/2.png" alt="Logo 2" style="vertical-align: middle">
   <h1>HOME</h1>
   <!-- Shows who is logged in  -->
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

<div class="searchbox">
   <form name="searchform" method="POST" action="search.php">
  <input type="text" name="search" size="40" maxlength="50" placeholder="Search..">
  <input class="searchbutton" type="submit" name="Submit" value="Search"/>
</form>
</div>

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
  <br>
  <?php 
  if (isset($_SESSION['username'])) {  

  echo '<li><a href="/reset.php"><font color = "red"><strong>Reset Database</strong></font></a></li>';
  } else {
    echo "<font color='DarkGrey'>Reset Database</font>";
  }
  ?>
  </ul>
</nav>
</div>
</div>

<article>
  <h2>Welcome</h2>
  <br>
  <h3>Introduction</h3>
  <p>We are based in the United Kingdom and we want to start a business online.</p>
  <p>We sell books, CD's, DVD's and even games!</p>
  <div class="sqltable">
  <?php
# Only see data in tables if manager is logged in
$dbname = 'admin'; # Change to your username
  $dbuser = 'admin';
  $dbpass = 'Commander185';
  $dbhost = 'localhost';
$link = mysqli_connect( $dbhost, $dbuser, $dbpass )
or die( "Unable to Connect to '$dbhost'" );
mysqli_select_db( $link, $dbname )
or die("Could not open the db '$dbname'"); 
$test_query = "select * from customer";
$result = mysqli_query( $link, $test_query);

   if(isset($_SESSION['username']) == ['manager_number']) {


    #Add in the 8 varibles then print them out only when the manager has logged in
			
echo '<table border="2">';

echo"<tr><th>customer_number</th><th>surname</th><th>firstname</th><th>address1</th><th>address2</th><th>postcode</th></tr>\n";

while( $row = mysqli_fetch_array( $result, MYSQLI_ASSOC ) ) 
for ($i = 7; $i < count($row); $i++){

 echo "<tr>\n";
 echo '<td>', $row[ 'customer_number' ], '</td>';
 echo '<td>', $row[ 'surname' ], '</td>';
 echo '<td>', $row[ 'firstname' ], '</td>';
 echo '<td>', $row[ 'address1' ], '</td>';
 echo '<td>', $row[ 'address2' ], '</td>';
 echo '<td>', $row[ 'postcode' ], '</td>';
 echo "</tr>\n";
 echo "</tr>\n";
echo '</table>';
}
mysqli_free_result( $result );
mysqli_close( $link );
} else {
		echo "Admin not logged in! Unable to show table data!";
	}
?>
</div>
</article>

<footer>Copyright &copy; lw17894</footer>

</body>
	
</html>