<?php
// require __DIR__ . '/../vendor/autoload.php';

// use Mexitek\PHPColors\Color;

// // Pick a colour
// $color = new Color("#3498db"); // a blue

// echo "<p>Original:" . $color->getHex()."</p>";
// echo "<p>Lighten 20%:" . $color->lighten(20)."</p>";
// echo "<p>Darken 20%" . $color->darken(20)."</p>";
// echo "<p>Complement:" . $color->complementary()."</p>";
?>

<?php

require __DIR__ . '/vendor/autoload.php';

use Mexitek\PHPColors\Color;

// Default colour if none submitted
$baseHex = $_POST['base'] ?? '#3498db';
$lightDarkAmount = $_POST['amount'] ?? 10;



$color = new Color($baseHex);

$original = $color->getHex();
$lighter = $color->lighten($lightDarkAmount);
$darker  = $color->darken($lightDarkAmount);
$complement  = $color->complementary();

$colours = [
    ['label'=>'Original', 'hex' => $color->getHex()],
    ['label'=>'Lighter',  'hex' => $color->lighten($lightDarkAmount)],
    ['label'=>'Darker',  'hex' => $color->darken($lightDarkAmount)],
    ['label'=>'Complement',  'hex' => $color->complementary()]
];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>phpColors demo</title>
    <link href="./css/style.css" type="text/css" rel="stylesheet">
</head>
<body>

    <h1>phpColors demo</h1>

    <form action="<?php echo $_SERVER['PHP_SELF'] ?>"  method="post">
        <div class="form-ctrl">
        <label>Choose a base colour:
            <input type="color" name="base" value="<?php echo $baseHex; ?>">
        </label>
        </div>
        <div class="form-ctrl">
        <label>
            Choose an amount to lighten/darken by:
            <input type="number" name="amount" min="0" max="50" value="<?php echo $lightDarkAmount; ?>">
        </label>
    </div>
    <div class="form-ctrl">
            <button type="submit">Update</button>
    </div>
    </form>
    <h2>Hard-Coded Swatches</h2>
    <div class="swatch-holder">

        <div class="swatch">
            <div class="swatch-color" style="background:#<?php echo $original; ?>;"></div>
            <div class="swatch-info">
                <div class="swatch-name">Original</div>
                <div class="swatch-hex">#<?php echo $original ?></div>
            </div>
        </div>

         <div class="swatch">
            <div class="swatch-color" style="background:#<?php echo $lighter; ?>;"></div>
            <div class="swatch-info">
                <div class="swatch-name">Lighter</div>
                <div class="swatch-hex">#<?php echo $lighter ?></div>
            </div>
        </div>

         <div class="swatch">
            <div class="swatch-color" style="background:#<?php echo $darker; ?>;"></div>
            <div class="swatch-info">
                <div class="swatch-name">Darker</div>
                <div class="swatch-hex">#<?php echo $darker ?></div>
            </div>
        </div>
         <div class="swatch">
            <div class="swatch-color" style="background:#<?php echo $complement; ?>;"></div>
            <div class="swatch-info">
                <div class="swatch-name">Complement</div>
                <div class="swatch-hex">#<?php echo $complement ?></div>
            </div>
        </div>


    </div>

    <h2>Using a Loop</h2>
    <div class="swatch-holder">
        <?php 
        foreach ($colours as $colour){
            echo "<div class='swatch'>";
            echo "<div class='swatch-color' style='background:#{$colour['hex']}'></div>";
            echo "<div class='swatch-info'>";
            echo "<div class='swatch-name'>{$colour['label']}</div>";
            echo "<div class='swatch-hex'>#{$colour['hex']}</div>";
            echo "</div>";
            echo "</div>";
        }
        ?>
    </div> 

</body>
</html>


