<?php
include_once '../../utils/database.php'; // Mengimpor file database.php untuk koneksi database

class Model
{
    // Properti-properti untuk menyimpan informasi data pelanggan
    public $conn; // Objek koneksi database PDO
    public $table_name = 'data_cust'; // Nama tabel database
    public $nama_pelanggan; // Nama pelanggan
    public $pic; // PIC (Person In Charge)
    public $nama_pic_lokasi; // Nama PIC Lokasi
    public $relokasi_rubah_nama; // Relokasi/Rubah Nama
    public $nik; // NIK (Nomor Induk Kependudukan)
    public $alamat; // Alamat pelanggan
    public $rt_rw; // RT/RW pelanggan
    public $layanan; // Jenis layanan
    public $kecepatan; // Kecepatan layanan
    public $biaya_bulanan; // Biaya bulanan dalam format rupiah
    public $nomor_registrasi; // Nomor registrasi pelanggan
    public $username_pppoe; // Username PPPoE
    public $password_pppoe; // Password PPPoE
    public $vlan; // VLAN (Virtual Local Area Network)
    public $type_onu; // Tipe ONU (Optical Network Unit)
    public $mac_address; // MAC Address perangkat
    public $serial_number; // Nomor serial perangkat
    public $status_onu; // Status ONU
    public $status_pppoe; // Status PPPoE
    public $tanggal_aktif; // Tanggal aktif layanan
    public $status_user; // Status pengguna
    public $keterangan; // Keterangan tambahan

    // Konstruktor untuk membuat objek Model dan menginisialisasi koneksi database
    public function __construct()
    {
        $database = new Database(); // Membuat objek Database untuk koneksi
        $this->conn = $database->getConnection(); // Mendapatkan objek koneksi PDO dari Database
    }
}
