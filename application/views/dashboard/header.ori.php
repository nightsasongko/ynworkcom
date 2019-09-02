<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?= base_url() ?>assets/bootstrap/css/bootstrap.min.css">
    <title><?= $title; ?></title>
</head>
<body>
<div style="text-align:center; margin-top:30px; font-family:Verdana, Geneva, sans-serif; ">  
<ul>
    <li><a href="<?= base_url() ?>profile">profile</a></li>
    <li><a href="<?= base_url() ?>gantipassword">Ganti Password</a></li>
    <li><a href="<?= base_url() ?>produk">produk</a></li>
    <li><a href="<?= base_url() ?>news">news tutup poin</a></li>
    <li><a href="<?= base_url() ?>cart">Keranjang belanja</a></li>
    <li><a href="<?= base_url() ?>logout">logout</a></li>
    <p>Hello... <?= $profile['nama'] ?></p>

    <script src="<?= base_url() ?>assets/bootstrap/js/bootstrap.min.css"></script>
</ul>
</div>