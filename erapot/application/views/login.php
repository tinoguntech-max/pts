
<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?= CLIENT_NAME ?> - <?= PRODUCT_IDENTITY ?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="<?= base_url() ?>/image/x-icon" href="<?= base_url() ?>/img/logo-9.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>/css/bootstrap.min.css">
    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>/css/fontawesome-all.min.css">
    <!-- Flaticon CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>/font/flaticon.css">
    <!-- Google Web Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>/style.css">
</head>

<body>
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->     
    <section class="fxt-template-animation fxt-template-layout9" data-bg-image="<?= base_url() ?>/img/figure/bg9-l.jpg">      
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-3">
                    <div class="fxt-header">
                        <a  class="fxt-logo"><img src="<?= base_url() ?>/img/logo-9.png" alt="Logo"></a> 
                    </div>                
                </div>                
                <div class="col-lg-6">
                    <div class="fxt-content"> 
                    	<form action="<?php echo base_url("auth"); ?>" method="post" id="login_form">
							 <h2>Sign in to <?= CLIENT_NAME ?> - <?= PRODUCT_IDENTITY ?></h2>    
							<?php if(validation_errors() != false) { echo "<div class='alert alert-login'>".validation_errors()."</div>"; } ?>
							<?php if (isset($error_msg)) { echo "<div class='alert alert-login'>".$error_msg."</div>"; } ?>
	                        <div class="fxt-form"> 
	                            <form method="POST">
	                                <div class="form-group"> 
	                                    <div class="fxt-transformY-50 fxt-transition-delay-1">                                              
	                                        <input type="text" id="username" name="username" class="form-control" placeholder="User Name" required="required">
	                                    </div>
	                                </div>
	                                <div class="form-group">  
	                                    <div class="fxt-transformY-50 fxt-transition-delay-2">                                              
	                                        <input type="password" id="password" name="password" class="form-control" placeholder="********" required="required">
	                                        <i toggle="#password" class="fa fa-fw fa-eye toggle-password field-icon"></i>
	                                    </div>
	                                </div>
	                                <div class="form-group">
	                                    <div class="fxt-transformY-50 fxt-transition-delay-3">  
	                                        <div class="fxt-checkbox-area">
	                                            <div class="checkbox">
	                                                <input id="checkbox1" type="checkbox">
	                                             
	                                            </div>
	                                            
	                                        </div>
	                                    </div>
	                                </div>
	                                <div class="form-group">
	                                    <div class="fxt-transformY-50 fxt-transition-delay-4">  
	                                        <button type="submit" class="fxt-btn-fill">Log in</button>
	                                    </div>
	                                </div>
	                            </form> 
	                        </div>
                    	</form>
                        <div class="fxt-footer">
                            <div class="fxt-transformY-50 fxt-transition-delay-9">  
                              
                            </div> 
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </section>    
    <!-- jquery-->
    <script src="<?= base_url() ?>/js/jquery-3.5.0.min.js"></script>
    <!-- Popper js -->
    <script src="<?= base_url() ?>/js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="<?= base_url() ?>/js/bootstrap.min.js"></script>
    <!-- Imagesloaded js -->
    <script src="<?= base_url() ?>/js/imagesloaded.pkgd.min.js"></script>
    <!-- Validator js -->
    <script src="<?= base_url() ?>/js/validator.min.js"></script>
    <!-- Custom Js -->
    <script src="<?= base_url() ?>/js/main1.js"></script>

</body>

</html>


