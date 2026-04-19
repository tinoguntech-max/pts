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
										<label for="m_cabang" class="col-sm-4 control-label">Cabang</label>
										<div class="col-sm-8">
											<div class="input-group">
												<div class="input-group-addon"><i class="fa fa-fw fa-bank"></i></div>
												<select class="form-control" required id="m_cabang" name="m_cabang" placeholder="Cabang">
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
										<label for="barang" class="col-sm-4 control-label">Barang</label>
										<div class="col-sm-8">
											<div class="input-group">
												<div class="input-group-addon"><i class="fa fa-fw fa-bank"></i></div>
												<select class="form-control" required id="barang" name="barang" placeholder="Barang">
													<?php if(isset($barang)) : ?>
													<?php if (is_array($barang)): ?>
													<?php foreach ($barang as $key => $value) : ?>
													<option value="<?= $value['id'] ?>"><?= $value['nama'] ?> (<?= $value['id'] ?>)</option>
													<?php endforeach; ?>
													<?php endif; ?>
													<?php endif; ?>
												</select>
											</div>
										</div>
									</div>
									<div class="form-group">
										<label for="tgl1" class="col-sm-4 control-label">Tanggal</label>
										<div class="col-sm-8">
											<div class="input-group">
												<div class="input-group-addon"><i class="fa fa-fw fa-calendar"></i></div>
												<input type="text" class="form-control" id="tgl1" name="tgl1" placeholder="Tanggal Pembuatan">
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
                                <div class="ui one statistics">
									<div class="statistic">
										<div class="value">
											<i class="block layout icon"></i> <span id="n_record">0</span>
										</div>
										<div class="label">
											Records
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