<?php
include_once 'Controller.php'; // Mengimpor file Controller.php untuk mendapatkan kelas Controller

class CustomerController extends Controller
{
    // Fungsi untuk menampilkan daftar pelanggan
    public function index()
    {
        $customerModel = $this->model('CustomerModel'); // Memuat model CustomerModel
        $customers = $customerModel->readAllCustomer(); // Membaca semua data pelanggan
        $this->view('customer/index', ['customers' => $customers]); // Menampilkan view daftar pelanggan dengan data pelanggan yang dibaca
        return $customers; // Mengembalikan data pelanggan
    }

    // Fungsi untuk membuat data pelanggan baru
    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') { // Memeriksa jika metode request adalah POST
            $data = $this->sanitizeFormData($_POST); // Membersihkan data formulir dari input pengguna
            $customerModel = $this->model('CustomerModel'); // Memuat model CustomerModel
            if ($customerModel->createCustomer($data)) { // Memanggil fungsi createCustomer dari model untuk membuat data pelanggan baru
                header('Location: /Customer/src/views/customer/index.php'); // Mengarahkan ke halaman daftar pelanggan setelah berhasil membuat data pelanggan baru
                exit(); // Menghentikan skrip
            } else {
                die("Failed to create customer"); // Memberhentikan skrip dengan pesan kesalahan jika gagal membuat data pelanggan baru
            }
        } else {
            $this->view('customer/create'); // Menampilkan formulir untuk membuat data pelanggan baru
        }
    }

    // Fungsi untuk menampilkan detail data pelanggan berdasarkan ID
    public function show($id)
    {
        $customerModel = $this->model('CustomerModel'); // Memuat model CustomerModel
        $customer = $customerModel->readCustomerById($id); // Membaca data pelanggan berdasarkan ID
        if ($customer) { // Memeriksa jika data pelanggan ditemukan
            $this->view('customer/show', ['customer' => $customer]); // Menampilkan view detail pelanggan dengan data pelanggan yang ditemukan
            return $customer; // Mengembalikan data pelanggan
        } else {
            die("Customer not found"); // Memberhentikan skrip dengan pesan kesalahan jika data pelanggan tidak ditemukan
        }
    }

    // Fungsi untuk mengupdate data pelanggan berdasarkan ID
    public function update($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') { // Memeriksa jika metode request adalah POST
            $data = $this->sanitizeFormData($_POST); // Membersihkan data formulir dari input pengguna
            $customerModel = $this->model('CustomerModel'); // Memuat model CustomerModel
            if ($customerModel->updateCustomer($id, $data)) { // Memanggil fungsi updateCustomer dari model untuk mengupdate data pelanggan
                header('Location: /Customer/src/views/customer/index.php'); // Mengarahkan ke halaman daftar pelanggan setelah berhasil mengupdate data pelanggan
                exit(); // Menghentikan skrip
            } else {
                die("Failed to update customer"); // Memberhentikan skrip dengan pesan kesalahan jika gagal mengupdate data pelanggan
            }
        } else {
            $customerModel = $this->model('CustomerModel'); // Memuat model CustomerModel
            $customer = $customerModel->readCustomerById($id); // Membaca data pelanggan berdasarkan ID
            $this->view('customer/edit', ['customer' => $customer]); // Menampilkan formulir edit dengan data pelanggan yang ditemukan
            return $customer; // Mengembalikan data pelanggan
        }
    }

    public function getCustomersBySearch($filter, $search)
    {
        $customerModel = $this->model('CustomerModel');
        if ($filter == '') {
            $customers = $customerModel->searchAll($search);
        } else {
            $customers = $customerModel->search($filter, $search);
        }
        return $customers;
    }

    // Fungsi untuk menghapus data pelanggan berdasarkan ID
    public function delete($id)
    {
        $customerModel = $this->model('CustomerModel'); // Memuat model CustomerModel
        if ($customerModel->deleteCustomer($id)) { // Memanggil fungsi deleteCustomer dari model untuk menghapus data pelanggan
            header('Location: /Customer/src/views/customer/index.php'); // Mengarahkan ke halaman daftar pelanggan setelah berhasil menghapus data pelanggan
            exit(); // Menghentikan skrip
        } else {
            die("Failed to delete customer"); // Memberhentikan skrip dengan pesan kesalahan jika gagal menghapus data pelanggan
        }
    }

    // Fungsi untuk membersihkan data formulir dari input pengguna
    private function sanitizeFormData($formData)
    {
        $sanitizedData = [];
        foreach ($formData as $key => $value) {
            $sanitizedData[$key] = htmlspecialchars(strip_tags($value));
        }
        return $sanitizedData;
    }
}
