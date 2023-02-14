<!DOCTYPE html>
<title>UDG-ausbildung-code-challenge</title>
    <link rel="stylesheet" href="style.css">
    <body>
<body>
    <?php
    // Pfad zur CSV-Datei
    $file = 'datei.csv';
    // Neue Daten einfügen
    if (isset($_POST['data'])) {
    // CSV-Datei öffnen
    $handle = fopen($file, 'a');
    // Neue Datenzeile schreiben
    fputcsv($handle, $_POST['data'], ";");
    // CSV-Datei schließen
    fclose($handle);
    }
    ?>
<link rel="stylesheet" href="style.css">
<form action="index.php" method="post">
  <button type="submit" style="border: none;color: white;padding: 16px 32px;text-align: center;text-decoration: none;display: inline-block;font-size: 16px;margin: 4px 2px;transition-duration: 0.4s;cursor: pointer;background-color: #2A3132;color: white;border: 2px solid #2A3132;border-radius: 6px;">Zurück zu der CSV Datei</button>
</form>
