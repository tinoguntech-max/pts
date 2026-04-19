
			<!-- page head start-->
            <div class="page-head">
                <h3>
                    <?= HEADER_IDENTITY ?>
                </h3>
                <span class="sub-title"><?php echo $viewoptions['pageinfo']; ?></span>
            </div>
            <!-- page head end-->
			
			<!-- main content -->
			<div id="page-wrapper">
				<div class="container-fluid panel">
					<div class="toro">
					<div id="error-area"></div>
					<br>
					<div class="row">
						<div class="col-lg-12 form-horizontal">
							<div class="form-group">
								<label for="tgl1" class="col-sm-4 control-label"><?= $this->lang->line('beli_order_tanggal'); ?></label>
								<div class="col-sm-8">
									<div class="input-group">
										<div class="input-group-addon"><i class="fa fa-fw fa-calendar"></i></div>
										<input type="text" class="form-control" id="tgl1" name="tgl1" placeholder="Tanggal Pembuatan">
									</div>
								</div>
							</div>
							<div class="form-group">
								<label for="m_cabang" class="col-sm-4 control-label"><?= $this->lang->line('cabang'); ?></label>
								<div class="col-sm-8">
									<div class="input-group">
										<div class="input-group-addon"><i class="fa fa-fw fa-bank"></i></div>
										<select class="form-control" required id="m_cabang" name="m_cabang" placeholder="Cabang" multiple="multiple">
											<?php if(isset($m_cabang)) : ?>
											<?php if (is_array($m_cabang)): ?>
											<?php foreach ($m_cabang as $key => $value) : ?>
											<option value="<?= $value['id'] ?>"><?= $value['nama'] ?></option>
											<?php endforeach; ?>
											<?php endif; ?>
											<?php endif; ?>
										</select>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label for="supplier" class="col-sm-4 control-label">Supplier</label>
								<div class="col-sm-8">
									<div class="input-group">
										<div class="input-group-addon"><i class="fa fa-fw fa-child"></i></div>
										<input class="form-control" type="text" id="supplier" name="supplier" placeholder="Supplier Name" >
									</div>
								</div>
							</div>
							<div class="form-group">
								<label for="no_faktur" class="col-sm-4 control-label">Purchase Number</label>
								<div class="col-sm-8">
									<div class="input-group">
										<div class="input-group-addon"><i class="fa fa-fw fa-certificate"></i></div>
										<input class="form-control" type="text" id="no_faktur" name="no_faktur" placeholder="Purchasing Manual Number" >
									</div>
								</div>
							</div>
							<div class="form-group">
								<label for="barang" class="col-sm-4 control-label">Item</label>
								<div class="col-sm-8">
									<div class="input-group">
										<div class="input-group-addon"><i class="fa fa-fw fa-barcode"></i></div>
										<input class="form-control" type="text" id="barang" name="barang" placeholder="Item Name" >
									</div>
								</div>
							</div>
							<div class="form-group">
								<label for="btn" class="col-sm-4 control-label"></label>
								<div class="col-sm-8">
									<div class="input-group">
										<button class="btn btn-primary" type="submit" onclick="validateForm()"><?= $this->lang->line('buat_laporan'); ?></button>
									</div>
								</div>
							</div>
						</div>
					</div>
					</div>
					<div class="row-fluid wrapper invoice" id="toro-area"></div>
				</div>
			</div>