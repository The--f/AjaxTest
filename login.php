<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of login
 *
 * @author dell
 */
try {
    $dbh = new PDO('mysql:host=localhost;dbname=ajax', 'root', '');
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
$name = $_POST['name'];
$password = $_POST['password'];


// Check that both fields are not empty
if(!empty($email) || !empty($password)) {
    // Query database to check email and password
    $data = $dbh->query("SELECT * FROM users WHERE name =" . $name . " AND password = " . $password);
    $data->bind('email', $email);
    $data->bind('password', $password);
    $result = $data->single();
    if (!empty($result)) {
        if ($email == $result['email'] && $password == $result['password']) {
            // If login details are correct, return 1
            echo '1';
        }
    } else {
        // If not returned results, 2
        echo '2';
    }
} else {
    // If fields are empty, 3
    echo '3';
}
?>