<?php

require_once "config/Database.php"; // Memanggil file Database untuk koneksi

class Divisi // Deklarasi class Divisi
{
    private $conn; // Properti untuk menyimpan koneksi database
    private $table = "divisi"; // Nama tabel yang digunakan

    public function __construct() // Konstruktor class
    {
        // Membuat instance Database dan mengambil koneksi ke database
        $this->conn = (new Database())->getConnection();
    }

    public function getAll() // Fungsi untuk mengambil semua data divisi
    {
        // Menyiapkan query SELECT semua data dari tabel divisi, diurutkan berdasarkan nama_divisi
        $stmt = $this->conn->prepare("SELECT * FROM $this->table ORDER BY nama_divisi");
        $stmt->execute(); // Eksekusi query
        return $stmt->fetchAll(PDO::FETCH_ASSOC); // Mengambil hasil sebagai array associative
    }

    public function getById($id) // Fungsi untuk mengambil data berdasarkan ID divisi
    {
        // Query untuk mengambil satu data berdasarkan id_divisi
        $stmt = $this->conn->prepare("SELECT * FROM $this->table WHERE id_divisi=:id");
        $stmt->bindParam(':id',$id); // Bind parameter untuk mencegah SQL Injection
        $stmt->execute(); // Eksekusi query
        return $stmt->fetch(PDO::FETCH_ASSOC); // Return satu data 
    }

    public function create($nama) // Fungsi untuk menambah data divisi baru
    {
        // Query INSERT menambahkan nama_divisi ke tabel
        $stmt = $this->conn->prepare("INSERT INTO $this->table (nama_divisi) VALUES (:nama)");
        $stmt->bindParam(':nama',$nama); // Bind nama divisi
        return $stmt->execute(); // Jalankan query dan return status berhasil atau tidak
    }

    public function update($id,$nama) // Fungsi update data divisi
    {
        // Query untuk update data berdasarkan ID divisi
        $stmt = $this->conn->prepare("UPDATE $this->table SET nama_divisi=:nama WHERE id_divisi=:id");
        $stmt->bindParam(':id',$id); // Bind id divisi
        $stmt->bindParam(':nama',$nama); // Bind nama divisi baru
        return $stmt->execute(); // Eksekusi dan return hasil
    }

    public function delete($id) // Fungsi untuk menghapus data divisi berdasarkan ID
    {
        // Query DELETE untuk menghapus data divisi
        $stmt = $this->conn->prepare("DELETE FROM $this->table WHERE id_divisi=:id");
        $stmt->bindParam(':id',$id); // Bind id divisi
        return $stmt->execute(); // Eksekusi query dan return status
    }
} 
