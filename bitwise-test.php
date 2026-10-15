<?php

declare(strict_types=1);

$READ   = 1;
$WRITE  = 2;
$DELETE = 4;

$permission = $READ | $WRITE;

$canRead   = ($permission & $READ) === $READ;
$canWrite  = ($permission & $WRITE) === $WRITE;
$canDelete = ($permission & $DELETE) === $DELETE;

$rows = [
    ['READ',   $READ,   $canRead],
    ['WRITE',  $WRITE,  $canWrite],
    ['DELETE', $DELETE, $canDelete],
];

function biner(int $n): string
{
    return str_pad(decbin($n), 3, '0', STR_PAD_LEFT);
}
?>
<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bitwise Test - KursusKu</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="utility-page">
<main class="utility-card wide-card">
    <span class="eyebrow">PENGUJIAN OPERATOR</span>
    <h1>Bitwise Permission Test</h1>
    <p>
        Izin gabungan: <code>$permission = $READ | $WRITE</code>
        = <strong><?= $permission ?></strong> (biner <code><?= biner($permission) ?></code>)
    </p>

    <div class="table-wrap">
        <table class="perm-table">
            <thead>
            <tr><th>Izin</th><th>Nilai</th><th>Biner</th><th>Hasil</th><th>Status</th></tr>
            </thead>
            <tbody>
            <?php foreach ($rows as [$nama, $nilai, $boleh]): ?>
                <tr>
                    <td><?= $nama ?></td>
                    <td><?= $nilai ?></td>
                    <td><?= biner($nilai) ?></td>
                    <td><?= $boleh ? 'true' : 'false' ?></td>
                    <td>
                        <span class="status <?= $boleh ? 'status-ok' : 'status-no' ?>">
                            <?= $boleh ? 'Diizinkan' : 'Ditolak' ?>
                        </span>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <p class="output-label">Output <code>var_dump</code>:</p>
    <pre><?php var_dump($canRead, $canWrite, $canDelete); ?></pre>

    <a class="button" href="index.php">Kembali</a>
</main>
</body>
</html>