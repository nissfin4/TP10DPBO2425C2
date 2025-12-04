<?php 

require_once "config/Database.php"; // Memanggil file Database agar bisa akses koneksi database

class Partisipasi // Deklarasi class Partisipasi
{
    private $conn; // Properti untuk menyimpan koneksi database
    private $table="partisipasi"; // Nama tabel yang digunakan pada database

    public function __construct() // Konstruktor otomatis saat objek dibuat
    {
        $this->conn=(new Database())->getConnection(); // Buat koneksi ke database
    }

    public function getAll() // Fungsi mengambil semua data partisipasi
    {
        // Query JOIN untuk menggabungkan tabel volunteer dan event agar menampilkan nama volunteer & nama event
        $stmt=$this->conn->prepare(
            "SELECT p.*, v.nama AS nama_volunteer, e.nama_event
             FROM $this->table p
             JOIN volunteer v ON p.id_volunteer=v.id_volunteer
             JOIN event e ON p.id_event=e.id_event
             ORDER BY p.id_partisipasi DESC"
        );
        $stmt->execute(); // Eksekusi query
        return $stmt->fetchAll(PDO::FETCH_ASSOC); // Ambil semua data dalam format array associative
    }

    public function getById($id) // Fungsi mengambil satu data berdasarkan ID partisipasi
    {
        // Query SELECT data berdasarkan id_partisipasi
        $stmt=$this->conn->prepare("SELECT * FROM $this->table WHERE id_partisipasi=:id");
        $stmt->bindParam(':id',$id); // Bind parameter untuk keamanan
        $stmt->execute(); // Eksekusi query
        return $stmt->fetch(PDO::FETCH_ASSOC); // Mengembalikan satu baris data
    }

    public function create($id_volunteer,$id_event,$keterangan) // Fungsi menambah data partisipasi baru
    {
        // Query INSERT data baru ke dalam tabel partisipasi
        $stmt=$this->conn->prepare(
            "INSERT INTO $this->table (id_volunteer,id_event,keterangan)
             VALUES (:id_volunteer,:id_event,:keterangan)"
        );
        $stmt->bindParam(':id_volunteer',$id_volunteer); // Bind id volunteer
        $stmt->bindParam(':id_event',$id_event); // Bind id event
        $stmt->bindParam(':keterangan',$keterangan); // Bind keterangan
        return $stmt->execute(); // Eksekusi query & return status berhasil atau tidak
    }

    public function update($id,$id_volunteer,$id_event,$keterangan) // Fungsi update data partisipasi
    {
        // Query UPDATE berdasarkan ID partisipasi
        $stmt=$this->conn->prepare(
            "UPDATE $this->table SET id_volunteer=:id_volunteer,
             id_event=:id_event,keterangan=:keterangan WHERE id_partisipasi=:id"
        );
        $stmt->bindParam(':id',$id); // Bind ID partisipasi
        $stmt->bindParam(':id_volunteer',$id_volunteer); // Bind ID volunteer baru
        $stmt->bindParam(':id_event',$id_event); // Bind ID event baru
        $stmt->bindParam(':keterangan',$keterangan); // Bind keterangan baru
        return $stmt->execute(); // Eksekusi query & return hasil
    }

    public function delete($id) // Fungsi menghapus data partisipasi berdasarkan ID
    {
        // Query DELETE data partisipasi
        $stmt=$this->conn->prepare("DELETE FROM $this->table WHERE id_partisipasi=:id");
        $stmt->bindParam(':id',$id); // Bind ID partisipasi
        return $stmt->execute(); // Eksekusi & return status
    }
} 
