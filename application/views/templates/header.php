<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
    <title>Document</title>
</head>
<body class = "bg-gray-200">
    <nav class="bg-white p-6 flex justify-between mb-5">
        <ul class = "flex items-center">
            <li>
                <a href="<?php echo base_url() ?>" class = "p-3">Home</a>
            </li>
            <li>
                <a href="" class = "p-3">About</a>
            </li>
            <li>
                <a href="" class = "p-3">Posts</a>
            </li>
            <li>

        </ul>

        <ul class = "flex items-center">

        <?php  if($this->session->userdata('logged_in')): ?>
             <li>
                <a href="<?php echo base_url() ?>" class = "p-3">John Patrick Echavez</a>
            </li>
            <li>
                <a href="" class = "p-3">Logout</a>
            </li>

        <?php endif; ?>

        <?php  if(!$this->session->userdata('logged_in')): ?>
           
            <li>
                <a href="<?php echo base_url() ?>login" class = "p-3">Login</a>
            </li>
            <li>
                <a href="<?php echo base_url() ?>register" class = "p-3">Register</a>
            </li>

            <li>

        <?php endif; ?>

        </ul>

    </nav>
    <div class="m-5">

    <div class="flex justify-center">

 
    </div>


