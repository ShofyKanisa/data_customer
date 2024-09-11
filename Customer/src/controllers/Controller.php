<?php
class Controller
{
    // Fungsi untuk menampilkan view dengan data yang diberikan
    protected function view($view, $data = [])
    {
        $viewPath = '../../views/' . $view . '.php'; // Path menuju file view
        if (file_exists($viewPath)) { // Memeriksa apakah file view ada
            require_once $viewPath; // Memuat file view jika ada
        } else {
            die("View file not found: $viewPath"); // Memberhentikan skrip jika file view tidak ditemukan
        }
    }

    // Fungsi untuk memuat model yang sesuai
    protected function model($model)
    {
        $modelPath = '../../models/' . $model . '.php'; // Path menuju file model
        if (file_exists($modelPath)) { // Memeriksa apakah file model ada
            require_once $modelPath; // Memuat file model jika ada
            if (class_exists($model)) { // Memeriksa apakah kelas model ada di dalam file model
                return new $model(); // Mengembalikan objek dari kelas model yang diminta
            } else {
                die("Model class not found in file: $modelPath"); // Memberhentikan skrip jika kelas model tidak ditemukan
            }
        } else {
            die("Model file not found: $modelPath"); // Memberhentikan skrip jika file model tidak ditemukan
        }
    }
}
