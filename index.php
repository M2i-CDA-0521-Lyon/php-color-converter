<?php

include 'utils/color.php';

// Si un code en hexadécimal a été passé
if (isset($_GET['hex'])) {
    $color = parseHexColor($_GET['hex']);
}

// Si un code sous forme rgb() a été passé
if (isset($_GET['rgb'])) {
    $color = parseRgbColor($_GET['rgb']);
}

// Si trois valeurs rouge, vert, bleu ont été passées
if (isset($_GET['red']) && isset($_GET['green']) && isset($_GET['blue'])) {
    $color = new Color($_GET['red'], $_GET['green'], $_GET['blue']);
}

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
                        <input name="hex-result" type="text" class="form-control" value="#<?= $color->formatColorAsHex() ?>" readonly />
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
                        <input name="rgb-result" type="text" class="form-control" value="<?= $color->formatColorAsRgb() ?>" readonly />
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
                        <input name="red-result" min="0" max="255" type="number" class="form-control" value="<?= $color->red ?>" readonly />
                        <div class="input-group-append">
                            <button class="btn btn-secondary" type="button"><i class="bi bi-clipboard"></i></button>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="green-result" class="form-label">Vert</label>
                    <div class="input-group copy-to-clipboard">
                        <input name="green-result" min="0" max="255" type="number" class="form-control" value="<?= $color->green ?>" readonly />
                        <div class="input-group-append">
                            <button class="btn btn-secondary" type="button"><i class="bi bi-clipboard"></i></button>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="blue-result" class="form-label">Bleu</label>
                    <div class="input-group copy-to-clipboard">
                        <input name="blue-result" min="0" max="255" type="number" class="form-control" value="<?= $color->blue ?>" readonly />
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