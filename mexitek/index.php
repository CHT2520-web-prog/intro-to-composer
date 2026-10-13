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

require __DIR__ . '/../vendor/autoload.php';

use Mexitek\PHPColors\Color;

// Default colour if none submitted
$baseHex = $_POST['base'] ?? '#3498db';

// Normalise input (ensure it starts with #)
if ($baseHex && $baseHex[0] !== '#') {
    $baseHex = '#' . $baseHex;
}

$color = new Color($baseHex);

$variants = [
    'Original'    => $color->getHex(),
    'Lighten 20%' => $color->lighten(20),
    'Darken 20%'  => $color->darken(20),
    'Complement'  => $color->complementary(),
];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>phpColors demo</title>
    <style>
        body {
            font-family: system-ui, sans-serif;
            margin: 2rem;
            background: #f5f5f5;
        }
        form {
            margin-bottom: 2rem;
            padding: 1rem;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.08);
        }
        .swatches {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
            gap: 1rem;
        }
        .swatch {
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.08);
            overflow: hidden;
        }
        .swatch-color {
            height: 80px;
        }
        .swatch-info {
            padding: 0.75rem 1rem;
        }
        .swatch-name {
            font-weight: 600;
            margin-bottom: 0.25rem;
        }
        .swatch-hex {
            font-family: monospace;
            color: #555;
        }
    </style>
</head>
<body>

    <h1>phpColors demo</h1>

    <form method="post">
        <label>
            Choose a base colour:
            <input type="color" name="base" value="<?= htmlspecialchars($baseHex, ENT_QUOTES) ?>">
        </label>
        <button type="submit">Update</button>
    </form>

    <div class="swatches">
        <?php foreach ($variants as $label => $hex): ?>
            <div class="swatch">
                <div class="swatch-color" style="background:#<?php echo $hex; ?>;"></div>
                <div class="swatch-info">
                    <div class="swatch-name"><?php echo $label; ?></div>
                    <div class="swatch-hex">#<?php echo $hex ?></div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

</body>
</html>


