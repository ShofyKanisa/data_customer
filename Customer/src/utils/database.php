<?php
class Database
{
    // Informasi koneksi database
    private $host = "localhost"; // Host database
    private $username = "root"; // Username database
    private $password = ""; // Password database
    private $database = "customer"; // Nama database
    private $conn; // Objek koneksi PDO

    // Fungsi untuk mendapatkan objek koneksi database
    public function getConnection()
    {
        $this->conn = null; // Menginisialisasi objek koneksi

        try {
            // Membuat objek koneksi PDO dengan parameter host, database, username, dan password
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->database, $this->username, $this->password);

            // Mengatur mode error untuk koneksi PDO agar menampilkan exception jika terjadi kesalahan
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            // Menangkap exception jika koneksi gagal dan menampilkan pesan kesalahan
            echo "Connection failed: " . $e->getMessage();
        }

        // Mengembalikan objek koneksi PDO
        return $this->conn;
    }
}

/**
 * ◯================================================================================================================================◯
 * ‖                                                                                                                                  ‖
 * ‖    @ PDO (PHP Data Objects) adalah sebuah ekstensi PHP yang menyediakan antarmuka untuk berinteraksi dengan berbagai jenis       ‖
 * ‖      database menggunakan bahasa pemrograman PHP. PDO memungkinkan pengembang untuk menggunakan kode yang lebih portabel dan     ‖
 * ‖      lebih aman untuk mengakses dan mengelola database, karena PDO mendukung berbagai jenis database seperti MySQL, PostgreSQL,  ‖
 * ‖      SQLite, SQL Server, dan lainnya.                                                                                            ‖
 * ‖                                                                                                                                  ‖
 * ‖==================================================================================================================================‖
 * ‖                                                                                                                                  ‖
 * ‖    @ exception di PHP adalah mekanisme yang digunakan untuk menangani kesalahan atau kondisi yang tidak biasa selama eksekusi    ‖
 * ‖      program. Ketika suatu kesalahan atau situasi yang tidak diharapkan terjadi, PHP dapat melemparkan (throw) sebuah exception. ‖
 * ‖      Exception adalah objek kelas yang mewakili informasi tentang kesalahan yang terjadi.                                        ‖
 * ‖                                                                                                                                  ‖
 * ◯================================================================================================================================◯
 */
