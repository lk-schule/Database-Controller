<?php

include "../config.php";

$plz = filter_input(INPUT_GET, "plz", FILTER_VALIDATE_INT);

$verbindung = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_DATENBANK);

//  Verbindung überprüfen
if (!$verbindung) {
    die(mysqli_connect_error());
}

$sql = "SELECT ort FROM tab_ort WHERE tab_ort.plz = " . $plz;
$ergebnis = mysqli_query($verbindung, $sql);

if (mysqli_num_rows($ergebnis) > 0) {
    // output data of each row
    $row = mysqli_fetch_assoc($ergebnis);
    echo $row["ort"];
}
else{
    echo "Nicht gefunden";
}