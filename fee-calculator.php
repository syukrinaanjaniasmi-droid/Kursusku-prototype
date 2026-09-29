<?php
$courseName = 'Laravel Fundamental';
$fee = 2500000;
$participantCount = 3;
$discountPercent = 10;
$adminFee = 50000;
$isActive = true;

$subtotal = $fee * $participantCount;
$discount = intdiv($subtotal * $discountPercent, 100);
$total = $subtotal - $discount + $adminFee;
?>
<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kalkulator Biaya KursusKu</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="calculator-page">
        <div class="calculator-card">
            <h1>Kalkulator Estimasi Biaya</h1>
            <p>Kursus: <strong><?= $courseName ?></strong></p>

            <table class="fee-table">
                <thead>
                    <tr><th>Komponen</th><th>Nilai</th></tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Biaya per peserta</td>
                        <td>Rp <?= number_format($fee, 0, ',', '.') ?></td>
                    </tr>
                    <tr>
                        <td>Jumlah peserta</td>
                        <td><?= $participantCount ?></td>
                    </tr>
                    <tr>
                        <td>Subtotal</td>
                        <td>Rp <?= number_format($subtotal, 0, ',', '.') ?></td>
                    </tr>
                    <tr class="row-discount">
                        <td>Diskon (<?= $discountPercent ?>%)</td>
                        <td>- Rp <?= number_format($discount, 0, ',', '.') ?></td>
                    </tr>
                    <tr>
                        <td>Biaya admin</td>
                        <td>Rp <?= number_format($adminFee, 0, ',', '.') ?></td>
                    </tr>
                    <tr class="row-total">
                        <td>Total akhir</td>
                        <td>Rp <?= number_format($total, 0, ',', '.') ?></td>
                    </tr>
                </tbody>
            </table>

            <a href="index.php" class="btn-link">Kembali ke Beranda Kursusku</a>
        </div>
    </div>
</body>
</html>