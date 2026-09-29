<?php

require_once __DIR__ . '/helpers.php';

$siteName = 'KursusKu UIN';

$tagline = 'Belajar, daftar, dan kelola kursus dalam satu tempat.';

$year = date('Y');

$courses = [

    [
        'code' => 'WEB-01',
        'name' => 'Web Dasar',
        'fee' => 200000,
        'quota' => 30,
        'registered' => 12,
        'start_date' => '2026-09-21',
    ],

    [
        'code' => 'PHP-01',
        'name' => 'PHP Dasar',
        'fee' => 250000,
        'quota' => 30,
        'registered' => 18,
        'start_date' => '2026-09-22',
    ],

    [
        'code' => 'PHP-02',
        'name' => 'PHP Lanjutan',
        'fee' => 300000,
        'quota' => 25,
        'registered' => 24,
        'start_date' => '2026-09-24',
    ],

    [
        'code' => 'LAR-01',
        'name' => 'Laravel Fundamental',
        'fee' => 350000,
        'quota' => 25,
        'registered' => 25,
        'start_date' => '2026-09-28',
    ],

    [
        'code' => 'DB-01',
        'name' => 'MySQL Dasar',
        'fee' => 275000,
        'quota' => 20,
        'registered' => 0,
        'start_date' => '2026-10-01',
    ],

    [
        'code' => 'UI-01',
        'name' => 'UI Web Dasar',
        'fee' => 225000,
        'quota' => 35,
        'registered' => 9,
        'start_date' => '2026-10-03',
    ],

];

?>

<!doctype html>
<html lang="id">

<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="assets/css/style.css">

    <title><?= htmlspecialchars($siteName) ?></title>

</head>

