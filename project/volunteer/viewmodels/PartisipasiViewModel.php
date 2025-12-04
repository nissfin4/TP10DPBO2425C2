<?php


require_once 'models/Partisipasi.php';
// Import model Partisipasi untuk interaksi dengan tabel partisipasi
require_once 'models/Volunteer.php';
// Import model Volunteer untuk mengambil data volunteer
require_once 'models/Event.php';
// Import model Event untuk mengambil data event

class PartisipasiViewModel
// Deklarasi class untuk menangani logika Partisipasi di layer ViewModel
{
    private $model;
    // Properti untuk model Partisipasi
    private $volModel;
    // Properti untuk model Volunteer
    private $evtModel;
    // Properti untuk model Event

    public function __construct()
    // Konstruktor yang otomatis dijalankan saat membuat objek kelas ini
    {
        $this->model = new Partisipasi();
        // Buat instance model Partisipasi
        $this->volModel = new Volunteer();
        // Buat instance model Volunteer
        $this->evtModel = new Event();
        // Buat instance model Event
    }

    public function list() { return $this->model->getAll(); }
    // Ambil semua data partisipasi dari database lewat model

    public function get($id){ return $this->model->getById($id); }
    // Ambil data partisipasi tertentu berdasarkan id

    public function getVolunteers(){ return $this->volModel->getAll(); }
    // Ambil semua data volunteer untuk kebutuhan dropdown / relasi

    public function getEvents(){ return $this->evtModel->getAll(); }
    // Ambil semua data event untuk pilihan partisipasi

    public function save($id_volunteer,$id_event,$keterangan)
    // Fungsi untuk simpan data partisipasi baru
    {
        return $this->model->create($id_volunteer,$id_event,$keterangan);
        // Lempar data ke model agar di-insert ke database
    }

    public function update($id,$id_volunteer,$id_event,$keterangan)
    // Fungsi untuk mengupdate data partisipasi
    {
        return $this->model->update($id,$id_volunteer,$id_event,$keterangan);
        // Lempar ke model untuk proses update ke DB
    }

    public function remove($id)
    // Fungsi untuk menghapus data partisipasi berdasarkan id
    {
        return $this->model->delete($id);
        // Minta model untuk menghapus ke DB
    }
}
