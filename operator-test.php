<?php
declare(strict_types=1);

function e(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

function rupiah(int $amount): string
{
    return 'Rp ' . number_format($amount, 0, ',', '.');
}

function boolText(bool $value): string
{
    return $value ? 'true' : 'false';
}

$fee          = 350000;
$participants = 2;

$subtotal           = $fee * $participants;
$comparisonPositive = $fee > 0;
$comparisonStrict   = $fee === 350000;
$message            = 'Biaya: ' . rupiah($fee);

$results = [
    'Perkalian'      => rupiah($subtotal),
    'Comparison > 0' => boolText($comparisonPositive),
    'Strict ==='     => boolText($comparisonStrict),
    'Concatenation'  => $message,
];
?>
<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Operator Test</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="utility-page">
    <main class="utility-card">
        <h1>Operator PHP</h1>

        <ul>
            <?php foreach ($results as $label => $value): ?>
                <li>
                    <span class="label"><?= e($label) ?></span>
                    <span class="value <?= in_array($value, ['true', 'false'], true) ? 'is-' . $value : '' ?>"><?= e($value) ?></span>
                </li>
            <?php endforeach; ?>
        </ul>

        <a href="fee-calculator.php">Kembali ke Kalkulator</a>
    </main>
</body>
</html>