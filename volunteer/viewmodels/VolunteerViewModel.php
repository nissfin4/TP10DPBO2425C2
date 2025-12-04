<?php

require_once 'models/Volunteer.php';
// Import Model Volunteer → untuk query tabel volunteer
require_once 'models/Divisi.php';
// Import Model Divisi → karena volunteer punya relasi id_divisi

class VolunteerViewModel
// Deklarasi class ViewModel untuk volunteer
{
    private $model;
    // Properti untuk akses model volunteer
    private $divModel;
    // Properti untuk akses model divisi

    public function __construct()
    // Konstruktor yang otomatis dipanggil saat class dibuat
    {
        $this->model = new Volunteer();
        // Buat instance dari model Volunteer
        $this->divModel = new Divisi();
        // Buat instance dari model Divisi
    }

    public function list() { return $this->model->getAll(); }
    // Ambil semua data volunteer dari database (join divisi juga)

    public function get($id){ return $this->model->getById($id); }
    // Ambil data volunteer tertentu berdasarkan id

    public function getDivisiList() { return $this->divModel->getAll(); }
    // Ambil daftar divisi untuk dropdown saat input volunteer

    public function save($nama,$telepon,$id_divisi)
    // Fungsi simpan volunteer baru
    {
        return $this->model->create($nama,$telepon,$id_divisi);
        // Kirim ke model untuk insert ke DB
    }

    public function update($id,$nama,$telepon,$id_divisi)
    // Fungsi update volunteer
    {
        return $this->model->update($id,$nama,$telepon,$id_divisi);
        // Kirim ke model untuk update data
    }

    public function remove($id)
    // Fungsi delete volunteer berdasarkan id
    {
        return $this->model->delete($id);
        // Kirim ke model untuk hapus data di DB
    }
}
