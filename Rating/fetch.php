<?php
$connection = mysqli_connect("localhost", "root", ""); // Establishing Connection with Server
$db = mysqli_select_db( $connection,"reviews"); // Selecting Database
//MySQL Query to read data
$query = mysqli_query($connection,"select (AVG(Rating)/5)*100 as Average from review_star where Movie='Hobbit' ");
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">
		
		<title>Movie Review | Single</title>

		<!-- Loading third party fonts -->
		<link href="http://fonts.googleapis.com/css?family=Roboto:300,400,700|" rel="stylesheet" type="text/css">
		<link href="fonts/font-awesome.min.css" rel="stylesheet" type="text/css">
<style>
/* Star rating style */
.star-rating {
  display: inline-block;
  overflow: hidden;
  position: relative;
  top: 2px;
  height: 1em;
  line-height: 1.1;
  font-size: 15px;
  font-size: 1em;
  width: 4.7em;
  font-family: "FontAwesome"; }

.star-rating:before {
  content: "\f005\f005\f005\f005\f005";
  float: left;
  top: 0;
  left: 0;
  position: absolute; }

.star-rating span {
  overflow: hidden;
  float: left;
  top: 0;
  left: 0;
  position: absolute;
  padding-top: 1.5em; }

.star-rating span:before {
  content: "\f005\f005\f005\f005\f005";
  top: 0;
  position: absolute;
  left: 0;
  color: #ffaa3c; }

</style>
</head>
<body>
<h1>Fetch data from SQL </h1>
<?php 
$r=mysqli_fetch_assoc($query);
?>
<ul class="movie-meta">
	<li><strong>Rating:</strong> 
	<div class="star-rating"><span style="width:<?php echo $r['Average']?>%"><strong class="rating"></strong></span></div>
	</li>
	<li><strong>Length:</strong> 98 min</li>
</ul>


<h2><?php echo $r['Average'] ?></h2> 



</body>
</html>
