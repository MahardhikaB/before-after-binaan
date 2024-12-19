<?= $this->extend('Layout/user_layout') ?>

<?= $this->section('title') ?>
Dashboard Perusahaan
<?= $this->endSection() ?>

<?= $this->section('head') ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<link rel="stylesheet" href="/css/dashboard_user.css">
<link rel="stylesheet" href="<?= base_url('css/notifikasi.css') ?>">
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<?= $this->include('layout/notifikasi'); ?>
<div class="pat">
<div class="hero-section">
    <div class="hero-text">
        <h1>Dashboard Perusahaan</h1>
        <p>Selamat Datang, <b><?= esc($user['nama_user']) ?>.</b> 
            <br>Lihat perkembangan terbaru perusahaan Anda di sini.</br></p>
        <a href="<?= base_url('/user/profile') ?>" class="btn">My Profile</a>
    </div>
</div>

<div class="company-information">
    <div class="user-details">
        <h4><?= esc($perusahaan['nama_perusahaan']) ?></h4>
        <p>Nama Peserta : <?= esc($user['nama_user']) ?></p>
        <p>Alamat Perusahaan : <?= esc($perusahaan['alamat']) ?></p>
    </div>
    <div class="bootcamp-details">
        <h4>MASA PELATIHAN</h4>
        <p>Tanggal Mulai  : <?= $perusahaan['pelatihan_mulai'] ? date('d - m - Y', strtotime($perusahaan['pelatihan_mulai'])) : 'Belum ada data' ?></p>
        <p>Tanggal Selesai : ~sekarang</p>
    </div>
</div>
</div>
<?= $this->endSection() ?>
