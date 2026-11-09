<?php
require_once "funciones.php";

$raza = strtolower(trim($_GET["raza"] ?? ""));

$cantidad = (int)($_GET["cantidad"] ?? 5);
$permitidas = [5, 10, 20];

if (!in_array($cantidad, $permitidas, true)) {
    $cantidad = 5;
}

$imagenes = [];
$error = null;

if ($raza !== "" && !preg_match('/^[a-z]+$/', $raza)) {
    $error = "Escribe solo letras, sin números ni símbolos. Ejemplo: beagle.";
}

if ($error === null) {

    if ($raza === "") {
        $url = "https://dog.ceo/api/breeds/image/random/" . $cantidad;
    } else {
        $url = "https://dog.ceo/api/breed/"
             . urlencode($raza)
             . "/images/random/" . $cantidad;
    }

    $resultado = consumirApiGet($url);

    if (!$resultado["ok"]) {
        if ($resultado["codigo"] === 404) {
            $error = "La raza \"" . $raza . "\" no existe. Revisa el nombre e intenta de nuevo.";
        } else {
            $error = "No pudimos conectar con el servicio de perros. Intenta de nuevo en unos minutos.";
        }
    } else {
        $imagenes = $resultado["datos"]["message"] ?? [];

        if (!is_array($imagenes)) {
            $imagenes = [$imagenes];
        }

        if (count($imagenes) === 0) {
            $error = "No se encontraron imágenes para la raza indicada.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Perros por raza</title>
</head>
<body>

<h1>RAZAS DE PERROS</h1>

<form method="GET">

    <label>Raza:</label>

    <input
        type="text"
        name="raza"
        value="<?= htmlspecialchars($raza) ?>"
        placeholder="hound, beagle, pug, husky"
    >

    <label>Cantidad:</label>

    <select name="cantidad">
        <?php foreach ($permitidas as $opcion): ?>
            <option value="<?= $opcion ?>" <?= $opcion === $cantidad ? "selected" : "" ?>>
                <?= $opcion ?>
            </option>
        <?php endforeach; ?>
    </select>

    <button type="submit">
        Buscar
    </button>

</form>

<hr>

<?php if ($error): ?>

    <p><strong>Error:</strong> <?= htmlspecialchars($error) ?></p>

<?php elseif (count($imagenes) > 0): ?>

    <h2>
        <?= $raza === "" ? "PERROS" : "Raza: " . htmlspecialchars($raza) ?>
        (<?= count($imagenes) ?>)
    </h2>

    <?php foreach ($imagenes as $imagen): ?>

        <img
            src="<?= htmlspecialchars($imagen) ?>"
            alt="Imagen de perro"
            width="300"
        >

        <br><br>

    <?php endforeach; ?>

<?php endif; ?>

<br>

<a href="perros.php">Volver</a>
<br><br>
<a href="index.php">Menu</a>

</body>
</html>