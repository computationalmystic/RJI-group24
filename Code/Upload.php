

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
    <a href="index.php" class="w3-bar-item w3-button w3-padding-large w3-white">Home</a>
      <a href="photoGrader.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Upload</a>
    <a href="view.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">View</a>
    <a href="delete.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Delete</a>
    
      <a href="logout.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Logout</a>
  </div>

  <!-- Navbar on small screens -->
  <div id="navDemo" class="w3-bar-block w3-white w3-hide w3-hide-large w3-hide-medium w3-large">
    <a href="index.php" class="w3-bar-item w3-button w3-padding-large">Home</a>
      <a href="photoGrader.php" class="w3-bar-item w3-button w3-hide-small w3-padding-large w3-hover-white">Upload</a>
      <a href="view.php" class="w3-bar-item w3-button w3-padding-large">View</a>
      <a href="delete.php" class="w3-bar-item w3-button w3-padding-large">Delete</a>
    
      <a href="logout.php" class="w3-bar-item w3-button w3-padding-large">Logout</a>
  </div>
</div>

<!-- Header -->
<header class="w3-container w3-red w3-center" style="padding:128px 16px">
  <h1 class="w3-margin w3-jumbo">Photo's Uploaded</h1>
	<form action="photoGrader.php" method="post">
		<input type="submit" value="Upload More">
	</form>
  
<!--  <button class="w3-button w3-black w3-padding-large w3-large w3-margin-top">Get Started</button>-->
</header>

<!-- First Grid -->
<div class="w3-row-padding w3-padding-64 w3-container">
  <div class="w3-content">
    <div class="w3-twothird">
      <h1>PhotoGrader</h1>
        
      <h5 class="w3-padding-32">This is a web application that grades photos based on their quality using the idealo image-quality-assessment on a scale from 0-10</h5>
<?php
	if(!session_start()){
		echo "session didn't connect try again or contact developer.";
	}

if(isset($_POST["submit"])){
	
		require_once 'db.conf';
        
         //Connect to the database
        $mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
	if ($mysqli->connect_error) {
            $error = 'Error: ' . $mysqli->connect_errno . ' ' . $mysqli->connect_error;
			echo "<p color=yellow>".$error."</p>";
            exit;
    }
	else{ //
		//echo "connected"
    ;}
	
//	$connect = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
	$countfiles = count($_FILES['file']['name']);
	
	
	
	
	$j=1;
	
	

for($i=0;$i<$countfiles;$i++){
	
	
	
  $target = "/var/www/html/SoftwareDev/";
	$file = $_FILES['file']['name'][$i];
	$title= basename($file);
	$target = $target . $title;
	$tmpPath = $_FILES['file']['tmp_name'][$i];
	$iserror=0;
	
	$check = getimagesize($tmpPath);
	//checks if its an image
	if($check == false){
		echo $title . " is not an image.";
		$iserror=1;
	}
	//checks that it wont duplicate 
	if (file_exists($title)) {
            echo "Sorry, ". $title. " already exists. ";
        $iserror=1;
        }
	
	//checks size of photo
	if ($_FILES["file"]["size"][$i] > 20500000) {
            echo "Sorry, ".$title. " is too large. ";
		$iserror=1;
         }

//This gets all the other information from the form
	
	

if($iserror==0){
	//Writes the Filename to the server
if(move_uploaded_file($tmpPath, $target)) {
    //Tells you if its all ok
  echo "The file ". $title. " has been uploaded, and your information has been added to the directory";
	
	
	//Put grader
	//$score= $j++%10;
    
    # $score = shell_exec("bash ../../var/www/html/SoftwareDev/run_image_aesthetic.sh $title");
    $score = shell_exec("/var/www/html/SoftwareDev/run_image_aesthetic.sh $title");
   //echo " score ". $score . " /10. ";
     $score = substr($score, -7, -3);
         //     echo " score ". $score . " /10. ";
    //change the exact image name in the shell script to $title
    //look at permissions on the file??
    
	
	$user= $_SESSION['loggedin'];
	
	
    // Connects to your Database
   $query = "INSERT INTO Photos(Picture, Title, Username, Date, Score) VALUES ('$target', '$title', '$user', CURDATE(), '$score');";
	
	
	$result = $mysqli->query($query);
   // Writes the information to the database
	
	
	
   if ($result) {
	   
		//echo "picture uploaded";
//	   echo "<img src=".title.
	   echo "<table border-style=none  width='100%' >"; 
	   	echo "<td width='350'>" . $title . "</td>"; 
	    echo "<td><img src='".$title."'alt='".$title."' width='200' height='150'></td>";
        echo "<td>" . $score . "</td>";
       echo "</table>";

	}
	else{echo "<p color=yellow> Error uplaoding " . $title . " to the database.</p>";}
} else {
    //Gives and error if its not
    echo "<p color='red'>Sorry, there was a problem uploading ". basename( $file)." to the server.</p>";
}}	
}
//	$query = "SELECT Title FROM Photos";
//	
//	 $result = $mysqli->query($query);
//	
//     while ($row = $result->fetch_assoc()) {
//            print_r($row['Title']);
//		 echo "<img src=".$row['Picutre']." alt='Most recent WebCam Shot' width='150' height='150'><br />";
//     }
	
	
	
//	$query2 = "SELECT Title FROM Photos";
//	$result = mysqli_query($connect, $query);
//	
//	echo $result."1";
//	echo "god";
//	$result2 = mysqli_query($connect, $query2);
//	$row = mysqli_fetch_assoc($result);
//	$row2 = mysqli_fetch_assoc($result2);
//	echo $row['Picture'];
//	echo "<img src=".$row["Picutre"]." alt='Most recent WebCam Shot' width='150' height='150'><br />";
	
//		if($result){
//		   while($row = mysqli_fetch_assoc($result))
//	{	echo"while";
//		echo "<img src=".$row["Picutre"]." alt='Most recent WebCam Shot' width='800' height='600'><br />";
//		
//	} 
//		}
}
	
	


?>

     
    </div>

    
  </div>
</div>

<!-- Second Grid -->
<!--
<div class="w3-row-padding w3-light-grey w3-padding-64 w3-container">
  <div class="w3-content">
    <div class="w3-third w3-center">
      <i class="fa fa-coffee w3-padding-64 w3-text-red w3-margin-right"></i>
    </div>

    <div class="w3-twothird">
      <h1>Display</h1>
      <h5 class="w3-padding-32"></h5>

      <p class="w3-text-grey"></p>
    </div>
  </div>
</div>
-->

<div class="w3-container w3-black w3-center w3-opacity w3-padding-64">
    <h1 class="w3-margin w3-xlarge">Created By: Brendan Spinks, Sophie Nedelco, and Cody Polton</h1>
</div>

<!-- Footer -->
<!--
<footer class="w3-container w3-padding-64 w3-center w3-opacity">  
  <div class="w3-xlarge w3-padding-32">
    <i class="fa fa-facebook-official w3-hover-opacity"></i>
    <i class="fa fa-instagram w3-hover-opacity"></i>
    <i class="fa fa-snapchat w3-hover-opacity"></i>
    <i class="fa fa-pinterest-p w3-hover-opacity"></i>
    <i class="fa fa-twitter w3-hover-opacity"></i>
    <i class="fa fa-linkedin w3-hover-opacity"></i>
 </div>
 <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank">w3.css</a></p>
</footer>
-->

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
