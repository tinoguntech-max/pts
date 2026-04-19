			<!--body wrapper start-->
            <div class="wrapper">

                <div class="panel invoice">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-xs-4">
                                <div class="invoice-logo">
                                    <img src="<?= base_url()?>img/invoice-logo.png" alt=""/>
                                </div>
                            </div>
                            <div class="col-xs-8">
                                <h1>Stock Mutation</h1>
                            </div>
                            <!--<div class="col-xs-4">
                                <div class="total-purchase">
                                    Total Purchase
                                </div>
                                <div class="amount">
                                    $ 4784.00
                                </div>
                            </div>-->
                        </div>
                        <div class="row">
                            <div class="col-xs-4">

                                <address>
                                    <strong><?= $toro['nama_lengkap'] ?></strong>
                                    <br><?= $toro['alamat_baris1'] ?>
                                    <br>
                                    <?= $toro['alamat_baris2'] ?>
                                    <br>
                                    <?= $toro['alamat_baris3'] ?>
                                    <br/>
                                    P: <?= $toro['contact_telepon'] ?>
                                </address>
                            </div>
                            <div class="col-xs-4">
                                <strong>
                                    DARI
                                </strong>
                                <br/><?= get_m_cabang($detil[0]['id_m_cabang']) ?><br/>
								<strong>
                                    KEPADA
                                </strong>
                                <br/><?= get_m_cabang($detil[0]['id_m_cabang_tujuan']) ?>
                            </div>
                            <div class="col-xs-4 inv-info">
								<strong>
                                    INFO
                                </strong>
								<table>
									<tr><td><strong>NO</strong></td><td>: &nbsp;&nbsp;</td><td><?= $detil[0]['no_faktur'] ?></td></tr>
									<tr><td><strong>Tanggal Buat</strong></td><td>: &nbsp;&nbsp;</td><td><?= $detil[0]['tanggal_buat'] ?></td></tr>
									<tr><td><strong>Tanggal Kirim</strong></td><td>: &nbsp;&nbsp;</td><td><?= $detil[0]['tanggal_kirim'] ?></td></tr>
								</table>
                            </div>
                        </div>

                        <table class="table table-striped table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>KODE</th>
                                <th>NAMA BARANG</th>
                                <th>JUMLAH</th>
                                <th>SATUAN</th>
                                <th>KETERANGAN</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $a=0; $total=0; if (isset($detils)): ?>
							<?php if (is_array($detils)): ?>
							<?php foreach ($detils as $key => $value) : $a++; $total+=$value['kuantitas']; ?>
							<tr id="t-<?= $a ?>">
								<td id="t0-<?= $a ?>"><?= $a ?></td>
								<td id="t1-<?= $a ?>"><?= $value['id_barang'] ?></td>
								<td id="t2-<?= $a ?>"><?= get_barang($value['id_barang']) ?></td>
								<td id="t5-<?= $a ?>"><?= $value['kuantitas'] ?></td>
								<td id="t6-<?= $a ?>"><?= get_barang_satuan($value['id_barang']) ?></td>
								<td id="t7-<?= $a ?>"><?= $value['keterangan'] ?></td>
							</tr>
							<?php endforeach; ?>
							<?php endif; ?>
							<?php endif; ?>
                            </tbody>
                        </table>

                        <div class="row">
                            <div class="col-xs-7">
                                <h4>KETERANGAN</h4>
                                <ul class="list-unstyled">
                                    <li>
                                        <?= $detil[0]['keterangan'] ?>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-xs-5">
                                <table class="table table-hover">
                                    <tbody>
                                    <tr>
                                        <td>Macam Barang</td>
                                        <td><?= $a ?></td>
                                    </tr>
                                    <tr>
                                        <td>Jumlah Total Barang</td>
                                        <td><?= $total ?></td>
                                    </tr>
                                    <!--<tr>
                                        <td>Discount</td>
                                        <td>$ 43</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <strong>GRAND TOTAL</strong>
                                        </td>
                                        <td><strong>$ 4784.00</strong></td>
                                    </tr>-->
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <br/>
                        <br/>
                        <br/>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="pull-left">
                                    <a class="btn btn-danger" onclick="javascript:window.print();"><i class="fa fa-print"></i> Print</a>
                                    <!--<a href="#" class="btn btn-success">Generate PDF</a>-->
                                </div>
                                <div class="pull-right">
                                    <a href="<?= base_url('stock_mutasi') ?>" class="btn btn-success"><i class="fa fa-reply"></i> Kembali Menu Utama</a>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>

            </div>
            <!--body wrapper end-->