<?php
session_start();
?>
<!DOCTYPE HTML>

<html lang = "en">

<head>
	<meta charset="UTF-8">
	<title>Register</title>
  <script> 
    function formValidation() {
    var username = document.forms["userregister_form"]["username"].value;
    var password = document.forms["userregister_form"]["password"].value;
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

/* Change background on mouse-over */
.navbar a:hover {
    background: #ddd;
    color: black;
}

.userlogin {
	margin-left: 20px;
	
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
</head>


<body>
<div class="container">

<header>
<!-- Logo -->
<img src="/images/logo/2.png" alt="Logo 2">
   <h1>User Login</h1>
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

<?php
# Login which checks username and password in the database.
# Uses Post Back and $_SESSION
# We are using GET method which is not secure but you can see
# attributes/values URL encoded which is good for testing
echo '<form action = "user_register.php" method = "GET" name="userregister_form" onsubmit="return formValidation()" accept-charset="UTF-8">', "\n",
'<p><label for = "a">Title:</label>',
'<select>
  <option value="selectone">Please select one</option>
  <option value="Mr">Mr</option>
  <option value="Mrs">Mrs</option>
  <option value="Miss">Miss</option>
  <option value="Dr">Dr</option>
</select> ', "\n",

'<p><label for = "b">First Name:</label>',
'<input id = "b" type = "text" name = "firstname"/></p>', "\n",

'<p><label for = "c">Surname:</label>',
'<input id = "c" type = "text" name = "surname"/></p>', "\n",

'<p><label for = "d">Address 1:</label>',
'<input id = "d" type = "text" name = "address1"/></p>', "\n",

'<p><label for = "d">Address 2:</label>',
'<input id = "d" type = "text" name = "address2"/></p>', "\n",

'<p><label for = "d">City:</label>',
'<input id = "d" type = "text" name = "city"/></p>', "\n",

'<p><label for = "d">County:</label>',
'<input id = "d" type = "text" name = "county"/></p>', "\n",

'<p><label for = "d">Postcode:</label>',
'<input id = "d" type = "text" name = "postcode"/></p>', "\n",

'<p>---------------------------------------------------------------------------------------------</p>',

'<p><label for = "b">Username:</label>',
'<input id = "b" type = "text" name = "username"/></p>', "\n",

'<p><label for = "b">Password:</label>',
'<input id = "b" type = "text" name = "password"/></p>', "\n",

'<input type="reset" class="cancelbtn" value="Clear Form" />',
'<input type = "submit" class="registerbtn" value = "Register" />', "\n", 
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

    $password_query = "select * from customer where customer_number = '" . $username . "' and passwd = MD5( '" . $password . "' )"; 
	$result = mysqli_query( $link, $password_query );

  if ( mysqli_num_rows( $result ) == 1 ) # Number of result rows
  {
    session_start();
    $_SESSION[ 'username' ] = $username;
    header( 'Location: successregister.php' );
    exit();
  }

  else
  {
    echo '<p>Register failed. Please try again.</p>', "\n";
    '</p>';
  }
}
?>
		<!-- End of Login form -->

<footer>Copyright &copy; lw17894</footer>

</div>
</body>
	
</html>