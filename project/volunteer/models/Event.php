<?php 
require_once "config/Database.php"; // Import file Database untuk koneksi

class Event // Deklarasi class Event
{
    private $conn; // Menyimpan koneksi database
    private $table = "event"; // Menyimpan nama tabel event di database

    public function __construct() // Konstruktor class, berjalan otomatis saat objek Event dibuat
    {
        $this->conn = (new Database())->getConnection(); // Mengambil koneksi dari class Database
    }

    public function getAll() // Fungsi untuk mengambil semua data event
    {
        // ambil semua event urut dari tanggal terbaru (DESC)
        $stmt=$this->conn->prepare("SELECT * FROM $this->table ORDER BY tanggal_event DESC");
        $stmt->execute(); // Eksekusi query
        return $stmt->fetchAll(PDO::FETCH_ASSOC); // Kembalikan semua data dalam bentuk array associative
    }

    public function getById($id) // Fungsi untuk mengambil satu data event berdasarkan ID
    {
        // Query SELECT berdasarkan id_event
        $stmt=$this->conn->prepare("SELECT * FROM $this->table WHERE id_event=:id");
        $stmt->bindParam(':id',$id); // Bind parameter untuk keamanan 
        $stmt->execute(); // Eksekusi query
        return $stmt->fetch(PDO::FETCH_ASSOC); // Kembalikan satu baris data
    }

    public function create($nama_event,$tanggal_event,$lokasi) // Fungsi untuk menambah event baru
    {
        // Query INSERT data baru ke tabel event
        $stmt=$this->conn->prepare(
            "INSERT INTO $this->table (nama_event,tanggal_event,lokasi)
             VALUES (:nama_event,:tanggal_event,:lokasi)"
        );
        $stmt->bindParam(':nama_event',$nama_event); // Bind nama event
        $stmt->bindParam(':tanggal_event',$tanggal_event); // Bind tanggal event
        $stmt->bindParam(':lokasi',$lokasi); // Bind lokasi event
        return $stmt->execute(); // Jalankan query, return true/false
    }

    public function update($id,$nama_event,$tanggal_event,$lokasi) // Fungsi untuk update data event
    {
        // Query UPDATE event berdasarkan id_event
        $stmt=$this->conn->prepare(
            "UPDATE $this->table SET nama_event=:nama_event,
             tanggal_event=:tanggal_event, lokasi=:lokasi WHERE id_event=:id"
        );
        $stmt->bindParam(':id',$id); // Bind ID event
        $stmt->bindParam(':nama_event',$nama_event); // Bind nama baru
        $stmt->bindParam(':tanggal_event',$tanggal_event); // Bind tanggal baru
        $stmt->bindParam(':lokasi',$lokasi); // Bind lokasi baru
        return $stmt->execute(); // Return hasil eksekusi
    }

    public function delete($id) // Fungsi untuk menghapus event berdasarkan ID
    {
        // Query DELETE
        $stmt=$this->conn->prepare("DELETE FROM $this->table WHERE id_event=:id");
        $stmt->bindParam(':id',$id); // Bind ID event
        return $stmt->execute(); // Eksekusi dan return status
    }
} 
