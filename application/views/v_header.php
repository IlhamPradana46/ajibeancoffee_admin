<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  
  <link rel="stylesheet" href="<?php echo base_url().'asset/css/bootstrap.min.css' ?>">
  <link rel="stylesheet" href="<?php echo base_url().'asset/css/index.css' ?>">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/913d7811ef.js" crossorigin="anonymous"></script>
  <script type="text/javascript">
  $(document).ready(function() {
      $('#tabeluser').DataTable();
  });
  </script>
  
  <title>AJIBean Coffee</title>
  </head>
  <body>
    <div class="jumbotron jumbotron-fluid text-center">
      <div class="container">
      </div>
    </div>

    <nav class="navbar navbar-expand-lg bg-brown">
      <div class="container">
      <a class="navbar-brand text-white"><img src="<?php echo base_url().'asset/image/image01.png'; ?>" alt="" style="width:80px;height:60px;"><strong>AJIBean</strong> Coffee</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fa-solid fa-bars" style="color:white;"></i>
      </button>

      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link mr-4" href="<?php echo base_url().'dashboard'; ?>"><img src="<?php echo base_url().'asset/image/home.png'; ?>" alt="" style="width:20px;height:20px;"> HOME</a>
          </li>
          <li class="nav-item">
            <a class="nav-link mr-4" href="<?php echo base_url().'dashboard/menu_list'; ?>"><img src="<?php echo base_url().'asset/image/menu.png'; ?>" alt="" style="width:20px;height:20px;"> DAFTAR PRODUK</a>
          </li>
          <li class="nav-item">
            <a class="nav-link mr-4" href="<?php echo base_url().'dashboard/transaksi'; ?>"><img src="<?php echo base_url().'asset/image/dp.png'; ?>" alt="" style="width:20px;height:20px;"> TRANSAKSI</a>
          </li>
          <li class="nav-item">
            <a class="nav-link mr-4" href="<?php echo base_url().'welcome/logout'; ?>"><img src="<?php echo base_url().'asset/image/logout.png'; ?>" alt="" style="width:20px;height:20px;"> LOGOUT</a>
          </li>
        </ul>
      </div>
     </div> 
    </nav>
</body>
</html>