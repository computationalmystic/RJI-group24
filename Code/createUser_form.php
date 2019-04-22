<?php
header("Cache-Control: no-store, no-cache, must-revalidate, pre-check=0, post-check=0, max-age=0, s-maxage=0");
header("Pragma:no-cache");
header("Expires: 0");
?>

<!DOCTYPE html>
<!-- Created by Professor Wergeles for CS2830 at the University of Missouri -->
<html>
<head>
	<title>Database Login</title>
	
   	<link href="jquery-ui-1.12.1.custom/jquery-ui.css" rel="stylesheet">
    <script src="jquery-ui-1.12.1.custom/external/jquery/jquery.js"></script>
    <script src="jquery-ui-1.12.1.custom/jquery-ui.js"></script>
	<link href="app.css" rel="stylesheet" type="text/css">
	<link href="final.css" rel="stylesheet" type="text/css">
	<script src="final.js"></script>
    <script>
        $(function(){
            $("input[type=submit]").button();
        });
    </script>
</head>
<body id="loginbody">
			<?php 
			 require_once('navbar.php');
			?>
	
    <div id="loginWidget" class="ui-widget">
        <h1 class="ui-widget-header">Create User</h1>
        
        <?php
            if ($error) {
                print "<div class=\"ui-state-error\">$error</div>\n";
            }
			if ($success) {
                print "<div class=\"ui-state-highlight\">$error</div>\n";
            }
			
        ?>
        
        
        <form action="createUser.php" method="POST">
            
            <input type="hidden" name="action" value="do_create">
            <div class="stack">
				<label for="firstName">First name:</label>
				<input type="text" id="firstName" name="firstName" class="ui-widget-content ui-corner-all"/>
			</div>
			<div class="stack">
				<label for="lastName">Last name:</label>
				<input type="text" id="LastName" name="lastName" class="ui-widget-content ui-corner-all"/>
			</div>
            <div class="stack">
                <label for="username">User name:</label>
                <input type="text" id="username" name="username" class="ui-widget-content ui-corner-all" autofocus value="<?php print $username; ?>"/>
            </div>
            
            <div class="stack">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" class="ui-widget-content ui-corner-all"/>
            </div>
			
			<div class="stack">
                <label for="password">Confirm Password:</label>
                <input type="password" id="confirmPass" name="confirmPass" class="ui-widget-content ui-corner-all"/>
            </div>
            
            <div class="stack">
                <input type="submit" value="Submit"/>
            </div>
        </form>
		
    </div>
	<?php 
			 require_once('footer.php');
			?>
</body>
</html>