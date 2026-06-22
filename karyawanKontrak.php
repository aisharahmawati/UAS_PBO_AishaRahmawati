<?php
require_once 'koneksi.php';

// ==========================================
// SUBCLASS: KARYAWAN KONTRAK
// ==========================================
class KaryawanKontrak extends Karyawan {
    private $durasiKontrakBulan;
    private $agensiPenyalur;

    public function __construct($id_karyawan, $nama_karyawan, $departemen, $hariKerjaMasuk, $gajiDasarPerHari, $durasiKontrakBulan, $agensiPenyalur) {
        parent::__construct($id_karyawan, $nama_karyawan, $departemen, $hariKerjaMasuk, $gajiDasarPerHari);
        $this->durasiKontrakBulan = $durasiKontrakBulan;
        $this->agensiPenyalur = $agensiPenyalur;
    }

    public function hitungGajiBersih() {
        return ($this->hariKerjaMasuk * $this->gajiDasarPerHari);
    }

    public function tampilkanProfilKaryawan() {
        return "
        <div class='card-karyawan kontrak'>
            <h3>[KONTRAK] {$this->nama_karyawan} ({$this->id_karyawan})</h3>
            <p><strong>Departemen:</strong> {$this->departemen}</p>
            <p><strong>Hari Kerja:</strong> {$this->hariKerjaMasuk} hari</p>
            <p><strong>Durasi Kontrak:</strong> {$this->durasiKontrakBulan} Bulan</p>
            <p><strong>Agensi Penyalur:</strong> {$this->agensiPenyalur}</p>
            <p class='gaji'><strong>Gaji Bersih:</strong> Rp " . number_format($this->hitungGajiBersih(), 2, ',', '.') . "</p>
        </div>";
    }
}

// ==========================================
// METODE QUERY BERSYARAT (SELECT * WHERE)
// ==========================================
$daftarKaryawanKontrak = [];
$query_kontrak = "SELECT * FROM tabel_karyawan WHERE jenis_karyawan = 'kontrak'";
$result_kontrak = mysqli_query($koneksi, $query_kontrak);

if ($result_kontrak) {
    while ($row = mysqli_fetch_assoc($result_kontrak)) {
        $daftarKaryawanKontrak[] = new KaryawanKontrak(
            $row['id_karyawan'],
            $row['nama_karyawan'],
            $row['departemen'],
            $row['hari_kerja_masuk'],
            $row['gaji_dasar_per_hari'],
            $row['durasi_kontrak_bulan'],
            $row['agensi_penyalur']
        );
    }
}