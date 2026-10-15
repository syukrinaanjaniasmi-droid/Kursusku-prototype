<?php
$quota = 30;
$registered = 18;
$isFull = $registered >= $quota;
$hasSeat = $registered < $quota;
?>
<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Logic Test - KursusKu</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <main class="container utility-page">
        <section class="utility-card logic-card">
            <h1>Logic Test</h1>
            <p>Pengujian operator perbandingan pada kuota kursus.</p>

            <div class="logic-inputs">
                <span>Quota: <strong><?= $quota ?></strong></span>
                <span>Registered: <strong><?= $registered ?></strong></span>
            </div>

            <div class="logic-result">
                <h2>$isFull = $registered &gt;= $quota</h2>
                <pre class="dump"><?php var_dump($isFull); ?></pre>
            </div>

            <div class="logic-result">
                <h2>$hasSeat = $registered &lt; $quota</h2>
                <pre class="dump"><?php var_dump($hasSeat); ?></pre>
            </div>
        </section>
    </main>
</body>
</html>