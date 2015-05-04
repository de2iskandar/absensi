<legend>Import Data Siswa</legend>
<div class="col-md-4">
	<?php echo form_open_multipart('operator/do_import_siswa');?>
	<input type="file" id="file_upload" name="userfile" size="20" />
	<br/>
	<input type="submit" value="Upload" />
	<?php echo form_close();?>
</div>