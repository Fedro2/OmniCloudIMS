<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../input.css">
    <title>Preise-Seite</title>
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

<main>
    <a href="../pages/index.php"><svg class="arrow" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 1024 1024"><path fill="#0484b5" d="M685.248 104.704a64 64 0 0 1 0 90.496L368.448 512l316.8 316.8a64 64 0 0 1-90.496 90.496L232.704 557.248a64 64 0 0 1 0-90.496l362.048-362.048a64 64 0 0 1 90.496 0z"/></svg></a>
    <h3>Unsere Preise</h3>
    <p style="font-size: 1.5rem">Die vergleichbar besten Preise, die Sie in dem IaaS-Cloud Markt finden können! Wählen Sie zwischen 4 verschiedenen Boxen und bestellen Sie noch heute Ihre Cloud.</p>



    <form action="preise.php" method="post">
        <div class="options">

    <div>
        <h3 class="size">Small</h3>
        <h2>15 - 2'338 CHF/Monat</h2>
        <p>CPU: 1 - 4 Cores</p>
        <p>RAM: 512 MB - 32'768 MB</p>
        <p>SSD: 10 GB - 4'000 GB</p>        
        <input type="button" value="Bestellen" onclick="location.href='small.php';">
    </div>

    <div>
        <h3 class="size">Medium</h3>
        <h2>2'338 - 4'670 CHF/Monat</h2>
        <p>CPU: 4 - 8 Cores</p>
        <p>RAM: 32'768 MB - 65'536 MB</p>
        <p>SSD: 4'000 GB - 8'000 GB</p>
        <input type="button" value="Bestellen" onclick="location.href='medium.php';">

    </div>

    <div>
        <h3 class="size">Big</h3>
        <h2>4'670 - 9'325 CHF/Monat</h2>
        <p>CPU: 8 - 16 Cores</p>
        <p>RAM: 65'536 MB - 131'072 MB</p>
        <p>SSD: 8'000 GB - 16'000 GB</p>
        <input type="button" value="Bestellen" onclick="location.href='big.php';">
    </div>

    <div>
        <h3 class="size">Premium</h3>
        <h2>15 - 9'325 CHF/Monat + 2% Zusatzgebühren</h2>
        <p>CPU: 1 - 16 Cores</p>
        <p>RAM: 512 MB - 131'072 MB</p>
        <p>SSD: 10 GB - 16'000 GB</p>
        <input type="button" value="Bestellen" onclick="location.href='premium.php';">
    </div>

            <p style="text-align: center">Wir erheben 2% Zusatzgebühren bei der Wahl der Premium-Box, da wir einen grösseren Aufwand bei der Speicherung haben.</p>
        </div>
    </form>
    


        </main>
    
</body>
</html>