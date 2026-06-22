<?php
// =========================================================================
// MEMANGGIL SEMUA SUBCLASS KOMPONEN TAHAP 4 & TAHAP 5
// =========================================================================
require_once 'KaryawanTetap.php';
require_once 'KaryawanKontrak.php';
require_once 'KaryawanMagang.php';

// Menangkap filter pilihan dari form (default: 'semua')
$pilihan_kategori = isset($_GET['kategori']) ? $_GET['kategori'] : 'semua';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi Penggajian Karyawan - UAS PBO</title>
    <style>
        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            background-color: #f4f6f9;
            margin: 0;
            padding: 20px;
            color: #333;
        }
        .header {
            text-align: center;
            padding: 20px;
            background-color: #2c3e50;
            color: white;
            border-radius: 8px;
            margin-bottom: 25px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
        .header h1 { margin: 0; font-size: 28px; }
        
        /* Styling Filter Interaktif */
        .filter-container {
            background: white;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05);
            margin-bottom: 30px;
            text-align: center;
        }
        .filter-container label {
            font-weight: bold;
            font-size: 16px;
            margin-right: 10px;
            color: #2c3e50;
        }
        .filter-container select {
            padding: 8px 15px;
            font-size: 14px;
            border-radius: 4px;
            border: 1px solid #bdc3c7;
            outline: none;
            cursor: pointer;
        }
        .filter-container button {
            padding: 8px 20px;
            font-size: 14px;
            background-color: #3498db;
            color: white;
            border: none;
            border-radius: 4px;
            margin-left: 10px;
            cursor: pointer;
            transition: background 0.2s;
        }
        .filter-container button:hover {
            background-color: #2980b9;
        }
        
        .section-title {
            font-size: 22px;
            color: #2c3e50;
            border-bottom: 2px solid #bdc3c7;
            padding-bottom: 8px;
            margin-top: 30px;
            margin-bottom: 20px;
        }
        .grid-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 20px;
        }
        .card-karyawan {
            background: white;
            border-radius: 8px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
            padding: 20px;
            border-left: 6px solid #ccc;
            transition: transform 0.2s;
        }
        .card-karyawan:hover { transform: translateY(-5px); }
        .tetap { border-left-color: #2ecc71; }
        .kontrak { border-left-color: #3498db; }
        .magang { border-left-color: #e67e22; }
        .card-karyawan h3 { margin-top: 0; margin-bottom: 15px; color: #2c3e50; font-size: 18px; }
        .card-karyawan p { margin: 8px 0; font-size: 14px; color: #555; }
        .gaji { font-weight: bold; color: #27ae60; font-size: 16px; margin: 5px 0 0 0 !important; }
    </style>
</head>
<body>

    <div class="header">
        <h1>Dashboard Slip Gaji Karyawan</h1>
        <p>Aplikasi Manajemen Internal Perusahaan | Database Terintegrasi PBO PHP</p>
    </div>

    <div class="filter-container">
        <form method="GET" action="">
            <label for="kategori">Pilih Status Ketenagakerjaan:</label>
            <select name="kategori" id="kategori">
                <option value="semua" <?php if($pilihan_kategori == 'semua') echo 'selected'; ?>>-- Tampilkan Semua --</option>
                <option value="tetap" <?php if($pilihan_kategori == 'tetap') echo 'selected'; ?>>Karyawan Tetap</option>
                <option value="kontrak" <?php if($pilihan_kategori == 'kontrak') echo 'selected'; ?>>Karyawan Kontrak</option>
                <option value="magang" <?php if($pilihan_kategori == 'magang') echo 'selected'; ?>>Karyawan Magang</option>
            </select>
            <button type="submit">Filter Tampilan</button>
        </form>
    </div>

    <?php if ($pilihan_kategori == 'semua' || $pilihan_kategori == 'tetap'): ?>
        <div class="section-title">Karyawan Tetap</div>
        <div class="grid-container">
            <?php
            if (!empty($daftarKaryawanTetap)) {
                foreach ($daftarKaryawanTetap as $karyawan) {
                    echo $karyawan->tampilkanProfilKaryawan();
                }
            } else { echo "<p>Tidak ada data karyawan tetap.</p>"; }
            ?>
        </div>
    <?php endif; ?>

    <?php if ($pilihan_kategori == 'semua' || $pilihan_kategori == 'kontrak'): ?>
        <div class="section-title">Karyawan Kontrak</div>
        <div class="grid-container">
            <?php
            if (!empty($daftarKaryawanKontrak)) {
                foreach ($daftarKaryawanKontrak as $karyawan) {
                    echo $karyawan->tampilkanProfilKaryawan();
                }
            } else { echo "<p>Tidak ada data karyawan kontrak.</p>"; }
            ?>
        </div>
    <?php endif; ?>

    <?php if ($pilihan_kategori == 'semua' || $pilihan_kategori == 'magang'): ?>
        <div class="section-title">Karyawan Magang</div>
        <div class="grid-container">
            <?php
            if (!empty($daftarKaryawanMagang)) {
                foreach ($daftarKaryawanMagang as $karyawan) {
                    echo $karyawan->tampilkanProfilKaryawan();
                }
            } else { echo "<p>Tidak ada data karyawan magang.</p>"; }
            ?>
        </div>
    <?php endif; ?>

</body>
</html>