
						<!-- page head start-->
           				<div class="page-head">
			                <h3>
			                    <?= HEADER_IDENTITY ?>
			                </h3>
			                <span class="sub-title"><?php echo $viewoptions['pageinfo']; ?></span>
			            </div>
			            <!-- page head end-->
			
<!-- main content -->
<form id="hotlineForm" class="form-horizontal" action="<?php echo base_url("profile"); ?>/<?php echo $viewoptions['action']; ?>" method="post">
<div id="page-wrapper" class="wrapper">
	<section class="panel">
		<header class="panel-heading tab-dark tab-right ">
			<ul class="nav nav-tabs pull-right">
				<li class="active">
					<a data-toggle="tab" href="#about-3">
						<i class="fa fa-user"></i>
						Edit Password
					</a>
				</li>
			</ul>
			<span class="hidden-sm wht-color"><?php echo $viewoptions['pageinfo']; ?></span>
		</header>
		<div class="panel-body">
			<div class="tab-content">
				<div id="about-3" class="tab-pane active">
					<div class="row">
						<div class="col-lg-12">
							<section class="panel">
								<header class="panel-heading">
									Edit Password
								</header>
								
								<div class="panel-body">
									<div id="error-area">
										<?php if (isset($error)) echo '<div class="alert alert-danger alert-dismissable">
											<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'.$error.
											'</div>'; ?>
									</div>
									
									<div class="form-group">
										<label for="user_pass" class="col-sm-2 control-label">Password Lama <sup class="text-info">*)</sup></label>
										<div class="col-sm-10">
											<input type="text" class="form-control" id="user_pass" name="user_pass" placeholder="" 
												required minlength="3" maxlength="255" data-bind="value: user_pass" />
										</div>
									</div>
									<div class="form-group">
										<label for="new_user_pass" class="col-sm-2 control-label">Password Baru <sup class="text-info">*)</sup></label>
										<div class="col-sm-10">
											<input type="text" class="form-control" id="new_user_pass" name="new_user_pass" placeholder="Password Baru" 
												required minlength="3" maxlength="255" data-bind="value: new_user_pass" />
										</div>
									</div>
									<div class="form-group">
										<label for="renew_user_pass" class="col-sm-2 control-label">Re Type Password Baru <sup class="text-info">*)</sup></label>
										<div class="col-sm-10">
											<input type="text" class="form-control" id="renew_user_pass" name="renew_user_pass" placeholder="Re Type Password Baru" 
												required minlength="3" maxlength="255" data-parsley-equalto="#new_user_pass" data-bind="value: renew_user_pass" />
										</div>
									</div>
									<div class="form-group">
										<div class="col-sm-offset-2 col-sm-10">
											<button type="submit" id="btn-submit" class="btn btn-primary">Submit</button>
											
										</div>
									</div>
								</div>
							</section>
						</div>
					</div>
				</div>
				

				
			</div>
		</div>
	</section>
	
</div>
<p></p>
</form>