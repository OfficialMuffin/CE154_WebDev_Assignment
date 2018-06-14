<?php
session_start();
?>
<!DOCTYPE HTML>

<html lang = "en">

<head>
	<meta charset="UTF-8">
	<title>Manager Login</title>
    <script> 
    function formValidation() {
    var username = document.forms["userlogin_form"]["username"].value;
    var password = document.forms["userlogin_form"]["password"].value;
    if (username == "") {
        alert("Please specify a username!");
        return false;
    }
    if (password == "") {
      alert("Please specify a password!");
        return false;
    }
}
  </script>
 
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
	margin-top: 5%;
}

article {
    margin-left: 170px;
    border-left: 1px solid gray;
    padding: 1em;
    overflow: hidden;
}
</style>
</head>


<body>
<div class="container">

<header>
<!-- Logo -->
<img src="/images/logo/2.png" alt="Logo 2">
   <h1>Manager Login</h1>
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

<style>
  /* The navigation bar */
.navbar {
    overflow: hidden;
    background-color: #333;
    position: fixed; /* Set the navbar to fixed position */
    top: 0; /* Position the navbar at the top of the page */
	left: 0; /* Removing the space from the left side of the navbar */
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

/* Change background on mouse-over */
.navbar a:hover {
    background: #ddd;
    color: black;
}

/* Main content */
.main {
    margin-top: 30px; /* Add a top margin to avoid content overlay */
} 

input[type=text] {
    width: 25%;
    padding: 12px 20px;
    margin: 8px 2px;
    box-sizing: border-box;
}

input[type=text]:focus {
    border: 3px solid #555;
}

input[type=password] {
    width: 25%;
    padding: 12px 20px;
    margin: 8px 6px;
    box-sizing: border-box;
}

input[type=password]:focus {
    border: 3px solid #555;
}

.cancelbtn {
    background-color: #0099ff;
	space-around: 20%;
    border: none;
    color: white;
    padding: 16px 32px;
    text-decoration: none;
    margin: 4px 2px;
    cursor: pointer;
}
.loginbtn {
	background-color: #0099ff;
	 space-around: 20%;
    border: none;
    color: white;
    padding: 16px 32px;
    text-decoration: none;
    margin: 4px 2px;
    cursor: pointer;	
}

.cancelbtn:hover {
    background-color: blue;
}

.loginbtn:hover {
    background-color: blue;
}	
</style>
  
<?php
# Login which checks username and password in the database.
# Uses Post Back and $_SESSION
# We are using GET method which is not secure but you can see
# attributes/values URL encoded which is good for testing
echo '<form action = "manager-login.php" method = "GET" name="userlogin_form" onsubmit="return formValidation()">', "\n",
'<p><label for = "a">Username:</label>',
'<input id = "a" type = "text" name = "username"/></p>', "\n",
'<p><label for = "b">Password:</label>',
'<input id = "b" type = "text" name = "password"/></p>', "\n",
'<input type="reset" class="cancelbtn" value="Clear Form" />',
'<input type = "submit" class="loginbtn" value = "Login" />', "\n", 
'<p></form></p>', "\n";


if ( isset( $_GET[ 'username' ] ) && isset( $_GET[ 'password' ] ) )
{
  $username = $_GET[ 'username' ];
  $password = $_GET[ 'password' ];

$dbname = 'admin'; # Change to your username
  $dbuser = 'admin';
  $dbpass = 'Commander185';
  $dbhost = 'localhost';

  $link = mysqli_connect( $dbhost, $dbuser, $dbpass )
  or die( "Unable to Connect to '$dbhost'" );

  mysqli_select_db( $link, $dbname )
  or die("Could not open the db '$dbname'");

    $password_query = "select * from manager where manager_number = '" . $username . "' and passwd = MD5( '" . $password . "' )"; 
	$result = mysqli_query( $link, $password_query );

  if ( mysqli_num_rows( $result ) == 1 ) # Number of result rows
  {
    session_start();
    $_SESSION[ 'username' ] = $username;
    header( 'Location: managerdata.php' );
    exit();
  }

  else
  {
    echo '<p>Login failed. Please try again.</p>', "\n";
    '</p>';
  }
}
?>
		<!-- End of Login form -->

<footer>Copyright &copy; lw17894</footer>
</body>
	
</html>