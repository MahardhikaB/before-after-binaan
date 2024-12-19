<?= $this->extend('Layout/user_layout') ?>

<?= $this->section('title') ?>
Tambah Pencapaian Ekspor
<?= $this->endSection() ?>

<?= $this->section('head') ?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<link rel="stylesheet" href="https://code.jquery.com/ui/1.14.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://code.jquery.com/ui/1.14.1/jquery-ui.js"></script>
<script>
    $(function() {
        $("#tanggal_ekspor").datepicker({
            dateFormat: 'dd/mm/yy',
            maxDate: "+0D"
        });
    });
</script>
<style>
    .form-container {
        background: rgba(235, 231, 231, 0.78);
        box-shadow: 10px 10px 10px rgba(0, 0, 0, 0.22);
        border-radius: 10px;
        padding: 100px;
        margin-bottom: 165px;
    }

    .form-container .form input {
        background-color: #FFF7D4;
        background: transparent;
        border: none;
        border-bottom: 1px solid rgba(0, 0, 0, 0.2);
        outline: none;
        transition: 0.3s;
        box-shadow: none;

    }

    .form-container .btn-primary {
        background-color: #4C3D3D;
        width: 45%;

        border: none;
        padding: 10px 20px;
        font-weight: 600;
        transition: 0.4s;
        border-radius: 5px;
    }

    @media (max-width: 576px) {
        .form-container .btn-primary {
            width: 100%;
        }
    }

    /* Remove Up and Down Arrow */
    /* Chrome, Safari, Edge, Opera */
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    /* Firefox */
    input[type=number] {
        appearance: textfield;
        -moz-appearance: textfield;
    }
</style>

<?= $this->endSection() ?>

<?= $this->section('content') ?>
<script>
    $(document).ready(function() {
        // Input mask untuk "Nilai Ekspor (Rp)"
        $('#nilai_ekspor_rp').on('input', function() {
            var value = $(this).val();
            // Hapus karakter non-angka, dan pastikan simbol "Rp" muncul di depan
            value = value.replace(/[^0-9]/g, '');
            if (value) {
                $(this).val('Rp ' + value);
            } else {
                $(this).val('');
            }
        });

        // Input mask untuk "Nilai Ekspor (USD)"
        $('#nilai_ekspor_usd').on('input', function() {
            var value = $(this).val();
            // Hapus karakter non-angka, dan pastikan simbol "$" muncul di depan
            value = value.replace(/[^0-9]/g, '');
            if (value) {
                $(this).val('$ ' + value);
            } else {
                $(this).val('');
            }
        });

        // Input mask untuk "Kuantitas Ekspor"
        $('#kuantitas_ekspor').on('input', function() {
            var value = $(this).val();
            // Hapus karakter non-angka, dan pastikan simbol "kg" muncul di belakang
            value = value.replace(/[^0-9]/g, '');
            if (value) {
                $(this).val(value + ' kg');
            } else {
                $(this).val('');
            }
        });
    });
</script>


