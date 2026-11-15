# Praktikum 7 PHP 

Repository ini disusun untuk memenuhi tugas **Praktikum 7 - PHP** pada mata kuliah Pemrograman Web.

**Identitas Mahasiswa:**
- **Nama:** Gama Daya Laksana
- **NIM:** 312510051
- **Kelas:** I253A
- **Program Studi:** Teknik Informatika
- **Dosen Pengampu:** Agung Nugroho, S.Kom., M.Kom.
- **Kampus:** Universitas Pelita Bangsa

---


## Tujuan

Proyek ini berisi latihan dasar PHP untuk menampilkan konten dinamis, mengolah variabel dan perhitungan, menggunakan percabangan, perulangan, array, fungsi, serta memproses formulir dengan metode GET dan POST. Proyek juga mencontohkan validasi input dan menampilkan kembali data dengan aman.

## Perangkat yang dibutuhkan

- PHP 7 atau lebih baru.
- Server web lokal, misalnya Laragon (Apache) atau server bawaan PHP.
- Browser web.
- Editor kode, misalnya Visual Studio Code.

## Cara menjalankan server lokal

### Menggunakan Laragon

1. Letakkan folder proyek `lab7_php` di dalam direktori `www` Laragon.
2. Jalankan Laragon dan mulai layanan web (Apache).
3. Buka halaman berikut di browser:
   - `http://localhost/lab7_php/index.php` untuk latihan PHP.
   - `http://localhost/lab7_php/test.php` untuk formulir data mahasiswa.

### Menggunakan server bawaan PHP

1. Buka terminal di folder proyek.
2. Jalankan:

   ```bash
   php -S localhost:8000
   ```

3. Buka `http://localhost:8000/index.php` atau `http://localhost:8000/test.php` di browser.
4. Hentikan server dengan menekan `Ctrl+C` di terminal.

## Struktur file

```text
lab7_php/
├── README.md       # Panduan proyek dan ringkasan tiap latihan
├── index.php       # Kumpulan latihan dasar PHP dan formulir
├── test.php        # Formulir, validasi, dan ringkasan data mahasiswa
└── screenshots/    # Folder untuk capture hasil di browser (ditambahkan sendiri)
```

## Ringkasan hasil

### `index.php`

#### Latihan 1 — Menjalankan PHP

Menunjukkan bahwa PHP berhasil dijalankan di server dan menampilkan waktu server saat halaman dibuka.

```html
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Praktikum PHP</title>
</head>
<body>
    <h1>Belajar PHP</h1>
    <!-- PHP menampilkan status dan waktu server di sini -->
</body>
</html>
```

```php
echo "<p>PHP berhasil dijalankan.</p>";
echo "<p>Waktu server: " . date("d-m-Y H:i:s") . "</p>";
```

**Capture hasil di browser**

![Hasil Latihan 1 di browser](screenshots/latihan-1-hasil.png)

#### Latihan 2 — Variabel, operator, dan percabangan

Menggunakan data nilai tugas, UTS, dan UAS untuk menghitung nilai akhir berbobot (30%, 30%, dan 40%). Percabangan menentukan predikat berdasarkan nilai akhir. Dengan data contoh, hasilnya 82,90 dengan predikat B.

```php
$nama = "Siti";
$tugas = 95;
$uts = 88;
$uas = 70;
$nilaiAkhir = ($tugas * 0.30) + ($uts * 0.30) + ($uas * 0.40);

if ($nilaiAkhir >= 85) {
    $predikat = "A";
} elseif ($nilaiAkhir >= 75) {
    $predikat = "B";
} elseif ($nilaiAkhir >= 60) {
    $predikat = "C";
} else {
    $predikat = "D";
}

echo "Nama: " . htmlspecialchars($nama) . "<br>";
echo "Nilai akhir: " . number_format($nilaiAkhir, 2) . "<br>";
echo "Predikat: " . $predikat;
```

