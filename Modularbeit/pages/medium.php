<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../input.css">
    <link rel="icon" type="image/x-icon" href="./../assets/favicon.jpg">
    <title>Medium</title>
    
</head>
<body>

<header>
    <nav class="navbar">
        <!-- Logo -->
        <a href="../pages/index.php"> <img src="../assets/OmniLogo.png" class="omnilogo" alt="logo"> </a>

        <!-- Navigation Links -->

        <div class="nav-sublink">
            <a href="../pages/index.php" class="nav-link">Home</a>
            <a href="preise.php" class="nav-link">Preise</a>
            <a href="uns.php" class="nav-link">Über uns</a>
        </div>
    </nav>
</header>
<main class="price-main">

    <a href="preise.php"><svg class="arrow" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 1024 1024"><path fill="#0484b5" d="M685.248 104.704a64 64 0 0 1 0 90.496L368.448 512l316.8 316.8a64 64 0 0 1-90.496 90.496L232.704 557.248a64 64 0 0 1 0-90.496l362.048-362.048a64 64 0 0 1 90.496 0z"/></svg></a>
<form action="medium.php" method="post" class="price">
    <h2>Medium-Angebot</h2>

    <label for="name">Name:</label><br>
    <input type="text" id="name" name="name" required><br>

    <label for="email">Email:</label><br>
    <input type="email" id="email" name="email" required><br>

    <label for="cores">CPU Cores:</label><br>
    <select id="cores" name="cores">

        <option value="4">4 (18 CHF)</option>
        <option value="8">8 (30 CHF)</option>

    </select><br>

    <label for="ram">RAM (MB):</label><br>
    <select id="ram" name="ram">
      
        <option value="32768">32'768 (320 CHF)</option>
        <option value="65536">65'536 (640 CHF)</option>

    </select><br>

    <label for="ssd">SSD (GB):</label><br>
    <select id="ssd" name="ssd">
        
        <option value="4000">4'000 (2'000 CHF)</option>
        <option value="8000">8'000 (4'000 CHF)</option>

    </select><br>

    <input type="submit" name="bestellen" value="bestellen">
    <br>
</form>
<br>
<br>
<br>

