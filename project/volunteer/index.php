<?php
require_once 'viewmodels/DivisiViewModel.php';
require_once 'viewmodels/VolunteerViewModel.php';
require_once 'viewmodels/EventViewModel.php';
require_once 'viewmodels/PartisipasiViewModel.php';


$entity = $_GET['entity'] ?? 'volunteer';
$action = $_GET['action'] ?? 'list';


//divisi
if ($entity === 'divisi') {

    // Membuat instance ViewModel divisi.
    $vm = new DivisiViewModel();

    // Jika actionnya list maka ambil semua data divisi dan tampilkan ke view.
    if ($action === 'list') {
        $divisiList = $vm->list();
        include 'views/template/divisi_list.php';

    // Jika action add maka tampilkan form tambah divisi.
    } elseif ($action === 'add') {
        include 'views/template/divisi_form.php';

    // Jika edit maka ambil data divisi berdasarkan id lalu tampilkan form edit.
    } elseif ($action === 'edit') {
        $divisi = $vm->get($_GET['id']);
        include 'views/template/divisi_form.php';

    // Jika save maka simpan data baru ke database lalu balik ke list.
    } elseif ($action === 'save') {
        $vm->save($_POST['nama_divisi'], $_POST['deskripsi']); // ← tambah deskripsi
        header("Location: index.php?entity=divisi&action=list");

    // Jika update maka update data yang sudah ada lalu balik ke list.
    } elseif ($action === 'update') {
        $vm->update($_GET['id'], $_POST['nama_divisi'], $_POST['deskripsi']); // ← tambah deskripsi
        header("Location: index.php?entity=divisi&action=list");

    // Jika delete maka hapus data berdasarkan id lalu balik ke list.
    } elseif ($action === 'delete') {
        $vm->remove($_GET['id']);
        header("Location: index.php?entity=divisi&action=list");
    }



// volunteer
} elseif ($entity === 'volunteer') {

    // Membuat instance ViewModel volunteer.
    $vm = new VolunteerViewModel();

    // List volunteer maka ambil semua data volunteer.
    if ($action === 'list') {
        $volunteerList = $vm->list();
        include 'views/template/volunteer_list.php';

    // Add volunteer maka tampilkan form tambah dan ambil semua divisi untuk dropdown.
    } elseif ($action === 'add') {
        $divisiList = $vm->getDivisiList();
        include 'views/template/volunteer_form.php';

    // Edit volunteer maka ambil volunteer berdasarkan id dan list divisi untuk dropdown.
    } elseif ($action === 'edit') {
        $volunteer = $vm->get($_GET['id']);
        $divisiList = $vm->getDivisiList();
        include 'views/template/volunteer_form.php';

    // Save maka simpan data volunteer baru.
    } elseif ($action === 'save') {
        $vm->save($_POST['nama'], $_POST['telepon'], $_POST['id_divisi']);
        header("Location: index.php?entity=volunteer&action=list");

    // Update maka update data volunteer lama.
    } elseif ($action === 'update') {
        $vm->update($_GET['id'], $_POST['nama'], $_POST['telepon'], $_POST['id_divisi']);
        header("Location: index.php?entity=volunteer&action=list");

    // Delete maka hapus volunteer.
    } elseif ($action === 'delete') {
        $vm->remove($_GET['id']);
        header("Location: index.php?entity=volunteer&action=list");
    }



// event
} elseif ($entity === 'event') {

    // Membuat instance ViewModel event.
    $vm = new EventViewModel();

    // List event maka ambil semua event dari database.
    if ($action === 'list') {
        $eventList = $vm->list();
        include 'views/template/event_list.php';

    // Add event maka tampilkan form tambah event.
    } elseif ($action === 'add') {
        include 'views/template/event_form.php';

    // Edit event maka ambil data event berdasarkan id lalu tampilkan form edit.
    } elseif ($action === 'edit') {
        $event = $vm->get($_GET['id']);
        include 'views/template/event_form.php';

    // Save maka simpan event baru.
    } elseif ($action === 'save') {
        $vm->save($_POST['nama_event'], $_POST['tanggal_event'], $_POST['lokasi']);
        header("Location: index.php?entity=event&action=list");

    // Update maka perbarui event lama.
    } elseif ($action === 'update') {
        $vm->update($_GET['id'], $_POST['nama_event'], $_POST['tanggal_event'], $_POST['lokasi']);
        header("Location: index.php?entity=event&action=list");

    // Delete maka hapus event.
    } elseif ($action === 'delete') {
        $vm->remove($_GET['id']);
        header("Location: index.php?entity=event&action=list");
    }



// partisipasi
} elseif ($entity === 'partisipasi') {

    // Membuat instance viewmodel partisipasi.
    $vm = new PartisipasiViewModel();

    // List maka ambil semua data partisipasi.
    if ($action === 'list') {
        $partisipasiList = $vm->list();
        include 'views/template/partisipasi_list.php';

    // Add maka ambil semua volunteer & event untuk dropdown form.
    } elseif ($action === 'add') {
        $volunteerList = $vm->getVolunteers();
        $eventList = $vm->getEvents();
        include 'views/template/partisipasi_form.php';

    // Edit maka ambil data partisipasi & dropdown volunteer + event.
    } elseif ($action === 'edit') {
        $partisipasi = $vm->get($_GET['id']);
        $volunteerList = $vm->getVolunteers();
        $eventList = $vm->getEvents();
        include 'views/template/partisipasi_form.php';

    // Save maka simpan data baru partisipasi.
    } elseif ($action === 'save') {
        $vm->save($_POST['id_volunteer'], $_POST['id_event'], $_POST['keterangan']);
        header("Location: index.php?entity=partisipasi&action=list");

    // Update maka ubah data partisipasi yang sudah ada.
    } elseif ($action === 'update') {
        $vm->update($_GET['id'], $_POST['id_volunteer'], $_POST['id_event'], $_POST['keterangan']);
        header("Location: index.php?entity=partisipasi&action=list");

    // Delete maka hapus partisipasi.
    } elseif ($action === 'delete') {
        $vm->remove($_GET['id']);
        header("Location: index.php?entity=partisipasi&action=list");
    }


// Jika entity tidak dikenal maka tampilkan pesan error.
} else {
    echo "Invalid entity.";
}
