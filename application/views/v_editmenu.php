<div class="container mt-5">
<h1 class="text-center"><strong>EDIT PRODUK</strong></h1>
<?php echo form_open_multipart(base_url().'produk/do_upload'); ?>
		<div class="form-group">
			<label for="nama">Nama Produk</label>
			<input name="nama" type="text" class="form-control" id="nama" placeholder="Input nama produk">
		</div>
		<div class="form-group">
			<label for="stok">Stok</label>
			<input name="stok" type="number" class="form-control" id="stok">
		</div>
		<div class="form-group">
			<label for="harga">Harga</label>
			<input name="harga" type="number" class="form-control" id="harga">
		</div>
		<div class="form-group">
			<label for="gambar">Gambar</label>
			<input name="gambar" type="file" class="form-control-file" id="file">
		</div>
		<div>
			<input class="btn btn-primary btn-outline-light" type="submit" value="SIMPAN">
		</div>
<?php echo form_close() ?>
</div class="pb-5">
<br>
<br>
<br>
<br>
<br>
<br>
<br>