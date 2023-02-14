<!DOCTYPE html>
<title>UDG-ausbildung-code-challenge</title>
    <link rel="stylesheet" href="style.css">
    <body>
      <button onclick="window.location.href='download.php'">CSV-Datei herunterladen</button>
      <body>
        <?php
        header("Cache-Control: no-cache, no-store, must-revalidate");
        header("Pragma: no-cache");
        header("Expires: 0");
        // Pfad zur CSV-Datei
        $file = 'datei.csv';
        // Überprüfen, ob die CSV-Datei existiert
        if (!file_exists($file)) {
            echo 'Die CSV-Datei existiert nicht.';
            exit;
        }
        // CSV-Datei öffnen
        $handle = fopen($file, 'r');
        // Überschriftenzeile lesen
        $header = fgetcsv($handle, 0, ";");
        // Anzahl der Spalten ermitteln
        $num_cols = count($header);
        // CSV-Datei schließen
        fclose($handle);
        // Tabelle mit Überschriften ausgeben
        echo '<table border="1">';
        echo '<tr>';
        foreach ($header as $col) {
            echo '<th>' . $col . '</th>';
        }
        // Spalte für Bearbeiten-Button hinzufügen
        echo '<th>Bearbeiten</th>';
        echo '</tr>';
        // CSV-Datei öffnen
        $handle = fopen($file, 'r');
        // Überschriftenzeile überspringen
        fgetcsv($handle, 0, ";");
        // Datenzeilen ausgeben
        while (($data = fgetcsv($handle, 0, ";")) !== false) {
            echo '<tr>';
            // Arrays über Implode hinzufügen
            echo '<td>' . implode('</td><td>', $data) . '</td>';
            echo '<td><button><a href="edit.php?' . implode('&', array_map(function ($key, $value) { return $key . '=' . $value; }, $header, $data)) . '">Bearbeiten</a></button></td>';
            echo '</tr>';
        }
        // CSV-Datei schließen
        fclose($handle);
        // Tabelle schließen
        echo '</table>';
        ?>
 <footer>
  <?php
      // Formular für neue Datensätze
      echo '<form action="insert.php" method="post">';
      echo '<table>';
      echo '<tr>';
      // So viele Eingabefelder wie Spalten in der CSV-Datei
      for ($i = 0; $i < $num_cols; $i++) {
      // Header fügt Spaltenbennenung in die Eingabefelder ein
      echo '<td>' . $header[$i] . '<input type="text" name="data[]"></td>';
      }
      echo '</tr>';
      echo '<tr><td colspan="' . $num_cols . '"><button type="submit" value="Neue Daten einfügen">Neue Daten einfügen</td></tr>';
      echo '</table>';
      echo '</form>';
    ?>
  </footer>
</body>
