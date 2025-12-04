<?php include "header.php"; ?>
<a class="btn" href="index.php?entity=divisi&action=add">Tambah Divisi</a>

<table>
<tr>
    <th>ID</th>
    <th>Nama Divisi</th>
    <th>Deskripsi</th> 
    <th>Aksi</th>
</tr>

<?php foreach($divisiList as $d): ?>
<tr>
<td><?= $d['id_divisi']; ?></td>
<td><?= $d['nama_divisi']; ?></td>
<td><?= $d['deskripsi']; ?></td> <!-- Tambahan -->
<td>
<a class="btn" href="index.php?entity=divisi&action=edit&id=<?= $d['id_divisi']; ?>">Edit</a>
<a class="btn btn-danger" href="index.php?entity=divisi&action=delete&id=<?= $d['id_divisi']; ?>" onclick="return confirm('Hapus?')">Hapus</a>
</td>
</tr>
<?php endforeach; ?>

</table>

<?php include "footer.php"; ?>
