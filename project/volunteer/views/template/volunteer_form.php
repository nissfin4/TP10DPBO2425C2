<?php include "header.php"; ?>
<form method="POST" action="index.php?entity=volunteer&action=<?= isset($volunteer)?'update&id='.$volunteer['id_volunteer']:'save'; ?>">
<label>Nama Volunteer</label>
<input type="text" name="nama" value="<?= isset($volunteer)?$volunteer['nama']:''; ?>" required>

<label>Telepon</label>
<input type="text" name="telepon" value="<?= isset($volunteer)?$volunteer['telepon']:''; ?>">

<label>Divisi</label>
<select name="id_divisi" required>
<option>--Pilih Divisi--</option>
<?php foreach($divisiList as $d): ?>
<option value="<?= $d['id_divisi']; ?>" <?= isset($volunteer)&&$volunteer['id_divisi']==$d['id_divisi']?'selected':''; ?>>
<?= $d['nama_divisi']; ?>
</option>
<?php endforeach; ?>
</select>

<br><br>
<button class="btn">Simpan</button>
</form>
<?php include "footer.php"; ?>
