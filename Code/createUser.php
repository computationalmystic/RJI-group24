<?php

	if(!session_start()) {
		// If the session couldn't start, present an error
		header("Location: error.php");
		exit;
	}
	
	
	// Check to see if the user has already logged in
	$loggedIn = empty($_SESSION['loggedin']) ? false : $_SESSION['loggedin'];
	
	if ($loggedIn) {
		header("Location: index.php");
		exit;
	}
	
	
	$action = empty($_POST['action']) ? '' : $_POST['action'];
	
	if ($action == 'do_create') {
		create_user();
	} else {
		login_form();
	}
	
	function create_user() {
		
		$username = empty($_POST['username']) ? '' : $_POST['username'];
		$password = empty($_POST['password']) ? '' : $_POST['password'];
		$confirmPass = empty($_POST['confirmPass']) ? '' : $_POST['confirmPass'];
	
		
        
        
        if(strcmp($password, $confirmPass) == 0){
        
			require_once 'db.conf';
        
        // Connect to the database
        $mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
        
        // Check for errors
        if ($mysqli->connect_error) {
            $error = 'Error: ' . $mysqli->connect_errno . ' ' . $mysqli->connect_error;
			require "createUser_form.php";
            exit;
        }
        
        // http://php.net/manual/en/mysqli.real-escape-string.php
        $username = $mysqli->real_escape_string($username);
        $password = $mysqli->real_escape_string($password);
        
        //more secure password storing for website
        $password = sha1($password); 
        
        // Build query
		$query = "INSERT into User (Username, Password, Accesslevel) values ('$username', '$password', 0);";
		
//         Sometimes it's nice to print the query. That way you know what SQL you're working with.
//        print $query;
//        exit;
        
		
		
        // If there was a result...
        if ($mysqli->query($query) ==TRUE) {
            
        	$success = "New user created.";
			require "login_form.php";
			
		}
			
		else{
			$error = "Insert error: ". $query . "<br>" . $mysqli->error;
			require "createUser_form.php";
		}
			$mysqli->close();
       		exit;
	}
	else{
		$error = "Passwords do not match.";
		require "createUser_form.php";
	}
	}
	
	function login_form() {
		$username = "";
		$error = "";
		require "login_form.php";
        exit;
	}
?>