<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="<?= base_url('css/notifikasi.css') ?>">
    <title>Login</title>
</head>

<body>
<?= $this->include('layout/notifikasi'); ?>
    <div class="wrapper">
        <div class="container main">
            <div class="row">
                <!-- Bagian Kiri -->
                <div class="col-md-6 side-image">
                    <img src="images/logo.png" alt="">
                </div>

                <!-- Bagian Kanan -->
                <div class="col-md-6 right">
                    <form action="<?= base_url('login') ?>" method="post">
                        <?= csrf_field() ?> <!-- Menambahkan token CSRF -->

                        <div class="input-box">
                            <header class="h2">Login</header>

                            <!-- Input Email -->
                            <div class="input-field">
                                <input type="email" class="input" name="email" id="email" required autocomplete="off" value="<?= old('email') ?>">
                                <label for="email">Email</label>
                            </div>

                            <!-- Input Password -->
                            <div class="input-field">
                                <input type="password" class="input" name="password" id="password" required value="<?= old('password') ?>">
                                <label for="password">Password</label>
                            </div>

                            <!-- Tombol Submit -->
                            <div class="input-field">
                                <input type="submit" class="submit" value="Login">
                            </div>

                            <div class="signin">
                                <span>Belum punya akun? <a href="<?= base_url('registrasi') ?>">Daftar di sini</a></span>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>