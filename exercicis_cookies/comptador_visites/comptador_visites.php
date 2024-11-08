<?php
// Inicia sessió per emmagatzemar si s'ha aplicat descompte
session_start();

// Configura el comptador de visites utilitzant cookies
if (!isset($_COOKIE['contador_visites'])) {
    $contador = 1;
} else {
    $contador = $_COOKIE['contador_visites'] + 1;
}
setcookie('contador_visites', $contador, time() + (86400 * 30)); // Cookie que dura 30 dies

// Missatge de descompte segons el nombre de visites
$missatge = '';
if ($contador >= 10 && !isset($_SESSION['descompte_usat'])) {
    $missatge = "Oferta exclusiva sols per a tu! Utilitza el codi BOTIGA50 per obtenir un 50% de descompte en les teves primeres compres a la botiga.";
} elseif ($contador >= 5 && !isset($_SESSION['descompte_usat'])) {
    $missatge = "Oferta exclusiva! Utilitza el codi BOTIGA20 per obtenir un 20% de descompte en les teves primeres compres a la botiga.";
}

// Validació de codi de descompte
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $codi = $_POST['codi_descompte'];
    if ($codi == "BOTIGA20" || $codi == "BOTIGA50") {
        $_SESSION['descompte_usat'] = true;
        $missatge = "Descompte aplicat correctament!";
    } else {
        $missatge = "Codi de descompte no vàlid.";
    }
}
?>

<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>Comptador de Visites</title>
</head>
<body>
    <h1>Benvingut a la Botiga</h1>
    <p>Has visitat aquesta pàgina <?php echo $contador; ?> vegades.</p>
    <?php if ($missatge): ?>
        <p><?php echo $missatge; ?></p>
    <?php endif; ?>
    <form method="post" action="">
        <label for="codi_descompte">Introdueix el codi de descompte:</label>
        <input type="text" name="codi_descompte" id="codi_descompte">
        <button type="submit">Aplicar</button>
    </form>
    <button>Comprar</button>
</body>
</html>
