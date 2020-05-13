<?php
$username = $_POST['User'];
$rate = $_POST['rate'];
$movie=$_POST['movie'];
if (!empty($username) || !empty($rate) || !empty($movie)) {
 $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "reviews";
    //create connection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    if (mysqli_connect_error()) {
     die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    } else {
     $SELECT = "SELECT Name From review_star Where Name = ? Limit 1";
     $INSERT = "INSERT INTO review_star (Name,Rating,Movie) values(?, ?, ?)";
     //Prepare statement
     $stmt = $conn->prepare($SELECT);
     $stmt->bind_param("s", $Name);
     $stmt->execute();
     $stmt->bind_result($Name);
     $stmt->store_result();
     $rnum = $stmt->num_rows;
     if ($rnum==0) {
      $stmt->close();
      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("sis", $username, $rate, $movie);
      $stmt->execute();
      echo "New record inserted sucessfully";
	  header( "Location: review.html");
	  exit ;
     } else {
      echo "Someone already register using this email";
     }
     $stmt->close();
     $conn->close();
    }
} else {
 echo "All field are required";
 die();
}
?>