<?php
$filename = "datei.csv"; // Name der CSV-Datei
$file = fopen($filename, "r"); // Öffnen der Datei im Lese-Modus
// Header setzen, um den Download als CSV-Datei zu deklarieren
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename='.$filename);
// Ausgabe des Inhalts der CSV-Datei
while (!feof($file)) {
    echo fgets($file);
}
fclose($file); // Schließen der Datei
?>