**Capture hasil di browser**

![Hasil Latihan 2 di browser](screenshots/latihan-2-hasil.png)

#### Latihan 3 — Perulangan dan array

Menyimpan nama mahasiswa dalam array lalu menggunakan `foreach` untuk menampilkan daftar bernomor.

```php
$mahasiswa = ["Alya", "Bima", "Citra", "Doni", "Prabs", "Tedds", "Mulyono"];
echo "<h3>Daftar Mahasiswa</h3><ol>";
foreach ($mahasiswa as $nama) {
    echo "<li>" . htmlspecialchars($nama) . "</li>";
}
echo "</ol>";
```

**Capture hasil di browser**

![Hasil Latihan 3 di browser](screenshots/latihan-3-hasil.png)

#### Latihan 4 — Membuat fungsi

Mendemonstrasikan fungsi untuk menghitung harga setelah diskon dan fungsi untuk menghitung luas persegi panjang. Contoh yang ditampilkan adalah diskon 10% dari Rp150.000 (harga akhir Rp135.000) dan luas dengan panjang 10 serta lebar 5 (hasil 50).

```php
function hitungDiskon($harga, $persen)
{
    $potongan = $harga * ($persen / 100);
    return $harga - $potongan;
}

$hargaAkhir = hitungDiskon(150000, 10);
echo "Harga setelah diskon: Rp" . number_format($hargaAkhir, 0, ",", ".") . "<br>";

function hitungLuasPersegiPanjang($panjang, $lebar)
{
    return $panjang * $lebar;
}

$luas = hitungLuasPersegiPanjang(10, 5);
echo "Panjang: 10<br>";
echo "Lebar: 5<br>";
echo "Luas Persegi Panjang: " . $luas;
```

**Capture hasil di browser**

![Hasil Latihan 4 di browser](screenshots/latihan-4-hasil.png)

#### Latihan 5 — Memproses formulir dengan GET

Menerima kata kunci dari formulir melalui parameter GET, kemudian menampilkan kembali kata kunci tersebut setelah membuang spasi di awal dan akhir.

HTML formulir GET:

```html
<form method="GET" action="">
    <label for="kata">Kata kunci:</label>
    <input id="kata" name="kata" type="text">
    <button type="submit">Cari</button>
</form>
```

```php
if (isset($_GET["kata"])) {
    $kata = trim($_GET["kata"]);
    echo "Kata kunci: " . htmlspecialchars($kata, ENT_QUOTES, "UTF-8");
}
```

**Capture hasil di browser**

![Hasil Latihan 5 di browser](screenshots/latihan-5-hasil.png)

#### Latihan 6 — Memproses formulir dengan POST

Menerima nama dan program studi melalui POST. Jika keduanya terisi, halaman menampilkan data yang diterima; jika tidak, halaman menampilkan pesan bahwa semua kolom wajib diisi.

HTML formulir POST:

```html
<form method="POST" action="">
    <label for="nama">Nama:</label>
    <input id="nama" name="nama" type="text" required>
    <label for="prodi">Program Studi:</label>
    <input id="prodi" name="prodi" type="text" required>
    <button type="submit" name="kirim">Kirim Data</button>
</form>
```

```php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nama = trim($_POST["nama"] ?? "");
    $prodi = trim($_POST["prodi"] ?? "");

    if ($nama === "" || $prodi === "") {
        echo "<p>Semua kolom wajib diisi.</p>";
    } else {
        echo "<h3>Data diterima</h3>";
        echo "Nama: " . htmlspecialchars($nama, ENT_QUOTES, "UTF-8") . "<br>";
        echo "Program Studi: " . htmlspecialchars($prodi, ENT_QUOTES, "UTF-8");
    }
}
```

**Capture hasil di browser**

![Hasil Latihan 6 di browser](screenshots/latihan-6-hasil.png)

#### Latihan 7 — Pengolahan data sederhana

