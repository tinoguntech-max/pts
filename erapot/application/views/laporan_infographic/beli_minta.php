
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
										<label for="tgl1" class="col-sm-4 control-label">Tanggal Pembuatan</label>
										<div class="col-sm-8">
											<div class="input-group">
												<div class="input-group-addon"><i class="fa fa-fw fa-calendar"></i></div>
												<input type="text" class="form-control" id="tgl1" name="tgl1" placeholder="Tanggal Pembuatan">
											</div>
										</div>
									</div>
									<div class="form-group">
										<label for="tgl3" class="col-sm-4 control-label">Tanggal Diperlukan</label>
										<div class="col-sm-8">
											<div class="input-group">
												<div class="input-group-addon"><i class="fa fa-fw fa-calendar"></i></div>
												<input type="text" class="form-control" id="tgl3" name="tgl3" placeholder="Tanggal Diperlukan">
											</div>
										</div>
									</div>
									<div class="form-group">
										<label for="btn" class="col-sm-4 control-label"></label>
										<div class="col-sm-8">
											<div class="input-group">
												<button class="btn btn-primary" type="submit" id="btn-submit" onclick="validateForm()">Buat Laporan</button>
											</div>
										</div>
									</div>
								</div>
                            </div>
                        </section>
                    </div>
				</div>
				
				<div class="row">
                    <div class="col-md-12">
                        <section class="panel">
                            <header class="panel-heading">
                                Multi Option Statistics
                                <span class="tools pull-right">
                                    <a class="fa fa-repeat box-refresh" href="javascript:;"></a>
                                    <a class="t-collapse fa fa-chevron-down" href="javascript:;"></a>
                                    <a class="t-close fa fa-times" href="javascript:;"></a>
                                </span>
                            </header>
                            <div class="panel-body" id="toro-area">
                                <div id="toggle-chart">
                                    <div class="clearfix">
                                        <form class="form-horizontal pull-left ">
                                            <div class="control-group">
                                                <label class="control-label">Chart Type :</label>
                                                <div class="series-list">
                                                    <label class="checkbox inline">
                                                        <input id="chartType1" checked name="ct" type="radio" value="line" />Line Chart
													</label>
                                                    <label class="checkbox inline">
                                                        <input id="chartType2" name="ct" type="radio" value="bar" />Bar Chart
													</label>
                                                </div>
                                            </div>
                                        </form>
                                        <form class="form-horizontal pull-right">
                                            <div class="control-group ">
                                                <label class="control-label">Toggle series :</label>
                                                <div class="series-list">
                                                    <label class="checkbox inline">
                                                        <input type="checkbox" id="cbdata1" checked>Transactions
                                                    </label>
                                                    <label class="checkbox inline">
                                                        <input type="checkbox" id="cbdata2" checked>Goods Type
													</label>
                                                    <label class="checkbox inline">
                                                        <input type="checkbox" id="cbdata3" checked>Goods Qty
													</label>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div id="legend-placeholder">
                                    </div>
                                    <div id="toggle-chart-container" class="f-c-space">
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
				</div>
			</div>