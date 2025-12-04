<?php include "header.php"; ?>
<form method="POST" action="index.php?entity=event&action=<?= isset($event)?'update&id='.$event['id_event']:'save'; ?>">
<label>Nama Event</label>
<input type="text" name="nama_event" value="<?= isset($event)?$event['nama_event']:''; ?>" required>

<label>Tanggal Event</label>
<input type="date" name="tanggal_event" value="<?= isset($event)?$event['tanggal_event']:''; ?>" required>

<label>Lokasi</label>
<input type="text" name="lokasi" value="<?= isset($event)?$event['lokasi']:''; ?>">

<br><br>
<button class="btn">Simpan</button>
</form>
<?php include "footer.php"; ?>