Menerima nama barang, harga, dan jumlah. Program memeriksa input, menghitung subtotal dari harga dikali jumlah, lalu menampilkan hasilnya atau pesan kesalahan.

HTML formulir barang:

```html
<form method="POST">
    <label>Nama barang <input name="barang" required></label>
    <label>Harga <input name="harga" type="number" min="0" step="0.01" required></label>
    <label>Jumlah <input name="jumlah" type="number" min="1" step="1" required></label>
    <button type="submit">Hitung</button>
</form>
```

```php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $barang = trim($_POST["barang"] ?? "");
    $hargaInput = $_POST["harga"] ?? "";
    $jumlahInput = $_POST["jumlah"] ?? "";

    if (
        $barang === "" || !is_numeric($hargaInput) ||
        !ctype_digit((string) $jumlahInput) ||
        (float) $hargaInput < 0 || (int) $jumlahInput < 1
    ) {
        $error = "Periksa kembali nama barang, harga, dan jumlah.";
    } else {
        $harga = (float) $hargaInput;
        $jumlah = (int) $jumlahInput;
        $subtotal = $harga * $jumlah;
    }
}

if (isset($error)) {
    echo "<p>" . htmlspecialchars($error) . "</p>";
} elseif (isset($subtotal)) {
    echo "<p>Barang: " . htmlspecialchars($barang) . "</p>";
    echo "<p>Subtotal: Rp" . number_format($subtotal, 0, ",", ".") . "</p>";
}
```

**Capture hasil di browser**

![Hasil Latihan 7 di browser](screenshots/latihan-7-hasil.png)

### `test.php` — Formulir data mahasiswa

Formulir ini memvalidasi nama, NIM (tepat 10 digit), program studi, semester (bilangan 1–14), dan format email. Jika input valid, halaman menampilkan ringkasan data mahasiswa. Jika tidak valid, halaman menunjukkan pesan kesalahan dan mempertahankan nilai yang sudah diinput.

HTML form mahasiswa (nilai input diisi kembali oleh PHP saat validasi gagal):

```html
<form method="POST" action="">
    <label for="nama">Nama Lengkap:</label>
    <input type="text" id="nama" name="nama" value="<?php echo htmlspecialchars($nama); ?>">

    <label for="nim">NIM:</label>
    <input type="text" id="nim" name="nim" value="<?php echo htmlspecialchars($nim); ?>">

    <label for="prodi">Program Studi:</label>
    <input type="text" id="prodi" name="prodi" value="<?php echo htmlspecialchars($prodi); ?>">

    <label for="semester">Semester (1–14):</label>
    <input type="text" id="semester" name="semester" value="<?php echo htmlspecialchars($semesterInput); ?>">

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>">

    <button type="submit">Kirim Data</button>
    <button type="reset">Reset Form</button>
</form>
```

HTML ringkasan saat seluruh data valid:

```html
<div class="success-box">
    <h3>Ringkasan Data Mahasiswa</h3>
    <p><strong>Nama:</strong> Siti</p>
    <p><strong>NIM:</strong> 1234567890</p>
    <p><strong>Program Studi:</strong> Sistem Informasi</p>
    <p><strong>Semester:</strong> 3</p>
    <p><strong>Email:</strong> siti@example.com</p>
</div>
```

PHP memproses dan memvalidasi nilai form:

```php
if ($nama === "") {
    $error[] = "Nama wajib diisi.";
}
if ($nim === "") {
    $error[] = "NIM wajib diisi.";
} elseif (!ctype_digit($nim) || strlen($nim) !== 10) {
    $error[] = "NIM harus berupa angka dan persis 10 digit.";
}
if ($prodi === "") {
    $error[] = "Program studi wajib diisi.";
}
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $error[] = "Format email tidak valid.";
}
if (!ctype_digit((string) $semesterInput) || (int) $semesterInput < 1 || (int) $semesterInput > 14) {
    $error[] = "Semester harus berupa angka bulat antara 1–14.";
}

if (!$error) {
    $data = compact("nama", "nim", "prodi", "email");
    $data["semester"] = (int) $semesterInput;
}
```

