<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/registrasi.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= base_url('css/notifikasi.css') ?>">
    <title>Registrasi</title>
</head>

<body>
    <?= $this->include('layout/notifikasi'); ?>

    <div class="wrapper">

        <div class="container main">
            <div class="row">
                <!-- Bagian Kiri -->
                <div class="col-md-6 right">
                    <form action="<?= base_url('signUp') ?>" method="post">
                        <?= csrf_field() ?>

                        <div class="input-box">
                            <header class="h2">Registrasi</header>

                            <div class="input-field">
                                <input type="text" class="input" name="nama_user" id="nama_user" value="<?= old('nama_user') ?>" required autocomplete="off">
                                <label for="nama_user">Nama Lengkap</label>
                            </div>

                            <div class="input-field">
                                <input type="text" class="input" name="nama_perusahaan" id="nama_perusahaan" value="<?= old('nama_perusahaan') ?>" required autocomplete="off">
                                <label for="nama_perusahaan">Nama Perusahaan</label>
                            </div>

                            <div class="input-field">
                                <input type="text" class="input" name="nomor_telepon" id="nomor_telepon" value="<?= old('nomor_telepon') ?>" required autocomplete="off">
                                <label for="nomor_telepon">Nomor Telepon</label>
                            </div>

                            <div class="input-field">
                                <input type="text" class="input" name="alamat" id="alamat" value="<?= old('alamat') ?>" required autocomplete="off">
                                <label for="alamat">Alamat Perusahaan</label>
                            </div>

                            <label class="pb-1 px-3" for="jenis_perusahaan">Jenis Perusahaan</label>
                            <div class="input-field pb-4">
                                <select class="form-select" name="jenis_perusahaan" id="jenis_perusahaan" required>
                                    <option value="" disabled <?= old('jenis_perusahaan') ? '' : 'selected' ?>>Pilih Jenis Perusahaan</option>
                                    <option value="Ekspor" <?= old('jenis_perusahaan') == 'Ekspor' ? 'selected' : '' ?>>Ekspor</option>
                                    <option value="Importir" <?= old('jenis_perusahaan') == 'Importir' ? 'selected' : '' ?>>Importir</option>
                                </select>
                            </div>

                            <div class="input-field">
                                <input type="email" class="input" name="email" id="email" value="<?= old('email') ?>" required autocomplete="off">
                                <label for="email">Email</label>
                            </div>

                            <div class="input-field">
                                <input type="password" class="input" name="password" id="password" required>
                                <label for="password">Password</label>
                                <small class="pb-4 text-muted">*Password minimal 8 karakter</small>
                            </div>

                            <div class="input-field">
                                <input type="submit" class="submit" value="Registrasi">
                            </div>
                        </div>
                        <div class="signin">
                                <span>Sudah punya akun? <a href="<?= base_url('login') ?>">Login di sini</a></span>
                            </div>
                    </form>
                </div>

                <!-- Bagian Kanan -->
                <div class="col-md-6 side-image">
                    <img src="/images/logo.png" alt="Register Image">
                </div>
            </div>
        </div>
    </div>
</body>

</html>