<?php

// Si un code en hexadécimal a été passé
if (isset($_GET['hex'])) {
    $hex = $_GET['hex'];
    // Convertit le code hexadécimal en valeurs rouge, vert, bleu
    $red_hex = substr($_GET['hex'], 0, 2);    // Prend les 2 premiers caractères du code hexadécimal
    $green_hex = substr($_GET['hex'], 2, 2);  // Prend les 2 caractères suivants du code hexadécimal
    $blue_hex = substr($_GET['hex'], 4, 2);   // Prend les 2 derniers caractères du code hexadécimal
    $red = hexdec($red_hex);     // Convertit les 2 premiers caractères du code hexadécimal en décimal
    $green = hexdec($green_hex); // Convertit les 2 caractères suivants du code hexadécimal en décimal
    $blue = hexdec($blue_hex);   // Convertit les 2 dereniers caractères du code hexadécimal en décimal
}

// Si un code sous forme rgb() a été passé
if (isset($_GET['rgb'])) {
    $rgb = $_GET['rgb'];
    // Convertit le code rgb() en valeurs rouge, vert, bleu
    $strippedRgb = substr($rgb, 4, strlen($rgb)-5); // Garde uniquement les caractères compris entre le cinquième et le dernier (exclus)
    $_rgb = explode(",", $strippedRgb);
    $red = $_rgb[0];
    $green = $_rgb[1];
    $blue = $_rgb[2];
}

// Si trois valeurs rouge, vert, bleu ont été passées
if (isset($_GET['red']) && isset($_GET['green']) && isset($_GET['blue'])) {
    $red = intval($_GET['red']);
    $green = intval($_GET['green']);
    $blue = intval($_GET['blue']);
}

// Vérifie que les trois valeurs sont bien comprises entre 0 et 255
if ($red < 0) {
    $red = 0;
} elseif ($red > 255) {
    $red = 255;
}

if ($green < 0) {
    $green = 0;
} elseif ($green> 255) {
    $green = 255;
}

if ($blue< 0) {
    $blue = 0;
} elseif ($blue > 255) {
    $blue = 255;
}

// Convertit les valeurs rouge, vert, bleu en code hexadécimal
$red_h = dechex($red);
if ($red < 16) {
    $red_h = '0' . $red_h;
}
$green_h = dechex($green);
if ($green < 16) {
    $green_h = '0' . $green_h;
}
$blue_h = dechex($blue);
if ($blue < 16) {
    $blue_h = '0' . $blue_h;
}

$hex = $red_h . $green_h . $blue_h;

// Convertit les valeurs rouge, vert, bleu en code rgb()
$rgb = 'rgb(' . $red . ',' . $green . ',' . $blue . ')';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Convertisseur de couleurs</title>
    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <!-- Scripts -->
    <script src="js/app.js"></script>
</head>
<body>
    <div class="container">
        <h1 class="mt-4 mb-4">Convertisseur de couleurs</h1>
        <div class="row">
            <div class="col-sm-4">
                <form>
                    <div class="mb-3">
                        <label for="hex" class="form-label">Code hexadécimal</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">#</span>
                            </div>
                            <input name="hex" type="text" class="form-control" placeholder="000000" />
                        </div>
                    </div>
                    <button class="btn btn-primary">Convertir</button>
                </form>
            </div>
            <div class="col-sm-4">
                <form>
                    <div class="mb-3">
                        <label for="rgb" class="form-label">Code RGB</label>
                        <input name="rgb" type="text" class="form-control" placeholder="rgb(0, 0, 0)" />
                    </div>
                    <button class="btn btn-primary">Convertir</button>
                </form>
            </div>
            <div class="col-sm-4">
                <form>
                    <div class="mb-3">
                        <label for="red" class="form-label">Rouge</label>
                        <input name="red" min="0" max="255" type="number" class="form-control" placeholder="0" />
                    </div>
                    <div class="mb-3">
                        <label for="green" class="form-label">Vert</label>
                        <input name="green" min="0" max="255" type="number" class="form-control" placeholder="0" />
                    </div>
                    <div class="mb-3">
                        <label for="blue" class="form-label">Bleu</label>
                        <input name="blue" min="0" max="255" type="number" class="form-control" placeholder="0" />
                    </div>
                    <button class="btn btn-primary">Convertir</button>
                </form>
            </div>
        </div>

        <h2>Résultat</h2>
        <div class="row">
            <div class="col-sm-4">
                <div class="mb-3">
                    <label for="hex-result" class="form-label">Code héxadécimal</label>
                    <div class="input-group copy-to-clipboard">
                        <input name="hex-result" type="text" class="form-control" value="#<?= $hex ?>" readonly />
                        <div class="input-group-append">
                            <button class="btn btn-secondary" type="button"><i class="bi bi-clipboard"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="mb-3">
                    <label for="rgb-result" class="form-label">Code RGB</label>
                    <div class="input-group copy-to-clipboard">
                        <input name="rgb-result" type="text" class="form-control" value="<?= $rgb ?>" readonly />
                        <div class="input-group-append">
                            <button class="btn btn-secondary" type="button"><i class="bi bi-clipboard"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="mb-3">
                    <label for="red-result" class="form-label">Rouge</label>
                    <div class="input-group copy-to-clipboard">
                        <input name="red-result" min="0" max="255" type="number" class="form-control" value="<?= $red ?>" readonly />
                        <div class="input-group-append">
                            <button class="btn btn-secondary" type="button"><i class="bi bi-clipboard"></i></button>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="green-result" class="form-label">Vert</label>
                    <div class="input-group copy-to-clipboard">
                        <input name="green-result" min="0" max="255" type="number" class="form-control" value="<?= $green ?>" readonly />
                        <div class="input-group-append">
                            <button class="btn btn-secondary" type="button"><i class="bi bi-clipboard"></i></button>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="blue-result" class="form-label">Bleu</label>
                    <div class="input-group copy-to-clipboard">
                        <input name="blue-result" min="0" max="255" type="number" class="form-control" value="<?= $blue ?>" readonly />
                        <div class="input-group-append">
                            <button class="btn btn-secondary" type="button"><i class="bi bi-clipboard"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>