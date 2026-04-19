
            <!-- main content -->
            <div id="page-wrapper">
				<div class="container-fluid">
					
					<!-- Page Heading -->
					<div class="row">
						<div class="col-lg-12">
							<h1 class="page-header">
								<?php echo $viewoptions['pageinfo']; ?>
							</h1>
							<ol class="breadcrumb">
								<li><a href="<?php echo base_url(); ?>"><i class="fa fa-home"></i></a></li>
								<li>
									<a href="<?php echo base_url('barang'); ?>"><i class="fa fa-list"></i> Daftar Barang</a>
								</li>
								<li class="active">
									<i class="fa fa-list"></i> <?php echo $viewoptions['pageinfo']; ?>
								</li>
							</ol>
							<div class="alert alert-danger alert-dismissable">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<i class="fa fa-info-circle"></i>  <strong>Hati-hati!</strong><br />
								Jika sudah ada data stok pada barang (part) yang Anda pilih, dan Anda melakukan pengisian stok awal lagi,
								maka data lama Anda akan ditumpuk dengan yang baru.
							</div>
						</div>
					</div>
					<!-- /.row -->

                    <div class="row">
						<div class="col-lg-12">

                            <?php echo $output; ?>
						</div>
					</div>
				</div>
			</div>
