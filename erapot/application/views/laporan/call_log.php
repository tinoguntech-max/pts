<div class="right_col" role="main">
	<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div id="grocery">
				<div class="row">
					<div class="col-xs-12">
						<div class="panel panel-light">
							<div class="panel-body">
								<div class="toro">
					<div id="error-area"></div>
					<br>
					<div class="row">
						<div class="col-lg-12 form-horizontal">
							<div class="form-group">
								<label for="tgl1" class="col-sm-4 control-label">Tanggal Pembuatan</label>
								<div class="col-sm-8">
									<div class="input-group">
										<div class="input-group-addon"><i class="fa fa-fw fa-calendar"></i></div>
										<input type="text" class="form-control" id="tgl1" name="tgl1" placeholder="Tanggal Pembuatan">
									</div>
								</div>
							</div>
							<!---<div class="form-group">
								<label for="dest1" class="col-sm-4 control-label">Tanggal Dest</label>
								<div class="col-sm-8">
									<div class="input-group">
										<div class="input-group-addon"><i class="fa fa-fw fa-calendar"></i></div>
										<input type="text" class="form-control" id="dest1" name="dest1" placeholder="Tanggal Dest">
									</div>
								</div>
							</div>--->
							<div class="form-group">
								<label for="customer" class="col-sm-4 control-label">Customer</label>
								<div class="col-sm-8">
									<div class="input-group">
										<div class="input-group-addon"><i class="fa fa-fw fa-user"></i></div>
										<select class="" id="customer" name="customer" placeholder="Customer" multiple="multiple">
											<?php if(isset($customer)) : ?>
											<?php if (is_array($customer)): ?>
											<?php foreach ($customer as $key => $value) : ?>
											<option value="<?= $value['id'] ?>"><?= $value['nama'] ?></option>
											<?php endforeach; ?>
											<?php endif; ?>
											<?php endif; ?>
										</select>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label for="cabang" class="col-sm-4 control-label">Cabang</label>
								<div class="col-sm-8">
									<div class="input-group">
										<div class="input-group-addon"><i class="fa fa-fw fa-road"></i></div>
										<select class="" id="cabang" name="cabang" placeholder="Cabang" multiple="multiple">
											<?php if(isset($cabang)) : ?>
											<?php if (is_array($cabang)): ?>
											<?php foreach ($cabang as $key => $value) : ?>
											<option value="<?= $value['id'] ?>"><?= $value['nama'] ?></option>
											<?php endforeach; ?>
											<?php endif; ?>
											<?php endif; ?>
										</select>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label for="status" class="col-sm-4 control-label">Status</label>
								<div class="col-sm-8">
									<div class="input-group">
										<div class="input-group-addon"><i class="fa fa-fw fa-rocket"></i></div>
										<select class="" id="status" name="status" placeholder="Status" multiple="multiple">
											<option value="1">Planned</option>
											<option value="2">Hold</option>
											<option value="3">Not Hold</option>
										</select>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label for="durasi" class="col-sm-4 control-label">Durasi</label>
								<div class="col-sm-8">
									<div class="input-group">
										<div class="input-group-addon"><i class="fa fa-fw fa-bank"></i></div>
										<select class="" id="durasi" name="durasi" placeholder="durasi" multiple="multiple">
											<option value="1">5m</option>
											<option value="2">10m</option>
											<option value="3">15m</option>
											<option value="4">30m</option>
											<option value="5">45m</option>
											<option value="6">1h</option>
											<option value="7">>1h</option>
											
										</select>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label for="lingkup" class="col-sm-4 control-label">Lingkup</label>
								<div class="col-sm-8">
									<div class="input-group">
										<div class="input-group-addon"><i class="fa fa-fw fa-users"></i></div>
										<select class="" id="lingkup" name="lingkup" placeholder="lingkup" multiple="multiple">
											<option value="I">Inbound</option>
											<option value="O">Outbound</option>
										</select>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label for="btn" class="col-sm-4 control-label"></label>
								<div class="col-sm-8">
									<div class="input-group">
										<button class="btn btn-primary" type="submit" onclick="validateForm()">Buat Laporan</button>
									</div>
								</div>
							</div>
						</div>
					</div>
					</div>
					<div class="row-fluid wrapper invoice" id="toro-area"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>