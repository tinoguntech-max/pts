			<!--body wrapper start-->
            <div class="wrapper">

                <div class="panel invoice">
                    <div class="panel-body">
                        <?= $content ?>

                        <br/>
                        <br/>
                        <br/>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="pull-left">
                                    <a class="btn btn-danger" onclick="javascript:window.print();"><i class="fa fa-print"></i> Print</a>
									<a class="btn btn-success" href="<?= base_url('beli_minta/print_faktur/'.base64_encode($detil[0]['id'])) ?>">
										<i class="fa fa-file-excel-o"></i> Excel
									</a>
                                </div>
                                <div class="pull-right">
                                    <a href="<?= base_url('pos_beli_terima_manage') ?>" class="btn btn-success"><i class="fa fa-reply"></i> Kembali Menu Utama</a>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>

            </div>
            <!--body wrapper end-->
			<script>
				JsBarcode("#toro-barcode", "<?= $detil[0]['no_faktur'] ?>", {height: 55, width: 1});
			</script>