<?php
$majoredat = $_COOKIE['majoredat'] ?? 'no';
$idioma = $_COOKIE['idioma'] ?? 'ca';
$moneda = $_COOKIE['moneda'] ?? 'eur';

$preu = 39;
$producte = "Les Terrasses";

if ($majoredat === 'no') {
    $missatge = ($idioma == 'ca') ? "No et podem vendre alcohol si ets menor d’edat." : 
                (($idioma == 'es') ? "No te podemos vender alcohol si eres menor de edad." : 
                "We cannot sell you alcohol if you are underage.");
} else {
    $missatge = ($idioma == 'ca') ? "T’oferim el vi $producte a un preu de $preu €." :
                (($idioma == 'es') ? "Te ofrecemos el vino $producte a un precio de $preu €." : 
                "We offer you the wine $producte at a price of $preu €.");
    if ($moneda == 'gbp') $preu *= 0.86;
    elseif ($moneda == 'usd') $preu *= 1.10;
    $missatge = str_replace("$preu €", number_format($preu, 2) . " " . strtoupper($moneda), $missatge);
}
?>

<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>Informació de la Bodega</title>
</head>
<body>
    <p><?php echo $missatge; ?></p>
</body>
</html>
