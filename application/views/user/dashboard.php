<div class="container mt-5">
    <div class="row">
        <div class="col-lg-3 col-md-6 col-6">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <!-- <div class="card-header py-3 flex-row align-items-center justify-content-between">
                </div> -->
                <!-- Card Body -->
                <div class="card-body">
                    <div class="text-center">
                        <a href="<?= base_url('scan/scan_in') ?>">
                            <img src="<?= base_url('assets/img/scan_in.png') ?>" alt="" class="img-fluid">
                        </a>
                        <h6 class="m-0 mt-2 font-weight-bold text-primary text-center">Scan In</h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-6">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <!-- <div class="card-header py-3 flex-row align-items-center justify-content-between">
                </div> -->
                <!-- Card Body -->
                <div class="card-body">
                    <div class="text-center">
                        <a href="<?= base_url('scan/scan_out') ?>">
                            <img src="<?= base_url('assets/img/scan_out.png') ?>" alt="" class="img-fluid">
                        </a>
                        <h6 class="m-0 mt-2 font-weight-bold text-primary text-center">Scan Out</h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-6">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <!-- <div class="card-header py-3 flex-row align-items-center justify-content-between">
                </div> -->
                <!-- Card Body -->
                <div class="card-body">
                    <div class="text-center">
                        <a href="<?= base_url('scan/log') ?>">
                            <img src="<?= base_url('assets/img/log.png') ?>" alt="" class="img-fluid">
                        </a>
                        <h6 class="m-0 mt-2 font-weight-bold text-primary text-center">Log</h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-6" <?= ($user['level'] !== "SPV") ? "style='display: none'" : "" ?>>
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <!-- <div class="card-header py-3 flex-row align-items-center justify-content-between">
                </div> -->
                <!-- Card Body -->
                <div class="card-body">
                    <div class="text-center">
                        <a href="<?= base_url('user/setup') ?>">
                            <img src="<?= base_url('assets/img/setup.png') ?>" alt="" class="img-fluid">
                        </a>
                        <h6 class="m-0 mt-2 font-weight-bold text-primary text-center">Setup</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>