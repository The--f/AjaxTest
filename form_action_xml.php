<?php
try {
    $dbh = new PDO('mysql:host=localhost;dbname=ajax', 'root', '');
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
try {
    $data = $dbh->query('select * from users ');
} catch (Exception $ex) {
    echo 'ERROR: ' . $e->getMessage();
}
$dbh = null;
$dom = new DOMDocument();
$users = $dom->createElement('users');
$dom->appendChild($users);
foreach ($data as $row) {
    $id = $dom->createElement('id');
    $idText = $dom->createTextNode($row['id']);
    $id->appendChild($idText);
    $name = $dom->createElement('name');
    $nameText = $dom->createTextNode($row['name']);
    $name->appendChild($nameText);
    $last_name = $dom->createElement('last_name');
    $last_name_text = $dom->createTextNode($row['last_name']);
    $last_name->appendChild($last_name_text);
    $user = $dom->createElement('user');
    $user->appendChild($id);
    $user->appendChild($name);
    $user->appendChild($last_name);
    $users->appendChild($user);
}
$xmlString = $dom->saveXML();
header("Content-Type:text/xml");
echo $xmlString;



