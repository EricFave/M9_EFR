<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Comptador de Visites</title>
</head>
<body>
    <h1>Botiga</h1>
<?php

if (isset($_COOKIE['visita'])) {
    	$visites = $_COOKIE['visita'] + 1;
	setcookie('visita', $visites, time() + 3600); //1hora
	echo "Es la teva visita numero " . $visites; 
} else {
    	$visites = 1;
	setcookie('visita', $visites, time() + 3600);
	echo "Es la teva primera visita.";
}
$missatge = '';
if ($visites >= 10 && !isset($_SESSION['descompte_usat'])) {
    $missatge = "Oferta exclusiva sols per a tu! Utilitza el codi BOTIGA50 per obtenir un 50% de descompte en les teves primeres compres a la botiga.";
} elseif ($visites >= 5 && !isset($_SESSION['descompte_usat'])) {
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
    <?php if ($missatge): ?>
        <p><?php echo $missatge; ?></p>
    <?php endif; ?>
    <form method="post" action="">
        <label for="codi_descompte">Introdueix el codi de descompte:</label>
        <input type="text" name="codi_descompte" id="codi_descompte">
        <button type="submit">Aplicar</button>
    </form>
</body>
</html>
