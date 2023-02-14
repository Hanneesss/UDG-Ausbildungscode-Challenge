<!DOCTYPE html>
<title>UDG-ausbildung-code-challenge</title>
    <link rel="stylesheet" href="style.css">
    <body>
      <body>
        <?php
        // Verhindern das Eingaben im cache gespeichert werden
        header("Cache-Control: no-cache, no-store, must-revalidate");
        header("Pragma: no-cache");
        header("Expires: 0");
        // Pfad zur CSV-Datei
        $file = 'datei.csv';
        // Überprüfen, ob die CSV-Datei existiert
        if (!file_exists($file)) {
            echo 'Die CSV-Datei wurde nicht gefunden.';
            exit;
        }
        // Überprüfen, ob Daten im URL-Array oder POST-Array vorhanden sind
        if (empty($_GET) && empty($_POST)) {
            echo 'Keine Daten im URL-Array oder POST-Array vorhanden.';
            exit;
        }
        // Überprüfen, ob Daten im POST-Array vorhanden sind
        if (!empty($_POST)) {
            // Öffnen der CSV-Datei zum Schreiben
            $fp = fopen($file, 'w');
            // Überschriftenzeile schreiben
            fputcsv($fp, array_keys($_POST));
            // Datenzeile schreiben
            fputcsv($fp, $_POST);
            // Schließen der CSV-Datei
            fclose($fp);
            echo 'Daten erfolgreich gespeichert.';
            exit;
        }
        // Datenzeile aus URL-Array lesen
        $data = [];
        foreach ($_GET as $key => $value) {
            $data[$key] = $value;
        }
        // Formular zur Bearbeitung der Datenzeile ausgeben
        echo '<form action="index.php" method="post">';
        foreach ($data as $key => $value) {
            echo '<div>';
            echo '<label for="' . $key . '">' . $key . '</label>';
            echo '<input type="text" id="' . $key . '" name="' . $key . '" value="' . $value . '">';
            echo '</div>';
        }
        echo '<button type="submit" value="Speichern">Speichern';
        echo '</form>';
        ?>
</body>
