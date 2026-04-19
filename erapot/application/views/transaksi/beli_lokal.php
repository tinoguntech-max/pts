
			<!-- page head start-->
            <div class="page-head">
                <h3>
                    iC Solutions
                </h3>
                <span class="sub-title"><?php echo $viewoptions['pageinfo']; ?></span>
            </div>
            <!-- page head end-->
			
			<!-- main content -->
            <div id="page-wrapper" class="wrapper">
                <div class="container-fluid panel">
                    <br />
                    <div id="error-area"></div>
                    <form class="form-horizontal" name="hotlineForm" action="<?php echo base_url("pembelian"); ?>/<?php echo $viewoptions['action']; ?>" method="post" onsubmit="return validateForm();">
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-fw fa-calendar"></i></div>
                                    <input class= "form-control" type="text" name="tanggal" id="tanggal" data-bind="value: tanggal">
                                </div>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-fw fa-child"></i></div>
                                    <select class="form-control" name="supplier" id="supplier" data-bind="options: $root.availableSuppliers, value: supplier, optionText: 'nama'"></select>
                                </div>
                                <td data-bind="text: getSupplierDetil"></td>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">No. Nota</label>
                                    <div class="col-sm-8">
                                        <input class="form-control" type="text" name="nota" id="nota" data-bind="value: nota">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">No. Kwitansi</label>
                                    <div class="col-sm-8">
                                        <input class="form-control" type="text" name="kwitansi" id="kwitansi" data-bind="value: kwitansi">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Keterangan</label>
                                    <div class="col-sm-8">
                                        <input class="form-control" type="text" name="keterangan" id="keterangan" data-bind="value: keterangan">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">PPN</label>
                                    <div class="col-sm-8">
                                        <input class="form-control" type="text" name="ppn" id="ppn" data-bind="value: ppn">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Discount</label>
                                    <div class="col-sm-8">
                                        <input class="form-control" type="text" name="discount" id="discount" data-bind="value: discount">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Total Jenis Part</label>
                                    <div class="col-sm-8">
                                        <p class="form-control-static" data-bind="text: getTotalJenisPart"></p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Total Part</label>
                                    <div class="col-sm-8">
                                        <p class="form-control-static" data-bind="text: getTotalPart"></p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Total Harga</label>
                                    <div class="col-sm-8">
                                        <p class="form-control-static" data-bind="text: getTotalHarga"></p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Total Discount</label>
                                    <div class="col-sm-8">
                                        <p class="form-control-static" data-bind="text: getTotalDiscount"></p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">PPN</label>
                                    <div class="col-sm-8">
                                        <p class="form-control-static" data-bind="text: getTotalPPN"></p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-4 control-label">Total Akhir</label>
                                    <div class="col-sm-8">
                                        <p class="form-control-static" data-bind="text: getTotalAkhir"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="input-group" id="motor-control">
                                    <div class="input-group-addon"><i class="fa fa-gears"></i></div>
                                    <input type="text" class="form-control" id="city" placeholder="Scan Barang (Part)">
                                </div>
                            </div>
                        </div>
                        <table class="table table-striped table-hover" id="toro">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Kode</th>
                                    <th>Nama</th>
                                    <th>Jumlah</th>
                                    <th>Satuan</th>
                                    <th>Harga</th>
                                    <th>Sub Total</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody data-bind="sortable: pembelians">
                                <tr>
                                    <td></td>
                                    <td data-bind="text: getKodeBarang"></td>
                                    <td data-bind="text: getNamaBarang"></td>
                                    <td><input class="form-control" data-bind="value: jumlah" /></td>
                                    <td data-bind="text: getSatuanBarang"></td>
                                    <td data-bind="text: getHargaBarang"></td>
                                    <td data-bind="text: getSubTotal"></td>
                                    <td><a class="btn btn-danger" href="#" data-bind="click: $root.removeEntity"><i class="fa fa-fw fa-trash"></i></a></td>
                                </tr>
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>