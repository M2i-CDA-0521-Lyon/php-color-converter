<?php

/**
 * Représente une couleur
 */
class Color
{
    /**
     * Valeur du canal rouge
     * @var integer
     */
    public int $red;
    /**
     * Valeur du canal vert
     * @var integer
     */
    public int $green;
    /**
     * Valeur du canal bleu
     * @var integer
     */
    public int $blue;

    /**
     * Crée une nouvelle couleur
     *
     * @param integer $red Valeur du canal rouge
     * @param integer $green Valeur du canal vert
     * @param integer $blue Valeur du canal bleu
     */
    public function __construct(int $red, int $green, int $blue)
    {
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

        $this->red = $red;
        $this->green = $green;
        $this->blue = $blue;
    }

    /**
     * Génère un code hexadécimal en se basant sur les propriétés de la couleur
     *
     * @return string
     */
    function formatColorAsHex(): string
    {
        $red_h = dechex($this->red);
        if ($this->red < 16) {
            $red_h = '0' . $red_h;
        }
        $green_h = dechex($this->green);
        if ($this->green < 16) {
            $green_h = '0' . $green_h;
        }
        $blue_h = dechex($this->blue);
        if ($this->blue < 16) {
            $blue_h = '0' . $blue_h;
        }
        
        return $red_h . $green_h . $blue_h;
    }

    /**
     * Génère un code rgb() en se basant sur les propriétés de la couleur
     *
     * @return string
     */
    function formatColorAsRgb(): string {
        return 'rgb(' . $this->red . ',' . $this->green . ',' . $this->blue . ')';
    }    
}

function parseHexColor(string $hex): Color {
    $red_hex = substr($hex, 0, 2);    // Prend les 2 premiers caractères du code hexadécimal
    $green_hex = substr($hex, 2, 2);  // Prend les 2 caractères suivants du code hexadécimal
    $blue_hex = substr($hex, 4, 2);   // Prend les 2 derniers caractères du code hexadécimal
    $red = hexdec($red_hex);     // Convertit les 2 premiers caractères du code hexadécimal en décimal
    $green = hexdec($green_hex); // Convertit les 2 caractères suivants du code hexadécimal en décimal
    $blue = hexdec($blue_hex);   // Convertit les 2 dereniers caractères du code hexadécimal en décimal
    return new Color($red, $green, $blue);
}

function parseRgbColor(string $rgb): Color {
    $strippedRgb = substr($rgb, 4, strlen($rgb)-5); // Garde uniquement les caractères compris entre le cinquième et le dernier (exclus)
    $_rgb = explode(",", $strippedRgb);
    $red = $_rgb[0];
    $green = $_rgb[1];
    $blue = $_rgb[2];
    return new Color($red, $green, $blue);
}
