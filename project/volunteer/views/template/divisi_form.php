<?php include "header.php"; ?>
<form method="POST" action="index.php?entity=divisi&action=<?= isset($divisi)?'update&id='.$divisi['id_divisi']:'save'; ?>">
<label>Nama Divisi</label>
<input type="text" name="nama_divisi" value="<?= isset($divisi)?$divisi['nama_divisi']:''; ?>" required>
<br><br>
<button class="btn" type="submit">Simpan</button>
</form>
<?php include "footer.php"; ?>
