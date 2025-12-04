<?php 

require_once "config/Database.php"; // Mengambil file Database untuk koneksi ke DB

class Volunteer // Deklarasi class Volunteer sebagai model
{
    private $conn; // Menyimpan koneksi database
    private $table = "volunteer"; // Nama tabel yang digunakan di database

    public function __construct() // Konstruktor otomatis saat objek dibuat
    {
        $this->conn = (new Database())->getConnection(); // Mendapatkan koneksi database dari class Database
    }

    public function getAll() // Fungsi ambil semua data volunteer
    {
        // Query SELECT ambil data volunteer + nama divisi
        $stmt = $this->conn->prepare(
            "SELECT v.*, d.nama_divisi 
             FROM $this->table v 
             LEFT JOIN divisi d ON v.id_divisi=d.id_divisi
             ORDER BY v.nama"
        );
        $stmt->execute(); // Eksekusi query
        return $stmt->fetchAll(PDO::FETCH_ASSOC); // Kembalikan semua data sebagai array associative
    }

    public function getById($id) // Fungsi ambil satu volunteer sesuai ID
    {
        // Query SELECT berdasarkan id_volunteer
        $stmt=$this->conn->prepare("SELECT * FROM $this->table WHERE id_volunteer=:id");
        $stmt->bindParam(':id',$id); // Bind parameter ID untuk keamanan
        $stmt->execute(); // Eksekusi query
        return $stmt->fetch(PDO::FETCH_ASSOC); // Kembalikan satu baris data volunteer
    }

    public function create($nama,$telepon,$id_divisi) // Fungsi untuk menambah volunteer baru
    {
        // Query INSERT untuk memasukkan data volunteer baru
        $stmt=$this->conn->prepare(
            "INSERT INTO $this->table (nama,telepon,id_divisi)
             VALUES (:nama,:telepon,:id_divisi)"
        );
        $stmt->bindParam(':nama',$nama); // Bind nama
        $stmt->bindParam(':telepon',$telepon); // Bind nomor telepon
        $stmt->bindParam(':id_divisi',$id_divisi); // Bind divisi volunteer
        return $stmt->execute(); // Jalankan query dan return status true/false
    }

    public function update($id,$nama,$telepon,$id_divisi) // Fungsi update data volunteer
    {
        // Query UPDATE volunteer berdasarkan ID
        $stmt=$this->conn->prepare(
            "UPDATE $this->table SET nama=:nama, telepon=:telepon,
             id_divisi=:id_divisi WHERE id_volunteer=:id"
        );
        $stmt->bindParam(':id',$id); // Bind ID volunteer
        $stmt->bindParam(':nama',$nama); // Bind nama baru
        $stmt->bindParam(':telepon',$telepon); // Bind telepon baru
        $stmt->bindParam(':id_divisi',$id_divisi); // Bind divisi baru
        return $stmt->execute(); // Eksekusi query
    }

    public function delete($id) // Fungsi untuk menghapus volunteer berdasarkan ID
    {
        // Query DELETE satu data volunteer berdasarkan ID
        $stmt=$this->conn->prepare("DELETE FROM $this->table WHERE id_volunteer=:id");
        $stmt->bindParam(':id',$id); // Bind parameter ID
        return $stmt->execute(); // Eksekusi dan return status berhasil/tidak
    }
} 
