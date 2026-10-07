<?php
session_start();
require_once __DIR__ . '/helpers.php';

$history = [
    ['name' => 'Alya',  'course' => 'Web Dasar',     'total' => 160000],
    ['name' => 'Bima',  'course' => 'PHP Dasar',     'total' => 212500],
    ['name' => 'Citra', 'course' => 'Laravel Dasar', 'total' => 350000],
];
$history = array_merge($history, $_SESSION['history'] ?? []);
?>

<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>History Dummy - KursusKu</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    
<main class="container">
    <h1>History Pendaftaran (Dummy)</h1>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Kursus</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($history as $index => $item): ?>
                <tr>
                    <td><?= $index + 1 ?></td>
                    <td><?= e($item['name']) ?></td>
                    <td><?= e($item['course']) ?></td>
                    <td><?= rupiah($item['total']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="extra-actions">
        <a href="index.php" class="btn-secondary">Beranda</a>
        <a href="register.php" class="btn-secondary">Daftar Kursus</a>
    </div>
</main>

</body>
</html>