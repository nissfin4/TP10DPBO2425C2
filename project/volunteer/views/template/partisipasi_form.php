<?php include "header.php"; ?>
<form method="POST" action="index.php?entity=partisipasi&action=<?= isset($partisipasi)?'update&id='.$partisipasi['id_partisipasi']:'save'; ?>">
<label>Nama Volunteer</label>
<select name="id_volunteer">
<?php foreach($volunteerList as $v): ?>
<option value="<?= $v['id_volunteer']; ?>" <?= isset($partisipasi)&&$partisipasi['id_volunteer']==$v['id_volunteer']?'selected':''; ?>>
<?= $v['nama']; ?>
</option>
<?php endforeach; ?>
</select>

<label>Nama Event</label>
<select name="id_event">
<?php foreach($eventList as $e): ?>
<option value="<?= $e['id_event']; ?>" <?= isset($partisipasi)&&$partisipasi['id_event']==$e['id_event']?'selected':''; ?>>
<?= $e['nama_event']; ?>
</option>
<?php endforeach; ?>
</select>

<label>Keterangan</label>
<input type="text" name="keterangan" value="<?= isset($partisipasi)?$partisipasi['keterangan']:''; ?>">

<br><br>
<button class="btn">Simpan</button>
</form>
<?php include "footer.php"; ?>
