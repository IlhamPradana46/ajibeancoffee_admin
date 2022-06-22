<!DOCTYPE html>
<html>
<head>
    <style>
        body, html {
            height: 100%;
            margin: 0;
        }
    </style>
    <title>Login Admin - AJIBean Coffee</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo base_url().'asset/css/index.css' ?>">
    <link rel="stylesheet"type="text/css"href="<?php echo base_url().'asset/css/bootstrap.min.css'?>">
    <script type="text/javascript"src="<?php echo base_url().'asset/js/jquery.js';?>"></script>
    <script type="text/javascript"src="<?php echo base_url().'asset/js/bootstrap.js';?>"></script>
</head>
<body>
    <div class="row-6 d-flex justify-content-center align-items-center bg">
        <!-- <div class="my-5 mx-5 d-flex justify-content-center"> -->
            <div class="card text-white px-5" style="background-color:rgba(45, 21, 15, 0.5);border-color:white;border-radius:20px;border-width: thick; height:80%;">
                <div class="d-flex justify-content-center">    
                    <div style="position:absolute;top:-60px;">
                        <div class="rounded-circle d-flex justify-content-center" style="background-color:red;width:125px;height:125px;border-color:white;border-radius:20px; border-style: solid; border-width: thick;"> 
                        <img src="<?= base_url().'asset/image/image01.png' ?>" style="height:100%; width:95%;">
                        </div>    
                    </div>
                </div>
                <div class="card-body p-5 text-center">
                    <div class="mb-md-5 mt-md-4 pb-5 mt-5 pt-3">
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

                        <button class="btn btn-outline-light btn-lg px-5 rounded-pill" value="Login" type="submit" style="background-color:red;"><strong>LOGIN</strong></button>
                    </div>
                </div>
            </div>
        <!-- </div> -->
    </div>
</body>