
						<!-- page head start-->
           				<div class="page-head">
			                <h3>
			                    <?= HEADER_IDENTITY ?>
			                </h3>
			                <span class="sub-title"><?php echo $viewoptions['pageinfo']; ?></span>
			            </div>
			            <!-- page head end-->
			
					<!-- main content -->
		            <div id="page-wrapper" class="wrapper">
		                <div class="container-fluid panel">

					<div id="error-area"></div>
					<form name="hotlineForm" class="form-horizontal" action="<?php echo base_url("access_group"); ?>/<?php echo $viewoptions['action']; if($viewoptions['action'] == 'update') echo '/'.base64_encode($primary); ?>" onsubmit="return validateForm();" method="post">
						<table class="table table-hover table-striped">
							<thead>
								<tr>
									<th>Action</th>
									<th>Manage</th>
									<th>Create</th>
									<th>Read</th>
									<th>Update</th>
									<th>Delete</th>
									<th>Report</th>
								<tr>
							</thead>
							<tbody>
								<!--Bentuk Usaha-->
								<tr>
									<td><h4>Bentuk Usaha</h4></td>
									<td>
										<label class="checkbox-custom check-primary">
											<input type="checkbox" name="accesses[]" value="m_bentuk_usaha_manage" id="m_bentuk_usaha_manage" 
											<?php if (strpos($detil[0]['access_detil'],'m_bentuk_usaha_manage') !== false) echo 'checked'; ?>>
											<label for="m_bentuk_usaha_manage"><i class="fa fa-fw fa-database"></i> <i class="fa fa-fw fa-file-excel-o"></i></label>
										</label>
									</td>
									<td>
										<label class="checkbox-custom check-success">
											<input type="checkbox" name="accesses[]" value="m_bentuk_usaha_create" id="m_bentuk_usaha_create" 
											<?php if (strpos($detil[0]['access_detil'],'m_bentuk_usaha_create') !== false) echo 'checked'; ?>>
											<label for="m_bentuk_usaha_create"><i class="fa fa-fw fa-clone"></i> <i class="fa fa-fw fa-plus-square"></i></label>
										</label>
									</td>
									<td>
										<label class="checkbox-custom check-info">
											<input type="checkbox" name="accesses[]" value="m_bentuk_usaha_read" id="m_bentuk_usaha_read" 
											<?php if (strpos($detil[0]['access_detil'],'m_bentuk_usaha_read') !== false) echo 'checked'; ?>>
											<label for="m_bentuk_usaha_read"><i class="fa fa-fw fa-eye"></i> <i class="fa fa-fw fa-print"></i></label>
										</label>
									</td>
									<td>
										<label class="checkbox-custom check-warning">
											<input type="checkbox" name="accesses[]" value="m_bentuk_usaha_update" id="m_bentuk_usaha_update" 
											<?php if (strpos($detil[0]['access_detil'],'m_bentuk_usaha_update') !== false) echo 'checked'; ?>>
											<label for="m_bentuk_usaha_update"><i class="fa fa-fw fa-edit"></i></label>
										</label>
									</td>
									<td>
										<label class="checkbox-custom check-danger">
											<input type="checkbox" name="accesses[]" value="m_bentuk_usaha_delete" id="m_bentuk_usaha_delete" 
											<?php if (strpos($detil[0]['access_detil'],'m_bentuk_usaha_delete') !== false) echo 'checked'; ?>>
											<label for="m_bentuk_usaha_delete"><i class="fa fa-fw fa-trash"></i></label>
										</label>
									</td>
									<td></td>
								</tr>
								<!--Cabang/Outlet-->
								<tr>
								<td><h4>Cabang/Outlet</h4></td>
								<td>
									<label class="checkbox-custom check-primary">
										<input type="checkbox" name="accesses[]" value="m_cabang_manage" id="m_cabang_manage" 
										<?php if (strpos($detil[0]['access_detil'],'m_cabang_manage') !== false) echo 'checked'; ?>>
										<label for="m_cabang_manage"><i class="fa fa-fw fa-database"></i> <i class="fa fa-fw fa-file-excel-o"></i></label>
									</label>
								</td>
								<td>
									<label class="checkbox-custom check-success">
										<input type="checkbox" name="accesses[]" value="m_cabang_create" id="m_cabang_create" 
										<?php if (strpos($detil[0]['access_detil'],'m_cabang_create') !== false) echo 'checked'; ?>>
										<label for="m_cabang_create"><i class="fa fa-fw fa-clone"></i> <i class="fa fa-fw fa-plus-square"></i></label>
									</label>
								</td>
								<td>
									<label class="checkbox-custom check-info">
										<input type="checkbox" name="accesses[]" value="m_cabang_read" id="m_cabang_read" 
										<?php if (strpos($detil[0]['access_detil'],'m_cabang_read') !== false) echo 'checked'; ?>>
										<label for="m_cabang_read"><i class="fa fa-fw fa-eye"></i> <i class="fa fa-fw fa-print"></i></label>
									</label>
								</td>
								<td>
									<label class="checkbox-custom check-warning">
										<input type="checkbox" name="accesses[]" value="m_cabang_update" id="m_cabang_update" 
										<?php if (strpos($detil[0]['access_detil'],'m_cabang_update') !== false) echo 'checked'; ?>>
										<label for="m_cabang_update"><i class="fa fa-fw fa-edit"></i></label>
									</label>
								</td>
								<td>
									<label class="checkbox-custom check-danger">
										<input type="checkbox" name="accesses[]" value="m_cabang_delete" id="m_cabang_delete" 
										<?php if (strpos($detil[0]['access_detil'],'m_cabang_delete') !== false) echo 'checked'; ?>>
										<label for="m_cabang_delete"><i class="fa fa-fw fa-trash"></i></label>
									</label>
								</td>
								<td></td>
							</tr>
							<!--Divisi-->
							<tr>
							<td><h4>Divisi</h4></td>
							<td>
								<label class="checkbox-custom check-primary">
									<input type="checkbox" name="accesses[]" value="m_divisi_manage" id="m_divisi_manage" 
									<?php if (strpos($detil[0]['access_detil'],'m_divisi_manage') !== false) echo 'checked'; ?>>
									<label for="m_divisi_manage"><i class="fa fa-fw fa-database"></i> <i class="fa fa-fw fa-file-excel-o"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-success">
									<input type="checkbox" name="accesses[]" value="m_divisi_create" id="m_divisi_create" 
									<?php if (strpos($detil[0]['access_detil'],'m_divisi_create') !== false) echo 'checked'; ?>>
									<label for="m_divisi_create"><i class="fa fa-fw fa-clone"></i> <i class="fa fa-fw fa-plus-square"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-info">
									<input type="checkbox" name="accesses[]" value="m_divisi_read" id="m_divisi_read" 
									<?php if (strpos($detil[0]['access_detil'],'m_divisi_read') !== false) echo 'checked'; ?>>
									<label for="m_divisi_read"><i class="fa fa-fw fa-eye"></i> <i class="fa fa-fw fa-print"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-warning">
									<input type="checkbox" name="accesses[]" value="m_divisi_update" id="m_divisi_update" 
									<?php if (strpos($detil[0]['access_detil'],'m_divisi_update') !== false) echo 'checked'; ?>>
									<label for="m_divisi_update"><i class="fa fa-fw fa-edit"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-danger">
									<input type="checkbox" name="accesses[]" value="m_divisi_delete" id="m_divisi_delete" 
									<?php if (strpos($detil[0]['access_detil'],'m_divisi_delete') !== false) echo 'checked'; ?>>
									<label for="m_divisi_delete"><i class="fa fa-fw fa-trash"></i></label>
								</label>
							</td>
							<td></td>
							</tr>
							<!--Jenis Usaha-->
							<tr>
							<td><h4>Jenis Usaha</h4></td>
							<td>
								<label class="checkbox-custom check-primary">
									<input type="checkbox" name="accesses[]" value="m_jenis_usaha_manage" id="m_jenis_usaha_manage" 
									<?php if (strpos($detil[0]['access_detil'],'m_jenis_usaha_manage') !== false) echo 'checked'; ?>>
									<label for="m_jenis_usaha_manage"><i class="fa fa-fw fa-database"></i> <i class="fa fa-fw fa-file-excel-o"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-success">
									<input type="checkbox" name="accesses[]" value="m_jenis_usaha_create" id="m_jenis_usaha_create" 
									<?php if (strpos($detil[0]['access_detil'],'m_jenis_usaha_create') !== false) echo 'checked'; ?>>
									<label for="m_jenis_usaha_create"><i class="fa fa-fw fa-clone"></i> <i class="fa fa-fw fa-plus-square"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-info">
									<input type="checkbox" name="accesses[]" value="m_jenis_usaha_read" id="m_jenis_usaha_read" 
									<?php if (strpos($detil[0]['access_detil'],'m_jenis_usaha_read') !== false) echo 'checked'; ?>>
									<label for="m_jenis_usaha_read"><i class="fa fa-fw fa-eye"></i> <i class="fa fa-fw fa-print"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-warning">
									<input type="checkbox" name="accesses[]" value="m_jenis_usaha_update" id="m_jenis_usaha_update" 
									<?php if (strpos($detil[0]['access_detil'],'m_jenis_usaha_update') !== false) echo 'checked'; ?>>
									<label for="m_jenis_usaha_update"><i class="fa fa-fw fa-edit"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-danger">
									<input type="checkbox" name="accesses[]" value="m_jenis_usaha_delete" id="m_jenis_usaha_delete" 
									<?php if (strpos($detil[0]['access_detil'],'m_jenis_usaha_delete') !== false) echo 'checked'; ?>>
									<label for="m_jenis_usaha_delete"><i class="fa fa-fw fa-trash"></i></label>
								</label>
							</td>
							<td></td>
							</tr>
							<!--Pelanggan-->
							<tr>
							<td><h4>Pelanggan</h4></td>
							<td>
								<label class="checkbox-custom check-primary">
									<input type="checkbox" name="accesses[]" value="customer_manage" id="customer_manage" 
									<?php if (strpos($detil[0]['access_detil'],'customer_manage') !== false) echo 'checked'; ?>>
									<label for="customer_manage"><i class="fa fa-fw fa-database"></i> <i class="fa fa-fw fa-file-excel-o"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-success">
									<input type="checkbox" name="accesses[]" value="customer_create" id="customer_create" 
									<?php if (strpos($detil[0]['access_detil'],'customer_create') !== false) echo 'checked'; ?>>
									<label for="customer_create"><i class="fa fa-fw fa-clone"></i> <i class="fa fa-fw fa-plus-square"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-info">
									<input type="checkbox" name="accesses[]" value="customer_read" id="customer_read" 
									<?php if (strpos($detil[0]['access_detil'],'customer_read') !== false) echo 'checked'; ?>>
									<label for="customer_read"><i class="fa fa-fw fa-eye"></i> <i class="fa fa-fw fa-print"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-warning">
									<input type="checkbox" name="accesses[]" value="customer_update" id="customer_update" 
									<?php if (strpos($detil[0]['access_detil'],'customer_update') !== false) echo 'checked'; ?>>
									<label for="customer_update"><i class="fa fa-fw fa-edit"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-danger">
									<input type="checkbox" name="accesses[]" value="customer_delete" id="customer_delete" 
									<?php if (strpos($detil[0]['access_detil'],'customer_delete') !== false) echo 'checked'; ?>>
									<label for="customer_delete"><i class="fa fa-fw fa-trash"></i></label>
								</label>
							</td>
							<td></td>
							</tr>
							<!--Pemasok-->
							<tr>
							<td><h4>Pemasok</h4></td>
							<td>
								<label class="checkbox-custom check-primary">
									<input type="checkbox" name="accesses[]" value="supplier_manage" id="supplier_manage" 
									<?php if (strpos($detil[0]['access_detil'],'supplier_manage') !== false) echo 'checked'; ?>>
									<label for="supplier_manage"><i class="fa fa-fw fa-database"></i> <i class="fa fa-fw fa-file-excel-o"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-success">
									<input type="checkbox" name="accesses[]" value="supplier_create" id="supplier_create" 
									<?php if (strpos($detil[0]['access_detil'],'supplier_create') !== false) echo 'checked'; ?>>
									<label for="supplier_create"><i class="fa fa-fw fa-clone"></i> <i class="fa fa-fw fa-plus-square"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-info">
									<input type="checkbox" name="accesses[]" value="supplier_read" id="supplier_read" 
									<?php if (strpos($detil[0]['access_detil'],'supplier_read') !== false) echo 'checked'; ?>>
									<label for="supplier_read"><i class="fa fa-fw fa-eye"></i> <i class="fa fa-fw fa-print"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-warning">
									<input type="checkbox" name="accesses[]" value="supplier_update" id="supplier_update" 
									<?php if (strpos($detil[0]['access_detil'],'supplier_update') !== false) echo 'checked'; ?>>
									<label for="supplier_update"><i class="fa fa-fw fa-edit"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-danger">
									<input type="checkbox" name="accesses[]" value="supplier_delete" id="supplier_delete" 
									<?php if (strpos($detil[0]['access_detil'],'supplier_delete') !== false) echo 'checked'; ?>>
									<label for="supplier_delete"><i class="fa fa-fw fa-trash"></i></label>
								</label>
							</td>
							<td></td>
							</tr>
							<!--Jenis Barang-->
							<tr>
							<td><h4>Jenis Barang</h4></td>
							<td>
								<label class="checkbox-custom check-primary">
									<input type="checkbox" name="accesses[]" value="m_jenis_barang_manage" id="m_jenis_barang_manage" 
									<?php if (strpos($detil[0]['access_detil'],'m_jenis_barang_manage') !== false) echo 'checked'; ?>>
									<label for="m_jenis_barang_manage"><i class="fa fa-fw fa-database"></i> <i class="fa fa-fw fa-file-excel-o"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-success">
									<input type="checkbox" name="accesses[]" value="m_jenis_barang_create" id="m_jenis_barang_create" 
									<?php if (strpos($detil[0]['access_detil'],'m_jenis_barang_create') !== false) echo 'checked'; ?>>
									<label for="m_jenis_barang_create"><i class="fa fa-fw fa-clone"></i> <i class="fa fa-fw fa-plus-square"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-info">
									<input type="checkbox" name="accesses[]" value="m_jenis_barang_read" id="m_jenis_barang_read" 
									<?php if (strpos($detil[0]['access_detil'],'m_jenis_barang_read') !== false) echo 'checked'; ?>>
									<label for="m_jenis_barang_read"><i class="fa fa-fw fa-eye"></i> <i class="fa fa-fw fa-print"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-warning">
									<input type="checkbox" name="accesses[]" value="m_jenis_barang_update" id="m_jenis_barang_update" 
									<?php if (strpos($detil[0]['access_detil'],'m_jenis_barang_update') !== false) echo 'checked'; ?>>
									<label for="m_jenis_barang_update"><i class="fa fa-fw fa-edit"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-danger">
									<input type="checkbox" name="accesses[]" value="m_jenis_barang_delete" id="m_jenis_barang_delete" 
									<?php if (strpos($detil[0]['access_detil'],'m_jenis_barang_delete') !== false) echo 'checked'; ?>>
									<label for="m_jenis_barang_delete"><i class="fa fa-fw fa-trash"></i></label>
								</label>
							</td>
							<td></td>
							</tr>
							<!--Jenis COA-->
							<tr>
							<td><h4>Jenis COA</h4></td>
							<td>
								<label class="checkbox-custom check-primary">
									<input type="checkbox" name="accesses[]" value="m_jenis_coa_manage" id="m_jenis_coa_manage" 
									<?php if (strpos($detil[0]['access_detil'],'m_jenis_coa_manage') !== false) echo 'checked'; ?>>
									<label for="m_jenis_coa_manage"><i class="fa fa-fw fa-database"></i> <i class="fa fa-fw fa-file-excel-o"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-success">
									<input type="checkbox" name="accesses[]" value="m_jenis_coa_create" id="m_jenis_coa_create" 
									<?php if (strpos($detil[0]['access_detil'],'m_jenis_coa_create') !== false) echo 'checked'; ?>>
									<label for="m_jenis_coa_create"><i class="fa fa-fw fa-clone"></i> <i class="fa fa-fw fa-plus-square"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-info">
									<input type="checkbox" name="accesses[]" value="m_jenis_coa_read" id="m_jenis_coa_read" 
									<?php if (strpos($detil[0]['access_detil'],'m_jenis_coa_read') !== false) echo 'checked'; ?>>
									<label for="m_jenis_coa_read"><i class="fa fa-fw fa-eye"></i> <i class="fa fa-fw fa-print"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-warning">
									<input type="checkbox" name="accesses[]" value="m_jenis_coa_update" id="m_jenis_coa_update" 
									<?php if (strpos($detil[0]['access_detil'],'m_jenis_coa_update') !== false) echo 'checked'; ?>>
									<label for="m_jenis_coa_update"><i class="fa fa-fw fa-edit"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-danger">
									<input type="checkbox" name="accesses[]" value="m_jenis_coa_delete" id="m_jenis_coa_delete" 
									<?php if (strpos($detil[0]['access_detil'],'m_jenis_coa_delete') !== false) echo 'checked'; ?>>
									<label for="m_jenis_coa_delete"><i class="fa fa-fw fa-trash"></i></label>
								</label>
							</td>
							<td></td>
							</tr>
							<!--Barang-->
							<tr>
							<td><h4>Barang</h4></td>
							<td>
								<label class="checkbox-custom check-primary">
									<input type="checkbox" name="accesses[]" value="barang_manage" id="barang_manage" 
									<?php if (strpos($detil[0]['access_detil'],'barang_manage') !== false) echo 'checked'; ?>>
									<label for="barang_manage"><i class="fa fa-fw fa-database"></i> <i class="fa fa-fw fa-file-excel-o"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-success">
									<input type="checkbox" name="accesses[]" value="barang_create" id="barang_create" 
									<?php if (strpos($detil[0]['access_detil'],'barang_create') !== false) echo 'checked'; ?>>
									<label for="barang_create"><i class="fa fa-fw fa-clone"></i> <i class="fa fa-fw fa-plus-square"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-info">
									<input type="checkbox" name="accesses[]" value="barang_read" id="barang_read" 
									<?php if (strpos($detil[0]['access_detil'],'barang_read') !== false) echo 'checked'; ?>>
									<label for="barang_read"><i class="fa fa-fw fa-eye"></i> <i class="fa fa-fw fa-print"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-warning">
									<input type="checkbox" name="accesses[]" value="barang_update" id="barang_update" 
									<?php if (strpos($detil[0]['access_detil'],'barang_update') !== false) echo 'checked'; ?>>
									<label for="barang_update"><i class="fa fa-fw fa-edit"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-danger">
									<input type="checkbox" name="accesses[]" value="barang_delete" id="barang_delete" 
									<?php if (strpos($detil[0]['access_detil'],'barang_delete') !== false) echo 'checked'; ?>>
									<label for="barang_delete"><i class="fa fa-fw fa-trash"></i></label>
								</label>
							</td>
							<td></td>
							</tr>
							<!--Grafik Akun-->
							<tr>
							<td><h4>Grafik Akun</h4></td>
							<td>
								<label class="checkbox-custom check-primary">
									<input type="checkbox" name="accesses[]" value="m_coa_manage" id="m_coa_manage" 
									<?php if (strpos($detil[0]['access_detil'],'m_coa_manage') !== false) echo 'checked'; ?>>
									<label for="m_coa_manage"><i class="fa fa-fw fa-database"></i> <i class="fa fa-fw fa-file-excel-o"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-success">
									<input type="checkbox" name="accesses[]" value="m_coa_create" id="m_coa_create" 
									<?php if (strpos($detil[0]['access_detil'],'m_coa_create') !== false) echo 'checked'; ?>>
									<label for="m_coa_create"><i class="fa fa-fw fa-clone"></i> <i class="fa fa-fw fa-plus-square"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-info">
									<input type="checkbox" name="accesses[]" value="m_coa_read" id="m_coa_read" 
									<?php if (strpos($detil[0]['access_detil'],'m_coa_read') !== false) echo 'checked'; ?>>
									<label for="m_coa_read"><i class="fa fa-fw fa-eye"></i> <i class="fa fa-fw fa-print"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-warning">
									<input type="checkbox" name="accesses[]" value="m_coa_update" id="m_coa_update" 
									<?php if (strpos($detil[0]['access_detil'],'m_coa_update') !== false) echo 'checked'; ?>>
									<label for="m_coa_update"><i class="fa fa-fw fa-edit"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-danger">
									<input type="checkbox" name="accesses[]" value="m_coa_delete" id="m_coa_delete" 
									<?php if (strpos($detil[0]['access_detil'],'m_coa_delete') !== false) echo 'checked'; ?>>
									<label for="m_coa_delete"><i class="fa fa-fw fa-trash"></i></label>
								</label>
							</td>
							<td></td>
							</tr>
							<!--Servis-->
							<tr>
							<td><h4>Servis</h4></td>
							<td>
								<label class="checkbox-custom check-primary">
									<input type="checkbox" name="accesses[]" value="m_service_manage" id="m_service_manage" 
									<?php if (strpos($detil[0]['access_detil'],'m_service_manage') !== false) echo 'checked'; ?>>
									<label for="m_service_manage"><i class="fa fa-fw fa-database"></i> <i class="fa fa-fw fa-file-excel-o"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-success">
									<input type="checkbox" name="accesses[]" value="m_service_create" id="m_service_create" 
									<?php if (strpos($detil[0]['access_detil'],'m_service_create') !== false) echo 'checked'; ?>>
									<label for="m_service_create"><i class="fa fa-fw fa-clone"></i> <i class="fa fa-fw fa-plus-square"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-info">
									<input type="checkbox" name="accesses[]" value="m_service_read" id="m_service_read" 
									<?php if (strpos($detil[0]['access_detil'],'m_service_read') !== false) echo 'checked'; ?>>
									<label for="m_service_read"><i class="fa fa-fw fa-eye"></i> <i class="fa fa-fw fa-print"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-warning">
									<input type="checkbox" name="accesses[]" value="m_service_update" id="m_service_update" 
									<?php if (strpos($detil[0]['access_detil'],'m_service_update') !== false) echo 'checked'; ?>>
									<label for="m_service_update"><i class="fa fa-fw fa-edit"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-danger">
									<input type="checkbox" name="accesses[]" value="m_service_delete" id="m_service_delete" 
									<?php if (strpos($detil[0]['access_detil'],'m_service_delete') !== false) echo 'checked'; ?>>
									<label for="m_service_delete"><i class="fa fa-fw fa-trash"></i></label>
								</label>
							</td>
							<td></td>
							</tr>
							<!--Kit-->
							<tr>
							<td><h4>Kit</h4></td>
							<td>
								<label class="checkbox-custom check-primary">
									<input type="checkbox" name="accesses[]" value="kit_manage" id="kit_manage" 
									<?php if (strpos($detil[0]['access_detil'],'kit_manage') !== false) echo 'checked'; ?>>
									<label for="kit_manage"><i class="fa fa-fw fa-database"></i> <i class="fa fa-fw fa-file-excel-o"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-success">
									<input type="checkbox" name="accesses[]" value="kit_create" id="kit_create" 
									<?php if (strpos($detil[0]['access_detil'],'kit_create') !== false) echo 'checked'; ?>>
									<label for="kit_create"><i class="fa fa-fw fa-clone"></i> <i class="fa fa-fw fa-plus-square"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-info">
									<input type="checkbox" name="accesses[]" value="kit_read" id="kit_read" 
									<?php if (strpos($detil[0]['access_detil'],'kit_read') !== false) echo 'checked'; ?>>
									<label for="kit_read"><i class="fa fa-fw fa-eye"></i> <i class="fa fa-fw fa-print"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-warning">
									<input type="checkbox" name="accesses[]" value="kit_update" id="kit_update" 
									<?php if (strpos($detil[0]['access_detil'],'kit_update') !== false) echo 'checked'; ?>>
									<label for="kit_update"><i class="fa fa-fw fa-edit"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-danger">
									<input type="checkbox" name="accesses[]" value="kit_delete" id="kit_delete" 
									<?php if (strpos($detil[0]['access_detil'],'kit_delete') !== false) echo 'checked'; ?>>
									<label for="kit_delete"><i class="fa fa-fw fa-trash"></i></label>
								</label>
							</td>
							<td></td>
							</tr>
							<!--Merk-->
							<tr>
							<td><h4>Merk</h4></td>
							<td>
								<label class="checkbox-custom check-primary">
									<input type="checkbox" name="accesses[]" value="merk_manage" id="merk_manage" 
									<?php if (strpos($detil[0]['access_detil'],'merk_manage') !== false) echo 'checked'; ?>>
									<label for="merk_manage"><i class="fa fa-fw fa-database"></i> <i class="fa fa-fw fa-file-excel-o"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-success">
									<input type="checkbox" name="accesses[]" value="merk_create" id="merk_create" 
									<?php if (strpos($detil[0]['access_detil'],'merk_create') !== false) echo 'checked'; ?>>
									<label for="merk_create"><i class="fa fa-fw fa-clone"></i> <i class="fa fa-fw fa-plus-square"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-info">
									<input type="checkbox" name="accesses[]" value="merk_read" id="merk_read" 
									<?php if (strpos($detil[0]['access_detil'],'merk_read') !== false) echo 'checked'; ?>>
									<label for="merk_read"><i class="fa fa-fw fa-eye"></i> <i class="fa fa-fw fa-print"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-warning">
									<input type="checkbox" name="accesses[]" value="merk_update" id="merk_update" 
									<?php if (strpos($detil[0]['access_detil'],'merk_update') !== false) echo 'checked'; ?>>
									<label for="merk_update"><i class="fa fa-fw fa-edit"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-danger">
									<input type="checkbox" name="accesses[]" value="merk_delete" id="merk_delete" 
									<?php if (strpos($detil[0]['access_detil'],'merk_delete') !== false) echo 'checked'; ?>>
									<label for="merk_delete"><i class="fa fa-fw fa-trash"></i></label>
								</label>
							</td>
							<td></td>
							</tr>
							<!--Satuan-->
							<tr>
							<td><h4>Satuan</h4></td>
							<td>
								<label class="checkbox-custom check-primary">
									<input type="checkbox" name="accesses[]" value="satuan_manage" id="satuan_manage" 
									<?php if (strpos($detil[0]['access_detil'],'satuan_manage') !== false) echo 'checked'; ?>>
									<label for="satuan_manage"><i class="fa fa-fw fa-database"></i> <i class="fa fa-fw fa-file-excel-o"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-success">
									<input type="checkbox" name="accesses[]" value="satuan_create" id="satuan_create" 
									<?php if (strpos($detil[0]['access_detil'],'satuan_create') !== false) echo 'checked'; ?>>
									<label for="satuan_create"><i class="fa fa-fw fa-clone"></i> <i class="fa fa-fw fa-plus-square"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-info">
									<input type="checkbox" name="accesses[]" value="satuan_read" id="satuan_read" 
									<?php if (strpos($detil[0]['access_detil'],'satuan_read') !== false) echo 'checked'; ?>>
									<label for="satuan_read"><i class="fa fa-fw fa-eye"></i> <i class="fa fa-fw fa-print"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-warning">
									<input type="checkbox" name="accesses[]" value="satuan_update" id="satuan_update" 
									<?php if (strpos($detil[0]['access_detil'],'satuan_update') !== false) echo 'checked'; ?>>
									<label for="satuan_update"><i class="fa fa-fw fa-edit"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-danger">
									<input type="checkbox" name="accesses[]" value="satuan_delete" id="satuan_delete" 
									<?php if (strpos($detil[0]['access_detil'],'satuan_delete') !== false) echo 'checked'; ?>>
									<label for="satuan_delete"><i class="fa fa-fw fa-trash"></i></label>
								</label>
							</td>
							<td></td>
							</tr>
							<!--Kategori-->
							<tr>
							<td><h4>Kategori</h4></td>
							<td>
								<label class="checkbox-custom check-primary">
									<input type="checkbox" name="accesses[]" value="m_motor_kategori_manage" id="m_motor_kategori_manage" 
									<?php if (strpos($detil[0]['access_detil'],'m_motor_kategori_manage') !== false) echo 'checked'; ?>>
									<label for="m_motor_kategori_manage"><i class="fa fa-fw fa-database"></i> <i class="fa fa-fw fa-file-excel-o"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-success">
									<input type="checkbox" name="accesses[]" value="m_motor_kategori_create" id="m_motor_kategori_create" 
									<?php if (strpos($detil[0]['access_detil'],'m_motor_kategori_create') !== false) echo 'checked'; ?>>
									<label for="m_motor_kategori_create"><i class="fa fa-fw fa-clone"></i> <i class="fa fa-fw fa-plus-square"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-info">
									<input type="checkbox" name="accesses[]" value="m_motor_kategori_read" id="m_motor_kategori_read" 
									<?php if (strpos($detil[0]['access_detil'],'m_motor_kategori_read') !== false) echo 'checked'; ?>>
									<label for="m_motor_kategori_read"><i class="fa fa-fw fa-eye"></i> <i class="fa fa-fw fa-print"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-warning">
									<input type="checkbox" name="accesses[]" value="m_motor_kategori_update" id="m_motor_kategori_update" 
									<?php if (strpos($detil[0]['access_detil'],'m_motor_kategori_update') !== false) echo 'checked'; ?>>
									<label for="m_motor_kategori_update"><i class="fa fa-fw fa-edit"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-danger">
									<input type="checkbox" name="accesses[]" value="m_motor_kategori_delete" id="m_motor_kategori_delete" 
									<?php if (strpos($detil[0]['access_detil'],'m_motor_kategori_delete') !== false) echo 'checked'; ?>>
									<label for="m_motor_kategori_delete"><i class="fa fa-fw fa-trash"></i></label>
								</label>
							</td>
							<td></td>
							</tr>
							<!--Tipe Motor-->
							<tr>
							<td><h4>Tipe Motor</h4></td>
							<td>
								<label class="checkbox-custom check-primary">
									<input type="checkbox" name="accesses[]" value="m_motor_tipe_manage" id="m_motor_tipe_manage" 
									<?php if (strpos($detil[0]['access_detil'],'m_motor_tipe_manage') !== false) echo 'checked'; ?>>
									<label for="m_motor_tipe_manage"><i class="fa fa-fw fa-database"></i> <i class="fa fa-fw fa-file-excel-o"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-success">
									<input type="checkbox" name="accesses[]" value="m_motor_tipe_create" id="m_motor_tipe_create" 
									<?php if (strpos($detil[0]['access_detil'],'m_motor_tipe_create') !== false) echo 'checked'; ?>>
									<label for="m_motor_tipe_create"><i class="fa fa-fw fa-clone"></i> <i class="fa fa-fw fa-plus-square"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-info">
									<input type="checkbox" name="accesses[]" value="m_motor_tipe_read" id="m_motor_tipe_read" 
									<?php if (strpos($detil[0]['access_detil'],'m_motor_tipe_read') !== false) echo 'checked'; ?>>
									<label for="m_motor_tipe_read"><i class="fa fa-fw fa-eye"></i> <i class="fa fa-fw fa-print"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-warning">
									<input type="checkbox" name="accesses[]" value="m_motor_tipe_update" id="m_motor_tipe_update" 
									<?php if (strpos($detil[0]['access_detil'],'m_motor_tipe_update') !== false) echo 'checked'; ?>>
									<label for="m_motor_tipe_update"><i class="fa fa-fw fa-edit"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-danger">
									<input type="checkbox" name="accesses[]" value="m_motor_tipe_delete" id="m_motor_tipe_delete" 
									<?php if (strpos($detil[0]['access_detil'],'m_motor_tipe_delete') !== false) echo 'checked'; ?>>
									<label for="m_motor_tipe_delete"><i class="fa fa-fw fa-trash"></i></label>
								</label>
							</td>
							<td></td>
							</tr>
							<!--Warna-->
							<tr>
							<td><h4>Warna</h4></td>
							<td>
								<label class="checkbox-custom check-primary">
									<input type="checkbox" name="accesses[]" value="m_motor_warna_manage" id="m_motor_warna_manage" 
									<?php if (strpos($detil[0]['access_detil'],'m_motor_warna_manage') !== false) echo 'checked'; ?>>
									<label for="m_motor_warna_manage"><i class="fa fa-fw fa-database"></i> <i class="fa fa-fw fa-file-excel-o"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-success">
									<input type="checkbox" name="accesses[]" value="m_motor_warna_create" id="m_motor_warna_create" 
									<?php if (strpos($detil[0]['access_detil'],'m_motor_warna_create') !== false) echo 'checked'; ?>>
									<label for="m_motor_warna_create"><i class="fa fa-fw fa-clone"></i> <i class="fa fa-fw fa-plus-square"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-info">
									<input type="checkbox" name="accesses[]" value="m_motor_warna_read" id="m_motor_warna_read" 
									<?php if (strpos($detil[0]['access_detil'],'m_motor_warna_read') !== false) echo 'checked'; ?>>
									<label for="m_motor_warna_read"><i class="fa fa-fw fa-eye"></i> <i class="fa fa-fw fa-print"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-warning">
									<input type="checkbox" name="accesses[]" value="m_motor_warna_update" id="m_motor_warna_update" 
									<?php if (strpos($detil[0]['access_detil'],'m_motor_warna_update') !== false) echo 'checked'; ?>>
									<label for="m_motor_warna_update"><i class="fa fa-fw fa-edit"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-danger">
									<input type="checkbox" name="accesses[]" value="m_motor_warna_delete" id="m_motor_warna_delete" 
									<?php if (strpos($detil[0]['access_detil'],'m_motor_warna_delete') !== false) echo 'checked'; ?>>
									<label for="m_motor_warna_delete"><i class="fa fa-fw fa-trash"></i></label>
								</label>
							</td>
							<td></td>
							</tr>
							<!--Biaya Produksi-->
							<tr>
							<td><h4>Biaya Produksi</h4></td>
							<td>
								<label class="checkbox-custom check-primary">
									<input type="checkbox" name="accesses[]" value="m_produksi_biaya_manage" id="m_produksi_biaya_manage" 
									<?php if (strpos($detil[0]['access_detil'],'m_produksi_biaya_manage') !== false) echo 'checked'; ?>>
									<label for="m_produksi_biaya_manage"><i class="fa fa-fw fa-database"></i> <i class="fa fa-fw fa-file-excel-o"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-success">
									<input type="checkbox" name="accesses[]" value="m_produksi_biaya_create" id="m_produksi_biaya_create" 
									<?php if (strpos($detil[0]['access_detil'],'m_produksi_biaya_create') !== false) echo 'checked'; ?>>
									<label for="m_produksi_biaya_create"><i class="fa fa-fw fa-clone"></i> <i class="fa fa-fw fa-plus-square"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-info">
									<input type="checkbox" name="accesses[]" value="m_produksi_biaya_read" id="m_produksi_biaya_read" 
									<?php if (strpos($detil[0]['access_detil'],'m_produksi_biaya_read') !== false) echo 'checked'; ?>>
									<label for="m_produksi_biaya_read"><i class="fa fa-fw fa-eye"></i> <i class="fa fa-fw fa-print"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-warning">
									<input type="checkbox" name="accesses[]" value="m_produksi_biaya_update" id="m_produksi_biaya_update" 
									<?php if (strpos($detil[0]['access_detil'],'m_produksi_biaya_update') !== false) echo 'checked'; ?>>
									<label for="m_produksi_biaya_update"><i class="fa fa-fw fa-edit"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-danger">
									<input type="checkbox" name="accesses[]" value="m_produksi_biaya_delete" id="m_produksi_biaya_delete" 
									<?php if (strpos($detil[0]['access_detil'],'m_produksi_biaya_delete') !== false) echo 'checked'; ?>>
									<label for="m_produksi_biaya_delete"><i class="fa fa-fw fa-trash"></i></label>
								</label>
							</td>
							<td></td>
							</tr>
							<!--Departmen Produksi-->
							<tr>
							<td><h4>Departmen Produksi</h4></td>
							<td>
								<label class="checkbox-custom check-primary">
									<input type="checkbox" name="accesses[]" value="m_produksi_departemen_manage" id="m_produksi_departemen_manage" 
									<?php if (strpos($detil[0]['access_detil'],'m_produksi_departemen_manage') !== false) echo 'checked'; ?>>
									<label for="m_produksi_departemen_manage"><i class="fa fa-fw fa-database"></i> <i class="fa fa-fw fa-file-excel-o"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-success">
									<input type="checkbox" name="accesses[]" value="m_produksi_departemen_create" id="m_produksi_departemen_create" 
									<?php if (strpos($detil[0]['access_detil'],'m_produksi_departemen_create') !== false) echo 'checked'; ?>>
									<label for="m_produksi_departemen_create"><i class="fa fa-fw fa-clone"></i> <i class="fa fa-fw fa-plus-square"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-info">
									<input type="checkbox" name="accesses[]" value="m_produksi_departemen_read" id="m_produksi_departemen_read" 
									<?php if (strpos($detil[0]['access_detil'],'m_produksi_departemen_read') !== false) echo 'checked'; ?>>
									<label for="m_produksi_departemen_read"><i class="fa fa-fw fa-eye"></i> <i class="fa fa-fw fa-print"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-warning">
									<input type="checkbox" name="accesses[]" value="m_produksi_departemen_update" id="m_produksi_departemen_update" 
									<?php if (strpos($detil[0]['access_detil'],'m_produksi_departemen_update') !== false) echo 'checked'; ?>>
									<label for="m_produksi_departemen_update"><i class="fa fa-fw fa-edit"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-danger">
									<input type="checkbox" name="accesses[]" value="m_produksi_departemen_delete" id="m_produksi_departemen_delete" 
									<?php if (strpos($detil[0]['access_detil'],'m_produksi_departemen_delete') !== false) echo 'checked'; ?>>
									<label for="m_produksi_departemen_delete"><i class="fa fa-fw fa-trash"></i></label>
								</label>
							</td>
							<td></td>
							</tr>
							<!--Penanggung Jawab-->
							<tr>
							<td><h4>Penanggung Jawab</h4></td>
							<td>
								<label class="checkbox-custom check-primary">
									<input type="checkbox" name="accesses[]" value="m_produksi_penanggung_manage" id="m_produksi_penanggung_manage" 
									<?php if (strpos($detil[0]['access_detil'],'m_produksi_penanggung_manage') !== false) echo 'checked'; ?>>
									<label for="m_produksi_penanggung_manage"><i class="fa fa-fw fa-database"></i> <i class="fa fa-fw fa-file-excel-o"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-success">
									<input type="checkbox" name="accesses[]" value="m_produksi_penanggung_create" id="m_produksi_penanggung_create" 
									<?php if (strpos($detil[0]['access_detil'],'m_produksi_penanggung_create') !== false) echo 'checked'; ?>>
									<label for="m_produksi_penanggung_create"><i class="fa fa-fw fa-clone"></i> <i class="fa fa-fw fa-plus-square"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-info">
									<input type="checkbox" name="accesses[]" value="m_produksi_penanggung_read" id="m_produksi_penanggung_read" 
									<?php if (strpos($detil[0]['access_detil'],'m_produksi_penanggung_read') !== false) echo 'checked'; ?>>
									<label for="m_produksi_penanggung_read"><i class="fa fa-fw fa-eye"></i> <i class="fa fa-fw fa-print"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-warning">
									<input type="checkbox" name="accesses[]" value="m_produksi_penanggung_update" id="m_produksi_penanggung_update" 
									<?php if (strpos($detil[0]['access_detil'],'m_produksi_penanggung_update') !== false) echo 'checked'; ?>>
									<label for="m_produksi_penanggung_update"><i class="fa fa-fw fa-edit"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-danger">
									<input type="checkbox" name="accesses[]" value="m_produksi_penanggung_delete" id="m_produksi_penanggung_delete" 
									<?php if (strpos($detil[0]['access_detil'],'m_produksi_penanggung_delete') !== false) echo 'checked'; ?>>
									<label for="m_produksi_penanggung_delete"><i class="fa fa-fw fa-trash"></i></label>
								</label>
							</td>
							<td></td>
							</tr>
							<!--Akun Bank-->
							<tr>
							<td><h4>Akun Bank</h4></td>
							<td>
								<label class="checkbox-custom check-primary">
									<input type="checkbox" name="accesses[]" value="m_bank_akun_manage" id="m_bank_akun_manage" 
									<?php if (strpos($detil[0]['access_detil'],'m_bank_akun_manage') !== false) echo 'checked'; ?>>
									<label for="m_bank_akun_manage"><i class="fa fa-fw fa-database"></i> <i class="fa fa-fw fa-file-excel-o"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-success">
									<input type="checkbox" name="accesses[]" value="m_bank_akun_create" id="m_bank_akun_create" 
									<?php if (strpos($detil[0]['access_detil'],'m_bank_akun_create') !== false) echo 'checked'; ?>>
									<label for="m_bank_akun_create"><i class="fa fa-fw fa-clone"></i> <i class="fa fa-fw fa-plus-square"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-info">
									<input type="checkbox" name="accesses[]" value="m_bank_akun_read" id="m_bank_akun_read" 
									<?php if (strpos($detil[0]['access_detil'],'m_bank_akun_read') !== false) echo 'checked'; ?>>
									<label for="m_bank_akun_read"><i class="fa fa-fw fa-eye"></i> <i class="fa fa-fw fa-print"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-warning">
									<input type="checkbox" name="accesses[]" value="m_bank_akun_update" id="m_bank_akun_update" 
									<?php if (strpos($detil[0]['access_detil'],'m_bank_akun_update') !== false) echo 'checked'; ?>>
									<label for="m_bank_akun_update"><i class="fa fa-fw fa-edit"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-danger">
									<input type="checkbox" name="accesses[]" value="m_bank_akun_delete" id="m_bank_akun_delete" 
									<?php if (strpos($detil[0]['access_detil'],'m_bank_akun_delete') !== false) echo 'checked'; ?>>
									<label for="m_bank_akun_delete"><i class="fa fa-fw fa-trash"></i></label>
								</label>
							</td>
							<td></td>
							</tr>
							<!--Bank-->
							<tr>
							<td><h4>Bank</h4></td>
							<td>
								<label class="checkbox-custom check-primary">
									<input type="checkbox" name="accesses[]" value="m_bank_manage" id="m_bank_manage" 
									<?php if (strpos($detil[0]['access_detil'],'m_bank_manage') !== false) echo 'checked'; ?>>
									<label for="m_bank_manage"><i class="fa fa-fw fa-database"></i> <i class="fa fa-fw fa-file-excel-o"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-success">
									<input type="checkbox" name="accesses[]" value="m_bank_create" id="m_bank_create" 
									<?php if (strpos($detil[0]['access_detil'],'m_bank_create') !== false) echo 'checked'; ?>>
									<label for="m_bank_create"><i class="fa fa-fw fa-clone"></i> <i class="fa fa-fw fa-plus-square"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-info">
									<input type="checkbox" name="accesses[]" value="m_bank_read" id="m_bank_read" 
									<?php if (strpos($detil[0]['access_detil'],'m_bank_read') !== false) echo 'checked'; ?>>
									<label for="m_bank_read"><i class="fa fa-fw fa-eye"></i> <i class="fa fa-fw fa-print"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-warning">
									<input type="checkbox" name="accesses[]" value="m_bank_update" id="m_bank_update" 
									<?php if (strpos($detil[0]['access_detil'],'m_bank_update') !== false) echo 'checked'; ?>>
									<label for="m_bank_update"><i class="fa fa-fw fa-edit"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-danger">
									<input type="checkbox" name="accesses[]" value="m_bank_delete" id="m_bank_delete" 
									<?php if (strpos($detil[0]['access_detil'],'m_bank_delete') !== false) echo 'checked'; ?>>
									<label for="m_bank_delete"><i class="fa fa-fw fa-trash"></i></label>
								</label>
							</td>
							<td></td>
							</tr>
							<!--Cabang Leasing-->
							<tr>
							<td><h4>Cabang Leasing</h4></td>
							<td>
								<label class="checkbox-custom check-primary">
									<input type="checkbox" name="accesses[]" value="m_motor_cabang_leasing_manage" id="m_motor_cabang_leasing_manage" 
									<?php if (strpos($detil[0]['access_detil'],'m_motor_cabang_leasing_manage') !== false) echo 'checked'; ?>>
									<label for="m_motor_cabang_leasing_manage"><i class="fa fa-fw fa-database"></i> <i class="fa fa-fw fa-file-excel-o"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-success">
									<input type="checkbox" name="accesses[]" value="m_motor_cabang_leasing_create" id="m_motor_cabang_leasing_create" 
									<?php if (strpos($detil[0]['access_detil'],'m_motor_cabang_leasing_create') !== false) echo 'checked'; ?>>
									<label for="m_motor_cabang_leasing_create"><i class="fa fa-fw fa-clone"></i> <i class="fa fa-fw fa-plus-square"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-info">
									<input type="checkbox" name="accesses[]" value="m_motor_cabang_leasing_read" id="m_motor_cabang_leasing_read" 
									<?php if (strpos($detil[0]['access_detil'],'m_motor_cabang_leasing_read') !== false) echo 'checked'; ?>>
									<label for="m_motor_cabang_leasing_read"><i class="fa fa-fw fa-eye"></i> <i class="fa fa-fw fa-print"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-warning">
									<input type="checkbox" name="accesses[]" value="m_motor_cabang_leasing_update" id="m_motor_cabang_leasing_update" 
									<?php if (strpos($detil[0]['access_detil'],'m_motor_cabang_leasing_update') !== false) echo 'checked'; ?>>
									<label for="m_motor_cabang_leasing_update"><i class="fa fa-fw fa-edit"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-danger">
									<input type="checkbox" name="accesses[]" value="m_motor_cabang_leasing_delete" id="m_motor_cabang_leasing_delete" 
									<?php if (strpos($detil[0]['access_detil'],'m_motor_cabang_leasing_delete') !== false) echo 'checked'; ?>>
									<label for="m_motor_cabang_leasing_delete"><i class="fa fa-fw fa-trash"></i></label>
								</label>
							</td>
							<td></td>
							</tr>
							<!--NPWP Internal-->
							<tr>
							<td><h4>NPWP Internal</h4></td>
							<td>
								<label class="checkbox-custom check-primary">
									<input type="checkbox" name="accesses[]" value="m_npwp_internal_manage" id="m_npwp_internal_manage" 
									<?php if (strpos($detil[0]['access_detil'],'m_npwp_internal_manage') !== false) echo 'checked'; ?>>
									<label for="m_npwp_internal_manage"><i class="fa fa-fw fa-database"></i> <i class="fa fa-fw fa-file-excel-o"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-success">
									<input type="checkbox" name="accesses[]" value="m_npwp_internal_create" id="m_npwp_internal_create" 
									<?php if (strpos($detil[0]['access_detil'],'m_npwp_internal_create') !== false) echo 'checked'; ?>>
									<label for="m_npwp_internal_create"><i class="fa fa-fw fa-clone"></i> <i class="fa fa-fw fa-plus-square"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-info">
									<input type="checkbox" name="accesses[]" value="m_npwp_internal_read" id="m_npwp_internal_read" 
									<?php if (strpos($detil[0]['access_detil'],'m_npwp_internal_read') !== false) echo 'checked'; ?>>
									<label for="m_npwp_internal_read"><i class="fa fa-fw fa-eye"></i> <i class="fa fa-fw fa-print"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-warning">
									<input type="checkbox" name="accesses[]" value="m_npwp_internal_update" id="m_npwp_internal_update" 
									<?php if (strpos($detil[0]['access_detil'],'m_npwp_internal_update') !== false) echo 'checked'; ?>>
									<label for="m_npwp_internal_update"><i class="fa fa-fw fa-edit"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-danger">
									<input type="checkbox" name="accesses[]" value="m_npwp_internal_delete" id="m_npwp_internal_delete" 
									<?php if (strpos($detil[0]['access_detil'],'m_npwp_internal_delete') !== false) echo 'checked'; ?>>
									<label for="m_npwp_internal_delete"><i class="fa fa-fw fa-trash"></i></label>
								</label>
							</td>
							<td></td>
							</tr>
							<!--Inspektur-->
							<tr>
							<td><h4>Inspektur</h4></td>
							<td>
								<label class="checkbox-custom check-primary">
									<input type="checkbox" name="accesses[]" value="m_motor_surveyor_manage" id="m_motor_surveyor_manage" 
									<?php if (strpos($detil[0]['access_detil'],'m_motor_surveyor_manage') !== false) echo 'checked'; ?>>
									<label for="m_motor_surveyor_manage"><i class="fa fa-fw fa-database"></i> <i class="fa fa-fw fa-file-excel-o"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-success">
									<input type="checkbox" name="accesses[]" value="m_motor_surveyor_create" id="m_motor_surveyor_create" 
									<?php if (strpos($detil[0]['access_detil'],'m_motor_surveyor_create') !== false) echo 'checked'; ?>>
									<label for="m_motor_surveyor_create"><i class="fa fa-fw fa-clone"></i> <i class="fa fa-fw fa-plus-square"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-info">
									<input type="checkbox" name="accesses[]" value="m_motor_surveyor_read" id="m_motor_surveyor_read" 
									<?php if (strpos($detil[0]['access_detil'],'m_motor_surveyor_read') !== false) echo 'checked'; ?>>
									<label for="m_motor_surveyor_read"><i class="fa fa-fw fa-eye"></i> <i class="fa fa-fw fa-print"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-warning">
									<input type="checkbox" name="accesses[]" value="m_motor_surveyor_update" id="m_motor_surveyor_update" 
									<?php if (strpos($detil[0]['access_detil'],'m_motor_surveyor_update') !== false) echo 'checked'; ?>>
									<label for="m_motor_surveyor_update"><i class="fa fa-fw fa-edit"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-danger">
									<input type="checkbox" name="accesses[]" value="m_motor_surveyor_delete" id="m_motor_surveyor_delete" 
									<?php if (strpos($detil[0]['access_detil'],'m_motor_surveyor_delete') !== false) echo 'checked'; ?>>
									<label for="m_motor_surveyor_delete"><i class="fa fa-fw fa-trash"></i></label>
								</label>
							</td>
							<td></td>
							</tr>
							<!--Jenis Berita-->
							<tr>
							<td><h4>Jenis Berita</h4></td>
							<td>
								<label class="checkbox-custom check-primary">
									<input type="checkbox" name="accesses[]" value="m_content_jenis_news_manage" id="m_content_jenis_news_manage" 
									<?php if (strpos($detil[0]['access_detil'],'m_content_jenis_news_manage') !== false) echo 'checked'; ?>>
									<label for="m_content_jenis_news_manage"><i class="fa fa-fw fa-database"></i> <i class="fa fa-fw fa-file-excel-o"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-success">
									<input type="checkbox" name="accesses[]" value="m_content_jenis_news_create" id="m_content_jenis_news_create" 
									<?php if (strpos($detil[0]['access_detil'],'m_content_jenis_news_create') !== false) echo 'checked'; ?>>
									<label for="m_content_jenis_news_create"><i class="fa fa-fw fa-clone"></i> <i class="fa fa-fw fa-plus-square"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-info">
									<input type="checkbox" name="accesses[]" value="m_content_jenis_news_read" id="m_content_jenis_news_read" 
									<?php if (strpos($detil[0]['access_detil'],'m_content_jenis_news_read') !== false) echo 'checked'; ?>>
									<label for="m_content_jenis_news_read"><i class="fa fa-fw fa-eye"></i> <i class="fa fa-fw fa-print"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-warning">
									<input type="checkbox" name="accesses[]" value="m_content_jenis_news_update" id="m_content_jenis_news_update" 
									<?php if (strpos($detil[0]['access_detil'],'m_content_jenis_news_update') !== false) echo 'checked'; ?>>
									<label for="m_content_jenis_news_update"><i class="fa fa-fw fa-edit"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-danger">
									<input type="checkbox" name="accesses[]" value="m_content_jenis_news_delete" id="m_content_jenis_news_delete" 
									<?php if (strpos($detil[0]['access_detil'],'m_content_jenis_news_delete') !== false) echo 'checked'; ?>>
									<label for="m_content_jenis_news_delete"><i class="fa fa-fw fa-trash"></i></label>
								</label>
							</td>
							<td></td>
							</tr>
							<!--Agama-->
							<tr>
							<td><h4>Agama</h4></td>
							<td>
								<label class="checkbox-custom check-primary">
									<input type="checkbox" name="accesses[]" value="m_agama_manage" id="m_agama_manage" 
									<?php if (strpos($detil[0]['access_detil'],'m_agama_manage') !== false) echo 'checked'; ?>>
									<label for="m_agama_manage"><i class="fa fa-fw fa-database"></i> <i class="fa fa-fw fa-file-excel-o"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-success">
									<input type="checkbox" name="accesses[]" value="m_agama_create" id="m_agama_create" 
									<?php if (strpos($detil[0]['access_detil'],'m_agama_create') !== false) echo 'checked'; ?>>
									<label for="m_agama_create"><i class="fa fa-fw fa-clone"></i> <i class="fa fa-fw fa-plus-square"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-info">
									<input type="checkbox" name="accesses[]" value="m_agama_read" id="m_agama_read" 
									<?php if (strpos($detil[0]['access_detil'],'m_agama_read') !== false) echo 'checked'; ?>>
									<label for="m_agama_read"><i class="fa fa-fw fa-eye"></i> <i class="fa fa-fw fa-print"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-warning">
									<input type="checkbox" name="accesses[]" value="m_agama_update" id="m_agama_update" 
									<?php if (strpos($detil[0]['access_detil'],'m_agama_update') !== false) echo 'checked'; ?>>
									<label for="m_agama_update"><i class="fa fa-fw fa-edit"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-danger">
									<input type="checkbox" name="accesses[]" value="m_agama_delete" id="m_agama_delete" 
									<?php if (strpos($detil[0]['access_detil'],'m_agama_delete') !== false) echo 'checked'; ?>>
									<label for="m_agama_delete"><i class="fa fa-fw fa-trash"></i></label>
								</label>
							</td>
							<td></td>
							</tr>
							<!--Golongan Darah-->
							<tr>
							<td><h4>Golongan Darah</h4></td>
							<td>
								<label class="checkbox-custom check-primary">
									<input type="checkbox" name="accesses[]" value="m_golongan_darah_manage" id="m_golongan_darah_manage" 
									<?php if (strpos($detil[0]['access_detil'],'m_golongan_darah_manage') !== false) echo 'checked'; ?>>
									<label for="m_golongan_darah_manage"><i class="fa fa-fw fa-database"></i> <i class="fa fa-fw fa-file-excel-o"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-success">
									<input type="checkbox" name="accesses[]" value="m_golongan_darah_create" id="m_golongan_darah_create" 
									<?php if (strpos($detil[0]['access_detil'],'m_golongan_darah_create') !== false) echo 'checked'; ?>>
									<label for="m_golongan_darah_create"><i class="fa fa-fw fa-clone"></i> <i class="fa fa-fw fa-plus-square"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-info">
									<input type="checkbox" name="accesses[]" value="m_golongan_darah_read" id="m_golongan_darah_read" 
									<?php if (strpos($detil[0]['access_detil'],'m_golongan_darah_read') !== false) echo 'checked'; ?>>
									<label for="m_golongan_darah_read"><i class="fa fa-fw fa-eye"></i> <i class="fa fa-fw fa-print"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-warning">
									<input type="checkbox" name="accesses[]" value="m_golongan_darah_update" id="m_golongan_darah_update" 
									<?php if (strpos($detil[0]['access_detil'],'m_golongan_darah_update') !== false) echo 'checked'; ?>>
									<label for="m_golongan_darah_update"><i class="fa fa-fw fa-edit"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-danger">
									<input type="checkbox" name="accesses[]" value="m_golongan_darah_delete" id="m_golongan_darah_delete" 
									<?php if (strpos($detil[0]['access_detil'],'m_golongan_darah_delete') !== false) echo 'checked'; ?>>
									<label for="m_golongan_darah_delete"><i class="fa fa-fw fa-trash"></i></label>
								</label>
							</td>
							<td></td>
							</tr>
							<!--Jabatan-->
							<tr>
							<td><h4>Jabatan</h4></td>
							<td>
								<label class="checkbox-custom check-primary">
									<input type="checkbox" name="accesses[]" value="m_jabatan_manage" id="m_jabatan_manage" 
									<?php if (strpos($detil[0]['access_detil'],'m_jabatan_manage') !== false) echo 'checked'; ?>>
									<label for="m_jabatan_manage"><i class="fa fa-fw fa-database"></i> <i class="fa fa-fw fa-file-excel-o"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-success">
									<input type="checkbox" name="accesses[]" value="m_jabatan_create" id="m_jabatan_create" 
									<?php if (strpos($detil[0]['access_detil'],'m_jabatan_create') !== false) echo 'checked'; ?>>
									<label for="m_jabatan_create"><i class="fa fa-fw fa-clone"></i> <i class="fa fa-fw fa-plus-square"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-info">
									<input type="checkbox" name="accesses[]" value="m_jabatan_read" id="m_jabatan_read" 
									<?php if (strpos($detil[0]['access_detil'],'m_jabatan_read') !== false) echo 'checked'; ?>>
									<label for="m_jabatan_read"><i class="fa fa-fw fa-eye"></i> <i class="fa fa-fw fa-print"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-warning">
									<input type="checkbox" name="accesses[]" value="m_jabatan_update" id="m_jabatan_update" 
									<?php if (strpos($detil[0]['access_detil'],'m_jabatan_update') !== false) echo 'checked'; ?>>
									<label for="m_jabatan_update"><i class="fa fa-fw fa-edit"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-danger">
									<input type="checkbox" name="accesses[]" value="m_jabatan_delete" id="m_jabatan_delete" 
									<?php if (strpos($detil[0]['access_detil'],'m_jabatan_delete') !== false) echo 'checked'; ?>>
									<label for="m_jabatan_delete"><i class="fa fa-fw fa-trash"></i></label>
								</label>
							</td>
							<td></td>
							</tr>
							<!--Jenis Identitas-->
							<tr>
							<td><h4>Jenis Identitas</h4></td>
							<td>
								<label class="checkbox-custom check-primary">
									<input type="checkbox" name="accesses[]" value="m_jenis_identitas_manage" id="m_jenis_identitas_manage" 
									<?php if (strpos($detil[0]['access_detil'],'m_jenis_identitas_manage') !== false) echo 'checked'; ?>>
									<label for="m_jenis_identitas_manage"><i class="fa fa-fw fa-database"></i> <i class="fa fa-fw fa-file-excel-o"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-success">
									<input type="checkbox" name="accesses[]" value="m_jenis_identitas_create" id="m_jenis_identitas_create" 
									<?php if (strpos($detil[0]['access_detil'],'m_jenis_identitas_create') !== false) echo 'checked'; ?>>
									<label for="m_jenis_identitas_create"><i class="fa fa-fw fa-clone"></i> <i class="fa fa-fw fa-plus-square"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-info">
									<input type="checkbox" name="accesses[]" value="m_jenis_identitas_read" id="m_jenis_identitas_read" 
									<?php if (strpos($detil[0]['access_detil'],'m_jenis_identitas_read') !== false) echo 'checked'; ?>>
									<label for="m_jenis_identitas_read"><i class="fa fa-fw fa-eye"></i> <i class="fa fa-fw fa-print"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-warning">
									<input type="checkbox" name="accesses[]" value="m_jenis_identitas_update" id="m_jenis_identitas_update" 
									<?php if (strpos($detil[0]['access_detil'],'m_jenis_identitas_update') !== false) echo 'checked'; ?>>
									<label for="m_jenis_identitas_update"><i class="fa fa-fw fa-edit"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-danger">
									<input type="checkbox" name="accesses[]" value="m_jenis_identitas_delete" id="m_jenis_identitas_delete" 
									<?php if (strpos($detil[0]['access_detil'],'m_jenis_identitas_delete') !== false) echo 'checked'; ?>>
									<label for="m_jenis_identitas_delete"><i class="fa fa-fw fa-trash"></i></label>
								</label>
							</td>
							<td></td>
							</tr>
							<!--Karyawan-->
							<tr>
							<td><h4>Karyawan</h4></td>
							<td>
								<label class="checkbox-custom check-primary">
									<input type="checkbox" name="accesses[]" value="m_karyawan_manage" id="m_karyawan_manage" 
									<?php if (strpos($detil[0]['access_detil'],'m_karyawan_manage') !== false) echo 'checked'; ?>>
									<label for="m_karyawan_manage"><i class="fa fa-fw fa-database"></i> <i class="fa fa-fw fa-file-excel-o"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-success">
									<input type="checkbox" name="accesses[]" value="m_karyawan_create" id="m_karyawan_create" 
									<?php if (strpos($detil[0]['access_detil'],'m_karyawan_create') !== false) echo 'checked'; ?>>
									<label for="m_karyawan_create"><i class="fa fa-fw fa-clone"></i> <i class="fa fa-fw fa-plus-square"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-info">
									<input type="checkbox" name="accesses[]" value="m_karyawan_read" id="m_karyawan_read" 
									<?php if (strpos($detil[0]['access_detil'],'m_karyawan_read') !== false) echo 'checked'; ?>>
									<label for="m_karyawan_read"><i class="fa fa-fw fa-eye"></i> <i class="fa fa-fw fa-print"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-warning">
									<input type="checkbox" name="accesses[]" value="m_karyawan_update" id="m_karyawan_update" 
									<?php if (strpos($detil[0]['access_detil'],'m_karyawan_update') !== false) echo 'checked'; ?>>
									<label for="m_karyawan_update"><i class="fa fa-fw fa-edit"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-danger">
									<input type="checkbox" name="accesses[]" value="m_karyawan_delete" id="m_karyawan_delete" 
									<?php if (strpos($detil[0]['access_detil'],'m_karyawan_delete') !== false) echo 'checked'; ?>>
									<label for="m_karyawan_delete"><i class="fa fa-fw fa-trash"></i></label>
								</label>
							</td>
							<td></td>
							</tr>
							<!--Kewarganegaraan-->
							<tr>
							<td><h4>Kewarganegaraan</h4></td>
							<td>
								<label class="checkbox-custom check-primary">
									<input type="checkbox" name="accesses[]" value="m_kewarganegaraan_manage" id="m_kewarganegaraan_manage" 
									<?php if (strpos($detil[0]['access_detil'],'m_kewarganegaraan_manage') !== false) echo 'checked'; ?>>
									<label for="m_kewarganegaraan_manage"><i class="fa fa-fw fa-database"></i> <i class="fa fa-fw fa-file-excel-o"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-success">
									<input type="checkbox" name="accesses[]" value="m_kewarganegaraan_create" id="m_kewarganegaraan_create" 
									<?php if (strpos($detil[0]['access_detil'],'m_kewarganegaraan_create') !== false) echo 'checked'; ?>>
									<label for="m_kewarganegaraan_create"><i class="fa fa-fw fa-clone"></i> <i class="fa fa-fw fa-plus-square"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-info">
									<input type="checkbox" name="accesses[]" value="m_kewarganegaraan_read" id="m_kewarganegaraan_read" 
									<?php if (strpos($detil[0]['access_detil'],'m_kewarganegaraan_read') !== false) echo 'checked'; ?>>
									<label for="m_kewarganegaraan_read"><i class="fa fa-fw fa-eye"></i> <i class="fa fa-fw fa-print"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-warning">
									<input type="checkbox" name="accesses[]" value="m_kewarganegaraan_update" id="m_kewarganegaraan_update" 
									<?php if (strpos($detil[0]['access_detil'],'m_kewarganegaraan_update') !== false) echo 'checked'; ?>>
									<label for="m_kewarganegaraan_update"><i class="fa fa-fw fa-edit"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-danger">
									<input type="checkbox" name="accesses[]" value="m_kewarganegaraan_delete" id="m_kewarganegaraan_delete" 
									<?php if (strpos($detil[0]['access_detil'],'m_kewarganegaraan_delete') !== false) echo 'checked'; ?>>
									<label for="m_kewarganegaraan_delete"><i class="fa fa-fw fa-trash"></i></label>
								</label>
							</td>
							<td></td>
							</tr>
							<!--Status Kawin-->
							<tr>
							<td><h4>Status Kawin</h4></td>
							<td>
								<label class="checkbox-custom check-primary">
									<input type="checkbox" name="accesses[]" value="m_status_kawin_manage" id="m_status_kawin_manage" 
									<?php if (strpos($detil[0]['access_detil'],'m_status_kawin_manage') !== false) echo 'checked'; ?>>
									<label for="m_status_kawin_manage"><i class="fa fa-fw fa-database"></i> <i class="fa fa-fw fa-file-excel-o"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-success">
									<input type="checkbox" name="accesses[]" value="m_status_kawin_create" id="m_status_kawin_create" 
									<?php if (strpos($detil[0]['access_detil'],'m_status_kawin_create') !== false) echo 'checked'; ?>>
									<label for="m_status_kawin_create"><i class="fa fa-fw fa-clone"></i> <i class="fa fa-fw fa-plus-square"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-info">
									<input type="checkbox" name="accesses[]" value="m_status_kawin_read" id="m_status_kawin_read" 
									<?php if (strpos($detil[0]['access_detil'],'m_status_kawin_read') !== false) echo 'checked'; ?>>
									<label for="m_status_kawin_read"><i class="fa fa-fw fa-eye"></i> <i class="fa fa-fw fa-print"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-warning">
									<input type="checkbox" name="accesses[]" value="m_status_kawin_update" id="m_status_kawin_update" 
									<?php if (strpos($detil[0]['access_detil'],'m_status_kawin_update') !== false) echo 'checked'; ?>>
									<label for="m_status_kawin_update"><i class="fa fa-fw fa-edit"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-danger">
									<input type="checkbox" name="accesses[]" value="m_status_kawin_delete" id="m_status_kawin_delete" 
									<?php if (strpos($detil[0]['access_detil'],'m_status_kawin_delete') !== false) echo 'checked'; ?>>
									<label for="m_status_kawin_delete"><i class="fa fa-fw fa-trash"></i></label>
								</label>
							</td>
							<td></td>
							</tr>
							<!--Status Pajak-->
							<tr>
							<td><h4>Status Pajak</h4></td>
							<td>
								<label class="checkbox-custom check-primary">
									<input type="checkbox" name="accesses[]" value="m_status_pajak_manage" id="m_status_pajak_manage" 
									<?php if (strpos($detil[0]['access_detil'],'m_status_pajak_manage') !== false) echo 'checked'; ?>>
									<label for="m_status_pajak_manage"><i class="fa fa-fw fa-database"></i> <i class="fa fa-fw fa-file-excel-o"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-success">
									<input type="checkbox" name="accesses[]" value="m_status_pajak_create" id="m_status_pajak_create" 
									<?php if (strpos($detil[0]['access_detil'],'m_status_pajak_create') !== false) echo 'checked'; ?>>
									<label for="m_status_pajak_create"><i class="fa fa-fw fa-clone"></i> <i class="fa fa-fw fa-plus-square"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-info">
									<input type="checkbox" name="accesses[]" value="m_status_pajak_read" id="m_status_pajak_read" 
									<?php if (strpos($detil[0]['access_detil'],'m_status_pajak_read') !== false) echo 'checked'; ?>>
									<label for="m_status_pajak_read"><i class="fa fa-fw fa-eye"></i> <i class="fa fa-fw fa-print"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-warning">
									<input type="checkbox" name="accesses[]" value="m_status_pajak_update" id="m_status_pajak_update" 
									<?php if (strpos($detil[0]['access_detil'],'m_status_pajak_update') !== false) echo 'checked'; ?>>
									<label for="m_status_pajak_update"><i class="fa fa-fw fa-edit"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-danger">
									<input type="checkbox" name="accesses[]" value="m_status_pajak_delete" id="m_status_pajak_delete" 
									<?php if (strpos($detil[0]['access_detil'],'m_status_pajak_delete') !== false) echo 'checked'; ?>>
									<label for="m_status_pajak_delete"><i class="fa fa-fw fa-trash"></i></label>
								</label>
							</td>
							<td></td>
							</tr>
							<!--Permintaan Pembelian-->
							<tr>
							<td><h4>Permintaan Pembelian</h4></td>
							<td>
								<label class="checkbox-custom check-primary">
									<input type="checkbox" name="accesses[]" value="beli_minta_manage" id="beli_minta_manage" 
									<?php if (strpos($detil[0]['access_detil'],'beli_minta_manage') !== false) echo 'checked'; ?>>
									<label for="beli_minta_manage"><i class="fa fa-fw fa-database"></i> <i class="fa fa-fw fa-file-excel-o"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-success">
									<input type="checkbox" name="accesses[]" value="beli_minta_create" id="beli_minta_create" 
									<?php if (strpos($detil[0]['access_detil'],'beli_minta_create') !== false) echo 'checked'; ?>>
									<label for="beli_minta_create"><i class="fa fa-fw fa-clone"></i> <i class="fa fa-fw fa-plus-square"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-info">
									<input type="checkbox" name="accesses[]" value="beli_minta_read" id="beli_minta_read" 
									<?php if (strpos($detil[0]['access_detil'],'beli_minta_read') !== false) echo 'checked'; ?>>
									<label for="beli_minta_read"><i class="fa fa-fw fa-eye"></i> <i class="fa fa-fw fa-print"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-warning">
									<input type="checkbox" name="accesses[]" value="beli_minta_update" id="beli_minta_update" 
									<?php if (strpos($detil[0]['access_detil'],'beli_minta_update') !== false) echo 'checked'; ?>>
									<label for="beli_minta_update"><i class="fa fa-fw fa-edit"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-danger">
									<input type="checkbox" name="accesses[]" value="beli_minta_delete" id="beli_minta_delete" 
									<?php if (strpos($detil[0]['access_detil'],'beli_minta_delete') !== false) echo 'checked'; ?>>
									<label for="beli_minta_delete"><i class="fa fa-fw fa-trash"></i></label>
								</label>
							</td>
							<td></td>
							</tr>
							<!--Order Pembelian-->
							<tr>
							<td><h4>Order Pembelian</h4></td>
							<td>
								<label class="checkbox-custom check-primary">
									<input type="checkbox" name="accesses[]" value="beli_order_manage" id="beli_order_manage" 
									<?php if (strpos($detil[0]['access_detil'],'beli_order_manage') !== false) echo 'checked'; ?>>
									<label for="beli_order_manage"><i class="fa fa-fw fa-database"></i> <i class="fa fa-fw fa-file-excel-o"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-success">
									<input type="checkbox" name="accesses[]" value="beli_order_create" id="beli_order_create" 
									<?php if (strpos($detil[0]['access_detil'],'beli_order_create') !== false) echo 'checked'; ?>>
									<label for="beli_order_create"><i class="fa fa-fw fa-clone"></i> <i class="fa fa-fw fa-plus-square"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-info">
									<input type="checkbox" name="accesses[]" value="beli_order_read" id="beli_order_read" 
									<?php if (strpos($detil[0]['access_detil'],'beli_order_read') !== false) echo 'checked'; ?>>
									<label for="beli_order_read"><i class="fa fa-fw fa-eye"></i> <i class="fa fa-fw fa-print"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-warning">
									<input type="checkbox" name="accesses[]" value="beli_order_update" id="beli_order_update" 
									<?php if (strpos($detil[0]['access_detil'],'beli_order_update') !== false) echo 'checked'; ?>>
									<label for="beli_order_update"><i class="fa fa-fw fa-edit"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-danger">
									<input type="checkbox" name="accesses[]" value="beli_order_delete" id="beli_order_delete" 
									<?php if (strpos($detil[0]['access_detil'],'beli_order_delete') !== false) echo 'checked'; ?>>
									<label for="beli_order_delete"><i class="fa fa-fw fa-trash"></i></label>
								</label>
							</td>
							<td></td>
							</tr>
							<!--Penerimaan Barang-->
							<tr>
							<td><h4>Penerimaan Barang</h4></td>
							<td>
								<label class="checkbox-custom check-primary">
									<input type="checkbox" name="accesses[]" value="beli_terima_manage" id="beli_terima_manage" 
									<?php if (strpos($detil[0]['access_detil'],'beli_terima_manage') !== false) echo 'checked'; ?>>
									<label for="beli_terima_manage"><i class="fa fa-fw fa-database"></i> <i class="fa fa-fw fa-file-excel-o"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-success">
									<input type="checkbox" name="accesses[]" value="beli_terima_create" id="beli_terima_create" 
									<?php if (strpos($detil[0]['access_detil'],'beli_terima_create') !== false) echo 'checked'; ?>>
									<label for="beli_terima_create"><i class="fa fa-fw fa-clone"></i> <i class="fa fa-fw fa-plus-square"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-info">
									<input type="checkbox" name="accesses[]" value="beli_terima_read" id="beli_terima_read" 
									<?php if (strpos($detil[0]['access_detil'],'beli_terima_read') !== false) echo 'checked'; ?>>
									<label for="beli_terima_read"><i class="fa fa-fw fa-eye"></i> <i class="fa fa-fw fa-print"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-warning">
									<input type="checkbox" name="accesses[]" value="beli_terima_update" id="beli_terima_update" 
									<?php if (strpos($detil[0]['access_detil'],'beli_terima_update') !== false) echo 'checked'; ?>>
									<label for="beli_terima_update"><i class="fa fa-fw fa-edit"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-danger">
									<input type="checkbox" name="accesses[]" value="beli_terima_delete" id="beli_terima_delete" 
									<?php if (strpos($detil[0]['access_detil'],'beli_terima_delete') !== false) echo 'checked'; ?>>
									<label for="beli_terima_delete"><i class="fa fa-fw fa-trash"></i></label>
								</label>
							</td>
							<td></td>
							</tr>
							<!--Tanda Terima Tagihan-->
							<tr>
							<td><h4>Tanda Terima Tagihan</h4></td>
							<td>
								<label class="checkbox-custom check-primary">
									<input type="checkbox" name="accesses[]" value="beli_invoice_manage" id="beli_invoice_manage" 
									<?php if (strpos($detil[0]['access_detil'],'beli_invoice_manage') !== false) echo 'checked'; ?>>
									<label for="beli_invoice_manage"><i class="fa fa-fw fa-database"></i> <i class="fa fa-fw fa-file-excel-o"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-success">
									<input type="checkbox" name="accesses[]" value="beli_invoice_create" id="beli_invoice_create" 
									<?php if (strpos($detil[0]['access_detil'],'beli_invoice_create') !== false) echo 'checked'; ?>>
									<label for="beli_invoice_create"><i class="fa fa-fw fa-clone"></i> <i class="fa fa-fw fa-plus-square"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-info">
									<input type="checkbox" name="accesses[]" value="beli_invoice_read" id="beli_invoice_read" 
									<?php if (strpos($detil[0]['access_detil'],'beli_invoice_read') !== false) echo 'checked'; ?>>
									<label for="beli_invoice_read"><i class="fa fa-fw fa-eye"></i> <i class="fa fa-fw fa-print"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-warning">
									<input type="checkbox" name="accesses[]" value="beli_invoice_update" id="beli_invoice_update" 
									<?php if (strpos($detil[0]['access_detil'],'beli_invoice_update') !== false) echo 'checked'; ?>>
									<label for="beli_invoice_update"><i class="fa fa-fw fa-edit"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-danger">
									<input type="checkbox" name="accesses[]" value="beli_invoice_delete" id="beli_invoice_delete" 
									<?php if (strpos($detil[0]['access_detil'],'beli_invoice_delete') !== false) echo 'checked'; ?>>
									<label for="beli_invoice_delete"><i class="fa fa-fw fa-trash"></i></label>
								</label>
							</td>
							<td></td>
							</tr>
							<!--Retur Pembelian-->
							<tr>
							<td><h4>Retur Pembelian</h4></td>
							<td>
								<label class="checkbox-custom check-primary">
									<input type="checkbox" name="accesses[]" value="beli_retur_manage" id="beli_retur_manage" 
									<?php if (strpos($detil[0]['access_detil'],'beli_retur_manage') !== false) echo 'checked'; ?>>
									<label for="beli_retur_manage"><i class="fa fa-fw fa-database"></i> <i class="fa fa-fw fa-file-excel-o"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-success">
									<input type="checkbox" name="accesses[]" value="beli_retur_create" id="beli_retur_create" 
									<?php if (strpos($detil[0]['access_detil'],'beli_retur_create') !== false) echo 'checked'; ?>>
									<label for="beli_retur_create"><i class="fa fa-fw fa-clone"></i> <i class="fa fa-fw fa-plus-square"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-info">
									<input type="checkbox" name="accesses[]" value="beli_retur_read" id="beli_retur_read" 
									<?php if (strpos($detil[0]['access_detil'],'beli_retur_read') !== false) echo 'checked'; ?>>
									<label for="beli_retur_read"><i class="fa fa-fw fa-eye"></i> <i class="fa fa-fw fa-print"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-warning">
									<input type="checkbox" name="accesses[]" value="beli_retur_update" id="beli_retur_update" 
									<?php if (strpos($detil[0]['access_detil'],'beli_retur_update') !== false) echo 'checked'; ?>>
									<label for="beli_retur_update"><i class="fa fa-fw fa-edit"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-danger">
									<input type="checkbox" name="accesses[]" value="beli_retur_delete" id="beli_retur_delete" 
									<?php if (strpos($detil[0]['access_detil'],'beli_retur_delete') !== false) echo 'checked'; ?>>
									<label for="beli_retur_delete"><i class="fa fa-fw fa-trash"></i></label>
								</label>
							</td>
							<td></td>
							</tr>
							<!--Pembayaran Utang-->
							<tr>
							<td><h4>Pembayaran Utang</h4></td>
							<td>
								<label class="checkbox-custom check-primary">
									<input type="checkbox" name="accesses[]" value="beli_bayar_manage" id="beli_bayar_manage" 
									<?php if (strpos($detil[0]['access_detil'],'beli_bayar_manage') !== false) echo 'checked'; ?>>
									<label for="beli_bayar_manage"><i class="fa fa-fw fa-database"></i> <i class="fa fa-fw fa-file-excel-o"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-success">
									<input type="checkbox" name="accesses[]" value="beli_bayar_create" id="beli_bayar_create" 
									<?php if (strpos($detil[0]['access_detil'],'beli_bayar_create') !== false) echo 'checked'; ?>>
									<label for="beli_bayar_create"><i class="fa fa-fw fa-clone"></i> <i class="fa fa-fw fa-plus-square"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-info">
									<input type="checkbox" name="accesses[]" value="beli_bayar_read" id="beli_bayar_read" 
									<?php if (strpos($detil[0]['access_detil'],'beli_bayar_read') !== false) echo 'checked'; ?>>
									<label for="beli_bayar_read"><i class="fa fa-fw fa-eye"></i> <i class="fa fa-fw fa-print"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-warning">
									<input type="checkbox" name="accesses[]" value="beli_bayar_update" id="beli_bayar_update" 
									<?php if (strpos($detil[0]['access_detil'],'beli_bayar_update') !== false) echo 'checked'; ?>>
									<label for="beli_bayar_update"><i class="fa fa-fw fa-edit"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-danger">
									<input type="checkbox" name="accesses[]" value="beli_bayar_delete" id="beli_bayar_delete" 
									<?php if (strpos($detil[0]['access_detil'],'beli_bayar_delete') !== false) echo 'checked'; ?>>
									<label for="beli_bayar_delete"><i class="fa fa-fw fa-trash"></i></label>
								</label>
							</td>
							<td></td>
							</tr>
							<!--Order Penjualan-->
							<tr>
							<td><h4>Order Penjualan</h4></td>
							<td>
								<label class="checkbox-custom check-primary">
									<input type="checkbox" name="accesses[]" value="jual_order_manage" id="jual_order_manage" 
									<?php if (strpos($detil[0]['access_detil'],'jual_order_manage') !== false) echo 'checked'; ?>>
									<label for="jual_order_manage"><i class="fa fa-fw fa-database"></i> <i class="fa fa-fw fa-file-excel-o"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-success">
									<input type="checkbox" name="accesses[]" value="jual_order_create" id="jual_order_create" 
									<?php if (strpos($detil[0]['access_detil'],'jual_order_create') !== false) echo 'checked'; ?>>
									<label for="jual_order_create"><i class="fa fa-fw fa-clone"></i> <i class="fa fa-fw fa-plus-square"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-info">
									<input type="checkbox" name="accesses[]" value="jual_order_read" id="jual_order_read" 
									<?php if (strpos($detil[0]['access_detil'],'jual_order_read') !== false) echo 'checked'; ?>>
									<label for="jual_order_read"><i class="fa fa-fw fa-eye"></i> <i class="fa fa-fw fa-print"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-warning">
									<input type="checkbox" name="accesses[]" value="jual_order_update" id="jual_order_update" 
									<?php if (strpos($detil[0]['access_detil'],'jual_order_update') !== false) echo 'checked'; ?>>
									<label for="jual_order_update"><i class="fa fa-fw fa-edit"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-danger">
									<input type="checkbox" name="accesses[]" value="jual_order_delete" id="jual_order_delete" 
									<?php if (strpos($detil[0]['access_detil'],'jual_order_delete') !== false) echo 'checked'; ?>>
									<label for="jual_order_delete"><i class="fa fa-fw fa-trash"></i></label>
								</label>
							</td>
							<td></td>
							</tr>
							<!--Order Pengiriman-->
							<tr>
							<td><h4>Order Pengiriman</h4></td>
							<td>
								<label class="checkbox-custom check-primary">
									<input type="checkbox" name="accesses[]" value="jual_delivery_manage" id="jual_delivery_manage" 
									<?php if (strpos($detil[0]['access_detil'],'jual_delivery_manage') !== false) echo 'checked'; ?>>
									<label for="jual_delivery_manage"><i class="fa fa-fw fa-database"></i> <i class="fa fa-fw fa-file-excel-o"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-success">
									<input type="checkbox" name="accesses[]" value="jual_delivery_create" id="jual_delivery_create" 
									<?php if (strpos($detil[0]['access_detil'],'jual_delivery_create') !== false) echo 'checked'; ?>>
									<label for="jual_delivery_create"><i class="fa fa-fw fa-clone"></i> <i class="fa fa-fw fa-plus-square"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-info">
									<input type="checkbox" name="accesses[]" value="jual_delivery_read" id="jual_delivery_read" 
									<?php if (strpos($detil[0]['access_detil'],'jual_delivery_read') !== false) echo 'checked'; ?>>
									<label for="jual_delivery_read"><i class="fa fa-fw fa-eye"></i> <i class="fa fa-fw fa-print"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-warning">
									<input type="checkbox" name="accesses[]" value="jual_delivery_update" id="jual_delivery_update" 
									<?php if (strpos($detil[0]['access_detil'],'jual_delivery_update') !== false) echo 'checked'; ?>>
									<label for="jual_delivery_update"><i class="fa fa-fw fa-edit"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-danger">
									<input type="checkbox" name="accesses[]" value="jual_delivery_delete" id="jual_delivery_delete" 
									<?php if (strpos($detil[0]['access_detil'],'jual_delivery_delete') !== false) echo 'checked'; ?>>
									<label for="jual_delivery_delete"><i class="fa fa-fw fa-trash"></i></label>
								</label>
							</td>
							<td></td>
							</tr>
							<!--Invoicing-->
							<tr>
							<td><h4>Invoicing</h4></td>
							<td>
								<label class="checkbox-custom check-primary">
									<input type="checkbox" name="accesses[]" value="jual_invoice_manage" id="jual_invoice_manage" 
									<?php if (strpos($detil[0]['access_detil'],'jual_invoice_manage') !== false) echo 'checked'; ?>>
									<label for="jual_invoice_manage"><i class="fa fa-fw fa-database"></i> <i class="fa fa-fw fa-file-excel-o"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-success">
									<input type="checkbox" name="accesses[]" value="jual_invoice_create" id="jual_invoice_create" 
									<?php if (strpos($detil[0]['access_detil'],'jual_invoice_create') !== false) echo 'checked'; ?>>
									<label for="jual_invoice_create"><i class="fa fa-fw fa-clone"></i> <i class="fa fa-fw fa-plus-square"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-info">
									<input type="checkbox" name="accesses[]" value="jual_invoice_read" id="jual_invoice_read" 
									<?php if (strpos($detil[0]['access_detil'],'jual_invoice_read') !== false) echo 'checked'; ?>>
									<label for="jual_invoice_read"><i class="fa fa-fw fa-eye"></i> <i class="fa fa-fw fa-print"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-warning">
									<input type="checkbox" name="accesses[]" value="jual_invoice_update" id="jual_invoice_update" 
									<?php if (strpos($detil[0]['access_detil'],'jual_invoice_update') !== false) echo 'checked'; ?>>
									<label for="jual_invoice_update"><i class="fa fa-fw fa-edit"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-danger">
									<input type="checkbox" name="accesses[]" value="jual_invoice_delete" id="jual_invoice_delete" 
									<?php if (strpos($detil[0]['access_detil'],'jual_invoice_delete') !== false) echo 'checked'; ?>>
									<label for="jual_invoice_delete"><i class="fa fa-fw fa-trash"></i></label>
								</label>
							</td>
							<td></td>
							</tr>
							<!--Retur Penjualan-->
							<tr>
							<td><h4>Retur Penjualan</h4></td>
							<td>
								<label class="checkbox-custom check-primary">
									<input type="checkbox" name="accesses[]" value="jual_retur_manage" id="jual_retur_manage" 
									<?php if (strpos($detil[0]['access_detil'],'jual_retur_manage') !== false) echo 'checked'; ?>>
									<label for="jual_retur_manage"><i class="fa fa-fw fa-database"></i> <i class="fa fa-fw fa-file-excel-o"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-success">
									<input type="checkbox" name="accesses[]" value="jual_retur_create" id="jual_retur_create" 
									<?php if (strpos($detil[0]['access_detil'],'jual_retur_create') !== false) echo 'checked'; ?>>
									<label for="jual_retur_create"><i class="fa fa-fw fa-clone"></i> <i class="fa fa-fw fa-plus-square"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-info">
									<input type="checkbox" name="accesses[]" value="jual_retur_read" id="jual_retur_read" 
									<?php if (strpos($detil[0]['access_detil'],'jual_retur_read') !== false) echo 'checked'; ?>>
									<label for="jual_retur_read"><i class="fa fa-fw fa-eye"></i> <i class="fa fa-fw fa-print"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-warning">
									<input type="checkbox" name="accesses[]" value="jual_retur_update" id="jual_retur_update" 
									<?php if (strpos($detil[0]['access_detil'],'jual_retur_update') !== false) echo 'checked'; ?>>
									<label for="jual_retur_update"><i class="fa fa-fw fa-edit"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-danger">
									<input type="checkbox" name="accesses[]" value="jual_retur_delete" id="jual_retur_delete" 
									<?php if (strpos($detil[0]['access_detil'],'jual_retur_delete') !== false) echo 'checked'; ?>>
									<label for="jual_retur_delete"><i class="fa fa-fw fa-trash"></i></label>
								</label>
							</td>
							<td></td>
							</tr>
							<!--Pembayaran Piutang-->
							<tr>
							<td><h4>Pembayaran Piutang</h4></td>
							<td>
								<label class="checkbox-custom check-primary">
									<input type="checkbox" name="accesses[]" value="jual_bayar_manage" id="jual_bayar_manage" 
									<?php if (strpos($detil[0]['access_detil'],'jual_bayar_manage') !== false) echo 'checked'; ?>>
									<label for="jual_bayar_manage"><i class="fa fa-fw fa-database"></i> <i class="fa fa-fw fa-file-excel-o"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-success">
									<input type="checkbox" name="accesses[]" value="jual_bayar_create" id="jual_bayar_create" 
									<?php if (strpos($detil[0]['access_detil'],'jual_bayar_create') !== false) echo 'checked'; ?>>
									<label for="jual_bayar_create"><i class="fa fa-fw fa-clone"></i> <i class="fa fa-fw fa-plus-square"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-info">
									<input type="checkbox" name="accesses[]" value="jual_bayar_read" id="jual_bayar_read" 
									<?php if (strpos($detil[0]['access_detil'],'jual_bayar_read') !== false) echo 'checked'; ?>>
									<label for="jual_bayar_read"><i class="fa fa-fw fa-eye"></i> <i class="fa fa-fw fa-print"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-warning">
									<input type="checkbox" name="accesses[]" value="jual_bayar_update" id="jual_bayar_update" 
									<?php if (strpos($detil[0]['access_detil'],'jual_bayar_update') !== false) echo 'checked'; ?>>
									<label for="jual_bayar_update"><i class="fa fa-fw fa-edit"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-danger">
									<input type="checkbox" name="accesses[]" value="jual_bayar_delete" id="jual_bayar_delete" 
									<?php if (strpos($detil[0]['access_detil'],'jual_bayar_delete') !== false) echo 'checked'; ?>>
									<label for="jual_bayar_delete"><i class="fa fa-fw fa-trash"></i></label>
								</label>
							</td>
							<td></td>
							</tr>
							<!--Daftar Kebutuhan Bahan-->
							<tr>
							<td><h4>Daftar Kebutuhan Bahan</h4></td>
							<td>
								<label class="checkbox-custom check-primary">
									<input type="checkbox" name="accesses[]" value="produksi_bom_manage" id="produksi_bom_manage" 
									<?php if (strpos($detil[0]['access_detil'],'produksi_bom_manage') !== false) echo 'checked'; ?>>
									<label for="produksi_bom_manage"><i class="fa fa-fw fa-database"></i> <i class="fa fa-fw fa-file-excel-o"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-success">
									<input type="checkbox" name="accesses[]" value="produksi_bom_create" id="produksi_bom_create" 
									<?php if (strpos($detil[0]['access_detil'],'produksi_bom_create') !== false) echo 'checked'; ?>>
									<label for="produksi_bom_create"><i class="fa fa-fw fa-clone"></i> <i class="fa fa-fw fa-plus-square"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-info">
									<input type="checkbox" name="accesses[]" value="produksi_bom_read" id="produksi_bom_read" 
									<?php if (strpos($detil[0]['access_detil'],'produksi_bom_read') !== false) echo 'checked'; ?>>
									<label for="produksi_bom_read"><i class="fa fa-fw fa-eye"></i> <i class="fa fa-fw fa-print"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-warning">
									<input type="checkbox" name="accesses[]" value="produksi_bom_update" id="produksi_bom_update" 
									<?php if (strpos($detil[0]['access_detil'],'produksi_bom_update') !== false) echo 'checked'; ?>>
									<label for="produksi_bom_update"><i class="fa fa-fw fa-edit"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-danger">
									<input type="checkbox" name="accesses[]" value="produksi_bom_delete" id="produksi_bom_delete" 
									<?php if (strpos($detil[0]['access_detil'],'produksi_bom_delete') !== false) echo 'checked'; ?>>
									<label for="produksi_bom_delete"><i class="fa fa-fw fa-trash"></i></label>
								</label>
							</td>
							<td></td>
							</tr>
							<!--Order Pembelian-->
							<tr>
							<td><h4>Order Pembelian Motor</h4></td>
							<td>
								<label class="checkbox-custom check-primary">
									<input type="checkbox" name="accesses[]" value="beli_motor_order_manage" id="beli_motor_order_manage" 
									<?php if (strpos($detil[0]['access_detil'],'beli_motor_order_manage') !== false) echo 'checked'; ?>>
									<label for="beli_motor_order_manage"><i class="fa fa-fw fa-database"></i> <i class="fa fa-fw fa-file-excel-o"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-success">
									<input type="checkbox" name="accesses[]" value="beli_motor_order_create" id="beli_motor_order_create" 
									<?php if (strpos($detil[0]['access_detil'],'beli_motor_order_create') !== false) echo 'checked'; ?>>
									<label for="beli_motor_order_create"><i class="fa fa-fw fa-clone"></i> <i class="fa fa-fw fa-plus-square"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-info">
									<input type="checkbox" name="accesses[]" value="beli_motor_order_read" id="beli_motor_order_read" 
									<?php if (strpos($detil[0]['access_detil'],'beli_motor_order_read') !== false) echo 'checked'; ?>>
									<label for="beli_motor_order_read"><i class="fa fa-fw fa-eye"></i> <i class="fa fa-fw fa-print"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-warning">
									<input type="checkbox" name="accesses[]" value="beli_motor_order_update" id="beli_motor_order_update" 
									<?php if (strpos($detil[0]['access_detil'],'beli_motor_order_update') !== false) echo 'checked'; ?>>
									<label for="beli_motor_order_update"><i class="fa fa-fw fa-edit"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-danger">
									<input type="checkbox" name="accesses[]" value="beli_motor_order_delete" id="beli_motor_order_delete" 
									<?php if (strpos($detil[0]['access_detil'],'beli_motor_order_delete') !== false) echo 'checked'; ?>>
									<label for="beli_motor_order_delete"><i class="fa fa-fw fa-trash"></i></label>
								</label>
							</td>
							<td></td>
							</tr>
							<!--Penerimaan Motor-->
							<tr>
							<td><h4>Penerimaan Motor</h4></td>
							<td>
								<label class="checkbox-custom check-primary">
									<input type="checkbox" name="accesses[]" value="beli_motor_terima_manage" id="beli_motor_terima_manage" 
									<?php if (strpos($detil[0]['access_detil'],'beli_motor_terima_manage') !== false) echo 'checked'; ?>>
									<label for="beli_motor_terima_manage"><i class="fa fa-fw fa-database"></i> <i class="fa fa-fw fa-file-excel-o"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-success">
									<input type="checkbox" name="accesses[]" value="beli_motor_terima_create" id="beli_motor_terima_create" 
									<?php if (strpos($detil[0]['access_detil'],'beli_motor_terima_create') !== false) echo 'checked'; ?>>
									<label for="beli_motor_terima_create"><i class="fa fa-fw fa-clone"></i> <i class="fa fa-fw fa-plus-square"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-info">
									<input type="checkbox" name="accesses[]" value="beli_motor_terima_read" id="beli_motor_terima_read" 
									<?php if (strpos($detil[0]['access_detil'],'beli_motor_terima_read') !== false) echo 'checked'; ?>>
									<label for="beli_motor_terima_read"><i class="fa fa-fw fa-eye"></i> <i class="fa fa-fw fa-print"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-warning">
									<input type="checkbox" name="accesses[]" value="beli_motor_terima_update" id="beli_motor_terima_update" 
									<?php if (strpos($detil[0]['access_detil'],'beli_motor_terima_update') !== false) echo 'checked'; ?>>
									<label for="beli_motor_terima_update"><i class="fa fa-fw fa-edit"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-danger">
									<input type="checkbox" name="accesses[]" value="beli_motor_terima_delete" id="beli_motor_terima_delete" 
									<?php if (strpos($detil[0]['access_detil'],'beli_motor_terima_delete') !== false) echo 'checked'; ?>>
									<label for="beli_motor_terima_delete"><i class="fa fa-fw fa-trash"></i></label>
								</label>
							</td>
							<td></td>
							</tr>
							<!--Tanda Terima Tagihan-->
							<tr>
							<td><h4>Tanda Terima Tagihan Motor</h4></td>
							<td>
								<label class="checkbox-custom check-primary">
									<input type="checkbox" name="accesses[]" value="beli_motor_invoice_manage" id="beli_motor_invoice_manage" 
									<?php if (strpos($detil[0]['access_detil'],'beli_motor_invoice_manage') !== false) echo 'checked'; ?>>
									<label for="beli_motor_invoice_manage"><i class="fa fa-fw fa-database"></i> <i class="fa fa-fw fa-file-excel-o"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-success">
									<input type="checkbox" name="accesses[]" value="beli_motor_invoice_create" id="beli_motor_invoice_create" 
									<?php if (strpos($detil[0]['access_detil'],'beli_motor_invoice_create') !== false) echo 'checked'; ?>>
									<label for="beli_motor_invoice_create"><i class="fa fa-fw fa-clone"></i> <i class="fa fa-fw fa-plus-square"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-info">
									<input type="checkbox" name="accesses[]" value="beli_motor_invoice_read" id="beli_motor_invoice_read" 
									<?php if (strpos($detil[0]['access_detil'],'beli_motor_invoice_read') !== false) echo 'checked'; ?>>
									<label for="beli_motor_invoice_read"><i class="fa fa-fw fa-eye"></i> <i class="fa fa-fw fa-print"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-warning">
									<input type="checkbox" name="accesses[]" value="beli_motor_invoice_update" id="beli_motor_invoice_update" 
									<?php if (strpos($detil[0]['access_detil'],'beli_motor_invoice_update') !== false) echo 'checked'; ?>>
									<label for="beli_motor_invoice_update"><i class="fa fa-fw fa-edit"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-danger">
									<input type="checkbox" name="accesses[]" value="beli_motor_invoice_delete" id="beli_motor_invoice_delete" 
									<?php if (strpos($detil[0]['access_detil'],'beli_motor_invoice_delete') !== false) echo 'checked'; ?>>
									<label for="beli_motor_invoice_delete"><i class="fa fa-fw fa-trash"></i></label>
								</label>
							</td>
							<td></td>
							</tr>
							<!--Pembayaran Utang Motor-->
							<tr>
							<td><h4>Pembayaran Utang Motor</h4></td>
							<td>
								<label class="checkbox-custom check-primary">
									<input type="checkbox" name="accesses[]" value="beli_motor_bayar_manage" id="beli_motor_bayar_manage" 
									<?php if (strpos($detil[0]['access_detil'],'beli_motor_bayar_manage') !== false) echo 'checked'; ?>>
									<label for="beli_motor_bayar_manage"><i class="fa fa-fw fa-database"></i> <i class="fa fa-fw fa-file-excel-o"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-success">
									<input type="checkbox" name="accesses[]" value="beli_motor_bayar_create" id="beli_motor_bayar_create" 
									<?php if (strpos($detil[0]['access_detil'],'beli_motor_bayar_create') !== false) echo 'checked'; ?>>
									<label for="beli_motor_bayar_create"><i class="fa fa-fw fa-clone"></i> <i class="fa fa-fw fa-plus-square"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-info">
									<input type="checkbox" name="accesses[]" value="beli_motor_bayar_read" id="beli_motor_bayar_read" 
									<?php if (strpos($detil[0]['access_detil'],'beli_motor_bayar_read') !== false) echo 'checked'; ?>>
									<label for="beli_motor_bayar_read"><i class="fa fa-fw fa-eye"></i> <i class="fa fa-fw fa-print"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-warning">
									<input type="checkbox" name="accesses[]" value="beli_motor_bayar_update" id="beli_motor_bayar_update" 
									<?php if (strpos($detil[0]['access_detil'],'beli_motor_bayar_update') !== false) echo 'checked'; ?>>
									<label for="beli_motor_bayar_update"><i class="fa fa-fw fa-edit"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-danger">
									<input type="checkbox" name="accesses[]" value="beli_motor_bayar_delete" id="beli_motor_bayar_delete" 
									<?php if (strpos($detil[0]['access_detil'],'beli_motor_bayar_delete') !== false) echo 'checked'; ?>>
									<label for="beli_motor_bayar_delete"><i class="fa fa-fw fa-trash"></i></label>
								</label>
							</td>
							<td></td>
							</tr>
							<!--Order Penjualan Motor-->
							<tr>
							<td><h4>Order Penjualan Motor</h4></td>
							<td>
								<label class="checkbox-custom check-primary">
									<input type="checkbox" name="accesses[]" value="jual_motor_order_manage" id="jual_motor_order_manage" 
									<?php if (strpos($detil[0]['access_detil'],'jual_motor_order_manage') !== false) echo 'checked'; ?>>
									<label for="jual_motor_order_manage"><i class="fa fa-fw fa-database"></i> <i class="fa fa-fw fa-file-excel-o"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-success">
									<input type="checkbox" name="accesses[]" value="jual_motor_order_create" id="jual_motor_order_create" 
									<?php if (strpos($detil[0]['access_detil'],'jual_motor_order_create') !== false) echo 'checked'; ?>>
									<label for="jual_motor_order_create"><i class="fa fa-fw fa-clone"></i> <i class="fa fa-fw fa-plus-square"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-info">
									<input type="checkbox" name="accesses[]" value="jual_motor_order_read" id="jual_motor_order_read" 
									<?php if (strpos($detil[0]['access_detil'],'jual_motor_order_read') !== false) echo 'checked'; ?>>
									<label for="jual_motor_order_read"><i class="fa fa-fw fa-eye"></i> <i class="fa fa-fw fa-print"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-warning">
									<input type="checkbox" name="accesses[]" value="jual_motor_order_update" id="jual_motor_order_update" 
									<?php if (strpos($detil[0]['access_detil'],'jual_motor_order_update') !== false) echo 'checked'; ?>>
									<label for="jual_motor_order_update"><i class="fa fa-fw fa-edit"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-danger">
									<input type="checkbox" name="accesses[]" value="jual_motor_order_delete" id="jual_motor_order_delete" 
									<?php if (strpos($detil[0]['access_detil'],'jual_motor_order_delete') !== false) echo 'checked'; ?>>
									<label for="jual_motor_order_delete"><i class="fa fa-fw fa-trash"></i></label>
								</label>
							</td>
							<td></td>
							</tr>
							<!--Order Pengiriman Motor-->
							<tr>
							<td><h4>Order Pengiriman Motor</h4></td>
							<td>
								<label class="checkbox-custom check-primary">
									<input type="checkbox" name="accesses[]" value="jual_motor_delivery_manage" id="jual_motor_delivery_manage" 
									<?php if (strpos($detil[0]['access_detil'],'jual_motor_delivery_manage') !== false) echo 'checked'; ?>>
									<label for="jual_motor_delivery_manage"><i class="fa fa-fw fa-database"></i> <i class="fa fa-fw fa-file-excel-o"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-success">
									<input type="checkbox" name="accesses[]" value="jual_motor_delivery_create" id="jual_motor_delivery_create" 
									<?php if (strpos($detil[0]['access_detil'],'jual_motor_delivery_create') !== false) echo 'checked'; ?>>
									<label for="jual_motor_delivery_create"><i class="fa fa-fw fa-clone"></i> <i class="fa fa-fw fa-plus-square"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-info">
									<input type="checkbox" name="accesses[]" value="jual_motor_delivery_read" id="jual_motor_delivery_read" 
									<?php if (strpos($detil[0]['access_detil'],'jual_motor_delivery_read') !== false) echo 'checked'; ?>>
									<label for="jual_motor_delivery_read"><i class="fa fa-fw fa-eye"></i> <i class="fa fa-fw fa-print"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-warning">
									<input type="checkbox" name="accesses[]" value="jual_motor_delivery_update" id="jual_motor_delivery_update" 
									<?php if (strpos($detil[0]['access_detil'],'jual_motor_delivery_update') !== false) echo 'checked'; ?>>
									<label for="jual_motor_delivery_update"><i class="fa fa-fw fa-edit"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-danger">
									<input type="checkbox" name="accesses[]" value="jual_motor_delivery_delete" id="jual_motor_delivery_delete" 
									<?php if (strpos($detil[0]['access_detil'],'jual_motor_delivery_delete') !== false) echo 'checked'; ?>>
									<label for="jual_motor_delivery_delete"><i class="fa fa-fw fa-trash"></i></label>
								</label>
							</td>
							<td></td>
							</tr>
							<!--Pembayaran Motor-->
							<tr>
							<td><h4>Pembayaran Motor</h4></td>
							<td>
								<label class="checkbox-custom check-primary">
									<input type="checkbox" name="accesses[]" value="jual_motor_bayar_manage" id="jual_motor_bayar_manage" 
									<?php if (strpos($detil[0]['access_detil'],'jual_motor_bayar_manage') !== false) echo 'checked'; ?>>
									<label for="jual_motor_bayar_manage"><i class="fa fa-fw fa-database"></i> <i class="fa fa-fw fa-file-excel-o"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-success">
									<input type="checkbox" name="accesses[]" value="jual_motor_bayar_create" id="jual_motor_bayar_create" 
									<?php if (strpos($detil[0]['access_detil'],'jual_motor_bayar_create') !== false) echo 'checked'; ?>>
									<label for="jual_motor_bayar_create"><i class="fa fa-fw fa-clone"></i> <i class="fa fa-fw fa-plus-square"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-info">
									<input type="checkbox" name="accesses[]" value="jual_motor_bayar_read" id="jual_motor_bayar_read" 
									<?php if (strpos($detil[0]['access_detil'],'jual_motor_bayar_read') !== false) echo 'checked'; ?>>
									<label for="jual_motor_bayar_read"><i class="fa fa-fw fa-eye"></i> <i class="fa fa-fw fa-print"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-warning">
									<input type="checkbox" name="accesses[]" value="jual_motor_bayar_update" id="jual_motor_bayar_update" 
									<?php if (strpos($detil[0]['access_detil'],'jual_motor_bayar_update') !== false) echo 'checked'; ?>>
									<label for="jual_motor_bayar_update"><i class="fa fa-fw fa-edit"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-danger">
									<input type="checkbox" name="accesses[]" value="jual_motor_bayar_delete" id="jual_motor_bayar_delete" 
									<?php if (strpos($detil[0]['access_detil'],'jual_motor_bayar_delete') !== false) echo 'checked'; ?>>
									<label for="jual_motor_bayar_delete"><i class="fa fa-fw fa-trash"></i></label>
								</label>
							</td>
							<td></td>
							</tr>
							<!--POS Bengkel KSB-->
							<tr>
							<td><h4>POS Bengkel KSB</h4></td>
							<td>
								<label class="checkbox-custom check-primary">
									<input type="checkbox" name="accesses[]" value="pos_bengkel_manage" id="pos_bengkel_manage" 
									<?php if (strpos($detil[0]['access_detil'],'pos_bengkel_manage') !== false) echo 'checked'; ?>>
									<label for="pos_bengkel_manage"><i class="fa fa-fw fa-database"></i> <i class="fa fa-fw fa-file-excel-o"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-success">
									<input type="checkbox" name="accesses[]" value="pos_bengkel_create" id="pos_bengkel_create" 
									<?php if (strpos($detil[0]['access_detil'],'pos_bengkel_create') !== false) echo 'checked'; ?>>
									<label for="pos_bengkel_create"><i class="fa fa-fw fa-clone"></i> <i class="fa fa-fw fa-plus-square"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-info">
									<input type="checkbox" name="accesses[]" value="pos_bengkel_read" id="pos_bengkel_read" 
									<?php if (strpos($detil[0]['access_detil'],'pos_bengkel_read') !== false) echo 'checked'; ?>>
									<label for="pos_bengkel_read"><i class="fa fa-fw fa-eye"></i> <i class="fa fa-fw fa-print"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-warning">
									<input type="checkbox" name="accesses[]" value="pos_bengkel_update" id="pos_bengkel_update" 
									<?php if (strpos($detil[0]['access_detil'],'pos_bengkel_update') !== false) echo 'checked'; ?>>
									<label for="pos_bengkel_update"><i class="fa fa-fw fa-edit"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-danger">
									<input type="checkbox" name="accesses[]" value="pos_bengkel_delete" id="pos_bengkel_delete" 
									<?php if (strpos($detil[0]['access_detil'],'pos_bengkel_delete') !== false) echo 'checked'; ?>>
									<label for="pos_bengkel_delete"><i class="fa fa-fw fa-trash"></i></label>
								</label>
							</td>
							<td></td>
							</tr>
							<!--POS Bengkel KSG-->
							<tr>
							<td><h4>POS Bengkel KSG</h4></td>
							<td>
								<label class="checkbox-custom check-primary">
									<input type="checkbox" name="accesses[]" value="pos_bengkel_ksg_manage" id="pos_bengkel_ksg_manage" 
									<?php if (strpos($detil[0]['access_detil'],'pos_bengkel_ksg_manage') !== false) echo 'checked'; ?>>
									<label for="pos_bengkel_ksg_manage"><i class="fa fa-fw fa-database"></i> <i class="fa fa-fw fa-file-excel-o"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-success">
									<input type="checkbox" name="accesses[]" value="pos_bengkel_ksg_create" id="pos_bengkel_ksg_create" 
									<?php if (strpos($detil[0]['access_detil'],'pos_bengkel_ksg_create') !== false) echo 'checked'; ?>>
									<label for="pos_bengkel_ksg_create"><i class="fa fa-fw fa-clone"></i> <i class="fa fa-fw fa-plus-square"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-info">
									<input type="checkbox" name="accesses[]" value="pos_bengkel_ksg_read" id="pos_bengkel_ksg_read" 
									<?php if (strpos($detil[0]['access_detil'],'pos_bengkel_ksg_read') !== false) echo 'checked'; ?>>
									<label for="pos_bengkel_ksg_read"><i class="fa fa-fw fa-eye"></i> <i class="fa fa-fw fa-print"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-warning">
									<input type="checkbox" name="accesses[]" value="pos_bengkel_ksg_update" id="pos_bengkel_ksg_update" 
									<?php if (strpos($detil[0]['access_detil'],'pos_bengkel_ksg_update') !== false) echo 'checked'; ?>>
									<label for="pos_bengkel_ksg_update"><i class="fa fa-fw fa-edit"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-danger">
									<input type="checkbox" name="accesses[]" value="pos_bengkel_ksg_delete" id="pos_bengkel_ksg_delete" 
									<?php if (strpos($detil[0]['access_detil'],'pos_bengkel_ksg_delete') !== false) echo 'checked'; ?>>
									<label for="pos_bengkel_ksg_delete"><i class="fa fa-fw fa-trash"></i></label>
								</label>
							</td>
							<td></td>
							</tr>
							<!--Mutasi Motor-->
							<tr>
							<td><h4>Mutasi Motor</h4></td>
							<td>
								<label class="checkbox-custom check-primary">
									<input type="checkbox" name="accesses[]" value="beli_motor_mutasi_manage" id="beli_motor_mutasi_manage" 
									<?php if (strpos($detil[0]['access_detil'],'beli_motor_mutasi_manage') !== false) echo 'checked'; ?>>
									<label for="beli_motor_mutasi_manage"><i class="fa fa-fw fa-database"></i> <i class="fa fa-fw fa-file-excel-o"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-success">
									<input type="checkbox" name="accesses[]" value="beli_motor_mutasi_create" id="beli_motor_mutasi_create" 
									<?php if (strpos($detil[0]['access_detil'],'beli_motor_mutasi_create') !== false) echo 'checked'; ?>>
									<label for="beli_motor_mutasi_create"><i class="fa fa-fw fa-clone"></i> <i class="fa fa-fw fa-plus-square"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-info">
									<input type="checkbox" name="accesses[]" value="beli_motor_mutasi_read" id="beli_motor_mutasi_read" 
									<?php if (strpos($detil[0]['access_detil'],'beli_motor_mutasi_read') !== false) echo 'checked'; ?>>
									<label for="beli_motor_mutasi_read"><i class="fa fa-fw fa-eye"></i> <i class="fa fa-fw fa-print"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-warning">
									<input type="checkbox" name="accesses[]" value="beli_motor_mutasi_update" id="beli_motor_mutasi_update" 
									<?php if (strpos($detil[0]['access_detil'],'beli_motor_mutasi_update') !== false) echo 'checked'; ?>>
									<label for="beli_motor_mutasi_update"><i class="fa fa-fw fa-edit"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-danger">
									<input type="checkbox" name="accesses[]" value="beli_motor_mutasi_delete" id="beli_motor_mutasi_delete" 
									<?php if (strpos($detil[0]['access_detil'],'beli_motor_mutasi_delete') !== false) echo 'checked'; ?>>
									<label for="beli_motor_mutasi_delete"><i class="fa fa-fw fa-trash"></i></label>
								</label>
							</td>
							<td></td>
							</tr>
							<!--Persediaan Motor-->
							<tr>
							<td><h4>Persediaan Motor</h4></td>
							<td>
								<label class="checkbox-custom check-primary">
									<input type="checkbox" name="accesses[]" value="stock_motor_manage" id="stock_motor_manage" 
									<?php if (strpos($detil[0]['access_detil'],'stock_motor_manage') !== false) echo 'checked'; ?>>
									<label for="stock_motor_manage"><i class="fa fa-fw fa-database"></i> <i class="fa fa-fw fa-file-excel-o"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-success">
									<input type="checkbox" name="accesses[]" value="stock_motor_create" id="stock_motor_create" 
									<?php if (strpos($detil[0]['access_detil'],'stock_motor_create') !== false) echo 'checked'; ?>>
									<label for="stock_motor_create"><i class="fa fa-fw fa-clone"></i> <i class="fa fa-fw fa-plus-square"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-info">
									<input type="checkbox" name="accesses[]" value="stock_motor_read" id="stock_motor_read" 
									<?php if (strpos($detil[0]['access_detil'],'stock_motor_read') !== false) echo 'checked'; ?>>
									<label for="stock_motor_read"><i class="fa fa-fw fa-eye"></i> <i class="fa fa-fw fa-print"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-warning">
									<input type="checkbox" name="accesses[]" value="stock_motor_update" id="stock_motor_update" 
									<?php if (strpos($detil[0]['access_detil'],'stock_motor_update') !== false) echo 'checked'; ?>>
									<label for="stock_motor_update"><i class="fa fa-fw fa-edit"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-danger">
									<input type="checkbox" name="accesses[]" value="stock_motor_delete" id="stock_motor_delete" 
									<?php if (strpos($detil[0]['access_detil'],'stock_motor_delete') !== false) echo 'checked'; ?>>
									<label for="stock_motor_delete"><i class="fa fa-fw fa-trash"></i></label>
								</label>
							</td>
							<td></td>
							</tr>
							<!--Jurnal Penyesuaian-->
							<tr>
							<td><h4>Jurnal Penyesuaian</h4></td>
							<td>
								<label class="checkbox-custom check-primary">
									<input type="checkbox" name="accesses[]" value="jurnal_sesuai_manage" id="jurnal_sesuai_manage" 
									<?php if (strpos($detil[0]['access_detil'],'jurnal_sesuai_manage') !== false) echo 'checked'; ?>>
									<label for="jurnal_sesuai_manage"><i class="fa fa-fw fa-database"></i> <i class="fa fa-fw fa-file-excel-o"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-success">
									<input type="checkbox" name="accesses[]" value="jurnal_sesuai_create" id="jurnal_sesuai_create" 
									<?php if (strpos($detil[0]['access_detil'],'jurnal_sesuai_create') !== false) echo 'checked'; ?>>
									<label for="jurnal_sesuai_create"><i class="fa fa-fw fa-clone"></i> <i class="fa fa-fw fa-plus-square"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-info">
									<input type="checkbox" name="accesses[]" value="jurnal_sesuai_read" id="jurnal_sesuai_read" 
									<?php if (strpos($detil[0]['access_detil'],'jurnal_sesuai_read') !== false) echo 'checked'; ?>>
									<label for="jurnal_sesuai_read"><i class="fa fa-fw fa-eye"></i> <i class="fa fa-fw fa-print"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-warning">
									<input type="checkbox" name="accesses[]" value="jurnal_sesuai_update" id="jurnal_sesuai_update" 
									<?php if (strpos($detil[0]['access_detil'],'jurnal_sesuai_update') !== false) echo 'checked'; ?>>
									<label for="jurnal_sesuai_update"><i class="fa fa-fw fa-edit"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-danger">
									<input type="checkbox" name="accesses[]" value="jurnal_sesuai_delete" id="jurnal_sesuai_delete" 
									<?php if (strpos($detil[0]['access_detil'],'jurnal_sesuai_delete') !== false) echo 'checked'; ?>>
									<label for="jurnal_sesuai_delete"><i class="fa fa-fw fa-trash"></i></label>
								</label>
							</td>
							<td></td>
							</tr>
							<!--Mutasi Persediaan-->
							<tr>
							<td><h4>Mutasi Persediaan</h4></td>
							<td>
								<label class="checkbox-custom check-primary">
									<input type="checkbox" name="accesses[]" value="stock_mutasi_manage" id="stock_mutasi_manage" 
									<?php if (strpos($detil[0]['access_detil'],'stock_mutasi_manage') !== false) echo 'checked'; ?>>
									<label for="stock_mutasi_manage"><i class="fa fa-fw fa-database"></i> <i class="fa fa-fw fa-file-excel-o"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-success">
									<input type="checkbox" name="accesses[]" value="stock_mutasi_create" id="stock_mutasi_create" 
									<?php if (strpos($detil[0]['access_detil'],'stock_mutasi_create') !== false) echo 'checked'; ?>>
									<label for="stock_mutasi_create"><i class="fa fa-fw fa-clone"></i> <i class="fa fa-fw fa-plus-square"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-info">
									<input type="checkbox" name="accesses[]" value="stock_mutasi_read" id="stock_mutasi_read" 
									<?php if (strpos($detil[0]['access_detil'],'stock_mutasi_read') !== false) echo 'checked'; ?>>
									<label for="stock_mutasi_read"><i class="fa fa-fw fa-eye"></i> <i class="fa fa-fw fa-print"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-warning">
									<input type="checkbox" name="accesses[]" value="stock_mutasi_update" id="stock_mutasi_update" 
									<?php if (strpos($detil[0]['access_detil'],'stock_mutasi_update') !== false) echo 'checked'; ?>>
									<label for="stock_mutasi_update"><i class="fa fa-fw fa-edit"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-danger">
									<input type="checkbox" name="accesses[]" value="stock_mutasi_delete" id="stock_mutasi_delete" 
									<?php if (strpos($detil[0]['access_detil'],'stock_mutasi_delete') !== false) echo 'checked'; ?>>
									<label for="stock_mutasi_delete"><i class="fa fa-fw fa-trash"></i></label>
								</label>
							</td>
							<td></td>
							</tr>
							<!--Bukti Kas Masuk-->
							<tr>
							<td><h4>Bukti Kas Masuk</h4></td>
							<td>
								<label class="checkbox-custom check-primary">
									<input type="checkbox" name="accesses[]" value="cash_masuk_manage" id="cash_masuk_manage" 
									<?php if (strpos($detil[0]['access_detil'],'cash_masuk_manage') !== false) echo 'checked'; ?>>
									<label for="cash_masuk_manage"><i class="fa fa-fw fa-database"></i> <i class="fa fa-fw fa-file-excel-o"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-success">
									<input type="checkbox" name="accesses[]" value="cash_masuk_create" id="cash_masuk_create" 
									<?php if (strpos($detil[0]['access_detil'],'cash_masuk_create') !== false) echo 'checked'; ?>>
									<label for="cash_masuk_create"><i class="fa fa-fw fa-clone"></i> <i class="fa fa-fw fa-plus-square"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-info">
									<input type="checkbox" name="accesses[]" value="cash_masuk_read" id="cash_masuk_read" 
									<?php if (strpos($detil[0]['access_detil'],'cash_masuk_read') !== false) echo 'checked'; ?>>
									<label for="cash_masuk_read"><i class="fa fa-fw fa-eye"></i> <i class="fa fa-fw fa-print"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-warning">
									<input type="checkbox" name="accesses[]" value="cash_masuk_update" id="cash_masuk_update" 
									<?php if (strpos($detil[0]['access_detil'],'cash_masuk_update') !== false) echo 'checked'; ?>>
									<label for="cash_masuk_update"><i class="fa fa-fw fa-edit"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-danger">
									<input type="checkbox" name="accesses[]" value="cash_masuk_delete" id="cash_masuk_delete" 
									<?php if (strpos($detil[0]['access_detil'],'cash_masuk_delete') !== false) echo 'checked'; ?>>
									<label for="cash_masuk_delete"><i class="fa fa-fw fa-trash"></i></label>
								</label>
							</td>
							<td></td>
							</tr>
							<!--Bukti Kas Keluar-->
							<tr>
							<td><h4>Bukti Kas Keluar</h4></td>
							<td>
								<label class="checkbox-custom check-primary">
									<input type="checkbox" name="accesses[]" value="cash_keluar_manage" id="cash_keluar_manage" 
									<?php if (strpos($detil[0]['access_detil'],'cash_keluar_manage') !== false) echo 'checked'; ?>>
									<label for="cash_keluar_manage"><i class="fa fa-fw fa-database"></i> <i class="fa fa-fw fa-file-excel-o"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-success">
									<input type="checkbox" name="accesses[]" value="cash_keluar_create" id="cash_keluar_create" 
									<?php if (strpos($detil[0]['access_detil'],'cash_keluar_create') !== false) echo 'checked'; ?>>
									<label for="cash_keluar_create"><i class="fa fa-fw fa-clone"></i> <i class="fa fa-fw fa-plus-square"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-info">
									<input type="checkbox" name="accesses[]" value="cash_keluar_read" id="cash_keluar_read" 
									<?php if (strpos($detil[0]['access_detil'],'cash_keluar_read') !== false) echo 'checked'; ?>>
									<label for="cash_keluar_read"><i class="fa fa-fw fa-eye"></i> <i class="fa fa-fw fa-print"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-warning">
									<input type="checkbox" name="accesses[]" value="cash_keluar_update" id="cash_keluar_update" 
									<?php if (strpos($detil[0]['access_detil'],'cash_keluar_update') !== false) echo 'checked'; ?>>
									<label for="cash_keluar_update"><i class="fa fa-fw fa-edit"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-danger">
									<input type="checkbox" name="accesses[]" value="cash_keluar_delete" id="cash_keluar_delete" 
									<?php if (strpos($detil[0]['access_detil'],'cash_keluar_delete') !== false) echo 'checked'; ?>>
									<label for="cash_keluar_delete"><i class="fa fa-fw fa-trash"></i></label>
								</label>
							</td>
							<td></td>
							</tr>
							<!--Pembayaran Gaji-->
							<tr>
							<td><h4>Pembayaran Gaji</h4></td>
							<td>
								<label class="checkbox-custom check-primary">
									<input type="checkbox" name="accesses[]" value="payroll_bayar_manage" id="payroll_bayar_manage" 
									<?php if (strpos($detil[0]['access_detil'],'payroll_bayar_manage') !== false) echo 'checked'; ?>>
									<label for="payroll_bayar_manage"><i class="fa fa-fw fa-database"></i> <i class="fa fa-fw fa-file-excel-o"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-success">
									<input type="checkbox" name="accesses[]" value="payroll_bayar_create" id="payroll_bayar_create" 
									<?php if (strpos($detil[0]['access_detil'],'payroll_bayar_create') !== false) echo 'checked'; ?>>
									<label for="payroll_bayar_create"><i class="fa fa-fw fa-clone"></i> <i class="fa fa-fw fa-plus-square"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-info">
									<input type="checkbox" name="accesses[]" value="payroll_bayar_read" id="payroll_bayar_read" 
									<?php if (strpos($detil[0]['access_detil'],'payroll_bayar_read') !== false) echo 'checked'; ?>>
									<label for="payroll_bayar_read"><i class="fa fa-fw fa-eye"></i> <i class="fa fa-fw fa-print"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-warning">
									<input type="checkbox" name="accesses[]" value="payroll_bayar_update" id="payroll_bayar_update" 
									<?php if (strpos($detil[0]['access_detil'],'payroll_bayar_update') !== false) echo 'checked'; ?>>
									<label for="payroll_bayar_update"><i class="fa fa-fw fa-edit"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-danger">
									<input type="checkbox" name="accesses[]" value="payroll_bayar_delete" id="payroll_bayar_delete" 
									<?php if (strpos($detil[0]['access_detil'],'payroll_bayar_delete') !== false) echo 'checked'; ?>>
									<label for="payroll_bayar_delete"><i class="fa fa-fw fa-trash"></i></label>
								</label>
							</td>
							<td></td>
							</tr>
							<!--Jurnal Memorial-->
							<tr>
							<td><h4>Jurnal Memorial</h4></td>
							<td>
								<label class="checkbox-custom check-primary">
									<input type="checkbox" name="accesses[]" value="memorial_manage" id="memorial_manage" 
									<?php if (strpos($detil[0]['access_detil'],'memorial_manage') !== false) echo 'checked'; ?>>
									<label for="memorial_manage"><i class="fa fa-fw fa-database"></i> <i class="fa fa-fw fa-file-excel-o"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-success">
									<input type="checkbox" name="accesses[]" value="memorial_create" id="memorial_create" 
									<?php if (strpos($detil[0]['access_detil'],'memorial_create') !== false) echo 'checked'; ?>>
									<label for="memorial_create"><i class="fa fa-fw fa-clone"></i> <i class="fa fa-fw fa-plus-square"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-info">
									<input type="checkbox" name="accesses[]" value="memorial_read" id="memorial_read" 
									<?php if (strpos($detil[0]['access_detil'],'memorial_read') !== false) echo 'checked'; ?>>
									<label for="memorial_read"><i class="fa fa-fw fa-eye"></i> <i class="fa fa-fw fa-print"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-warning">
									<input type="checkbox" name="accesses[]" value="memorial_update" id="memorial_update" 
									<?php if (strpos($detil[0]['access_detil'],'memorial_update') !== false) echo 'checked'; ?>>
									<label for="memorial_update"><i class="fa fa-fw fa-edit"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-danger">
									<input type="checkbox" name="accesses[]" value="memorial_delete" id="memorial_delete" 
									<?php if (strpos($detil[0]['access_detil'],'memorial_delete') !== false) echo 'checked'; ?>>
									<label for="memorial_delete"><i class="fa fa-fw fa-trash"></i></label>
								</label>
							</td>
							<td></td>
							</tr>
							<!--Permintaan Gaji-->
							<tr>
							<td><h4>Permintaan Gaji</h4></td>
							<td>
								<label class="checkbox-custom check-primary">
									<input type="checkbox" name="accesses[]" value="payroll_minta_manage" id="payroll_minta_manage" 
									<?php if (strpos($detil[0]['access_detil'],'payroll_minta_manage') !== false) echo 'checked'; ?>>
									<label for="payroll_minta_manage"><i class="fa fa-fw fa-database"></i> <i class="fa fa-fw fa-file-excel-o"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-success">
									<input type="checkbox" name="accesses[]" value="payroll_minta_create" id="payroll_minta_create" 
									<?php if (strpos($detil[0]['access_detil'],'payroll_minta_create') !== false) echo 'checked'; ?>>
									<label for="payroll_minta_create"><i class="fa fa-fw fa-clone"></i> <i class="fa fa-fw fa-plus-square"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-info">
									<input type="checkbox" name="accesses[]" value="payroll_minta_read" id="payroll_minta_read" 
									<?php if (strpos($detil[0]['access_detil'],'payroll_minta_read') !== false) echo 'checked'; ?>>
									<label for="payroll_minta_read"><i class="fa fa-fw fa-eye"></i> <i class="fa fa-fw fa-print"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-warning">
									<input type="checkbox" name="accesses[]" value="payroll_minta_update" id="payroll_minta_update" 
									<?php if (strpos($detil[0]['access_detil'],'payroll_minta_update') !== false) echo 'checked'; ?>>
									<label for="payroll_minta_update"><i class="fa fa-fw fa-edit"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-danger">
									<input type="checkbox" name="accesses[]" value="payroll_minta_delete" id="payroll_minta_delete" 
									<?php if (strpos($detil[0]['access_detil'],'payroll_minta_delete') !== false) echo 'checked'; ?>>
									<label for="payroll_minta_delete"><i class="fa fa-fw fa-trash"></i></label>
								</label>
							</td>
							<td></td>
							</tr>
							<!--Jenis Aset-->
							<tr>
							<td><h4>Jenis Aset</h4></td>
							<td>
								<label class="checkbox-custom check-primary">
									<input type="checkbox" name="accesses[]" value="m_asset_type_manage" id="m_asset_type_manage" 
									<?php if (strpos($detil[0]['access_detil'],'m_asset_type_manage') !== false) echo 'checked'; ?>>
									<label for="m_asset_type_manage"><i class="fa fa-fw fa-database"></i> <i class="fa fa-fw fa-file-excel-o"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-success">
									<input type="checkbox" name="accesses[]" value="m_asset_type_create" id="m_asset_type_create" 
									<?php if (strpos($detil[0]['access_detil'],'m_asset_type_create') !== false) echo 'checked'; ?>>
									<label for="m_asset_type_create"><i class="fa fa-fw fa-clone"></i> <i class="fa fa-fw fa-plus-square"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-info">
									<input type="checkbox" name="accesses[]" value="m_asset_type_read" id="m_asset_type_read" 
									<?php if (strpos($detil[0]['access_detil'],'m_asset_type_read') !== false) echo 'checked'; ?>>
									<label for="m_asset_type_read"><i class="fa fa-fw fa-eye"></i> <i class="fa fa-fw fa-print"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-warning">
									<input type="checkbox" name="accesses[]" value="m_asset_type_update" id="m_asset_type_update" 
									<?php if (strpos($detil[0]['access_detil'],'m_asset_type_update') !== false) echo 'checked'; ?>>
									<label for="m_asset_type_update"><i class="fa fa-fw fa-edit"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-danger">
									<input type="checkbox" name="accesses[]" value="m_asset_type_delete" id="m_asset_type_delete" 
									<?php if (strpos($detil[0]['access_detil'],'m_asset_type_delete') !== false) echo 'checked'; ?>>
									<label for="m_asset_type_delete"><i class="fa fa-fw fa-trash"></i></label>
								</label>
							</td>
							<td></td>
							</tr>
							<!--Tahun Depresiasi-->
							<tr>
							<td><h4>Tahun Depresiasi</h4></td>
							<td>
								<label class="checkbox-custom check-primary">
									<input type="checkbox" name="accesses[]" value="m_depreciation_year_manage" id="m_depreciation_year_manage" 
									<?php if (strpos($detil[0]['access_detil'],'m_depreciation_year_manage') !== false) echo 'checked'; ?>>
									<label for="m_depreciation_year_manage"><i class="fa fa-fw fa-database"></i> <i class="fa fa-fw fa-file-excel-o"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-success">
									<input type="checkbox" name="accesses[]" value="m_depreciation_year_create" id="m_depreciation_year_create" 
									<?php if (strpos($detil[0]['access_detil'],'m_depreciation_year_create') !== false) echo 'checked'; ?>>
									<label for="m_depreciation_year_create"><i class="fa fa-fw fa-clone"></i> <i class="fa fa-fw fa-plus-square"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-info">
									<input type="checkbox" name="accesses[]" value="m_depreciation_year_read" id="m_depreciation_year_read" 
									<?php if (strpos($detil[0]['access_detil'],'m_depreciation_year_read') !== false) echo 'checked'; ?>>
									<label for="m_depreciation_year_read"><i class="fa fa-fw fa-eye"></i> <i class="fa fa-fw fa-print"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-warning">
									<input type="checkbox" name="accesses[]" value="m_depreciation_year_update" id="m_depreciation_year_update" 
									<?php if (strpos($detil[0]['access_detil'],'m_depreciation_year_update') !== false) echo 'checked'; ?>>
									<label for="m_depreciation_year_update"><i class="fa fa-fw fa-edit"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-danger">
									<input type="checkbox" name="accesses[]" value="m_depreciation_year_delete" id="m_depreciation_year_delete" 
									<?php if (strpos($detil[0]['access_detil'],'m_depreciation_year_delete') !== false) echo 'checked'; ?>>
									<label for="m_depreciation_year_delete"><i class="fa fa-fw fa-trash"></i></label>
								</label>
							</td>
							<td></td>
							</tr>
							<!--Aset-->
							<tr>
							<td><h4>Aset</h4></td>
							<td>
								<label class="checkbox-custom check-primary">
									<input type="checkbox" name="accesses[]" value="m_asset_manage" id="m_asset_manage" 
									<?php if (strpos($detil[0]['access_detil'],'m_asset_manage') !== false) echo 'checked'; ?>>
									<label for="m_asset_manage"><i class="fa fa-fw fa-database"></i> <i class="fa fa-fw fa-file-excel-o"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-success">
									<input type="checkbox" name="accesses[]" value="m_asset_create" id="m_asset_create" 
									<?php if (strpos($detil[0]['access_detil'],'m_asset_create') !== false) echo 'checked'; ?>>
									<label for="m_asset_create"><i class="fa fa-fw fa-clone"></i> <i class="fa fa-fw fa-plus-square"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-info">
									<input type="checkbox" name="accesses[]" value="m_asset_read" id="m_asset_read" 
									<?php if (strpos($detil[0]['access_detil'],'m_asset_read') !== false) echo 'checked'; ?>>
									<label for="m_asset_read"><i class="fa fa-fw fa-eye"></i> <i class="fa fa-fw fa-print"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-warning">
									<input type="checkbox" name="accesses[]" value="m_asset_update" id="m_asset_update" 
									<?php if (strpos($detil[0]['access_detil'],'m_asset_update') !== false) echo 'checked'; ?>>
									<label for="m_asset_update"><i class="fa fa-fw fa-edit"></i></label>
								</label>
							</td>
							<td>
								<label class="checkbox-custom check-danger">
									<input type="checkbox" name="accesses[]" value="m_asset_delete" id="m_asset_delete" 
									<?php if (strpos($detil[0]['access_detil'],'m_asset_delete') !== false) echo 'checked'; ?>>
									<label for="m_asset_delete"><i class="fa fa-fw fa-trash"></i></label>
								</label>
							</td>
							<td></td>
							</tr>
							<!--Permintaan Pembelian-->
							<tr>
							<td><h4>Permintaan Pembelian</h4></td>
							<td>
								<label class="checkbox-custom check-primary">
									<input type="checkbox" name="accesses[]" value="beli_minta_laporan_manage" id="beli_minta_laporan_manage" 
									<?php if (strpos($detil[0]['access_detil'],'beli_minta_laporan_manage') !== false) echo 'checked'; ?>>
									<label for="beli_minta_laporan_manage"><i class="fa fa-fw fa-database"></i> <i class="fa fa-fw fa-file-excel-o"></i></label>
								</label>
							</td>
							<td></td>
							</tr>
							<!--PP Detil-->
							<tr>
							<td><h4>PP Detil</h4></td>
							<td>
								<label class="checkbox-custom check-primary">
									<input type="checkbox" name="accesses[]" value="beli_minta_detil_laporan_manage" id="beli_minta_detil_laporan_manage" 
									<?php if (strpos($detil[0]['access_detil'],'beli_minta_detil_laporan_manage') !== false) echo 'checked'; ?>>
									<label for="beli_minta_detil_laporan_manage"><i class="fa fa-fw fa-database"></i> <i class="fa fa-fw fa-file-excel-o"></i></label>
								</label>
							</td>
							<td></td>
							</tr>
							<!--Order Pembelian-->
							<tr>
							<td><h4>Order Pembelian</h4></td>
							<td>
								<label class="checkbox-custom check-primary">
									<input type="checkbox" name="accesses[]" value="beli_order_laporan_manage" id="beli_order_laporan_manage" 
									<?php if (strpos($detil[0]['access_detil'],'beli_order_laporan_manage') !== false) echo 'checked'; ?>>
									<label for="beli_order_laporan_manage"><i class="fa fa-fw fa-database"></i> <i class="fa fa-fw fa-file-excel-o"></i></label>
								</label>
							</td>
							<td></td>
							</tr>
							<!--OP Detil-->
							<tr>
							<td><h4>OP Detil</h4></td>
							<td>
								<label class="checkbox-custom check-primary">
									<input type="checkbox" name="accesses[]" value="beli_order_detil_laporan_manage" id="beli_order_detil_laporan_manage" 
									<?php if (strpos($detil[0]['access_detil'],'beli_order_detil_laporan_manage') !== false) echo 'checked'; ?>>
									<label for="beli_order_detil_laporan_manage"><i class="fa fa-fw fa-database"></i> <i class="fa fa-fw fa-file-excel-o"></i></label>
								</label>
							</td>
							<td></td>
							</tr>
							<!--Penerimaan Barang-->
							<tr>
							<td><h4>Penerimaan Barang</h4></td>
							<td>
								<label class="checkbox-custom check-primary">
									<input type="checkbox" name="accesses[]" value="beli_terima_laporan_manage" id="beli_terima_laporan_manage" 
									<?php if (strpos($detil[0]['access_detil'],'beli_terima_laporan_manage') !== false) echo 'checked'; ?>>
									<label for="beli_terima_laporan_manage"><i class="fa fa-fw fa-database"></i> <i class="fa fa-fw fa-file-excel-o"></i></label>
								</label>
							</td>
							<td></td>
							</tr>
							<!--PB Detil-->
							<tr>
							<td><h4>PB Detil</h4></td>
							<td>
								<label class="checkbox-custom check-primary">
									<input type="checkbox" name="accesses[]" value="beli_terima_detil_laporan_manage" id="beli_terima_detil_laporan_manage" 
									<?php if (strpos($detil[0]['access_detil'],'beli_terima_detil_laporan_manage') !== false) echo 'checked'; ?>>
									<label for="beli_terima_detil_laporan_manage"><i class="fa fa-fw fa-database"></i> <i class="fa fa-fw fa-file-excel-o"></i></label>
								</label>
							</td>
							<td></td>
							</tr>
							<!--Tanda Terima Tagihan-->
							<tr>
							<td><h4>Tanda Terima Tagihan</h4></td>
							<td>
								<label class="checkbox-custom check-primary">
									<input type="checkbox" name="accesses[]" value="beli_invoice_laporan_manage" id="beli_invoice_laporan_manage" 
									<?php if (strpos($detil[0]['access_detil'],'beli_invoice_laporan_manage') !== false) echo 'checked'; ?>>
									<label for="beli_invoice_laporan_manage"><i class="fa fa-fw fa-database"></i> <i class="fa fa-fw fa-file-excel-o"></i></label>
								</label>
							</td>
							<td></td>
							</tr>
							<!--TTT Detil-->
							<tr>
							<td><h4>TTT Detil</h4></td>
							<td>
								<label class="checkbox-custom check-primary">
									<input type="checkbox" name="accesses[]" value="beli_invoice_detil_laporan_manage" id="beli_invoice_detil_laporan_manage" 
									<?php if (strpos($detil[0]['access_detil'],'beli_invoice_detil_laporan_manage') !== false) echo 'checked'; ?>>
									<label for="beli_invoice_detil_laporan_manage"><i class="fa fa-fw fa-database"></i> <i class="fa fa-fw fa-file-excel-o"></i></label>
								</label>
							</td>
							<td></td>
							</tr>
							<!--Retur Pembelian-->
							<tr>
							<td><h4>Retur Pembelian</h4></td>
							<td>
								<label class="checkbox-custom check-primary">
									<input type="checkbox" name="accesses[]" value="beli_retur_laporan_manage" id="beli_retur_laporan_manage" 
									<?php if (strpos($detil[0]['access_detil'],'beli_retur_laporan_manage') !== false) echo 'checked'; ?>>
									<label for="beli_retur_laporan_manage"><i class="fa fa-fw fa-database"></i> <i class="fa fa-fw fa-file-excel-o"></i></label>
								</label>
							</td>
							<td></td>
							</tr>
							<!--Pembayaran Utang-->
							<tr>
							<td><h4>Pembayaran Utang</h4></td>
							<td>
								<label class="checkbox-custom check-primary">
									<input type="checkbox" name="accesses[]" value="beli_bayar_laporan_manage" id="beli_bayar_laporan_manage" 
									<?php if (strpos($detil[0]['access_detil'],'beli_bayar_laporan_manage') !== false) echo 'checked'; ?>>
									<label for="beli_bayar_laporan_manage"><i class="fa fa-fw fa-database"></i> <i class="fa fa-fw fa-file-excel-o"></i></label>
								</label>
							</td>
							<td></td>
							</tr>
							<!--Order Penjualan-->
							<tr>
							<td><h4>Order Penjualan</h4></td>
							<td>
								<label class="checkbox-custom check-primary">
									<input type="checkbox" name="accesses[]" value="jual_order_laporan_manage" id="jual_order_laporan_manage" 
									<?php if (strpos($detil[0]['access_detil'],'jual_order_laporan_manage') !== false) echo 'checked'; ?>>
									<label for="jual_order_laporan_manage"><i class="fa fa-fw fa-database"></i> <i class="fa fa-fw fa-file-excel-o"></i></label>
								</label>
							</td>
							<td></td>
							</tr>
							<!--Order Pengiriman-->
							<tr>
							<td><h4>Order Pengiriman</h4></td>
							<td>
								<label class="checkbox-custom check-primary">
									<input type="checkbox" name="accesses[]" value="jual_delivery_laporan_manage" id="jual_delivery_laporan_manage" 
									<?php if (strpos($detil[0]['access_detil'],'jual_delivery_laporan_manage') !== false) echo 'checked'; ?>>
									<label for="jual_delivery_laporan_manage"><i class="fa fa-fw fa-database"></i> <i class="fa fa-fw fa-file-excel-o"></i></label>
								</label>
							</td>
							<td></td>
							</tr>
							<!--Invoicing-->
							<tr>
							<td><h4>Invoicing</h4></td>
							<td>
								<label class="checkbox-custom check-primary">
									<input type="checkbox" name="accesses[]" value="jual_invoice_laporan_manage" id="jual_invoice_laporan_manage" 
									<?php if (strpos($detil[0]['access_detil'],'jual_invoice_laporan_manage') !== false) echo 'checked'; ?>>
									<label for="jual_invoice_laporan_manage"><i class="fa fa-fw fa-database"></i> <i class="fa fa-fw fa-file-excel-o"></i></label>
								</label>
							</td>
							<td></td>
							</tr>
							<!--Retur Penjualan-->
							<tr>
							<td><h4>Retur Penjualan</h4></td>
							<td>
								<label class="checkbox-custom check-primary">
									<input type="checkbox" name="accesses[]" value="jual_retur_laporan_manage" id="jual_retur_laporan_manage" 
									<?php if (strpos($detil[0]['access_detil'],'jual_retur_laporan_manage') !== false) echo 'checked'; ?>>
									<label for="jual_retur_laporan_manage"><i class="fa fa-fw fa-database"></i> <i class="fa fa-fw fa-file-excel-o"></i></label>
								</label>
							</td>
							<td></td>
							</tr>
							<!--Pembayaran Piutang-->
							<tr>
							<td><h4>Pembayaran Piutang</h4></td>
							<td>
								<label class="checkbox-custom check-primary">
									<input type="checkbox" name="accesses[]" value="jual_bayar_laporan_manage" id="jual_bayar_laporan_manage" 
									<?php if (strpos($detil[0]['access_detil'],'jual_bayar_laporan_manage') !== false) echo 'checked'; ?>>
									<label for="jual_bayar_laporan_manage"><i class="fa fa-fw fa-database"></i> <i class="fa fa-fw fa-file-excel-o"></i></label>
								</label>
							</td>
							<td></td>
							</tr>
							<!--Stock-->
							<tr>
							<td><h4>Stock</h4></td>
							<td>
								<label class="checkbox-custom check-primary">
									<input type="checkbox" name="accesses[]" value="stock_laporan_manage" id="stock_laporan_manage" 
									<?php if (strpos($detil[0]['access_detil'],'stock_laporan_manage') !== false) echo 'checked'; ?>>
									<label for="stock_laporan_manage"><i class="fa fa-fw fa-database"></i> <i class="fa fa-fw fa-file-excel-o"></i></label>
								</label>
							</td>
							<td></td>
							</tr>
							<!--Stock Opname-->
							
							<!--Buku Besar-->
							<tr>
							<td><h4>Buku Besar</h4></td>
							<td>
								<label class="checkbox-custom check-primary">
									<input type="checkbox" name="accesses[]" value="journal_laporan_manage" id="journal_laporan_manage" 
									<?php if (strpos($detil[0]['access_detil'],'journal_laporan_manage') !== false) echo 'checked'; ?>>
									<label for="journal_laporan_manage"><i class="fa fa-fw fa-database"></i> <i class="fa fa-fw fa-file-excel-o"></i></label>
								</label>
							</td>
							<td></td>
							</tr>
							<!--Order Pembelian-->
							<tr>
							<td><h4>Order Pembelian</h4></td>
							<td>
								<label class="checkbox-custom check-primary">
									<input type="checkbox" name="accesses[]" value="beli_motor_order_laporan_manage" id="beli_motor_order_laporan_manage" 
									<?php if (strpos($detil[0]['access_detil'],'beli_motor_order_laporan_manage') !== false) echo 'checked'; ?>>
									<label for="beli_motor_order_laporan_manage"><i class="fa fa-fw fa-database"></i> <i class="fa fa-fw fa-file-excel-o"></i></label>
								</label>
							</td>
							<td></td>
							</tr>
							<!--Penerimaan Motor-->
							<tr>
							<td><h4>Penerimaan Motor</h4></td>
							<td>
								<label class="checkbox-custom check-primary">
									<input type="checkbox" name="accesses[]" value="beli_motor_terima_laporan_manage" id="beli_motor_terima_laporan_manage" 
									<?php if (strpos($detil[0]['access_detil'],'beli_motor_terima_laporan_manage') !== false) echo 'checked'; ?>>
									<label for="beli_motor_terima_laporan_manage"><i class="fa fa-fw fa-database"></i> <i class="fa fa-fw fa-file-excel-o"></i></label>
								</label>
							</td>
							<td></td>
							</tr>
							<!--Tanda Terima Tagihan-->
							<tr>
							<td><h4>Tanda Terima Tagihan</h4></td>
							<td>
								<label class="checkbox-custom check-primary">
									<input type="checkbox" name="accesses[]" value="beli_motor_invoice_laporan_manage" id="beli_motor_invoice_laporan_manage" 
									<?php if (strpos($detil[0]['access_detil'],'beli_motor_invoice_laporan_manage') !== false) echo 'checked'; ?>>
									<label for="beli_motor_invoice_laporan_manage"><i class="fa fa-fw fa-database"></i> <i class="fa fa-fw fa-file-excel-o"></i></label>
								</label>
							</td>
							<td></td>
							</tr>
							<!--Pembayaran Utang Motor-->
							<tr>
							<td><h4>Pembayaran Utang Motor</h4></td>
							<td>
								<label class="checkbox-custom check-primary">
									<input type="checkbox" name="accesses[]" value="beli_motor_bayar_laporan_manage" id="beli_motor_bayar_laporan_manage" 
									<?php if (strpos($detil[0]['access_detil'],'beli_motor_bayar_laporan_manage') !== false) echo 'checked'; ?>>
									<label for="beli_motor_bayar_laporan_manage"><i class="fa fa-fw fa-database"></i> <i class="fa fa-fw fa-file-excel-o"></i></label>
								</label>
							</td>
							<td></td>
							</tr>
							<!--Order Penjualan-->
							<tr>
							<td><h4>Order Penjualan</h4></td>
							<td>
								<label class="checkbox-custom check-primary">
									<input type="checkbox" name="accesses[]" value="jual_motor_order_laporan_manage" id="jual_motor_order_laporan_manage" 
									<?php if (strpos($detil[0]['access_detil'],'jual_motor_order_laporan_manage') !== false) echo 'checked'; ?>>
									<label for="jual_motor_order_laporan_manage"><i class="fa fa-fw fa-database"></i> <i class="fa fa-fw fa-file-excel-o"></i></label>
								</label>
							</td>
							<td></td>
							</tr>
							<!--Order Pengiriman-->
							<tr>
							<td><h4>Order Pengiriman</h4></td>
							<td>
								<label class="checkbox-custom check-primary">
									<input type="checkbox" name="accesses[]" value="jual_motor_delivery_laporan_manage" id="jual_motor_delivery_laporan_manage" 
									<?php if (strpos($detil[0]['access_detil'],'jual_motor_delivery_laporan_manage') !== false) echo 'checked'; ?>>
									<label for="jual_motor_delivery_laporan_manage"><i class="fa fa-fw fa-database"></i> <i class="fa fa-fw fa-file-excel-o"></i></label>
								</label>
							</td>
							<td></td>
							</tr>
							<!--Pembayaran Motor-->
							<tr>
							<td><h4>Pembayaran Motor</h4></td>
							<td>
								<label class="checkbox-custom check-primary">
									<input type="checkbox" name="accesses[]" value="jual_motor_bayar_laporan_manage" id="jual_motor_bayar_laporan_manage" 
									<?php if (strpos($detil[0]['access_detil'],'jual_motor_bayar_laporan_manage') !== false) echo 'checked'; ?>>
									<label for="jual_motor_bayar_laporan_manage"><i class="fa fa-fw fa-database"></i> <i class="fa fa-fw fa-file-excel-o"></i></label>
								</label>
							</td>
							<td></td>
							</tr>
							<!--POS Bengkel KSB-->
							<tr>
							<td><h4>POS Bengkel KSB</h4></td>
							<td>
								<label class="checkbox-custom check-primary">
									<input type="checkbox" name="accesses[]" value="pos_bengkel_laporan_manage" id="pos_bengkel_laporan_manage" 
									<?php if (strpos($detil[0]['access_detil'],'pos_bengkel_laporan_manage') !== false) echo 'checked'; ?>>
									<label for="pos_bengkel_laporan_manage"><i class="fa fa-fw fa-database"></i> <i class="fa fa-fw fa-file-excel-o"></i></label>
								</label>
							</td>
							<td></td>
							</tr>
							<!--POS Bengkel KSG-->
							<tr>
							<td><h4>POS Bengkel KSG</h4></td>
							<td>
								<label class="checkbox-custom check-primary">
									<input type="checkbox" name="accesses[]" value="pos_bengkel_ksg_laporan_manage" id="pos_bengkel_ksg_laporan_manage" 
									<?php if (strpos($detil[0]['access_detil'],'pos_bengkel_ksg_laporan_manage') !== false) echo 'checked'; ?>>
									<label for="pos_bengkel_ksg_laporan_manage"><i class="fa fa-fw fa-database"></i> <i class="fa fa-fw fa-file-excel-o"></i></label>
								</label>
							</td>
							<td></td>
							</tr>
							</tbody>
						</table>
						
						<div class="form-group">
							<div class="col-sm-offset-2 col-sm-10">
								<button type="submit" class="btn btn-primary">Submit</button>
							</div>
						</div>
                    </form>
					</form>
				</div>
			</div>