<div class="container px-md-0 px-4">
    <div class="form-container mt-5 px-5 py-5">
        <h1 class="text-center">Tambah Pencapaian Ekspor</h1>
        <?php
        $errorsImage = \Config\Services::validation()->getErrors();
        ?>

        <form class="form row px-md-5 mt-5" action="/user/progress/save" method="post" enctype="multipart/form-data">
            <?= csrf_field(); ?>
            <div class="col-md px-5">
                <div class="input-form mb-3">
                    <label class="form-label" for="tanggal_ekspor">Tanggal Ekspor</label>
                    <input class="form-control border border-dark border-2" type="text" id="tanggal_ekspor"
                        name="tanggal" value="<?= old('tanggal') ?>">
                    <p class="mt-1 text-danger">
                        <?= isset($errors['tanggal_ekspor']) ? $errors['tanggal_ekspor'] : ''; ?>
                    </p>
                </div>
                <div class="input-form mb-3">
                    <label class="form-label" for="negara_ekspor">Negara Ekspor</label>
                    <input class="form-control border border-dark border-2" type="text" id="negara_ekspor"
                        name="negara" value="<?= old('negara') ?>">
                    <p class="mt-1 text-danger"><?= isset($errors['negara_ekspor']) ? $errors['negara_ekspor'] : ''; ?></p>
                </div>
                <div class="input-form mb-3">
                    <label class="form-label" for="jenis_ekspor">Jenis Ekspor</label>
                    <input class="form-control border border-dark border-2" type="text" id="jenis_ekspor"
                        name="jenis" value="<?= old('jenis') ?>">
                    <p class="mt-1 text-danger"><?= isset($errors['jenis_ekspor']) ? $errors['jenis_ekspor'] : ''; ?></p>
                </div>
                <div class="input-form mb-3">
                    <label class="form-label" for="produk_ekspor">Produk Ekspor</label>
                    <input class="form-control border border-dark border-2" type="text" id="produk_ekspor"
                        name="produk" value="<?= old('produk') ?>">
                    <p class="mt-1 text-danger"><?= isset($errors['produk_ekspor']) ? $errors['produk_ekspor'] : ''; ?></p>
                </div>
                <div class="input-form mb-3">
                    <label class="form-label" for="nama_importir">Nama Importir</label>
                    <input class="form-control border border-dark border-2" type="text" id="nama_importir"
                        name="nama_importir" value="<?= old('nama_importir') ?>">
                    <p class="mt-1 text-danger"><?= isset($errors['nama_importir']) ? $errors['nama_importir'] : ''; ?></p>
                </div>
            </div>
            <div class="col-md px-5">
                <div class="input-form mb-3">
                    <label class="form-label" for="nilai_ekspor_rp">Nilai Ekspor (Rp)</label>
                    <input class="form-control border border-dark border-2" type="text" id="nilai_ekspor_rp"
                        name="nilai_ekspor_rp" value="<?= old('nilai_ekspor_rp') ?>" placeholder="Masukkan jumlah">
                    <p class="mt-1 text-danger"><?= isset($errors['nilai_ekspor_rp']) ? $errors['nilai_ekspor_rp'] : ''; ?></p>
                </div>

                <div class="input-form mb-3">
                    <label class="form-label" for="nilai_ekspor_usd">Nilai Ekspor (USD)</label>
                    <input class="form-control border border-dark border-2" type="text" id="nilai_ekspor_usd"
                        name="nilai_ekspor_usd" value="<?= old('nilai_ekspor_usd') ?>" placeholder="Masukkan jumlah">
                    <p class="mt-1 text-danger"><?= isset($errors['nilai_ekspor_usd']) ? $errors['nilai_ekspor_usd'] : ''; ?></p>
                </div>
                <div class="input-form mb-3">
                    <label class="form-label" for="kuantitas_ekspor">Kuantitas Ekspor</label>
                    <input class="form-control border border-dark border-2" type="text" id="kuantitas_ekspor"
                        name="kuantitas" value="<?= old('kuantitas') ?>" placeholder="Masukkan kuantitas dalam kg">
                    <p class="mt-1 text-danger"><?= isset($errors['kuantitas_ekspor']) ? $errors['kuantitas_ekspor'] : ''; ?></p>
                </div>

                <div class="input-form mb-3">
                    <label class="form-label" for="bukti_ekspor">Bukti Ekspor</label>
                    <input aria-describedby="file_input_help" type="file" class="form-control border border-dark border-2"
                        id="bukti_ekspor" name="bukti_ekspor">
                    <p class="mt-1 text-danger"><?= isset($errorsImage['bukti_ekspor']) ? $errorsImage['bukti_ekspor'] : ''; ?></p>
                </div>
                <div class="input-form mb-3 d-flex flex-md-row flex-column justify-content-between align-items-center mt-5">
                    <a class="btn btn-primary border border-dark border-2" href="/user/progress">Kembali</a>
                    <button class="btn btn-primary border border-dark border-2 mt-md-0 mt-3" type="submit">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection() ?>