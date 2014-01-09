<?php
try {
    $dbh = new PDO('mysql:host=localhost;dbname=ajax', 'root', '');
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
try {
    $data = $dbh->query('select * from users ');
    echo "<tr><th>Name</th><th>Last Name </th></tr>";
    foreach ($data as $row) {
       echo"<tr><td>" . $row['name'] . "</td><td>" . $row['last_name'] . "</td></tr>";
    }
} catch (Exception $ex) {
    echo 'ERROR: ' . $e->getMessage();
}



