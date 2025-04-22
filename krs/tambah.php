<?php
include '../db.php';

if (isset($_POST['submit'])) {
    $npm = $_POST['mahasiswa_npm'];
    $kodemk = $_POST['matakuliah_kodemk'];

    // Ambil data mahasiswa
    $mhs = mysqli_query($conn, "SELECT nama FROM mahasiswa WHERE npm = '$npm'");
    $data_mhs = mysqli_fetch_assoc($mhs);
    $nama_mhs = $data_mhs['nama'];

    // Ambil data matakuliah
    $mk = mysqli_query($conn, "SELECT nama, jumlah_sks FROM matakuliah WHERE kodemk = '$kodemk'");
    $data_mk = mysqli_fetch_assoc($mk);
    $nama_mk = $data_mk['nama'];
    $sks = $data_mk['jumlah_sks'];

    // Buat keterangan otomatis
    $keterangan = "$nama_mhs Mengambil Mata Kuliah $nama_mk ($sks SKS)";

    // Simpan ke tabel krs
    $query = "INSERT INTO krs (mahasiswa_npm, matakuliah_kodemk, keterangan)
              VALUES ('$npm', '$kodemk', '$keterangan')";
    mysqli_query($conn, $query);

    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Data KRS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <h2>Tambah Data KRS</h2>
    <form method="POST">
        <div class="mb-3">
            <label class="form-label">Nama Mahasiswa</label>
            <select name="mahasiswa_npm" class="form-select" required>
                <option value="">-- Pilih Mahasiswa --</option>
                <?php
                $mhs = mysqli_query($conn, "SELECT * FROM mahasiswa");
                while ($row = mysqli_fetch_assoc($mhs)) {
                    echo "<option value='{$row['npm']}'>{$row['nama']}</option>";
                }
                ?>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">Mata Kuliah</label>
            <select name="matakuliah_kodemk" class="form-select" required>
                <option value="">-- Pilih Mata Kuliah --</option>
                <?php
                $mk = mysqli_query($conn, "SELECT * FROM matakuliah");
                while ($row = mysqli_fetch_assoc($mk)) {
                    echo "<option value='{$row['kodemk']}'>{$row['nama']} ({$row['jumlah_sks']} SKS)</option>";
                }
                ?>
            </select>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
        <a href="index.php" class="btn btn-secondary">Kembali</a>
    </form>
</body>
</html>