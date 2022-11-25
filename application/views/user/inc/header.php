<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title><?= $title ?></title>
</head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css"> -->
<link rel="stylesheet" href="<?= base_url('assets/font-awesome.min.css'); ?>">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">

<!--  -->

<link rel="stylesheet" href="<?= base_url('assets/user/select2.min.css') ?>">
<link rel="stylesheet" href="<?= base_url('assets/user/style.css') ?>">

<body>
   <div class="wrapper">


      <!-- navbar -->
      <nav class="navbar navbar-expand-lg navbar-light bg-transparent">
         <div class="container mt-2">
            <a class="navbar-brand" href="<?= base_url('beranda') ?>">DINAS PERTANIAN TTU</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
               <ul class="navbar-nav ml-auto text-weight-400">
                  <li class="nav-item">
                     <a class="nav-link" href="<?= base_url('beranda') ?>">Home</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="<?= base_url('about') ?>">About</a>
                  </li>
                  <li class="nav-item">
                     <a href="<?= base_url('hasil_pertanian') ?>" class="nav-link">Hasil</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="<?= base_url('lokasi') ?>">Lokasi</a>
                  </li>
               </ul>
            </div>
         </div>
      </nav>
      <!-- end navbar -->