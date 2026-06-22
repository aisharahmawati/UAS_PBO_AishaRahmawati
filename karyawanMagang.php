<?php
require_once 'koneksi.php';

// ==========================================
// SUBCLASS: KARYAWAN MAGANG
// ==========================================
class KaryawanMagang extends Karyawan {
    private $uangSakuBulanan;
    private $sertifikatKampusMerdeka;

    public function __construct($id_karyawan, $nama_karyawan, $departemen, $hariKerjaMasuk, $gajiDasarPerHari, $uangSakuBulanan, $sertifikatKampusMerdeka) {
        parent::__construct($id_karyawan, $nama_karyawan, $departemen, $hariKerjaMasuk, $gajiDasarPerHari);
        $this->uangSakuBulanan = $uangSakuBulanan;
        $this->sertifikatKampusMerdeka = $sertifikatKampusMerdeka;
    }

    public function hitungGajiBersih() {
        return ($this->hariKerjaMasuk * $this->gajiDasarPerHari) + $this->uangSakuBulanan;
    }

    public function tampilkanProfilKaryawan() {
        return "
        <div class='card-karyawan magang'>
            <h3>[MAGANG] {$this->nama_karyawan} ({$this->id_karyawan})</h3>
            <p><strong>Departemen:</strong> {$this->departemen}</p>
            <p><strong>Hari Kerja:</strong> {$this->hariKerjaMasuk} hari</p>
            <p><strong>Program Sertifikasi:</strong> {$this->sertifikatKampusMerdeka}</p>
            <p><strong>Uang Saku Tambahan:</strong> Rp " . number_format($this->uangSakuBulanan, 2, ',', '.') . "</p>
            <p class='gaji'><strong>Gaji Bersih:</strong> Rp " . number_format($this->hitungGajiBersih(), 2, ',', '.') . "</p>
        </div>";
    }
}

// ==========================================
// METODE QUERY BERSYARAT (SELECT * WHERE)
// ==========================================
$daftarKaryawanMagang = [];
$query_magang = "SELECT * FROM tabel_karyawan WHERE jenis_karyawan = 'magang'";
$result_magang = mysqli_query($koneksi, $query_magang);

if ($result_magang) {
    while ($row = mysqli_fetch_assoc($result_magang)) {
        $daftarKaryawanMagang[] = new KaryawanMagang(
            $row['id_karyawan'],
            $row['nama_karyawan'],
            $row['departemen'],
            $row['hari_kerja_masuk'],
            $row['gaji_dasar_per_hari'],
            $row['uang_saku_bulanan'],
            $row['sertifikat_kampus_merdeka']
        );
    }
}