**Capture hasil di browser**

![Hasil formulir mahasiswa di browser](screenshots/formulir-mahasiswa-hasil.png)

### Menambahkan capture

Ambil capture hasil setiap latihan di browser dan simpan sebagai file `.png` dengan nama yang tercantum di atas ke dalam folder `screenshots/`. Ringkasan tiap latihan juga menyertakan cuplikan kode PHP dalam code block.

> Data formulir hanya diproses dan ditampilkan selama permintaan berlangsung; proyek ini belum menyimpan data ke database.

## G. Eksperimen Mandiri

Eksperimen berikut dapat dicoba dengan mengubah kode pada `index.php` atau `test.php`, kemudian jalankan kembali halaman melalui server lokal.

### 1. Menambahkan perhitungan nilai rata-rata

Rata-rata aritmetika diperoleh dengan menjumlahkan nilai tugas, UTS, dan UAS, kemudian membaginya dengan tiga. Perhitungan ini berbeda dari nilai akhir berbobot yang sudah digunakan pada Latihan 2.

```php
$nilaiRataRata = ($tugas + $uts + $uas) / 3;
echo "Nilai rata-rata: " . number_format($nilaiRataRata, 2) . "<br>";
```

![Hasil eksperimen rata-rata di browser](screenshots/eksperimen-1-hasil.png)

### 2. Mengubah pencarian GET agar mencari nama dari array

Gunakan array nama mahasiswa, lalu cocokkan kata kunci GET dengan setiap nama. Contoh berikut menerima pencarian sebagian nama tanpa membedakan huruf besar dan kecil.

```php
$mahasiswa = ["Alya", "Bima", "Citra", "Doni", "Prabs", "Tedds", "Mulyono"];
$kata = trim($_GET["kata"] ?? "");

if ($kata !== "") {
    $ditemukan = false;
    foreach ($mahasiswa as $namaMahasiswa) {
        if (stripos($namaMahasiswa, $kata) !== false) {
            echo "<p>" . htmlspecialchars($namaMahasiswa, ENT_QUOTES, "UTF-8") . "</p>";
            $ditemukan = true;
        }
    }

    if (!$ditemukan) {
        echo "<p>Nama tidak ditemukan.</p>";
    }
}
```

Form GET pada Latihan 5 dapat digunakan kembali untuk mengirimkan kata kunci pencarian.

![Hasil eksperimen pencarian di browser](screenshots/eksperimen-2-hasil.png)

### 3. Membuat function untuk memformat harga Rupiah

Function berikut mengubah angka menjadi teks berformat Rupiah dan dapat dipakai berulang kali.

```php
function formatRupiah($harga)
{
    return "Rp" . number_format($harga, 0, ",", ".");
}

echo "Harga: " . formatRupiah(150000);
```

![Hasil eksperimen format Rupiah di browser](screenshots/eksperimen-3-hasil.png)

### 4. Memvalidasi NIM berupa angka dengan panjang yang ditentukan

Contoh ini menetapkan NIM harus terdiri dari tepat 10 digit. `ctype_digit()` memeriksa bahwa seluruh karakter adalah angka, sedangkan `strlen()` memeriksa jumlah digitnya.

```php
if (!ctype_digit($nim) || strlen($nim) !== 10) {
    $error[] = "NIM harus berupa angka dan persis 10 digit.";
}
```

Pada `test.php`, validasi ini sudah diterapkan di sisi server.

![Hasil eksperimen validasi NIM di browser](screenshots/eksperimen-4-hasil.png)

### 5. Menambahkan tombol reset dan membedakannya dari pemrosesan server

