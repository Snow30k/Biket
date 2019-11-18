<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Biket</title>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
   <link rel="stylesheet" href="<?= base_url('assets/css/') ?>biket.css">
</head>

<body>
   <nav class="navbar shadow-sm sticky-top navbar-expand-md navbar-light bg-light">
      <a class="navbar-brand" href="<?= base_url() ?>">
         <img src="<?= base_url('assets/img/') ?>Lambang_Kota_Palu.png" width="50" height="60" class="d-inline-block align-top" alt="">
         <span class="brand-text">Dinas Pendidikan<br>Dan Kebudayaan<br>
            <span class="brand-black">BIDANG KETENAGAAN</span></span>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
         <ul class="navbar-nav ml-auto">
            <li class="nav-item ">
               <a class="nav-link" href="<?= base_url() ?>">Beranda</a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="<?= base_url('info') ?>">Info</a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="<?= base_url('regulasi') ?>">Regulasi</a>
            </li>
            <li class="nav-item dropdown">
               <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Link
               </a>
               <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="http://info.gtk.kemdikbud.go.id/" target="blank">SIMGTK</a>
                  <a class="dropdown-item" href="https://paspor.simpkb.id/casgpo/login?service=https%3A%2F%2Fapp.simpkb.id%2Fauth%2Flogin" target="blank">SIMPKB</a>
                  <a class="dropdown-item" href="http://simrasio.gtk.kemdikbud.go.id:2018/login" target="blank">SIMRASIO</a>
               </div>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="<?= base_url('Kontak') ?>">Kontak</a>
            </li>
         </ul>
      </div>
   </nav>