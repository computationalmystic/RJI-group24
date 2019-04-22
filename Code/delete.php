<!doctype html>

<html lang="en"><head><title>Photo Grader</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="shortcut icon" type="image/x-icon" href="icon.ico" />
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Lato", sans-serif}
.w3-bar,h1,button {font-family: "Montserrat", sans-serif}
.fa-anchor,.fa-coffee {font-size:200px}
</style>
</head><body>

<!-- Navbar -->
<div class="w3-top">
  <div class="w3-bar w3-red w3-card w3-left-align w3-large">
    <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-red" href="javascript:void(0);" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
    <a href="photoGrader.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Home</a>
    <a href="view.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">View</a>
    <a href="delete.php" class="w3-bar-item w3-button w3-padding-large w3-white">Delete</a>
    <a href="About.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">About</a>
  </div>

  <!-- Navbar on small screens -->
  <div id="navDemo" class="w3-bar-block w3-white w3-hide w3-hide-large w3-hide-medium w3-large">
    <a href="photoGrader.php" class="w3-bar-item w3-button w3-padding-large w3-white">Home</a>
    <a href="view.php" class="w3-bar-item w3-button w3-padding-large">View</a>
     <a href="delete.php" class="w3-bar-item w3-button w3-padding-large">Delete</a>
    <a href="About.php" class="w3-bar-item w3-button w3-padding-large">About</a>
  </div>
</div>

<!-- Header -->
<header class="w3-container w3-red w3-center" style="padding:128px 16px">
  <h1 class="w3-margin w3-jumbo">Photo Grader</h1>
  <p class="w3-xlarge">Click below to delete a photo</p>
    <form method="post" >
		<input type="submit" name="submit" value="DELETE">
		</form>
        <?php
		if(isset($_POST['submit'])){
			
		require_once 'db.conf';
        
         //Connect to the database
        $mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
	if ($mysqli->connect_error) {
            $error = 'Error: ' . $mysqli->connect_errno . ' ' . $mysqli->connect_error;
			echo "<p color=red>".$error."</p>";
            exit;
        }
	
		
	$query = "SELECT Title FROM Photos";
	$result = $mysqli->query($query);
			
	if($result->num_rows > 0){
	while ($row = $result->fetch_assoc()) {
		if(!$row){
			echo "<p> There are no photos to delte.</p>";
		}
		echo "<p>" . $row['Title'] . "</p>"; 
		unlink($row['Title']);
		
		}
			$query = "Delete From Photos";
			$result = $mysqli->query($query);
			if(!$result){
			$error = 'Error: ' . $result->connect_errno . ' ' . $result->connect_error;
			
			echo "<p color=yellow>".$error."</p>";
            exit;
			}
	}
	else{
			
		echo "<p> No photos to delete. </p>";
		}
	}
		
		?>
<!--  <button class="w3-button w3-black w3-padding-large w3-large w3-margin-top">Get Started</button>-->
</header>

<!-- First Grid -->
<div class="w3-row-padding w3-padding-64 w3-container">
  <div class="w3-content">
    <div class="w3-twothird">
      <h1>Lorem Ipsum</h1>
		
        <h2>PhotoGrader</h2>
      
    </div>

    <div class="w3-third w3-center">
      <i class="fa fa-anchor w3-padding-64 w3-text-red"></i>
    </div>
  </div>
</div>

<!-- Second Grid -->
<div class="w3-row-padding w3-light-grey w3-padding-64 w3-container">
  <div class="w3-content">
    <div class="w3-third w3-center">
      <i class="fa fa-coffee w3-padding-64 w3-text-red w3-margin-right"></i>
    </div>

    <div class="w3-twothird">
      <h1>Lorem Ipsum</h1>
      <h5 class="w3-padding-32"></h5>

      <p class="w3-text-grey"></p>
    </div>
  </div>
</div>

<div class="w3-container w3-black w3-center w3-opacity w3-padding-64">
   <h1 class="w3-margin w3-xlarge">Created By: Brendan Spinks, Sophie Nedelco, and Cody Polton</h1>
</div>



<script>
// Used to toggle the menu on small screens when clicking on the menu button
function myFunction() {
  var x = document.getElementById("navDemo");
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
  } else { 
    x.className = x.className.replace(" w3-show", "");
  }
}
</script>


</body></html>