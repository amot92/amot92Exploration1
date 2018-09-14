<?php
    if(!session_start()) {
        header("Location: error.php");
        exit;
    }

    //php helper-function to clean up the posted data
    function testInput($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }

    //Store posted data in variables
    if(!($name = empty($_POST['name']) ? false : testInput($_POST['name']))){
        echo "User name needs to be filled out";
        exit;
    }
    if(!($pass = empty($_POST['pass']) ? false : testInput($_POST['pass']))){
        echo "Name needs to be filled out";
        exit;
    }

    //Database connection
    require_once "db.conf";
    $mysqli = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
    if ($mysqli->connect_error) {
        echo('Error: ' . $mysqli->connect_errno . ' ' . $mysqli->connect_error);
        exit;
    }

    //Query
    $sql = "INSERT INTO users (id, pass) VALUES((?),(?))";
    if (!($stmt = $mysqli->prepare($sql))) {
        echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
        exit;
    }
    if (!$stmt->bind_param("ss", $name, $pass)) {
        echo "Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error;
        exit;
    }
    if (!$stmt->execute()) {
        echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
        exit;
    }
    $mysqli->close();
    $error = "success";
    require "index.php";

?>