<?php
session_start();
require_once __DIR__ . '/helpers.php';
require_once __DIR__ . '/data.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: register.php');
    exit;
}

$name            = trim($_POST['name'] ?? '');
$email           = trim($_POST['email'] ?? '');
$courseCode      = $_POST['course_code'] ?? '';
$participantType = $_POST['participant_type'] ?? '';
$learningMode    = $_POST['learning_mode'] ?? '';
$packageCount    = (int) ($_POST['package_count'] ?? 1);
$notes           = trim($_POST['notes'] ?? '');
$interests       = $_POST['interests'] ?? [];

if (!is_array($interests)) {
    $interests = [];
}
$interests = array_values(array_intersect($interests, array_keys($interestOptions)));

$errors = [];

if ($name === '') {
    $errors[] = 'Nama wajib diisi.';
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = 'Format email tidak valid.';
}
$course = findCourse($courses, (string) $courseCode);
if ($course === null) {
    $errors[] = 'Kursus tidak ditemukan.';
} elseif (statusKursus($course['quota'], $course['registered']) === 'Penuh') {
    $errors[] = 'Kursus yang dipilih sudah penuh.';
}
if (!in_array($participantType, ['mahasiswa', 'guru', 'umum'], true)) {
    $errors[] = 'Tipe peserta tidak valid.';
}
if (!in_array($learningMode, ['offline', 'online', 'hybrid'], true)) {
    $errors[] = 'Metode belajar tidak valid.';
}
if (!in_array($packageCount, [1, 2, 3], true)) {
    $errors[] = 'Jumlah paket tidak valid.';
}

if ($errors !== []) {
    ?>
    <!doctype html>
    <html lang="id">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <title>Data Belum Valid - KursusKu</title>
        <link rel="stylesheet" href="assets/css/style.css">
    </head>
    <body>
    <?php require __DIR__ . '/header.php'; ?>
    <main class="container">
        <h1>Data belum dapat diproses</h1>
        <ul>
            <?php foreach ($errors as $error): ?>
                <li><?= e($error) ?></li>
            <?php endforeach; ?>
        </ul>
        <a href="register.php">Kembali ke form</a>
    </main>
    </body>
    </html>
    <?php
    exit;
}
$discountPercent   = getDiscountPercent($participantType);
$grossTotal        = $course['fee'] * $packageCount;
$discountAmount    = intdiv($grossTotal * $discountPercent, 100);
$finalTotal        = $grossTotal - $discountAmount;
$learningModeLabel = getLearningModeLabel($learningMode);

$_SESSION['history'][] = [
    'name'   => $name,
    'course' => $course['name'],
    'total'  => $finalTotal,
];
?>

<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Ringkasan Pendaftaran - KursusKu</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<main class="container">
    <h1>Pendaftaran Berhasil Diproses</h1>
    <p><b>Nama:</b> <?= e($name) ?></p>
    <p><b>Email:</b> <?= e($email) ?></p>
    <p><b>Kursus:</b> <?= e($course['name']) ?></p>
    <p><b>Tipe peserta:</b> <?= e($participantType) ?></p>
    <p><b>Metode:</b> <?= e($learningModeLabel) ?></p>
    <p><b>Jumlah paket:</b> <?= $packageCount ?></p>
    <?php if ($notes !== ''): ?>
        <p><b>Catatan:</b> <?= e($notes) ?></p>
    <?php endif; ?>

    <h2>Rincian Biaya</h2>
    <p>Subtotal: <?= rupiah($grossTotal) ?></p>
    <p>Diskon: <?= $discountPercent ?>% (-<?= rupiah($discountAmount) ?>)</p>
    <p><b>Total akhir: <?= rupiah($finalTotal) ?></b></p>

    <h2>Minat</h2>
    <ul>
        <?php if ($interests === []): ?>
            <li>Belum memilih minat.</li>
        <?php else: ?>
            <?php foreach ($interests as $interest): ?>
                <li><?= e($interestOptions[$interest] ?? $interest) ?></li>
            <?php endforeach; ?>
        <?php endif; ?>
    </ul>

    <a href="register.php">Daftar lagi</a>
    
</main>
</body>
</html>