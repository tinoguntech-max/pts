
			<!-- main content -->
			<div id="contentwrapper">
				<div class="main_content">
					
					<nav>
						<div id="jCrumbs" class="breadCrumb module">
							<ul>
								<li><a href="<?php echo base_url(); ?>"><i class="icon-home"></i></a></li>
								<li><a href="#">Transaksi</a></li>
								<li><?php echo $viewoptions['pageinfo']; ?></li>
							</ul>
						</div>
					</nav>

					<div id="error-area"></div>
					<form name="pembelianForm" action="<?php echo base_url("pembelian"); ?>/add" onsubmit="return validateForm();" method="post">
						<div class="row-fluid">
							<div class="span9">
								<div class="control-group">
									<label class="control-label" for="city">Spare Part: </label>
									<div class="controls"><input type="text" id="city" placeholder="Scan Spare Part"></div>
								</div>
								<table class="table table-striped table-hover" id="toro">
									<thead>
										<tr>
											<th>No</th>
											<th>Kode</th>
											<th>Nama</th>
											<th>Jumlah</th>
											<th>Harga</th>
											<th>Diskon</th>
											<th>Sub Total</th>
											<th>Aksi</th>
										</tr>
									</thead>
									<tbody id="toro-body">
									</tbody>
								</table>
							</div>
							<div class="span3">
								<div class="input-prepand">
									<span class="add-on"></span>
									<input type="text" id="tanggal" name="tanggal" value="<?php echo date('Y-m-d'); ?>" placeholder="Tanggal Pembelian">
								</div>
								<div class="input-prepand">
									<span class="add-on"></span>
									<input type="text" id="supplier-name" placeholder="Cari Supplier">
									<input type="hidden" name="supplier" id="supplier">
								</div>
								<div class="input-prepand">
									<span class="add-on"></span>
									<input type="text" name="no_faktur" placeholder="Nomor Faktur">
								</div>
								<div id="supplier-area"></div>
								<div class="well">
									<dl class="dl">
										<dt>Total Spare Part</dt>
										<dd id="total-spare">0</dd>
										<dt>Diskon Spare Part</dt>
										<dd id="diskon-spare">0</dd>
										<dt>Total Biaya</dt>
										<dd id="total">0</dd>
									</dl>
								</div>
								
								<div class="well">
									<button class="btn btn-primary" type="submit">Simpan Data</button>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>