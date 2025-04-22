<?php
include '../db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Data Mata Kuliah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <h2>Data Mata Kuliah</h2>
    <a href="tambah.php" class="btn btn-primary mb-3">+ Tambah Data</a>
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Kode MK</th>
                <th>Mata Kuliah</th>
                <th>SKS</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            $query = mysqli_query($conn, "SELECT * FROM matakuliah");
            while ($row = mysqli_fetch_assoc($query)) {
                echo "<tr>
                        <td>$no</td>
                        <td>{$row['kodemk']}</td>
                        <td>{$row['nama']}</td>
                        <td>{$row['jumlah_sks']}</td>
                        <td>
                            <a href='edit.php?kodemk={$row['kodemk']}' class='btn btn-warning btn-sm'>Edit</a>
                            <a href='hapus.php?kodemk={$row['kodemk']}' class='btn btn-danger btn-sm' onclick='return confirm(\"Yakin ingin menghapus?\")'>Hapus</a>
                        </td>
                      </tr>";
                $no++;
            }
            ?>
        </tbody>
    </table>
</body>
</html>