<body>

    <!-- ================= HEADER ================= -->

    <header class="site-header">

        <div class="container nav-wrap">

            <a class="brand" href="index.php">
                <?= htmlspecialchars($siteName) ?>
            </a>

            <nav aria-label="Navigasi utama">

                <a href="#katalog">Katalog</a>

                <a href="#pendaftaran">Pendaftaran</a>

            </nav>

        </div>

    </header>


    <main>

        <!-- ================= HERO ================= -->

        <section id="hero">

            <h1>
                <?= htmlspecialchars($tagline) ?>
            </h1>

            <p>
                Temukan kursus teknologi yang relevan untuk
                meningkatkan keterampilan Anda.
            </p>

            <div>

                <a href="#katalog">
                    Lihat Katalog Kursus
                </a>

                <a href="fee-calculator.php">
                    Lihat Estimasi Biaya
                </a>

            </div>

        </section>


        <!-- ================= KEUNGGULAN ================= -->

        <section id="keunggulan">

            <h2>Mengapa Memilih KursusKu?</h2>

            <article>

                <h3>Materi Terarah</h3>

                <p>
                    Materi disusun bertahap dari dasar hingga praktik.
                </p>

            </article>

            <article>

                <h3>Belajar dengan Proyek</h3>

                <p>
                    Setiap tahap menghasilkan bagian nyata dari aplikasi.
                </p>

            </article>

            <article>

                <h3>Pendampingan Praktik</h3>

                <p>
                    Mahasiswa belajar melalui demonstrasi,
                    latihan, dan evaluasi.
                </p>

            </article>

        </section>


        <!-- ================= KATALOG ================= -->

        <section id="katalog">

            <h2>Katalog Kursus</h2>

            <table>

                <thead>

                    <tr>

                        <th>Kode</th>

                        <th>Nama Kursus</th>

                        <th>Biaya</th>

                        <th>Mulai</th>

                        <th>Sisa Kursi</th>

                        <th>Status</th>

                    </tr>

                </thead>

                <tbody>

                    <?php foreach ($courses as $course): ?>

                        <?php

                        $status = statusKursus(
                            $course['quota'],
                            $course['registered']
                        );

                        $statusClass = $status === 'Penuh'
                            ? 'badge-full'
                            : 'badge-available';

                        ?>

                        <tr>

                            <td>
                                <?= htmlspecialchars($course['code']) ?>
                            </td>

                            <td>
                                <?= htmlspecialchars(trim($course['name'])) ?>
                            </td>

                            <td>
                                <?= rupiah($course['fee']) ?>
                            </td>

                            <td>
                                <?= formatTanggal($course['start_date']) ?>
                            </td>

                            <td>

                                <?= sisaKursi(
                                    $course['quota'],
                                    $course['registered']
                                ) ?>

                            </td>

                            <td>

                                <span class="<?= $statusClass ?>">
                                    <?= htmlspecialchars($status) ?>
                                </span>

                            </td>

                        </tr>

                    <?php endforeach; ?>

                </tbody>

            </table>

        </section>


        <!-- ================= ALUR PENDAFTARAN ================= -->

        <section id="alur">

            <h2>Cara Mendaftar</h2>

            <ol>

                <li>
                    Pilih kursus yang diminati.
                </li>

                <li>
                    Isi form pendaftaran.
                </li>

                <li>
                    Periksa kembali data.
                </li>

                <li>
                    Kirim pendaftaran dan tunggu konfirmasi.
                </li>

            </ol>

        </section>


        <!-- ================= FORM PENDAFTARAN ================= -->

        <section id="pendaftaran">

            <h2>Form Pendaftaran Kursus</h2>

            <div class="form-card">

                <form action="process-registration.php" method="post">

                    <div class="form-grid">

                        <!-- NAMA -->

                        <div class="form-group">

                            <label for="nama">
                                Nama Lengkap
                            </label>

                            <input
                                type="text"
                                id="nama"
                                name="name"
                                placeholder="Masukkan nama lengkap"
                                required
                            >

                        </div>


                        <!-- EMAIL -->

                        <div class="form-group">

                            <label for="email">
                                Email
                            </label>

                            <input
                                type="email"
                                id="email"
                                name="email"
                                placeholder="Masukkan email"
                                required
                            >

                        </div>

                    </div>


                    <div class="form-grid">

                        <!-- TELEPON -->

                        <div class="form-group">

                            <label for="telepon">
                                No. Telepon
                            </label>

                            <input
                                type="tel"
                                id="telepon"
                                name="phone"
                                placeholder="08xxxxxxxxxx"
                                required
                            >

                        </div>


                        <!-- PROGRAM STUDI -->

                        <div class="form-group">

                            <label for="program_studi">
                                Program Studi
                            </label>

                            <input
                                type="text"
                                id="program_studi"
                                name="study_program"
                                placeholder="Masukkan program studi"
                                required
                            >

                        </div>

                    </div>


                    <!-- KURSUS -->

                    <div class="form-group">

                        <label for="kursus">
                            Pilih Kursus
                        </label>

                        <select
                            id="kursus"
                            name="course"
                            required
                        >

                            <option value="">
                                -- Pilih Kursus --
                            </option>

                            <?php foreach ($courses as $course): ?>

                                <option value="<?= htmlspecialchars($course['code']) ?>">

                                    <?= htmlspecialchars($course['name']) ?>

                                </option>

                            <?php endforeach; ?>

                        </select>

                    </div>


                    <!-- JENIS KELAMIN -->

                    <fieldset class="form-group">

                        <legend>
                            Jenis Kelamin
                        </legend>

                        <label class="choice">

                            <input
                                type="radio"
                                name="gender"
                                value="Laki-laki"
                                required
                            >

                            Laki-laki

                        </label>


                        <label class="choice">

                            <input
                                type="radio"
                                name="gender"
                                value="Perempuan"
                            >

                            Perempuan

                        </label>

                    </fieldset>


                    <!-- JENIS PESERTA -->

                    <fieldset class="form-group">

                        <legend>
                            Jenis Peserta
                        </legend>

                        <label class="choice">

                            <input
                                type="radio"
                                name="participant_type"
                                value="mahasiswa"
                                required
                            >

                            Mahasiswa

                        </label>


                        <label class="choice">

                            <input
                                type="radio"
                                name="participant_type"
                                value="umum"
                            >

                            Umum

                        </label>

                    </fieldset>


                    <!-- MINAT TAMBAHAN -->

                    <fieldset class="form-group">

                        <legend>
                            Minat Tambahan
                        </legend>

                        <label class="choice">

                            <input
                                type="checkbox"
                                name="interests[]"
                                value="ui-ux"
                            >

                            UI/UX

                        </label>


                        <label class="choice">

                            <input
                                type="checkbox"
                                name="interests[]"
                                value="database"
                            >

                            Database

                        </label>


                        <label class="choice">

                            <input
                                type="checkbox"
                                name="interests[]"
                                value="backend"
                            >

                            Backend

                        </label>

                    </fieldset>


                    <!-- KETERANGAN -->

                    <div class="form-group">

                        <label for="pesan">
                            Keterangan
                        </label>

                        <textarea
                            id="pesan"
                            name="note"
                            rows="4"
                            placeholder="Tuliskan keterangan jika diperlukan..."
                        ></textarea>

                        <small class="help">

                            Pastikan data yang dimasukkan sudah benar.

                        </small>

                    </div>


                    <!-- BUTTON -->

                    <button
                        type="submit"
                        class="btn-primary"
                    >

                        Daftar Sekarang

                    </button>

                </form>

            </div>

        </section>


        <!-- ================= MEDIA ================= -->

        <section id="media">

            <h2>Kenali Program Kami</h2>

            <img
                src="assets/images/hero-kursus.jpg"
                alt="Mahasiswa sedang mengikuti kegiatan kursus komputer"
                width="640"
            >

            <h3>Video Singkat</h3>

            <video controls width="640">

                <source
                    src="assets/video/intro-kursus.mp4"
                    type="video/mp4"
                >

                Browser Anda tidak mendukung video HTML5.

            </video>

            <p>

                <a
                    href="https://www.php.net/"
                    target="_blank"
                    rel="noopener"
                >
                    Dokumentasi PHP
                </a>

            </p>

        </section>


        <!-- ================= KONTAK ================= -->

        <section id="kontak">

            <h2>Kontak</h2>

            <p>
                Email: syukrinaanjaniasmi@gmail.com
            </p>

            <p>
                Alamat: Tabek Panjang, Baso
            </p>

        </section>

    </main>


    <!-- ================= FOOTER ================= -->

    <footer>

        <small>
            © <?= $year ?>
            <?= htmlspecialchars($siteName) ?>
        </small>

    </footer>

</body>

</html>