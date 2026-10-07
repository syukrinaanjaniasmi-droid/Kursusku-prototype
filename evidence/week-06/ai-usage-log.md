1. Pembuatan Test Matrix
 AI yang digunakan :Claude
Tujuan penggunaan
Membantu menyusun langkah pengujian 12 skenario pada test matrix.
### Contoh penggunaan

* Menyusun langkah pengujian untuk test 1 sampai 12.
* Membuat template `test-matrix.md` dan `test-matrix.txt` berisi kolom Input, Expect, Actual, Status, dan Fix.
* Menjelaskan cara menguji validasi nama kosong dan email salah.

### Contoh prompt

> "Buatkan langkah lengkap untuk tes matrik."

### Hasil
AI memberikan daftar langkah pengujian dan template yang kemudian saya isi sendiri dengan hasil pengujian aktual.
## 2. Perbaikan Tampilan Evidence
 Tujuan penggunaan
Membantu membuat tampilan test matrix dalam bentuk tabel agar bisa di-screenshot sebagai evidence.
Contoh penggunaan

* Membuat tabel HTML dengan kolom No, Skenario, Actual, Expected, dan Status.
* Menjelaskan cara membuka file dan mengambil screenshot menjadi `07-test-matrix.png`.
## 3. Debugging
### Tujuan penggunaan
Membantu menemukan penyebab halaman tidak tampil.
### Contoh penggunaan

* Memeriksa error 404 Not Found saat membuka halaman test matrix.

### Contoh prompt

> "Kenapa tidak muncul?"

### Hasil

AI menunjukkan bahwa nama file di URL (`tes-matrix.php`) tidak sama dengan nama file sebenarnya (`tes-matrik.php`). Setelah URL diperbaiki, halaman tampil.

---

## 4. Penjelasan Konsep

### Tujuan penggunaan

Membantu merangkum konsep yang harus dikuasai pada Tugas 3.

### Contoh penggunaan

* Perbedaan radio dan checkbox, serta alasan checkbox memakai `[]`.
* Fungsi `foreach`, percabangan diskon, operator `??`, dan `htmlspecialchars()`.

### Hasil

AI memberikan ringkasan konsep yang saya baca ulang dan jelaskan kembali dengan kata sendiri.

5. membantu membanun kode css yang baik

## 6. Catatan

AI digunakan sebagai alat bantu. Kode dan saran dari AI diperiksa dan disesuaikan kembali dengan proyek. Saya bertanggung jawab atas seluruh isi yang dikumpulkan dan dapat menjelaskannya sendiri.