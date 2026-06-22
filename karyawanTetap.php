<?php
require_once 'koneksi.php';

class KaryawanTetap extends Karyawan {
    private $tunjanganKesehatan;
    private $opsiSahamId;

    public function __construct($id_karyawan, $nama_karyawan, $departemen, $hariKerjaMasuk, $gajiDasarPerHari, $tunjanganKesehatan, $opsiSahamId) {
        parent::__construct($id_karyawan, $nama_karyawan, $departemen, $hariKerjaMasuk, $gajiDasarPerHari);
        $this->tunjanganKesehatan = $tunjanganKesehatan;
        $this->opsiSahamId = $opsiSahamId;
    }

    // OVERRIDING METHOD 1: Hitung Gaji Bersih
    public function hitungGajiBersih() {
        return ($this->hariKerjaMasuk * $this->gajiDasarPerHari) + $this->tunjanganKesehatan;
    }

    // OVERRIDING METHOD 2: Hitung Total Biaya (Akurat 100%)
    public function hitungTotalBiaya() {
        return $this->hitungGajiBersih();
    }

    public function tampilkanProfilKaryawan() {
        return "
        <div class='card-karyawan tetap'>
            <h3>[TETAP] {$this->nama_karyawan} ({$this->id_karyawan})</h3>
            <p><strong>Departemen:</strong> {$this->departemen}</p>
            <p><strong>Hari Kerja:</strong> {$this->hariKerjaMasuk} hari</p>
            <p><strong>Tunjangan Kesehatan:</strong> Rp " . number_format($this->tunjanganKesehatan, 2, ',', '.') . "</p>
            <p><strong>Gaji Bersih:</strong> Rp " . number_format($this->hitungGajiBersih(), 2, ',', '.') . "</p>
            <p class='gaji'><strong>Total Biaya Kompensasi:</strong> Rp " . number_format($this->hitungTotalBiaya(), 2, ',', '.') . "</p>
        </div>";
    }
}

// Query Bersyarat (WHERE)
$daftarKaryawanTetap = [];
$query_tetap = "SELECT * FROM tabel_karyawan WHERE jenis_karyawan = 'tetap'";
$result_tetap = mysqli_query($koneksi, $query_tetap);
if ($result_tetap) {
    while ($row = mysqli_fetch_assoc($result_tetap)) {
        $daftarKaryawanTetap[] = new KaryawanTetap(
            $row['id_karyawan'], $row['nama_karyawan'], $row['departemen'], 
            $row['hari_kerja_masuk'], $row['gaji_dasar_per_hari'], 
            $row['tunjangan_kesehatan'], $row['opsi_saham_id']
        );
    }
}