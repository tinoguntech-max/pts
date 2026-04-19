
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
										<label for="tgl1" class="col-sm-4 control-label"><?= $this->lang->line('beli_minta_tgl_buat'); ?></label>
										<div class="col-sm-8">
											<div class="input-group">
												<div class="input-group-addon"><i class="fa fa-fw fa-calendar"></i></div>
												<input type="text" class="form-control" id="tgl1" name="tgl1" placeholder="<?= $this->lang->line('beli_minta_tgl_buat'); ?>">
											</div>
										</div>
									</div>
									<div class="form-group">
										<label for="no_faktur" class="col-sm-4 control-label"><?= $this->lang->line('beli_minta_pr_no'); ?></label>
										<div class="col-sm-8">
											<div class="input-group">
												<div class="input-group-addon"><i class="fa fa-fw fa-certificate"></i></div>
												<input class="form-control" type="text" id="no_faktur" name="no_faktur" placeholder="<?= $this->lang->line('beli_minta_pr_no'); ?>" >
											</div>
										</div>
									</div>
									<div class="form-group">
										<label for="tgl3" class="col-sm-4 control-label"><?= $this->lang->line('beli_minta_tgl_perlu'); ?></label>
										<div class="col-sm-8">
											<div class="input-group">
												<div class="input-group-addon"><i class="fa fa-fw fa-calendar"></i></div>
												<input type="text" class="form-control" id="tgl3" name="tgl3" placeholder="<?= $this->lang->line('beli_minta_tgl_perlu'); ?>">
											</div>
										</div>
									</div>
									<div class="form-group">
										<label for="status" class="col-sm-4 control-label">Status</label>
										<div class="col-sm-8">
											<div class="input-group">
												<div class="input-group-addon"><i class="fa fa-fw fa-check"></i></div>
												<select class="form-control" required id="status" name="status" placeholder="Status">
													<option value="5">--STATUS--</option>
													<option value="0">Not Completed</option>
													<option value="1">Completed</option>
													<option value="2">Partial</option>
													<option value="3">Cancel</option>
													<option value="4">Delete</option>
												</select>
											</div>
										</div>
									</div>
									<div class="form-group">
										<label for="btn" class="col-sm-4 control-label"></label>
										<div class="col-sm-8">
											<div class="input-group">
												<button class="btn btn-primary" type="submit" id="btn-submit" onclick="validateForm()"><?= $this->lang->line('buat_laporan'); ?></button>
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
                                <div class="ui four statistics">
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
											<i class="checkmark box icon"></i> <span id="n_order">0</span>
										</div>
										<div class="label">
											Purchase Orders
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