<?php
  session.start();
?>
<?php
    
  $dbname = 'admin'; # Change to your username
  $dbuser = 'admin';
  $dbpass = 'Commander185';
  $dbhost = 'localhost';

  $link = mysqli_connect( $dbhost, $dbuser, $dbpass )
  or die( "Unable to Connect to '$dbhost'" );

  mysqli_select_db( $link, $dbname )
  or die("Could not open the db '$dbname'");
    #Edit to link with the submit button
    if(isset($_SESSION['username'])) {
		echo "Welcome, User: {$_SESSION['username']}";
		if(isset($_POST['submitReview'])) {
		  $review_number=$_POST['review_number'];
		  $customer_number=$_POST['customer_number'];
		  $item_code=$_POST['item_code'];
		  $rating=$_POST['rating'];

		$query = "INSERT INTO review (review_number, customer_number, item_code, rating) VALUES ('$review_number', '$customer_number', '$item_code', '$rating')";

    if (!mysqli_query($link, $query)) {
        die('An error occurred. Your review has not been submitted.');
    } else {
      echo "Thanks for your review.";
    }
	} else {
		echo "You do not have te correct privileges or youre not logged in to add a review!";
		header('Location: /index.php');
	}
}
?>