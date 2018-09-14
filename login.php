<?php
	if(!session_start()) {
		header("Location: error.php");
		exit;
	}
	
	$loggedIn = empty($_SESSION['loggedIn']) ? false : $_SESSION['loggedIn'];
	
	if ($loggedIn) {
		header("Location: landing.php");
		exit;
	}
	
	$action = empty($_POST['action']) ? '' : $_POST['action'];
	
	if ($action == 'do_login')
		handle_login();
	else
		login_form();
	
    function handle_login() {
		$loginUsername = empty($_POST['loginUsername']) ? '' : $_POST['loginUsername'];
		$loginPassword = empty($_POST['loginPassword']) ? '' : $_POST['loginPassword'];
        
        require_once 'db.conf';
        
        $mysqli = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

        if ($mysqli->connect_error) {
            $error = 'Error: ' . $mysqli->connect_errno . ' ' . $mysqli->connect_error;
			require "loginForm.php";
            exit;
        }
        
        $loginUsername = $mysqli->real_escape_string($loginUsername);
        $loginPassword = $mysqli->real_escape_string($loginPassword);
        
//        $loginPassword = sha1($loginPassword); 
        
        $sql = "SELECT * FROM users WHERE id = (?) AND pass = (?)";
        if (!($stmt = $mysqli->prepare($sql))) {
            $error = "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
            $mysqli->close();
            require "loginForm.php";
            exit;
        }
        if (!$stmt->bind_param("ss", $loginUsername, $loginPassword)) {
            $error = "Binding parameters failed in check: (" . $stmt->errno . ") " . $stmt->error;
            $mysqli->close();
            require "loginForm.php";
            exit;
        }
        if (!$stmt->execute()) {
            $error = "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
            $mysqli->close();
            require "loginForm.php";
            exit;
        }
        if (!($res = $stmt->get_result())) {
            $error = "Getting result set failed: (" . $stmt->errno . ") " . $stmt->error;
        } else {
            $row = $res->fetch_assoc();
            if(!$row) {
                $mysqli->close();
                $error = "user not found!";
                require "loginForm.php";
                exit;
            } else {
                $mysqli->close();
                $_SESSION['loggedIn'] = true;
                header("Location: landing.php");
                exit;
            }
        }
    }

    function login_form() {
		$username = "";
		$error = "";
		require "loginForm.php";
	}
?>