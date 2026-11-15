<?php
// Bagian Pemrosesan Data (Logic)
$data = null;
$error = [];

// Variabel untuk mempertahankan nilai input (sticky form)
$nama = "";
$nim = "";
$prodi = "";
$semesterInput = "";
$email = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nama = trim($_POST["nama"] ?? "");
    $nim = trim($_POST["nim"] ?? "");
    $prodi = trim($_POST["prodi"] ?? "");
    $semesterInput = $_POST["semester"] ?? "";
    $email = trim($_POST["email"] ?? "");

    // Validasi Server-Side
    if ($nama === "")
        $error[] = "Nama wajib diisi.";
    if ($nim === "") {
        $error[] = "NIM wajib diisi.";
    } elseif (!ctype_digit($nim) || strlen($nim) !== 10) {
        $error[] = "NIM harus berupa angka dan persis 10 digit.";
    }
    if ($prodi === "")
        $error[] = "Program studi wajib diisi.";

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error[] = "Format email tidak valid.";
    }

    if (!ctype_digit((string) $semesterInput) || (int) $semesterInput < 1 || (int) $semesterInput > 14) {
        $error[] = "Semester harus berupa angka bulat antara 1–14.";
    }

    // Jika tidak ada error, simpan data ke array
    if (!$error) {
        $data = compact("nama", "nim", "prodi", "email");
        $data["semester"] = (int) $semesterInput;
    }
}
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Data Mahasiswa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
            background-color: #f4f7f6;
            color: #333;
        }

        .container {
            max-width: 500px;
            background: #fff;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            margin: auto;
        }

        h2 {
            margin-top: 0;
            color: #2c3e50;
            text-align: center;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="email"] {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            background: #3498db;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            width: 100%;
        }

        button:hover {
            background: #2980b9;
        }

        .error-box {
            background: #f8d7da;
            color: #721c24;
            padding: 12px;
            border-radius: 4px;
            margin-bottom: 15px;
            border: 1px solid #f5c6cb;
        }

        .success-box {
            background: #d4edda;
            color: #155724;
            padding: 15px;
            border-radius: 4px;
            border: 1px solid #c3e6cb;
        }

        ul {
            margin: 0;
            padding-left: 20px;
        }
    </style>
</head>

<body>

    <div class="container">
        <h2>Formulir Data Mahasiswa</h2>

        <!-- Tampilkan Kotak Pesan Error jika Validasi Gagal -->
        <?php if (!empty($error)): ?>
            <div class="error-box">
                <strong>Perhatian:</strong>
                <ul>
                    <?php foreach ($error as $err): ?>
                        <li><?php echo htmlspecialchars($err); ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <!-- Tampilkan Form jika Data Belum Valid / Belum Dikirim -->
        <?php if ($data === null): ?>
            <form method="POST" action="">
                <div class="form-group">
                    <label for="nama">Nama Lengkap:</label>
                    <input type="text" id="nama" name="nama" value="<?php echo htmlspecialchars($nama); ?>">
                </div>

                <div class="form-group">
                    <label for="nim">NIM:</label>
                    <input type="text" id="nim" name="nim" value="<?php echo htmlspecialchars($nim); ?>">
                </div>

                <div class="form-group">
                    <label for="prodi">Program Studi:</label>
                    <input type="text" id="prodi" name="prodi" value="<?php echo htmlspecialchars($prodi); ?>">
                </div>

                <div class="form-group">
                    <label for="semester">Semester (1–14):</label>
                    <input type="text" id="semester" name="semester"
                        value="<?php echo htmlspecialchars($semesterInput); ?>">
                </div>

                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>">
                </div>

                <button type="submit">Kirim Data</button>
                <button type="reset" style="background: #e74c3c; margin-top: 10px;">Reset Form</button>
            </form>
        <?php endif; ?>

        <!-- Tampilkan Ringkasan Data Jika Validasi Berhasil -->
        <?php if ($data !== null): ?>
            <div class="success-box">
                <h3>Ringkasan Data Mahasiswa</h3>
                <p><strong>Nama:</strong> <?php echo htmlspecialchars($data['nama']); ?></p>
                <p><strong>NIM:</strong> <?php echo htmlspecialchars($data['nim']); ?></p>
                <p><strong>Program Studi:</strong> <?php echo htmlspecialchars($data['prodi']); ?></p>
                <p><strong>Semester:</strong> <?php echo (int) $data['semester']; ?></p>
                <p><strong>Email:</strong> <?php echo htmlspecialchars($data['email']); ?></p>
                <br>
                <a href=""><button type="button" style="background: #27ae60;">Input Data Baru</button></a>
            </div>
        <?php endif; ?>
    </div>

</body>

</html>