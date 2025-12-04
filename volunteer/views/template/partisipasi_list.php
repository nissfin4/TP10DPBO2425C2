<?php include "header.php"; ?>
<a class="btn" href="index.php?entity=partisipasi&action=add">Tambah Partisipasi</a>
<table>
<tr><th>ID</th><th>Volunteer</th><th>Event</th><th>Keterangan</th><th>Aksi</th></tr>
<?php foreach($partisipasiList as $p): ?>
<tr>
<td><?= $p['id_partisipasi']; ?></td>
<td><?= $p['nama_volunteer']; ?></td>
<td><?= $p['nama_event']; ?></td>
<td><?= $p['keterangan']; ?></td>
<td>
<a class="btn" href="index.php?entity=partisipasi&action=edit&id=<?= $p['id_partisipasi']; ?>">Edit</a>
<a class="btn btn-danger" href="index.php?entity=partisipasi&action=delete&id=<?= $p['id_partisipasi']; ?>" onclick="return confirm('Hapus?')">Hapus</a>
</td>
</tr>
<?php endforeach; ?>
</table>
<?php include "footer.php"; ?>
