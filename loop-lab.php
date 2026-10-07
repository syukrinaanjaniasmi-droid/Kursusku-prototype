<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Perulangan PHP</title>
<style>
    * { box-sizing: border-box; margin: 0; padding: 0; }
    body {
        font-family: "Segoe UI", Arial, sans-serif;
        background: linear-gradient(135deg, #e0e7ff, #f5f3ff);
        min-height: 100vh;
        padding: 40px 20px;
        color: #1e293b;
    }
    h1 { text-align: center; margin-bottom: 30px; color: #3730a3; }
    .container {
        display: flex;
        flex-wrap: wrap;
        gap: 24px;
        justify-content: center;
    }
    .card {
        background: #fff;
        width: 300px;
        border-radius: 16px;
        box-shadow: 0 8px 24px rgba(0,0,0,.08);
        overflow: hidden;
    }
    .card h3 {
        padding: 14px 20px;
        color: #fff;
        letter-spacing: 1px;
        text-transform: uppercase;
        font-size: 16px;
    }
    .for h3      { background: #4f46e5; }
    .while h3    { background: #0891b2; }
    .dowhile h3  { background: #db2777; }
    .list { padding: 16px 20px; }
    .item {
        padding: 10px 14px;
        margin-bottom: 8px;
        background: #f1f5f9;
        border-left: 5px solid #94a3b8;
        border-radius: 8px;
        transition: transform .2s;
    }
    .item:hover { transform: translateX(6px); }
    .for .item     { border-left-color: #4f46e5; }
    .while .item   { border-left-color: #0891b2; }
    .dowhile .item { border-left-color: #db2777; }
</style>
</head>
<body>

<h1>Perulangan di PHP</h1>

<div class="container">

<?php
// ===== FOR =====
echo '<div class="card for"><h3>for</h3><div class="list">';
for ($i = 1; $i <= 5; $i++) {
    echo "<div class='item'>Pertemuan ke-$i</div>";
}
echo '</div></div>';

// ===== WHILE =====
echo '<div class="card while"><h3>while</h3><div class="list">';
$i = 1;
while ($i <= 5) {
    echo "<div class='item'>Nomor antrean: $i</div>";
    $i++;
}
echo '</div></div>';

// ===== DO-WHILE =====
echo '<div class="card dowhile"><h3>do-while</h3><div class="list">';
$i = 1;
do {
    echo "<div class='item'>Percobaan ke-$i</div>";
    $i++;
} while ($i <= 5);
echo '</div></div>';
?>

</div>
</body>
</html>