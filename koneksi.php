<?php

// ==========================================
// KONEKSI BASIS DATA (MariaDB/MySQL)
// ==========================================
$host     = "localhost";
$username = "root";
$password = ""; // Sesuaikan dengan password MySQL Anda jika ada
$database = "DB_UAS_PBO_TI1C_AishaRahmawati";

$koneksi = mysqli_connect($host, $username, $password, $database);

// Validasi Koneksi
if (!$koneksi) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}


// ==========================================
// IMPLEMENTASI ABSTRAKSI & ENKAPSULASI
// ==========================================
abstract class Karyawan {
    // Properti terenkapsulasi dengan hak akses protected
    // agar hanya bisa diakses oleh class ini dan class turunannya (anak)
    protected $id_karyawan;
    protected $nama_karyawan;
    protected $departemen;
    protected $hariKerjaMasuk;
    protected $gajiDasarPerHari;

    // Constructor untuk menginisialisasi atribut global saat objek dibuat
    public function __construct($id_karyawan, $nama_karyawan, $departemen, $hariKerjaMasuk, $gajiDasarPerHari) {
        $this->id_karyawan = $id_karyawan;
        $this->nama_karyawan = $nama_karyawan;
        $this->departemen = $departemen;
        $this->hariKerjaMasuk = $hariKerjaMasuk;
        $this->gajiDasarPerHari = $gajiDasarPerHari;
    }

    // Method Abstrak (Wajib di-override/diimplementasikan oleh class anak)
    abstract public function hitungGajiBersih();
    abstract public function tampilkanProfilKaryawan();
}