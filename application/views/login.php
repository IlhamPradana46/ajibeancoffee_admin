<!DOCTYPE html>
<html>
<head>
    <title>Login Admin - AJIBean Coffee</title>
    <link rel="stylesheet"type="text/css"href="<?php echo base_url().'asset/css/bootstrap.min.css'?>">
    <script type="text/javascript"src="<?php echo base_url().'asset/js/jquery.js';?>"></script>
    <script type="text/javascript"src="<?php echo base_url().'asset/js/bootstrap.js';?>"></script>
</head>
<body>
    <section class="vh-100 gradient-custom">
      <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-12 col-md-8 col-lg-6 col-xl-5">
            <div class="card bg-dark text-white" style="border-radius: 1rem;">
              <div class="card-body p-5 text-center">

                <div class="mb-md-5 mt-md-4 pb-5">

                    <h2 class="fw-bold mb-2 text-uppercase">Website Rental Mobil</h2>
                  <p class="text-white-50 mb-5">Please enter your username and password!</p>
                  <?php
                  if(isset($_GET['pesan'])){
                   if($_GET['pesan'] == "gagal"){
                       echo"<div class='alert alert-danger'>Login gagal! Username dan password salah.</div>";
                   }else if($_GET['pesan'] == "logout"){
                       echo"<div class='alert alert-danger'>Anda telah logout.</div>";
                   }else if($_GET['pesan'] == "belumlogin"){
                       echo"<div class='alert alert-success'>Silahkan login dulu.</div>";
                   }
               }        
               ?>
               <form method="post"action="<?php echo base_url().'welcome/login'?>">
                  <div class="form-outline form-white mb-4">
                    <label class="form-label" for="typeEmailX">Username</label>
                    <input type="text"name="username"placeholder="Username"class="form-control">
                    <?php echo form_error('username'); ?>
                </div>
                <div class="form-outline form-white mb-4">
                    <label class="form-label" for="typePasswordX">Password</label>
                    <input type="password"name="password"placeholder="Password"class="form-control">
                    <?php echo form_error('password'); ?>
                </div>

                <p class="small mb-5 pb-lg-2"><a class="text-white-50" href="#!">Forgot password?</a></p>

                <button class="btn btn-outline-light btn-lg px-5" value="Login" type="submit">Login</button>

                <div class="d-flex justify-content-center text-center mt-4 pt-1">
                    <a href="#!" class="text-white"><i class="fab fa-facebook-f fa-lg"></i></a>
                    <a href="#!" class="text-white"><i class="fab fa-twitter fa-lg mx-4 px-2"></i></a>
                    <a href="#!" class="text-white"><i class="fab fa-google fa-lg"></i></a>
                </div>

            </div>

            <div>
              <p class="mb-0">Don't have an account? <a href="#!" class="text-white-50 fw-bold">Sign Up</a>
              </p>
          </div>

      </div>
  </div>
</div>
</div>
</div>
</section>
</body>
</html>