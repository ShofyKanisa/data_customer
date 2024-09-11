<?php
include_once 'Model.php'; // Mengimpor file Model.php untuk mendapatkan kelas Model

class CustomerModel extends Model
{
    // Fungsi untuk membuat data customer baru
    public function createCustomer($data)
    {
        // Daftar kolom yang akan diisi dengan data
        $fields = [
            'nama_pelanggan', 'pic', 'nama_pic_lokasi', 'relokasi_rubah_nama',
            'nik', 'alamat', 'rt_rw', 'layanan', 'kecepatan', 'biaya_bulanan',
            'nomor_registrasi', 'username_pppoe', 'password_pppoe', 'vlan',
            'type_onu', 'mac_address', 'serial_number', 'status_onu', 'status_pppoe',
            'tanggal_aktif', 'status_user', 'keterangan'
        ];

        $placeholders = [];
        $values = [];

        // Mengisi placeholders dan values untuk query INSERT
        foreach ($fields as $field) {
            $placeholders[] = ':' . $field;
            $values[':' . $field] = htmlspecialchars(strip_tags($data[$field]));
        }

        // Membuat query INSERT dengan placeholders dan values yang telah diisi
        $query = "INSERT INTO " . $this->table_name . " 
                  (" . implode(', ', $fields) . ") 
                  VALUES 
                  (" . implode(', ', $placeholders) . ")";
        $stmt = $this->conn->prepare($query);

        // Menjalankan query INSERT dengan values yang telah diisi
        $stmt->execute($values);

        // Mengembalikan true jika berhasil memasukkan data, false jika gagal
        if ($stmt->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    // Fungsi untuk membaca semua data customer
    public function readAllCustomer()
    {
        $query = "SELECT * FROM " . $this->table_name . " ORDER BY id DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        // Mengembalikan hasil query dalam bentuk array asosiatif
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Fungsi untuk membaca data customer berdasarkan ID
    public function readCustomerById($id)
    {
        $query = "SELECT * FROM " . $this->table_name . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        // Mengembalikan hasil query dalam bentuk array asosiatif
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Fungsi untuk mengupdate data customer berdasarkan ID
    public function updateCustomer($id, $data)
    {
        // Membuat query UPDATE dengan placeholders untuk setiap kolom
        $query = "UPDATE " . $this->table_name . " SET ";
        foreach ($data as $key => $value) {
            $query .= $key . " = :" . $key . ", ";
        }
        $query = rtrim($query, ", "); // Menghapus koma terakhir
        $query .= " WHERE id = :id";
        $stmt = $this->conn->prepare($query);

        // Mengikat nilai placeholders dengan data yang akan diupdate
        foreach ($data as $key => $value) {
            $stmt->bindValue(':' . $key, htmlspecialchars(strip_tags($value)));
        }
        $stmt->bindValue(':id', $id);

        // Menjalankan query UPDATE
        return $stmt->execute();
    }

    public function search($filter, $search)
    {
        $query = "SELECT * FROM " . $this->table_name . " WHERE 1=1";

        if ($filter == 'status_pppoe') {
            $query .= " AND status_pppoe LIKE '%$search%'";
        } elseif ($filter == 'status_user') {
            $query .= " AND status_user LIKE '%$search%'";
        } elseif ($filter == 'rt_rw') {
            $query .= " AND rt_rw LIKE '%$search%'";
        }

        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function searchAll($search)
{
    $columns = array(
        'nama_pelanggan',
        'pic',
        'nama_pic_lokasi',
        'relokasi_rubah_nama',
        'nik',
        'alamat',
        'rt_rw',
        'layanan',
        'kecepatan',
        'biaya_bulanan',
        'nomor_registrasi',
        'username_pppoe',
        'password_pppoe',
        'vlan',
        'type_onu',
        'mac_address',
        'serial_number',
        'status_onu',
        'status_pppoe',
        'tanggal_aktif',
        'status_user',
        'keterangan'
    );

    $query = "SELECT * FROM " . $this->table_name . " WHERE ";
    $conditions = array();

    foreach ($columns as $column) {
        $conditions[] = "$column LIKE '%$search%'";
    }

    $query .= implode(" OR ", $conditions);

    $stmt = $this->conn->prepare($query);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

    // Fungsi untuk menghapus data customer berdasarkan ID
    public function deleteCustomer($id)
    {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);

        // Menjalankan query DELETE
        return $stmt->execute();
    }
}
