
			<!-- page head start-->
            <div class="page-head">
                <h3>
                    <?= HEADER_IDENTITY ?>
                </h3>
                <span class="sub-title"><?php echo $viewoptions['pageinfo']; ?></span>
            </div>
            <!-- page head end-->
			
			<!--body wrapper start-->
            <div class="wrapper">
				<div class="row">
                    <div class="col-md-12">
                        <section class="panel">
                            <header class="panel-heading">
                                Filter
                                <span class="tools pull-right">
                                    <a class="fa fa-repeat box-refresh" href="javascript:;"></a>
                                    <a class="t-collapse fa fa-chevron-down" href="javascript:;"></a>
                                    <a class="t-close fa fa-times" href="javascript:;"></a>
                                </span>
                            </header>
                            <div class="panel-body">
                                <div class="col-lg-12 form-horizontal">
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
										<label for="tgl1" class="col-sm-4 control-label"><?= $this->lang->line('created'); ?></label>
										<div class="col-sm-8">
											<div class="input-group">
												<div class="input-group-addon"><i class="fa fa-fw fa-calendar"></i></div>
												<input type="text" class="form-control" id="tgl1" name="tgl1" placeholder="Tanggal Pembuatan">
											</div>
										</div>
									</div>
									<div class="form-group">
										<label for="supplier" class="col-sm-4 control-label"><?= $this->lang->line('beli_order_supplier'); ?></label>
										<div class="col-sm-8">
											<div class="input-group">
												<div class="input-group-addon"><i class="fa fa-fw fa-cubes"></i></div>
												<select class="form-control" required id="supplier" name="supplier" placeholder="Supplier" multiple="multiple">
													<?php if(isset($supplier)) : ?>
													<?php if (is_array($supplier)): ?>
													<?php foreach ($supplier as $key => $value) : ?>
													<option value="<?= $value['id'] ?>"><?= $value['nama'] ?></option>
													<?php endforeach; ?>
													<?php endif; ?>
													<?php endif; ?>
												</select>
											</div>
										</div>
									</div>
									<div class="form-group">
										<label for="po_no" class="col-sm-4 control-label"><?= $this->lang->line('beli_order_po_no'); ?></label>
										<div class="col-sm-8">
											<div class="input-group">
												<div class="input-group-addon"><i class="fa fa-fw fa-certificate"></i></div>
												<input class="form-control" type="text" id="po_no" name="po_no" placeholder="<?= $this->lang->line('beli_order_po_no'); ?>" >
											</div>
										</div>
									</div>
									<div class="form-group">
										<label for="tgl1" class="col-sm-4 control-label"><?= $this->lang->line('beli_order_tanggal_kirim'); ?></label>
										<div class="col-sm-8">
											<div class="input-group">
												<div class="input-group-addon"><i class="fa fa-fw fa-calendar"></i></div>
												<input type="text" class="form-control" id="tgl3" name="tgl3" placeholder="<?= $this->lang->line('beli_order_tanggal_kirim'); ?>">
											</div>
										</div>
									</div>
									<div class="form-group">
										<label for="btn" class="col-sm-4 control-label"></label>
										<div class="col-sm-8">
											<div class="input-group">
												<button class="btn btn-primary" id="btn-submit" type="submit" onclick="validateForm()"><?= $this->lang->line('buat_laporan'); ?></button>
											</div>
										</div>
									</div>
								</div>
                            </div>
                        </section>
                    </div>
				</div>
				
				<div class="row" id="row-executive" style="display: none;">
                    <div class="col-md-12">
                        <section class="panel">
                            <header class="panel-heading">
                                Executive Summary
                                <span class="tools pull-right">
                                    <a class="fa fa-repeat box-refresh" href="javascript:;"></a>
                                    <a class="t-collapse fa fa-chevron-down" href="javascript:;"></a>
                                    <a class="t-close fa fa-times" href="javascript:;"></a>
                                </span>
                            </header>
                            <div class="panel-body">
                                <div class="ui five statistics">
									<div class="statistic">
										<div class="value">
											<i class="block layout icon"></i> <span id="n_record">0</span>
										</div>
										<div class="label">
											Records
										</div>
									</div>
									<div class="statistic">
										<div class="value">
											<i class="list layout icon"></i> <span id="n_detail_record">0</span>
										</div>
										<div class="label">
											Detail Records
										</div>
									</div>
									<div class="statistic">
										<div class="value">
											<i class="lemon icon"></i> <span id="n_item">0</span>
										</div>
										<div class="label">
											Item Total
										</div>
									</div>
									<div class="statistic">
										<div class="value">
											<span id="n_price">0</span>
										</div>
										<div class="label">
											Price Total
										</div>
									</div>
									<div class="statistic">
										<div class="value">
											<i class="checkmark box icon"></i> <span id="n_order">0</span>
										</div>
										<div class="label">
											Receivings
										</div>
									</div>
								</div>
                            </div>
                        </section>
                    </div>
				</div>
				
				<div class="row" id="row-report" style="display: none;">
                    <div class="col-md-12">
                        <section class="panel">
                            <header class="panel-heading">
                                Detail Report
                                <span class="tools pull-right">
                                    <a class="fa fa-repeat box-refresh" href="javascript:;"></a>
                                    <a class="t-collapse fa fa-chevron-down" href="javascript:;"></a>
                                    <a class="t-close fa fa-times" href="javascript:;"></a>
                                </span>
                            </header>
                            <div class="panel-body" id="toro-area">
                                
                            </div>
                        </section>
                    </div>
				</div>
			</div>
