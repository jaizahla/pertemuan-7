<?php
include '../db.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Data KRS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <h2>Data KRS</h2>
    <a href="tambah.php" class="btn btn-primary mb-3">+ Tambah Data</a>
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>No</th>
                <th>Nama Mahasiswa</th>
                <th>Nama Mata Kuliah</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            $query = mysqli_query($conn, 
                "SELECT krs.id, mahasiswa.nama AS nama_mhs, matakuliah.nama AS nama_mk, 
                        matakuliah.jumlah_sks, krs.keterangan
                 FROM krs
                 JOIN mahasiswa ON krs.mahasiswa_npm = mahasiswa.npm
                 JOIN matakuliah ON krs.matakuliah_kodemk = matakuliah.kodemk"
            );
            while ($row = mysqli_fetch_assoc($query)) {
                echo "<tr>
                        <td>$no</td>
                        <td>{$row['nama_mhs']}</td>
                        <td>{$row['nama_mk']}</td>
                        <td>{$row['keterangan']}</td>
                        <td>
                            <a href='hapus.php?id={$row['id']}' class='btn btn-danger btn-sm' onclick='return confirm(\"Yakin ingin menghapus?\")'>Hapus</a>
                        </td>
                      </tr>";
                $no++;
            }
            ?>
        </tbody>
    </table>
</body>
</html>