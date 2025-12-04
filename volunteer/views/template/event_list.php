<?php include "header.php"; ?>
<a class="btn" href="index.php?entity=event&action=add">Tambah Event</a>
<table>
<tr><th>ID</th><th>Nama Event</th><th>Tanggal</th><th>Lokasi</th><th>Aksi</th></tr>
<?php foreach($eventList as $e): ?>
<tr>
<td><?= $e['id_event']; ?></td>
<td><?= $e['nama_event']; ?></td>
<td><?= $e['tanggal_event']; ?></td>
<td><?= $e['lokasi']; ?></td>
<td>
<a class="btn" href="index.php?entity=event&action=edit&id=<?= $e['id_event']; ?>">Edit</a>
<a class="btn btn-danger" href="index.php?entity=event&action=delete&id=<?= $e['id_event']; ?>" onclick="return confirm('Hapus?')">Hapus</a>
</td>
</tr>
<?php endforeach; ?>
</table>
<?php include "footer.php"; ?>
