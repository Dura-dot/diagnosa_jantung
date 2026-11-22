<?php
include "koneksi.php";

$halaman_hasil = "index.html";

$result = mysqli_query($conn, "SELECT id, nama, usia, jenis_kelamin, hasil_diagnosa FROM pasien ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Diagnosa</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="hasil-diagnosa.css">
    <link rel="stylesheet" href="diagnosa.css">
</head>
<body>
    <div class="container">
        <h1>Diagnosa</h1>
        <p class="text-black">Pilih pasien, lalu tekan tombol Hasil Diagnosa untuk melihat diagnosa fuzzy logic.</p>

        <table class="tabel-diagnosa">
            <tr>
                <th>No</th>
                <th>Nama Pasien</th>
                <th>Usia</th>
                <th>Jenis Kelamin</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
            <?php if ($result && mysqli_num_rows($result) > 0): ?>
                <?php $no = 1; while ($row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td class="text-black"><?= $no++ ?></td>
                        <td class="text-black"><?= htmlspecialchars($row['nama']) ?></td>
                        <td class="text-black"><?= htmlspecialchars($row['usia']) ?></td>
                        <td class="text-black"><?= htmlspecialchars($row['jenis_kelamin']) ?></td>
                        <td class="text-black"><?= $row['hasil_diagnosa'] ? htmlspecialchars($row['hasil_diagnosa']) : 'Belum didiagnosa' ?></td>
                        <td>
                            <a href="<?= $halaman_hasil ?>?id=<?= urlencode($row['id']) ?>" class="btn">Hasil Diagnosa</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6" class="text-black cell-center">Belum ada data pasien.</td>
                </tr>
            <?php endif; ?>
        </table>

        <div class="action-bar">
            <a href="Riwayat.php" class="btn">Riwayat Diagnosa</a>
        </div>
    </div>
</body>
</html>
