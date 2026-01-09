<?php
// Name deines Bilder-Ordners
$ordner = "bilder/"; 

// Alle Formate, die du anzeigen willst
$erlaubte_formate = array("jpg", "jpeg", "png", "gif");

// Bilder aus dem Ordner auslesen
$alle_dateien = scandir($ordner);
$bilder = array();

foreach ($alle_dateien as $datei) {
    $datei_info = pathinfo($ordner . $datei);
    if (isset($datei_info['extension']) && in_array(strtolower($datei_info['extension']), $erlaubte_formate)) {
        $bilder[] = $ordner . $datei;
    }
}
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Firmung 2024 - Downloads</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <header>
        <h1>Erinnerungen an die Firmung</h1>
        <p>Alle Bilder werden automatisch aus dem Ordner geladen.</p>
    </header>

    <div class="preview-slider">
        <div class="slider-track">
            <?php 
            // Wir zeigen die Bilder zweimal an für den unendlichen Loop
            foreach (array_merge($bilder, $bilder) as $bild): ?>
                <img src="<?php echo $bild; ?>" alt="Vorschau">
            <?php endforeach; ?>
        </div>
    </div>

    <main class="download-grid">
        <?php foreach ($bilder as $bild): ?>
            <div class="grid-item">
                <img src="<?php echo $bild; ?>" alt="Firmung Bild">
                <a href="<?php echo $bild; ?>" download class="btn-download">Herunterladen</a>
            </div>
        <?php endforeach; ?>
    </main>

</body>
</html>

