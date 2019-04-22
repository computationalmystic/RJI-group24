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
<!--
    <script>
    
        function updateTextInput(val) {
          document.getElementById('textInput').value=val; 
        }
    
    </script>
-->
    
    <script>
function printValue(sliderID, spanbox) {
    var x = document.getElementById(spanbox);
    var y = document.getElementById(sliderID);
    x.value = y.value;
}
function slideValue(sliderID, spanbox){
    var x = document.getElementById(spanbox);
    var y = document.getElementById(sliderID);
    y.value = parseInt(x.value);
}

window.onload = function() { printValue('slide1', 'rangeValue1'); }

</script>
    
</head><body>

<!-- Navbar -->
<div class="w3-top">
  <div class="w3-bar w3-red w3-card w3-left-align w3-large">
    <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-red" href="javascript:void(0);" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
    <a href="photoGrader.php" class="w3-bar-item w3-button w3-padding-large">Home</a>
    <a href="view.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white w3-white">View</a>
    <a href="delete.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Delete</a>
    <a href="About.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">About</a>
  </div>

  <!-- Navbar on small screens -->
  <div id="navDemo" class="w3-bar-block w3-white w3-hide w3-hide-large w3-hide-medium w3-large">
    <a href="photoGrader.php" class="w3-bar-item w3-button w3-padding-large">Home</a>
      <a href="view.php" class="w3-bar-item w3-button w3-padding-large w3-white">View</a>
    <a href="delete.php" class="w3-bar-item w3-button w3-padding-large">Delete</a>
    <a href="About.php" class="w3-bar-item w3-button w3-padding-large">About</a>
  </div>
</div>

<!-- Header -->
<header class="w3-container w3-red w3-center" style="padding:128px 16px">
  <h1 class="w3-margin w3-jumbo">Photos</h1>
<!--  <button class="w3-button w3-black w3-padding-large w3-large w3-margin-top">Get Started</button>-->
<!--
    <div>
        <input type="range" name="rangeInput" min="0.0" max="10.0" step="0.1" onchange="updateTextInput(this.value);">
    </div>
-->
    <form action="" method="post">
    <label for=range1>Search for photos graded greater than or equal to selected grade.</label> <br><br>

   <span>Grade: </span>
		<i><input type=text id="rangeValue1" value=0 maxlength="3" size="3" onchange="slideValue('slide1', 'rangeValue1');"></i>
	<span>0 </span><input type="range" name="slider" id="slide1" min="0" max="10" value=0 step=0.1 onchange="printValue('slide1', 'rangeValue1')"><span> 10 </span><br><br>

	
        <input type="submit" name="search" value="Search">
    </form>
</header>

<!-- First Grid -->
<div class="w3-row-padding w3-padding-64 w3-container">
  <div class="w3-content">
    <div class="w3-twothird">
		
		<h2>Search Results</h2>
<?php
		
if(isset($_POST["search"])){
require_once 'db.conf';
        
         //Connect to the database
        $mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
	if ($mysqli->connect_error) {
            $error = 'Error: ' . $mysqli->connect_errno . ' ' . $mysqli->connect_error;
			echo $error;
            exit;
        }
		
	$query = "SELECT Title, Score FROM Photos WHERE Score >=". $_POST['slider']." ORDER BY Score DESC";
	
	
	 $result = $mysqli->query($query);
	 echo "<h5>".$result->num_rows. " results</h5>";
		if($result->num_rows !=0){
			echo "<form action='' method='post'>
					<input type='submit' name='download' value='Download'>
					</form>
			";
		}
	
     while ($row = $result->fetch_assoc()) {
		 
		echo "<table border-style=none  width='100%' >"; 
	   	echo "<td width='350'>" . $row['Title'] . "</td>"; 
	    echo "<td><img src=".$row['Title']." alt=".$row['Title']." width='150' height='150'></td>";
        echo "<td>" . $row['Score'] . "</td>";
       	echo "</table>";

     }
}
		
?>
		
        
        
        
      <h5 class="w3-padding-32"></h5>

      <p class="w3-text-grey"></p>
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

<!-- Footer -->


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