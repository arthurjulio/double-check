<body class="bg-gradient-white">

    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-xs-12">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 flex-row align-items-center justify-content-between">
                        <a href="<?= base_url('user') ?>" class="btn btn-sm btn-primary float-left">Back</a>
                        <h6 class="m-0 font-weight-bold text-primary text-center">Scan Out</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="input-group mb-3 label">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default"><small>JAI Label</small></span>
                            </div>
                            <input type="text" id="jai_label" class="form-control" name="jai_label" onkeyup="scan_label(this)" autofocus>
                        </div>
                        <div class="input-group mb-3 qr" style="display: none">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default"><small>Case Label</small></span>
                            </div>
                            <input type="text" id="jai_qr" class="form-control" name="jai_qr" onkeyup="scan_qr(this)">
                        </div>
                        <div class="input-group mb-3 pallet" style="display: none">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default"><small>Master Pallet</small></span>
                            </div>
                            <input type="text" id="jai_pallet" class="form-control" name="jai_pallet" onkeyup="scan_pallet(this)">
                        </div>
                        <div class="alert alert-success text-center" role="alert" style="display: none">
                            <h2><strong>LABEL VALID !!!</strong></h2>
                        </div>
                        <div class="alert alert-danger text-center" role="alert" style="display: none">
                            <h2><strong>LABEL TIDAK VALID !!!</strong></h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

<script>
    $(document).ready(function() {})

    function scan_label(ini) {
        if (ini.value.length > 8) {
            console.log(ini.value)
            $(".label").hide();
            $(".pallet").hide();
            $(".qr").show();
            $("#jai_qr").focus();
        }
    }

    function scan_qr(ini) {
        if (ini.value.length > 8) {
            console.log(ini.value)
            $(".label").hide();
            $(".qr").hide();
            $(".pallet").show();
            $("#jai_pallet").focus();
        }
    }

    function scan_pallet(ini) {
        if (ini.value.length > 8) {
            var jai_label = $("#jai_label").val();
            var jai_qr = $("#jai_qr").val();
            var jai_pallet = $("#jai_pallet").val();
            console.log(ini.value)

            $.ajax({
                url: "<?= base_url("scan/insert_scan_out") ?>",
                type: "POST",
                data: {
                    tipe: "label",
                    jai_label: jai_label,
                    jai_qr: jai_qr,
                    jai_pallet: jai_pallet,
                },
                cache: false,
                success: function(dataResult) {
                    var dataResult = JSON.parse(dataResult);
                    if (dataResult.statusCode == "VALID") {
                        $(".alert-danger").hide();
                        $(".alert-success").show();
                    } else if (dataResult.statusCode == "TIDAK VALID") {
                        $(".alert-success").hide();
                        $(".alert-danger").show();
                    }
                }
            });
            $("#jai_label").val("");
            $("#jai_qr").val("");
            $("#jai_pallet").val("");
            $(".qr").hide();
            $(".pallet").hide();
            $(".label").show();
            $("#jai_label").focus();
        }
    }
</script>