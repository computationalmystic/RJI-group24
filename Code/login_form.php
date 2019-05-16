<?php
header("Cache-Control: no-store, no-cache, must-revalidate, pre-check=0, post-check=0, max-age=0, s-maxage=0");
header("Pragma:no-cache");
header("Expires: 0");
?>

<!DOCTYPE html>
<!-- Created by Professor Wergeles for CS2830 at the University of Missouri -->
<html lang="en">
<head>
	<title>Database Login</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="app.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   	<link href="jquery-ui-1.12.1.custom/jquery-ui.css" rel="stylesheet">
    <script src="jquery-ui-1.12.1.custom/external/jquery/jquery.js"></script>
    <script src="jquery-ui-1.12.1.custom/jquery-ui.js"></script>
    <link rel="shortcut icon" type="image/x-icon" href="icon.ico" />
    
    <style>
        body,h1,h2,h3,h4,h5,h6 {font-family: "Lato", sans-serif}
        .w3-bar,h1,button {font-family: "Montserrat", sans-serif}
        .fa-anchor,.fa-coffee {font-size:200px}
    </style>
    
    <script>
        $(function(){
            $("input[type=submit]").button();
        });
    </script>
    
</head>
<body id="loginbody">
    <div class="w3-top">
  <div class="w3-bar w3-red w3-card w3-left-align w3-large">
    <a class="w3-bar-item w3-button w3-hide-medium w3-hide-large w3-right w3-padding-large w3-hover-white w3-large w3-red" href="javascript:void(0);" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
    <a href="index.php" class="w3-bar-item w3-button w3-padding-large">Home</a>
  </div>

  <!-- Navbar on small screens -->
  <div id="navDemo" class="w3-bar-block w3-white w3-hide w3-hide-large w3-hide-medium w3-large">
      <a href="index.php" class="w3-bar-item w3-button w3-padding-large">Home</a>
  </div>
</div>
    
			<?php 
//			 require_once('navbar.php');
			?>
	
    <div id="loginWidget" class="ui-widget">
        <h1 class="ui-widget-header">Login</h1>
        
        <?php
            if ($error) {
                print "<div class=\"ui-state-error\">$error</div>\n";
            }
			if ($success) {
                print "<div class=\"ui-state-highlight\">$success</div>\n";
            }
			
        ?>
        
        
        <form action="login.php" method="POST">
            
            <input type="hidden" name="action" value="do_login">
            
            <div class="stack">
                <label for="username">User name:</label>
                <input type="text" id="username" name="username" class="ui-widget-content ui-corner-all" autofocus value="<?php print $username; ?>"/>
            </div>
            
            <div class="stack">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" class="ui-widget-content ui-corner-all"/>
            </div>
            
            <div class="stack">
                <input type="submit" value="Submit"/>
            </div>
        </form>
		<br>
		<a href="createUser_form.php">Create Account.</a>
    </div>
		<?php 
			 require_once('footer.php');
			?>
</body>
</html>