<?php
include '../db.php';

$kodemk_lama = $_GET['kodemk'];
$query = mysqli_query($conn, "SELECT * FROM matakuliah WHERE kodemk='$kodemk_lama'");
$data = mysqli_fetch_assoc($query);

if (!$data) {
    echo "Data tidak ditemukan!";
    exit;
}

if (isset($_POST['submit'])) {
    $kodemk_baru = $_POST['kodemk'];
    $nama = $_POST['nama'];
    $jumlah_sks = $_POST['jumlah_sks'];

    $update = "UPDATE matakuliah 
               SET kodemk='$kodemk_baru', nama='$nama', jumlah_sks='$jumlah_sks' 
               WHERE kodemk='$kodemk_lama'";
    mysqli_query($conn, $update);

    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Mata Kuliah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Edit Data Mata Kuliah</h2>
    <form method="POST">
        <div class="mb-3">
            <label class="form-label">Kode MK</label>
            <input type="text" name="kodemk" class="form-control" value="<?= $data['kodemk']; ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Nama Mata Kuliah</label>
            <input type="text" name="nama" class="form-control" value="<?= $data['nama']; ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Jumlah SKS</label>
            <input type="number" name="jumlah_sks" class="form-control" value="<?= $data['jumlah_sks']; ?>" required>
        </div>
        <button type="submit" name="submit" class="btn btn-success">Update</button>
        <a href="index.php" class="btn btn-secondary">Kembali</a>
    </form>
</div>
</body>
</html>