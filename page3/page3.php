<!doctype html>
<html lang="en">
  <head>
	<!-- Meta headline -->
    <title>Your very own Movie/Serie Database</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSS & PHP -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/ourstyles.css">
	<link rel="stylesheet" type="text/php" href="php/connection.php">
	<link rel="stylesheet" type="text/php" href="php/data_recovery.php">
  
	<!-- Optional theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  </head>
  <body>
		<!-- Navbar -->
	  <nav class="navbar navbar-inverse navbar-fixed-top" id="my-navbar">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
					  <span class="icon-bar"></span>
					  <span class="icon-bar"></span>
					  <span class="icon-bar"></span>
					</button>
					<a href="#" class="navbar-brand">Movie/Series Tacker</a>
				</div>
	
	
				<form class="navbar-form navbar-right" role="search">
				  <div class="input-group">
						<input type="text" class="form-control" placeholder="Search" name="srch-term" id="srch-term">
							<div class="input-group-btn">
							<button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
						</div>
				  </div>
				</form>
	
				<div class="collapse navbar-collapse navbar-left" id="navbar-collapse">
				  <ul class="nav navbar-nav">
					<li class="dropdown">
					  <a class="dropdown-toggle" data-toggle="dropdown" href="#movies">Movies
					  	<span class="caret"></span></a>
					  <ul class="dropdown-menu">
							<li><a href="#top_rated">Top rated</a></li>
							<li><a href="#most_recent">Most Recent</a></li>
							<li><a href="#top_reviews">Top reviews</a></li>
					  </ul>
					</li>
					<li class="dropdown">
					  <a class="dropdown-toggle" data-toggle="dropdown" href="#series">Series
					  	<span class="caret"></span></a>
					  <ul class="dropdown-menu">
							<li><a href="#top_rated">Top rated</a></li>
							<li><a href="#most_recent">Most Recent</a></li>
							<li><a href="#top_reviews">Top reviews</a></li>
					  </ul>
					</li>
				  </ul>
				</div>
		</nav>

	<div class="container"> 
		<div class="row">
			<div class="col-md-6">
					<div class="image_p3">
						<!-- For PHP P3 -->
						<img src="css/Placeholder.png" alt="Image Placeholder">
					</div>
				</div>
			<div class="col-md-6">
				<p>Fetch item NAME & YEAR</p>
				<p>Overall Rating of item</p>
				<p>Number of Reviews of item</p>
				<li><a href="#add_rw">Add Review functionality</a></li>
			</div>
		</div>
		<div class="container">
			<div class="list"><h3>Fetch item reviews and rank them by tumbs up/down count</h3></div>
			<div class="list"><?php
					include 'php/connection.php';
					$sql = "SELECT picture FROM items";
					$result = $conn->query($sql);
					if ($result->num_rows > 0) {
					// output data of each row
						while($row = $result->fetch_assoc()) {
							echo "picture: " . $row["picture"]. "<br>";
						}
					} else {
					echo "0 results";
					}
					$conn->close(); 
					?>
					</p>
			</div>
		</div>
	</div>
	<div class="container3">
		<nav class="navbar" id="my-footbar">
				<div class="navbar-footer">
					<li><a href="#" class="navbar-brand">About</a>
					<a href="#" class="navbar-brand">Terms and Conditions</a>
					<a href="#" class="navbar-brand">FAQ</a>
					<a href="#" class="navbar-brand">Contact Us</a></li>
				</div>
		</nav>
	</div>
</div>
</body>

    <!-- Optional JavaScript -->
		<script src="jquery.js" type="text/javascript"></script>
		<script src="image-scale.js" type="text/javascript"></script>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
		<!-- Our Own JavaScript -->
		<script src="script.js"></script>
</html>