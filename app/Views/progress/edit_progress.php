<?= $this->extend('Layout/user_layout') ?>

<?= $this->section('title') ?>
Edit Pencapaian Ekspor
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
<style>
.form-container {
    background-color: #FFF7D4;
}

.form-container .form input {
    background-color: #FFF7D4;
}

.form-container .btn-primary {
    background-color: #4C3D3D;
    width: 45%;
}

#img_bukti {
    height: 200px;
    margin: 0 auto;
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
<div class="container px-md-0 px-4">
    <div class="form-container mt-5 px-5 py-5">
        <h1 class="text-center">Edit Pencapaian Ekspor</h1>
        <form class="form row px-md-5 mt-5" action="/user/progress/update/<?= $progress['id'] ?>" method="post"
            enctype="multipart/form-data">
            <?= csrf_field(); ?>
            <input type="hidden" name="fotoBuktiLama" value="<?= $progress['bukti_ekspor'] ?>">
            <div class="col-md px-5">
                <div class="input-form mb-3">
                    <label class="form-label" for="tanggal_ekspor">Tanggal Ekspor</label>
                    <input class="form-control border border-dark border-2" type="text" id="tanggal_ekspor"
                        value="<?= date('d-m-Y', strtotime($progress['tanggal_ekspor'])) ?>" name="tanggal">
                    <p class="mt-1 text-danger">
                        <?= isset($errors['tanggal_ekspor']) ? $errors['tanggal_ekspor'] : ''; ?>
                    </p>
                </div>
                <div class="input-form mb-3">
                    <label class="form-label" for="negara_ekspor">Negara Ekspor</label>
                    <input class="form-control border border-dark border-2" type="text" id="negara_ekspor" name="negara"
                        value="<?= $progress['negara_ekspor'] ?>">
                    <p class="mt-1 text-danger">
                        <?= isset($errors['negara_ekspor']) ? $errors['negara_ekspor'] : ''; ?>
                    </p>
                </div>
                <div class="input-form mb-3">
                    <label class="form-label" for="jenis_ekspor">Jenis Ekspor</label>
                    <input class="form-control border border-dark border-2" type="text" id="jenis_ekspor" name="jenis"
                        value="<?= $progress['jenis_ekspor'] ?>">
                    <p class="mt-1 text-danger">
                        <?= isset($errors['jenis_ekspor']) ? $errors['jenis_ekspor'] : ''; ?>
                    </p>
                </div>
                <div class="input-form mb-3">
                    <label class="form-label" for="produk_ekspor">Produk Ekspor</label>
                    <input class="form-control border border-dark border-2" type="text" id="produk_ekspor" name="produk"
                        value="<?= $progress['produk_ekspor'] ?>">
                </div>
                <div class="input-form mb-3">
                    <label class="form-label" for="nama_importir">Nama Importir</label>
                    <input class="form-control border border-dark border-2" type="text" id="nama_importir"
                        name="nama_importir" value="<?= $progress['nama_importir'] ?>">
                </div>
            </div>
            <div class="col-md px-5">
                <div class="input-form mb-3">
                    <label class="form-label" for="nilai_ekspor_rp">Nilai Ekspor (Rp)</label>
                    <input class="form-control border border-dark border-2" type="text" id="nilai_ekspor_rp"
                        name="nilai_ekspor_rp" value="<?= number_format($progress['nilai_ekspor_rp'], 0, ',', '.') ?>">
                </div>
                <div class="input-form mb-3">
                    <label class="form-label" for="nilai_ekspor_usd">Nilai Ekspor (USD)</label>
                    <input class="form-control border border-dark border-2" type="text" id="nilai_ekspor_usd"
                        name="nilai_ekspor_usd" value="<?= number_format($progress['nilai_ekspor_usd'], 0, ',', '.') ?>">
                </div>
                <div class="input-form mb-3">
                    <label class="form-label" for="kuantitas_ekspor">Kuantitas Ekspor</label>
                    <input class="form-control border border-dark border-2" type="text" id="kuantitas_ekspor"
                        name="kuantitas" value="<?= number_format($progress['kuantitas_ekspor'], 0, ',', '.') ?> kg">
                </div>
                <div class="mb-3 flex flex-column">
                    <p class="form-label" for="bukti_ekspor">Bukti Ekspor</p>
                    <?php
                        $filePath = '/bukti_ekspor/' . $progress['bukti_ekspor'];
                        $fileName = pathinfo($progress['bukti_ekspor'], PATHINFO_FILENAME); // Ambil nama file tanpa ekstensi
                    ?>
                    <a href="<?= $filePath ?>" class="btn btn-link" download><?= $fileName ?>.pdf</a>
                    <input aria-describedby="file_input_help" type="file"
                        class="form-control border border-dark border-2 mt-2" id="bukti_ekspor" name="bukti_ekspor">
                    <p class="mt-1 text-danger">
                        <?= isset($errorsImage['bukti_ekspor']) ? $errorsImage['bukti_ekspor'] : ''; ?>
                    </p>
                </div>
                <div
                    class="input-form mb-3 d-flex flex-md-row flex-column justify-content-between align-items-center mt-5">
                    <a class="btn btn-primary border border-dark border-2" href="/user/progress">Kembali</a>
                    <button class="btn btn-primary border border-dark border-2 mt-md-0 mt-3"
                        type="submit">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>
<?= $this->endSection() ?>
