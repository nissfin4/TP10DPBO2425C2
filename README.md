TUGAS PRAKTIKUM 10

Janji: Saya Nisrina Safinatunnajah dengan NIM 2410093 mengerjakan Tugas Praktikum 10 dalam mata kuliah DPBO untuk keberkahanNya maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin

**Desain Program**

Aplikasi ini memiliki empat bagian utama yang dapat diakses oleh pengguna, yaitu Divisi, Volunteer, Event, dan Partisipasi. Pada halaman Divisi, pengguna dapat menambahkan daftar divisi yang akan digunakan dalam pengorganisasian volunteer dan dapat menambahkan deskripsi dari divisi. Pada halaman Volunteer, pengguna dapat mencatat informasi relawan seperti nama, nomor telepon, dan divisi tempat mereka berkontribusi. Selanjutnya, halaman Event digunakan untuk mencatat jadwal kegiatan sosial yang akan atau sedang dilaksanakan. Terakhir, halaman Partisipasi berfungsi untuk menghubungkan relawan dengan event yang mereka ikuti, sehingga terdokumentasi dengan baik siapa terlibat di kegiatan apa.

menggunakan struktur MVVM (Model – View – ViewModel). Model bertanggung jawab mengelola perintah ke database, ViewModel menjadi penghubung antara View dan Model, sedangkan View bertindak sebagai tampilan antarmuka yang ditampilkan kepada pengguna. Selain itu, aplikasi ini juga sudah menerapkan data binding pada beberapa form — sebagai contoh, saat menambahkan volunteer, daftar divisi langsung ditampilkan secara otomatis dari database, begitu juga saat mencatat partisipasi event, daftar volunteer dan event akan terupdate sesuai data yang ada. Hal ini memastikan tampilan selalu sesuai dengan kondisi data terbaru.

Database yang digunakan bernama volunteer_db dan terdiri dari empat tabel, yaitu: tabel divisi, volunteer, event, dan partisipasi.Selain itu, terdapat relasi antar tabel menggunakan primary key dan foreign key, misalnya volunteer terhubung dengan divisi, dan partisipasi menghubungkan volunteer dengan event. Dengan struktur seperti ini, data dapat saling terhubung dan lebih terorganisir.

**Alur Program**

Alur kerja aplikasi ini sangat sederhana. Ketika pengguna pertama kali membuka aplikasi, halaman yang tampil adalah daftar volunteer. Dari menu navigasi, pengguna dapat berpindah ke bagian lain sesuai kebutuhan. Setiap bagian sudah dilengkapi dengan fitur CRUD (Create, Read, Update, Delete), sehingga pengguna dapat menambah, melihat, mengubah, maupun menghapus data dengan mudah. Setelah melakukan penyimpanan atau perubahan data, sistem secara otomatis akan kembali ke halaman daftar dan menampilkan data yang sudah diperbarui.

## Dokumentasi
[![Video Dokumentasi](https://img.youtube.com/vi/M7DQuRyc-zI/0.jpg)](https://youtu.be/M7DQuRyc-zI)


