
			<!-- main content -->
			<div id="page-wrapper">
				<div class="container-fluid">
					
					<div class="row">
						<div class="col-lg-12">
							<h1 class="page-header">
								<?php echo $viewoptions['pageinfo']; ?>
							</h1>
							<ol class="breadcrumb">
								<li><a href="<?php echo base_url(); ?>"><i class="fa fa-home"></i></a></li>
								<li class="active">
									<i class="fa fa-list"></i> <?php echo $viewoptions['pageinfo']; ?>
								</li>
							</ol>
						</div>
					</div>

					<div id="error-area"></div>
					<form name="hotlineForm" action="<?php echo base_url("penjualan"); ?>/<?php echo $viewoptions['action']; if($viewoptions['action'] == 'update') echo '/'.base64_encode($primary); ?>" onsubmit="return validateForm();" method="post">
						<div class="row">
							<div class="col-lg-4">
								<div class="input-group">
									<div class="input-group-addon"><i class="fa fa-calendar"></i></div>
									<input type="text" class="form-control" id="tanggal" name="tanggal"
									value="<?php if (isset($detil)) echo ($detil[0]['tanggal']);
										else echo date('Y-m-d'); ?>" placeholder="Tanggal Pembelian">
								</div>
								<p></p>
								<div class="input-group">
									<div class="input-group-addon"><i class="fa fa-child"></i></div>
									<input type="text" class="form-control" id="customer-name" placeholder="Cari Customer" 
										value="<?php if(isset($detil)) echo get_customer($detil[0]['id_customer']); ?>">
									<input type="hidden" name="customer" id="customer" 
										value="<?php if(isset($detil)) echo $detil[0]['id_customer']; ?>">
								</div>
								<div id="customer-area" style="margin-left:35px;">
									<?php if (isset($detil)): ?>
									<address>
										<strong><?= get_customer($detil[0]['id_customer']) ?></strong><br />
										<?= get_customer_alamat($detil[0]['id_customer']) ?><br />
										<abbr title="Phone">P:</abbr> <?= get_customer_telp($detil[0]['id_customer']) ?>
									</address>
									<?php else : ?>
									<p></p>
									<?php endif; ?>
								</div>
							</div>
							<div class="col-lg-4">
								<div class="input-group">
									<div class="input-group-addon"><i class="fa fa-folder"></i></div>
									<input type="text" class="form-control" id="po_no" name="po_no"
										value="<?php if (isset($detil)) echo ($detil[0]['po_no']); ?>" placeholder="No PO">
								</div>
								<p></p>
								<div class="input-group">
									<div class="input-group-addon"><i class="fa fa-folder"></i></div>
									<input type="text" class="form-control" id="do_no" name="do_no"
										value="<?php if (isset($detil)) echo ($detil[0]['do_no']); ?>" placeholder="No DO">
								</div>
								<p></p>
								<div class="input-group">
									<div class="input-group-addon"><i class="fa fa-folder"></i></div>
									<input type="text" class="form-control" id="nota_no" name="nota_no"
										value="<?php if (isset($detil)) echo ($detil[0]['nota_no']); ?>" placeholder="No Nota">
								</div>
								<p></p>
								<div class="input-group">
									<div class="input-group-addon"><i class="fa fa-folder"></i></div>
									<input type="text" class="form-control" id="kwitansi_no" name="kwitansi_no"
										value="<?php if (isset($detil)) echo ($detil[0]['kwitansi_no']); ?>" placeholder="No Kwitansi">
								</div>
								<p></p>
								<div class="input-group">
									<div class="input-group-addon"><i class="fa fa-folder"></i></div>
									<input type="text" class="form-control" id="keterangan" name="keterangan"
										value="<?php if (isset($detil)) echo ($detil[0]['keterangan']); ?>" placeholder="Keterangan">
								</div>
								<p></p>
								<div class="input-group">
									<div class="input-group-addon"><i class="fa fa-folder"></i></div>
									<input type="number" class="form-control" id="ppn" name="ppn"
										value="<?php if (isset($detil)) echo ($detil[0]['ppn_p']); ?>" placeholder="PPN (%)">
								</div>
							</div>
							<div class="col-lg-4">
								<dl class="dl-horizontal">
									<dt>Total Jenis Part</dt>
									<dd id="total-jenis">0</dd>
									<dt>Total Part</dt>
									<dd id="total-part">0</dd>
									<dt>Total Harga</dt>
									<dd id="total-harga">0</dd>
									<dt>Total Diskon</dt>
									<dd id="total-diskon">0</dd>
									<dt>PPN</dt>
									<dd id="total-ppn">0</dd>
									<dt>Total Akhir</dt>
									<dd id="total-akhir">0</dd>
								</dl>
								
								<button class="btn btn-primary" type="submit"><i class="fa fa-hdd-o"></i> Simpan Data</button>
								<a href="#" class="btn btn-danger">Clear Form</a>
							</div>
						</div>
						<hr />
						<div class="row">
							<div class="col-lg-12">
								<div class="input-group" id="motor-control">
									<div class="input-group-addon"><i class="fa fa-gears"></i></div>
									<input type="text" class="form-control" id="city" placeholder="Scan Barang (Part)">
								</div>
								<br />
								<table class="table table-striped table-hover" id="toro">
									<thead>
										<tr>
											<th>No</th>
											<th>Kode</th>
											<th>Nama</th>
											<th>Kode PO</th>
											<th>Nama PO</th>
											<th style="width:90px;">Jumlah</th>
											<th style="width:30px;">Satuan</th>
											<th>Harga</th>
											<th>Diskon</th>
											<th>Sub</th>
											<th>Aksi</th>
										</tr>
									</thead>
									<tbody id="toro-body">
										<?php if (isset($detils)): ?>
										<?php if (is_array($detils)): $a=0; ?>
										<?php foreach ($detils as $key => $value) : $a++; ?>
										<tr id="t-<?= $a ?>">
											<td id="t0-<?= $a ?>"><?= $a ?></td>
											<td id="t1-<?= $a ?>"><?= $value['id_barang'] ?></td>
											<td id="t2-<?= $a ?>"><?= get_barang($value['id_barang']) ?>
												<input type="hidden" name="ids[<?= $a-1 ?>]" value="<?= $value['id_barang'] ?>"></td>
											<td id="t3-<?= $a ?>">
												<input class="form-control" type="text" name="po_id[<?= $a-1 ?>]" value="<?= $value['po_id'] ?>"></td>
											<td id="t4-<?= $a ?>">
												<input class="form-control" type="text" name="po_nama[<?= $a-1 ?>]" value="<?= $value['po_nama'] ?>"></td>
											<td id="t5-<?= $a ?>">
												<input class="form-control" type="number" name="banyak[<?= $a-1 ?>]" value="<?= $value['jumlah'] ?>"></td>
											<td id="t6-<?= $a ?>" width="100">
												<select class="form-control" name="satuan[<?= $a-1 ?>]">
												<?php if (isset($satuan)) : ?>
												<?php if (is_array($satuan)): ?>
												<?php foreach ($satuan as $keys => $values) : ?>
												<?php if ($value['satuan'] == $values['id']): ?>
													<option value="<?= $values['id'] ?>" selected><?= $values['nama'] ?></option>
												<?php else : ?>
													<option value="<?= $values['id'] ?>"><?= $values['nama'] ?></option>
												<?php endif; ?>
												<?php endforeach; ?>
												<?php endif; ?>
												<?php endif; ?>
												</select></td>
											<td id="t7-<?= $a ?>">
												<input class="form-control" type="number" step="0.01" name="harga[<?= $a-1 ?>]" value="<?= $value['harga'] ?>"></td>
											<td id="t8-<?= $a ?>">
												<input class="form-control" type="number" step="0.01" name="disc[<?= $a-1 ?>]" value="<?= $value['disc'] ?>"></td>
											<td id="t9-<?= $a ?>">0</td>
											<td id="t10-<?= $a ?>">
												<a class="btn btn-danger" href="#" onclick="deleted(<?= $a ?>);"><i class="fa fa-trash"></i></a></td>
										</tr>
										<?php endforeach; ?>
										<?php endif; ?>
										<?php endif; ?>
									</tbody>
								</table>
							</div>
						</div>
					</form>
				</div>
			</div>