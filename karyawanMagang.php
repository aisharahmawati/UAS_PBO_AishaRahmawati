<?php
require_once 'koneksi.php';

class KaryawanMagang extends Karyawan {
    // Properti uangSakuBulanan dihapus karena karyawan magang tidak mendapatkannya
    private $sertifikatKampusMerdeka;

    public function __construct($id_karyawan, $nama_karyawan, $departemen, $hariKerjaMasuk, $gajiDasarPerHari, $sertifikatKampusMerdeka) {
        // Hanya meneruskan properti global ke induk
        parent::__construct($id_karyawan, $nama_karyawan, $departemen, $hariKerjaMasuk, $gajiDasarPerHari);
        $this->sertifikatKampusMerdeka = $sertifikatKampusMerdeka;
    }

    // OVERRIDING METHOD 1: Hitung Gaji Bersih (Potongan upah 20% dari kehadiran harian)
    public function hitungGajiBersih() {
        return ($this->hariKerjaMasuk * $this->gajiDasarPerHari) * 0.80;
    }

    // OVERRIDING METHOD 2: Hitung Total Biaya (Akurat 100% -> Murni dari Gaji Bersih)
    public function hitungTotalBiaya() {
        return $this->hitungGajiBersih();
    }

    public function tampilkanProfilKaryawan() {
        return "
        <div class='card-karyawan magang'>
            <h3>[MAGANG] {$this->nama_karyawan} ({$this->id_karyawan})</h3>
            <p><strong>Departemen:</strong> {$this->departemen}</p>
            <p><strong>Hari Kerja:</strong> {$this->hariKerjaMasuk} hari</p>
            <p><strong>Program Sertifikasi:</strong> {$this->sertifikatKampusMerdeka}</p>
            <p><strong>Gaji Bersih (Potongan 20%):</strong> Rp " . number_format($this->hitungGajiBersih(), 2, ',', '.') . "</p>
            <p class='gaji'><strong>Total Biaya Perusahaan:</strong> Rp " . number_format($this->hitungTotalBiaya(), 2, ',', '.') . "</p>
        </div>";
    }
}

// Query Bersyarat (WHERE) - Kolom uang_saku_bulanan tidak dimasukkan ke dalam objek
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
            $row['sertifikat_kampus_merdeka']
        );
    }
}