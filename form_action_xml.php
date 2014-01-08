<?php
try {
    $dbh = new PDO('mysql:host=localhost;dbname=ajax', 'root', '');
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
try {
    $data = $dbh->query('select * from users ');
//    foreach ($data as $row) {
//        print_r($row);
//        echo '<br>';
//    }
} catch (Exception $ex) {
    echo 'ERROR: ' . $e->getMessage();
}
$dbh = null;
$dom = new DOMDocument();
$users = $dom->createElement('table');
$dom->appendChild($users);
$labels = $dom->createElement('tr');
$id = $dom->createElement('th');
    $idText = $dom->createTextNode('ID');
$id->appendChild($idText);
$name = $dom->createElement('th');
    $nameText = $dom->createTextNode('Name');
$name->appendChild($nameText);
$last_name = $dom->createElement('td');
    $last_name_text = $dom->createTextNode('Last Name');
$last_name->appendChild($last_name_text);
$labels->appendChild($id);
$labels->appendChild($name);
$labels->appendChild($last_name);

$users->appendChild($labels);
// end table header start content
foreach ($data as $row) {
    $id = $dom->createElement('td');
    $idText = $dom->createTextNode($row['id']);
    $id->appendChild($idText);
    $name = $dom->createElement('td');
    $nameText = $dom->createTextNode($row['name']);
    $name->appendChild($nameText);
    $last_name = $dom->createElement('td');
    $last_name_text = $dom->createTextNode($row['prenom']);
    $last_name->appendChild($last_name_text);
    $user = $dom->createElement('tr');
    $user->appendChild($id);
    $user->appendChild($name);
    $user->appendChild($last_name);
    $users->appendChild($user);
}
$xmlString = $dom->saveXML();
//header("Content-Type:text/xml");
echo $xmlString;