Form `test.php` sudah memiliki tombol reset. Tombol reset mengembalikan input ke nilai awal yang ditentukan oleh HTML pada halaman saat ini. Tombol ini tidak mengirimkan formulir dan tidak menjalankan ulang pemrosesan PHP. Sebaliknya, tombol submit mengirim permintaan ke server, sehingga PHP memvalidasi dan memproses input kembali.

```html
<button type="submit">Kirim Data</button>
<button type="reset">Reset Form</button>
```

![Hasil eksperimen tombol reset di browser](screenshots/eksperimen-5-hasil.png)

## H. Pertanyaan Evaluasi

1. **Apa perbedaan pemrosesan client-side dan server-side?**  
   Client-side dijalankan di perangkat pengguna, biasanya oleh browser (misalnya JavaScript), sehingga hasilnya dapat langsung terlihat tanpa selalu meminta pemrosesan baru ke server. Server-side dijalankan di server; browser mengirim permintaan dan menerima hasil yang telah diproses. Kode PHP pada proyek ini diproses di server.

2. **Mengapa file PHP harus dijalankan melalui web server?**  
   Browser tidak mengeksekusi PHP secara langsung. Web server meneruskan file PHP ke interpreter PHP, lalu mengirimkan hasilnya—umumnya HTML—kepada browser. Tanpa server atau interpreter PHP, kode PHP tidak akan diproses sebagaimana mestinya.

3. **Apa fungsi tanda `$` pada variabel PHP?**  
   Tanda `$` menandai nama variabel PHP. Contohnya, `$nama = "Siti";` menyimpan teks `Siti` ke variabel bernama `$nama`.

4. **Apa perbedaan metode GET dan POST?**  
   GET mengirim data melalui URL sebagai parameter query, sehingga cocok untuk pencarian atau permintaan yang bisa dibagikan. POST mengirim data di dalam isi permintaan HTTP, bukan di URL, dan umumnya digunakan untuk mengirim formulir. POST bukan enkripsi; HTTPS tetap diperlukan untuk melindungi data saat dikirim.

5. **Mengapa input pengguna perlu divalidasi di sisi server?**  
   Validasi browser dapat dilewati atau dimanipulasi. Validasi server memastikan data memenuhi aturan aplikasi sebelum diproses, terlepas dari cara permintaan dibuat. Contohnya, `test.php` memeriksa panjang dan karakter NIM, rentang semester, serta format email.

6. **Apa fungsi `htmlspecialchars()` ketika menampilkan data dari form?**  
   Fungsi ini mengubah karakter khusus HTML, seperti `<` dan `>`, menjadi representasi teks sehingga input ditampilkan sebagai teks, bukan ditafsirkan sebagai markup atau skrip HTML. Ini membantu mengurangi risiko XSS saat data ditampilkan kembali.

7. **Apa manfaat penggunaan function dalam program PHP?**  
   Function mengemas langkah-langkah untuk tugas tertentu agar dapat digunakan kembali, mengurangi pengulangan kode, dan membuat program lebih mudah dibaca serta dirawat. Contohnya, `hitungDiskon()` dan `hitungLuasPersegiPanjang()` di `index.php`.

8. **Jelaskan minimal dua kasus input valid dan dua kasus input tidak valid.**  
   - **Valid:** formulir mahasiswa diisi dengan NIM `1234567890`, semester `3`, nama dan program studi yang tidak kosong, serta email valid seperti `siti@example.com`.
   - **Valid:** formulir subtotal diisi nama barang `Buku`, harga `15000`, dan jumlah `2`; hasil subtotal adalah Rp30.000.
   - **Tidak valid:** NIM berisi huruf atau jumlah digitnya bukan 10, atau semester diisi `0` maupun `15`; formulir mahasiswa menampilkan pesan validasi.
   - **Tidak valid:** email berformat salah seperti `siti@` atau jumlah barang diisi `0`; validasi terkait menolak input tersebut.
