<?php
session_start()
?>
<!DOCTYPE html>
<html>
<body>

<?php
session_unset(); 
session_destroy();
echo "<h1>You are logged out!</h1>";
echo "<br>";
echo "<h2><strong>You will be redirected back to Home in 3 seconds</strong></h2>";
?>
<meta http-equiv="refresh" content="3;URL=index.php" />
</body>
</html>