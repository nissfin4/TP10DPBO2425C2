<?php 

require_once 'models/Divisi.php'; // Mengimpor file model Divisi agar bisa digunakan di sini

class DivisiViewModel // Class untuk menjadi penghubung antara View dan Model 
{
    private $model; // Properti untuk menyimpan instance model Divisi

    public function __construct() // Konstruktor yang otomatis dipanggil saat objek dibuat
    {
        $this->model = new Divisi(); // Membuat instance model Divisi untuk digunakan pada fungsi lain
    }

    // Fungsi untuk mengambil semua data divisi dari model
    public function list() { return $this->model->getAll(); }

    // Fungsi untuk mengambil data divisi tertentu berdasarkan ID
    public function get($id){ return $this->model->getById($id); }

    // Fungsi menyimpan data divisi baru ke database
    public function save($nama_divisi)
    {
        return $this->model->create($nama_divisi);
    }

    // Fungsi untuk mengupdate data divisi berdasarkan ID
    public function update($id,$nama_divisi)
    {
        return $this->model->update($id,$nama_divisi);
    }

    // Fungsi menghapus data divisi berdasarkan ID
    public function remove($id)
    {
        return $this->model->delete($id);
    }
} 