<?php
if (isset($_POST['bestellen'])) {

    $kerne = $_POST['cores'];
    $ram = $_POST['ram'];
    $ssd = $_POST['ssd'];
    $name = $_POST["name"];
    $email = $_POST["email"];

    $priceCores = 0;
    $priceRam = 0;
    $PriceSsd = 0;

    $kernPreise = [1 => 5, 2 => 10, 4 => 18, 8 => 30, 16 => 45];

    $ramPreise = [512 => 5, 1024 => 10, 2048 => 20, 4096 => 40, 8192 => 80, 16384 => 160, 32768 => 320, 65536 => 640, 131072 => 1280];

    $ssdPreise = [10 => 5, 20 => 10, 40 => 20, 80 => 40, 240 => 120, 500 => 250, 1000 => 500, 2000 => 1000, 4000 => 2000, 8000 => 4000, 16000 => 8000];

    $preis = $kernPreise[$kerne] + $ramPreise[$ram] + $ssdPreise[$ssd];
    $zweiProzent = $preis / 100 * 2;
    $neuerPreis = $kernPreise[$kerne] + $ramPreise[$ram] + $ssdPreise[$ssd] + $zweiProzent;
    $klein = file('../server/klein.txt');
    $mittel = file('../server/medium.txt');
    $gross = file('../server/gross.txt');
    $daten = "Name: $name, E-Mail: $email, Preis: $neuerPreis CHF (PREMIUM ANGEBOT)\n";

    // Server-Spezifikationen
    $kleinServerSpezifikationen = ['kerne' => 4, 'ram' => 32768, 'ssd' => 4000];
    $mittelServerSpezifikationen = ['kerne' => 8, 'ram' => 65536, 'ssd' => 8000];
    $grossServerSpezifikationen = ['kerne' => 16, 'ram' => 131072, 'ssd' => 16000];

    // Prozentualen verfügbaren Platz für jeden Server berechnen
    $kleinServerPlatz = 100 - (count($klein) / .5) * 100;
    $mittelServerPlatz = 100 - (count($mittel) / 1) * 100;
    $grossServerPlatz = 100 - (count($gross) / 2) * 100;



    // Inhalt der Datei lesen

    $kleinServer = '../server/klein.txt';
    $mittelServer = '../server/medium.txt';
    $grossServer = '../server/gross.txt';



    function KundenVerlassen($grossServer)
    {
        // Planmäßige Löschung nach 30 Sekunden

        $zeitDerNutzung = range(2, 30);

        sleep((int)$zeitDerNutzung);
        // Den gesamten Inhalt der Datei löschen
        file_put_contents($grossServer,  '');

    }

    function KundenVerlassen1($mittelServer)
    {
        // Planmäßige Löschung nach 30 Sekunden
        $zeitDerNutzung = range(2, 30);

        sleep((int)$zeitDerNutzung);
        // Den gesamten Inhalt der Datei löschen
        file_put_contents($mittelServer,  '');

    }

    function KundenVerlassen2($kleinServer)
    {
        // Planmäßige Löschung nach 30 Sekunden

        $zeitDerNutzung = range(2, 30);
        sleep((int)$zeitDerNutzung);
        // Den gesamten Inhalt der Datei löschen
        file_put_contents($kleinServer,  '');

    }


    // Vergleich der verfügbaren Server und der Eingabe des Kunden
    if ($kerne <= $kleinServerSpezifikationen['kerne'] && $ram <= $kleinServerSpezifikationen['ram'] && $ssd <= $kleinServerSpezifikationen['ssd'] && $kleinServerPlatz > 0) {
        file_put_contents('../server/klein.txt', $daten, FILE_APPEND);
        echo '<div id="antworten">';
        echo "Vielen Dank, dass Sie OmniCloud gewählt haben! - Ihre Cloud für $neuerPreis CHF/Monat wurde bestellt. <br>";
        echo "Der Preis setzt sich folgendermassen zusammen: Kerne: $kernPreise[$kerne] + RAM: $ramPreise[$ram] + SSD: $ssdPreise[$ssd] + 2% = $neuerPreis CHF/Monat ";
        echo "Ihre Cloud wurde auf dem Kleinen Server platziert.\n";
        echo "Verfügbarer Platz (Prozentsatz):\n";
        echo "Kleiner Server: {$kleinServerPlatz}%\n";
        echo "Mittlerer Server: {$mittelServerPlatz}%\n";
        echo "Großer Server: {$grossServerPlatz}%\n";
        echo KundenVerlassen($kleinServer);
        echo KundenVerlassen1($mittelServer);
        echo KundenVerlassen2($grossServer);
        echo '</div>';

    } elseif ($kerne <= $mittelServerSpezifikationen['kerne'] && $ram <= $mittelServerSpezifikationen['ram'] && $ssd <= $mittelServerSpezifikationen['ssd'] && $mittelServerPlatz > 0) {
        file_put_contents('../server/medium.txt', $daten, FILE_APPEND);
        echo '<div id="antworten">';
        echo "Vielen Dank, dass Sie OmniCloud gewählt haben! - Ihre Cloud für $neuerPreis CHF/Monat wurde bestellt. <br>";
        echo "Der Preis setzt sich folgendermassen zusammen: Kerne: $kernPreise[$kerne] + RAM: $ramPreise[$ram] + SSD: $ssdPreise[$ssd] + 2% = $neuerPreis CHF/Monat ";
        echo "Ihre Cloud wurde auf dem Mittleren Server platziert.\n";
        echo "Verfügbarer Platz (Prozentsatz):\n";
        echo "Kleiner Server: {$kleinServerPlatz}%\n";
        echo "Mittlerer Server: {$mittelServerPlatz}%\n";
        echo "Großer Server: {$grossServerPlatz}%\n";
        echo KundenVerlassen($kleinServer);
        echo KundenVerlassen1($mittelServer);
        echo KundenVerlassen2($grossServer);
        echo '</div>';

    } elseif ($kerne <= $grossServerSpezifikationen['kerne'] && $ram <= $grossServerSpezifikationen['ram'] && $ssd <= $grossServerSpezifikationen['ssd'] && $grossServerPlatz > 0) {
        file_put_contents('../server/gross.txt', $daten, FILE_APPEND);
        echo '<div id="antworten">';
        echo "Vielen Dank, dass Sie OmniCloud gewählt haben! - Ihre Cloud für $neuerPreis CHF/Monat wurde bestellt. <br>";
        echo "Der Preis setzt sich folgendermassen zusammen: Kerne: $kernPreise[$kerne] + RAM: $ramPreise[$ram] + SSD: $ssdPreise[$ssd] + 2% = $neuerPreis CHF/Monat ";
        echo "Ihre Cloud wurde auf dem Großen Server platziert.\n";
        echo "Verfügbarer Platz (Prozentsatz):\n";
        echo "Kleiner Server: {$kleinServerPlatz}%\n";
        echo "Mittlerer Server: {$mittelServerPlatz}%\n";
        echo "Großer Server: {$grossServerPlatz}%\n";
        echo KundenVerlassen($kleinServer);
        echo KundenVerlassen1($mittelServer);
        echo KundenVerlassen2($grossServer);
        echo '</div>';

    } else {
        echo '<div id="antworten">';
        echo "Leider haben wir keine Serverkapazität für Ihre Cloud - Versuchen Sie es später erneut";
        echo '</div>';
    }

}




?>

</main>
</body>
</html>