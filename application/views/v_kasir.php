<!DOCTYPE html>
<html>
<head>
	<title>Shopping cart dengan codeigniter dan AJAX</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'asset/css/bootstrap.css'?>">
</head>
<body>
<div class="container"><br/>
	<h2>Shopping Cart Dengan Ajax dan Codeigniter</h2>
	<hr/>
	<div class="row">
		<div class="col-md-8">
			<h4>Produk</h4>
			<div class="row">
                <?php foreach($produk as $p){ ?>
                    <div class="col-md-4">
                        <div class="card border-dark">
                            <img class="card-img-top" src="<?php echo base_url().'upload/images/'.$p->gambar;?>">
                            <div class="card-body">
                                <h5 class="card-title font-weight-bold"><?php echo $p->nama_produk ?></h5>
                                <div class="row">
                                    <div class="col-md-7">
                                        <label class="card-text harga">Stok <?php echo $p->stok ?></label><br>
                                    </div>
                                    <div class="col-md-7">
                                        <label class="card-text harga">Rp. <?php echo number_format($p->harga, 2, ",", ".");?></label><br>
                                    </div>
                                    <div class="col-md-5">
									    <input type="number" name="quantity" id="<?php echo $p->id_produk;?>" value="1" class="quantity form-control">
								    </div>
                                </div>
                                <br>
                                <button class="add_cart btn btn-success btn-block" data-produkid="<?php echo $p->id_produk;?>" data-produknama="<?php echo $p->nama_produk;?>" data-produkharga="<?php echo $p->harga;?>">Add To Cart</button>
                            </div>
                        </div>
                    </div>
                <?php } ?>
		    </div>
		</div>
		<div class="col-md-4">
			<h4>Shopping Cart</h4>
			<table class="table table-striped">
				<thead>
					<tr>
						<th>Produk</th>
						<th>Harga</th>
						<th>Qty</th>
						<th>Subtotal</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody id="detail_cart">

				</tbody>
			</table>
		</div>
	</div>
</div>

<script type="text/javascript" src="<?php echo base_url().'asset/js/jquery.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'asset/js/bootstrap.js'?>"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$('.add_cart').click(function(){
			var produk_id    = $(this).data("id_produk");
			var produk_nama  = $(this).data("nama_produk");
			var produk_harga = $(this).data("harga");
			var quantity     = $('#' + id_produk).val();
			$.ajax({
				url : "<?php echo base_url();?>index.php/cart/add_to_cart",
				method : "POST",
				data : {id_produk: produk_id, nama_produk: produk_nama, harga: produk_harga, quantity: quantity},
				success: function(data){
					$('#detail_cart').html(data);
				}
			});
		});

		// Load shopping cart
		$('#detail_cart').load("<?php echo base_url();?>index.php/cart/load_cart");

		//Hapus Item Cart
		$(document).on('click','.hapus_cart',function(){
			var row_id=$(this).attr("id"); //mengambil row_id dari artibut id
			$.ajax({
				url : "<?php echo base_url();?>cart/hapus_cart",
				method : "POST",
				data : {row_id : row_id},
				success :function(data){
					$('#detail_cart').html(data);
				}
			});
		});
	});
</script>
</body>
</html>