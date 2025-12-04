<?php include "header.php"; ?>
<a class="btn" href="index.php?entity=volunteer&action=add">Tambah Volunteer</a>
<table>
<tr><th>ID</th><th>Nama</th><th>Telepon</th><th>Divisi</th><th>Aksi</th></tr>
<?php foreach($volunteerList as $v): ?>
<tr>
<td><?= $v['id_volunteer']; ?></td>
<td><?= $v['nama']; ?></td>
<td><?= $v['telepon']; ?></td>
<td><?= $v['nama_divisi']; ?></td>
<td>
<a class="btn" href="index.php?entity=volunteer&action=edit&id=<?= $v['id_volunteer']; ?>">Edit</a>
<a class="btn btn-danger" href="index.php?entity=volunteer&action=delete&id=<?= $v['id_volunteer']; ?>" onclick="return confirm('Hapus?')">Hapus</a>
</td>
</tr>
<?php endforeach; ?>
</table>
<?php include "footer.php"; ?>
