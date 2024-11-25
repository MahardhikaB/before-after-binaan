<?= $this->extend('/admin/templates/layout') ?>
<?= $this->section('content') ?>

<!--begin::App Main-->
<main class="app-main">
    <!--begin::App Content Header-->
    <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Member</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-end">
                        <li class="breadcrumb-item">Member</li>
                        <li class="breadcrumb-item active">Detail</li>
                    </ol>
                </div>
                <div class="app-content">
                    <!--begin::Container-->
                    <div class="container-fluid">
                        <!--begin::Row-->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <h3 class="card-title">Striped Full Width Table</h3>
                                    </div> <!-- /.card-header -->
                                    <div class="card-body p-0">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th style="width: 10px">#</th>
                                                    <th>Task</th>
                                                    <th>Progress</th>
                                                    <th style="width: 40px">Label</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr class="align-middle">
                                                    <td>1.</td>
                                                    <td>Update software</td>
                                                    <td>
                                                        <div class="progress progress-xs">
                                                            <div class="progress-bar progress-bar-danger"
                                                                style="width: 55%"></div>
                                                        </div>
                                                    </td>
                                                    <td><span class="badge text-bg-danger">55%</span></td>
                                                </tr>
                                                <tr class="align-middle">
                                                    <td>2.</td>
                                                    <td>Clean database</td>
                                                    <td>
                                                        <div class="progress progress-xs">
                                                            <div class="progress-bar text-bg-warning"
                                                                style="width: 70%"></div>
                                                        </div>
                                                    </td>
                                                    <td> <span class="badge text-bg-warning">70%</span> </td>
                                                </tr>
                                                <tr class="align-middle">
                                                    <td>3.</td>
                                                    <td>Cron job running</td>
                                                    <td>
                                                        <div class="progress progress-xs progress-striped active">
                                                            <div class="progress-bar text-bg-primary"
                                                                style="width: 30%"></div>
                                                        </div>
                                                    </td>
                                                    <td> <span class="badge text-bg-primary">30%</span> </td>
                                                </tr>
                                                <tr class="align-middle">
                                                    <td>4.</td>
                                                    <td>Fix and squish bugs</td>
                                                    <td>
                                                        <div class="progress progress-xs progress-striped active">
                                                            <div class="progress-bar text-bg-success"
                                                                style="width: 90%"></div>
                                                        </div>
                                                    </td>
                                                    <td> <span class="badge text-bg-success">90%</span> </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div> <!-- /.card-body -->
                                </div> <!-- /.card -->
                            </div> <!-- /.col -->
                        </div>
                        <!--end::Row-->
                    </div>
                    <!--end::Container-->
                </div>
                <!--end::App Content-->
            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::App Content Header-->
    <!--begin::App Content-->
    <div class="app-content">
        <!--begin::Container-->
        <!--end::Container-->
    </div>
    <!--end::App Content-->
</main>
<!--end::App Main-->

<?= $this->endSection('content') ?>