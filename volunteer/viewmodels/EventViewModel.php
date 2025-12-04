<?php

require_once 'models/Event.php';
// Import file model Event, supaya class Event bisa dipakai di sini

class EventViewModel
// Deklarasi class dengan nama EventViewModel, ini adalah lapisan ViewModelnya
{
    private $model;
    // Properti private untuk menyimpan instance dari model Event

    public function __construct()
    // Konstruktor yang dijalankan otomatis ketika kelas ini dibuat
    {
        $this->model = new Event();
        // Membuat objek Event dan nyimpen ke properti $model
    }

    public function list() { return $this->model->getAll(); }
    // Fungsi untuk mengambil semua data event dari model

    public function get($id){ return $this->model->getById($id); }
    // Fungsi untuk mengambil satu data event berdasarkan id

    public function save($nama_event,$tanggal_event,$lokasi)
    // Fungsi untuk menyimpan data event baru
    {
        return $this->model->create($nama_event,$tanggal_event,$lokasi);
        // Meneruskan data ke model untuk dimasukkan ke database
    }

    public function update($id,$nama_event,$tanggal_event,$lokasi)
    // Fungsi untuk mengupdate data event yang sudah ada
    {
        return $this->model->update($id,$nama_event,$tanggal_event,$lokasi);
        // Request update diterusin ke model biar disimpan ke DB
    }

    public function remove($id)
    // Fungsi untuk menghapus data event berdasarkan id
    {
        return $this->model->delete($id);
        // Manggil fungsi delete dari model
    }
}
