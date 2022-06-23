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
            <div class="card text-white" style="background-color:rgba(45, 21, 15, 0.5);border-color:white;border-radius:20px;border-width: thick; height:75%;">
                <div class="d-flex justify-content-center">    
                    <div style="position:absolute;top:-80px;">
                        <div class="rounded-circle d-flex justify-content-center border-white-thick border-solid" style="background-color:red;width:150px;height:150px;"> 
                          <img src="<?= base_url().'asset/image/image01.png' ?>" style="height:100%; width:100%;">
                        </div>    
                    </div>
                </div>
                <div class="card-body p-5 text-center mx-5">
                    <div class="mt-5"><strong>LOGIN DISINI</strong></div>
                    <div class="mt-3">
                        <?php
                        if(isset($_GET['pesan'])){
                        if($_GET['pesan'] == "gagal"){
                            echo"<div class='alert alert-danger'>Username atau password salah.</div>";
                        }else if($_GET['pesan'] == "logout"){
                            echo"<div class='alert alert-danger'>Anda telah logout.</div>";
                        }else if($_GET['pesan'] == "belumlogin"){
                            echo"<div class='alert alert-success'>Silahkan login dulu.</div>";
                        }
                        }        
                        ?>
                        <form method="post"action="<?php echo base_url().'welcome/login'?>">
                            <div class="form-group text-left">
                                <label for="typeEmail1">Username</label>
                                <input type="text" name="username" placeholder= "Masukan Username" class="form-control form-control-1" id="typeEmail1">
                                <?php echo form_error('username'); ?>
                            </div>
                            <div class="text-left">
                                <label for="typePassword1">Password</label>
                                <input type="password" name="password" placeholder="Masukan Password" class="form-control form-control-1" id="typePassword1">
                                <?php echo form_error('password'); ?>
                            </div>

                        <button class="btn text-white btn-lg btn-outline-light px-5 rounded-pill text-center mt-5" value="Login" type="submit" style="background-color:red;"><strong>LOGIN</strong></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>