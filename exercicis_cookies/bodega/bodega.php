<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    setcookie('majoredat', $_POST['majoredat'], time() + (86400 * 30));
    setcookie('idioma', $_POST['idioma'], time() + (86400 * 30));
    setcookie('moneda', $_POST['moneda'], time() + (86400 * 30));
    header("Location: info.php"); // Redirigeix a la pàgina d'informació
    exit;
}
?>

<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>Bodega</title>
</head>
<body>
    <h1>Benvingut a la Bodega</h1>
    <form method="post" action="">
        <label>Ets major d'edat?</label>
        <select name="majoredat">
            <option value="sí">Sí</option>
            <option value="no">No</option>
        </select>
        <br>
        <label>Idioma:</label>
        <select name="idioma">
            <option value="ca">Català</option>
            <option value="es">Espanyol</option>
            <option value="en">Anglès</option>
        </select>
        <br>
        <label>Moneda:</label>
        <select name="moneda">
            <option value="eur">Euros</option>
            <option value="gbp">Lliures</option>
            <option value="usd">Dòlars</option>
        </select>
        <br>
        <button type="submit">Enviar</button>
    </form>
</body>
</html>
