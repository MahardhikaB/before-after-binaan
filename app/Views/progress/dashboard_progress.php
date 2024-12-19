<?= $this->extend('Layout/user_layout') ?>

<?= $this->section('title') ?>
Tambah Pencapaian Ekspor
<?= $this->endSection() ?>

<?= $this->section('head') ?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<link rel="stylesheet" href="https://code.jquery.com/ui/1.14.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://code.jquery.com/ui/1.14.1/jquery-ui.js"></script>
<script>
    $(function() {
        $("#tanggal_ekspor").datepicker({
            dateFormat: 'dd/mm/yy'
        });
    });
</script>
<style>
    /* Reset CSS untuk elemen */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    /* Container utama */
    .Progress {
        display: flex;
        flex-direction: column;
        justify-content: flex-start;
        align-items: center;
        width: 100%;
        max-width: 1680px;
        /* Batasi lebar maksimal untuk menjaga tata letak */
        padding: 5vh 0rem;
        background: white;
        margin: 0 auto;
        /* Pusatkan konten */
    }

    /* Hero Image atau Bagian Atas */
    .HeroImage {
        width: 100%;
        height: auto;
        background: rgba(255, 247, 212, 0.30);
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        padding: 2rem 1rem;
        text-align: center;
    }

    .DashboardPerusahaan {
        font-size: 2rem;
        margin-bottom: 1rem;
    }

    .SelamatDatangAlifiaPutriBudiyantiLihatPerkembanganTerbaruPeusahaanAndaDiSini {
        font-size: 1rem;
        /* max-width: 90%; */
    }

    /* Group56 untuk konten utama */
    .Group56 {
        display: flex;
        flex-direction: column;
        width: 100%;
        /* padding: 1rem; */
    }

    /* Bagian tab */
    .Group46 {
        display: flex;
        justify-content: space-between;
        margin-bottom: 1rem;
    }

    .tab-button {
        width: 100%;
        flex: 1;
        text-align: center;
        padding: 1rem;
        cursor: pointer;
    }

    .active-tab {
        background: #C07F00;
        color: white;
    }

    .tab-content {
        display: none;
    }

    .tab-content.active {
        display: block;
    }

    /* Group konten utama */
    .Group55 {
        width: 100%;
        display: grid;
        grid-template-columns: 1fr;
        gap: 1rem;
    }



    /* Elemen daftar */
    /* Tabel dan kolomnya */
    .Group48 {
        display: grid;
        grid-template-columns: 1fr 2fr 2fr 2fr 2fr 2fr 2fr;
        /* Tentukan ukuran kolom */
        gap: 1rem;
        padding: 1rem;
        background-color: #FFF7D4;
    }

    .Group49 {
        display: grid;
        grid-template-columns: 1fr 2fr 2fr 2fr 2fr 2fr 2fr;
        /* Sesuaikan dengan Group48 */
        gap: 1rem;
        padding: 1rem;
        background-color: white;
        align-items: center;
        /* Vertikal center agar konten sejajar */
    }

    /* Untuk setiap elemen di dalam Grid */
    .Group48 div,
    .Group49 div {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .No,
    .TanggalEkspor,
    .NegaraEkspor,
    .ProdukEkspor,
    .KuantitasEkspor,
    .BuktiEkspor,
    .Aksi {
        text-align: center;
    }

    /* Tombol Aksi */
    button.Detail,
    button.Edit {
        padding: 0.5rem 1rem;
        border-radius: 5px;
        color: white;
        text-align: center;
        cursor: pointer;
        font-family: inherit;
        font-size: 0.9rem;
    }

    /* Hover effect for buttons */
    button.Detail:hover,
    button.Edit:hover {
        opacity: 0.8;
    }

    .Group50 {
        display: flex;
        justify-content: space-between;
        padding: 1rem;
        background-color: #FFF7D4;
    }

    .Group49,
    .Group50 {
        background-color: white;
    }

    .TampilkanSemua,
    .Edit,
    .Detail {
        font-size: 1rem;
        cursor: pointer;
    }

    button.Detail,
    button.Edit {
        border: none;
        padding: 0.5rem 1rem;
        border-radius: 5px;
        color: white;
        text-align: center;
        cursor: pointer;
        margin-right: 0.5rem;
        font-family: inherit;
        /* Menjaga font agar konsisten */
    }

    /* Tombol Detail */
    button.Detail {
        background-color: #4C3D3D;
    }

    /* Tombol Edit */
    button.Edit {
        background-color: #6C5B5B;
    }

    /* Hover effect */
    button.Detail:hover,
    button.Edit:hover {
        opacity: 0.8;
    }

    .Rectangle48 {
        justify-content: end;
        justify-items: end;
        margin-bottom: 20px;
    }

    /* Tombol Tambah Data */
    .TambahData {
        background-color: #4C3D3D;
        color: white;
        text-align: center;
        padding: 0.5rem 1rem;
        border-radius: 5px;
        cursor: pointer;
        right: 30px;
        /* Menempel di kanan dengan jarak 20px dari tepi */
        top: 20px;
    }


    /* Hover effect */
    .TambahData:hover {
        opacity: 0.8;
    }

    /* Media queries untuk berbagai ukuran layar */
    @media (max-width: 768px) {
        .Group46 {
            flex-direction: column;
        }

        .Tab1,
        .Tab2,
        .Tab3,
        .PencapaianEkspor {
            padding: 0.5rem;
        }

        .DashboardPerusahaan {
            font-size: 1.5rem;
        }
    }

    @media (max-width: 480px) {
        .DashboardPerusahaan {
            font-size: 1.25rem;
        }

        .SelamatDatangAlifiaPutriBudiyantiLihatPerkembanganTerbaruPeusahaanAndaDiSini {
            font-size: 0.9rem;
        }

        .Group48,
        .Group49,
        .Group50 {
            flex-direction: column;
            align-items: flex-start;
        }

    }
</style>

<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="Progress">
    <div class="Group56">

        <!-- Bagian Hero Image -->
        <div class="HeroImage">
            <div class="Rectangle66"></div>
            <div class="DashboardPerusahaan">Progress Perusahaan</div>
            <div class="SelamatDatangAlifiaPutriBudiyantiLihatPerkembanganTerbaruPeusahaanAndaDiSini">
                Beranda/Progress Perusahaan
            </div>
        </div>

        <!-- Konten utama -->
        <div class="Group55">

            <!-- Bagian Tab Navigasi -->
            <div class="Group46 flex">

                <div data-tab="pencapaian-ekspor" class="tab-button active-tab">
                    <div class="Tab4">Pencapaian Ekspor</div>
                </div>
            </div>



            <!-- Tombol Tambah Data -->
            <div class="tab-content pencapaian-ekspor active">
                <div class="Rectangle48 justify-content-end">
                    <div class="Group47">
                        <button class="TambahData" onclick="window.location.href='progress/tambah'">Tambah
                            Data</button>
                    </div>

                </div>
                <!-- Header Tabel -->
                <div class="Group48">
                    <div class="No">No</div>
                    <div class="TanggalEkspor">Tanggal Ekspor</div>
                    <div class="NegaraEkspor">Negara Ekspor</div>
                    <div class="ProdukEkspor">Produk Ekspor</div>
                    <div class="KuantitasEkspor">Kuantitas Ekspor</div>
                    <div class="BuktiEkspor">Bukti Ekspor</div>
                    <div class="Aksi">Aksi</div>
                </div>

                <!-- Baris Tabel -->
                <?php $no = 1; ?>
                <?php foreach ($progress as $item): ?>
                    <div class="Group49">
                        <div><?= $no++ ?></div>
                        <div class="TanggalEkspor"><?= date('d-m-Y', strtotime($item['tanggal_ekspor'])) ?></div>
                        <div class="NegaraEkspor"><?= $item['negara_ekspor'] ?></div>
                        <div class="ProdukEkspor"><?= $item['produk_ekspor'] ?></div>
                        <div class="KuantitasEkspor"><?= $item['kuantitas_ekspor'] ?> kg</div>
                        <div class="BuktiEkspor">
                            <!-- Membuat link untuk mengunduh file PDF -->
                            <a href="<?= base_url('bukti_ekspor/' . $item['bukti_ekspor']) ?>" target="_blank" download>
                                <?= $item['bukti_ekspor'] ?>
                            </a>
                        </div>
                        <div class="Aksi">
                            <button class="Detail"
                                onclick="window.location.href='progress/detail/<?= $item['id'] ?>'">Detail</button>
                            <button class="Edit"
                                onclick="window.location.href='progress/edit/<?= $item['id'] ?>'">Edit</button>
                        </div>
                    </div>
                <?php endforeach; ?>

            </div>
        </div>
    </div>
</div>
<script>
    // Select all tab buttons and content
    const tabButtons = document.querySelectorAll('.tab-button');
    const tabContents = document.querySelectorAll('.tab-content');

    // Add event listeners to all tab buttons
    tabButtons.forEach(button => {
        button.addEventListener('click', function(event) {
            event.preventDefault();

            // Get the data-tab value from the clicked button
            const targetTab = this.getAttribute('data-tab');

            // Hide all tab contents
            tabContents.forEach(content => {
                content.classList.remove('active');
            });

            // Show the selected tab content by adding 'active' class
            document.querySelector('.' + targetTab).classList.add('active');
            document.querySelector('.tab-button.active-tab').classList.remove('active-tab');
            this.classList.add('active-tab')
        });
    });
</script>
<?= $this->endSection() ?>