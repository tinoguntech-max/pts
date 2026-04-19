		<!-- body content start-->
        <div class="body-content" >

            <!-- header section start-->
            <div class="header-section">

                <!--logo and logo icon start-->
                <div class="logo dark-logo-bg hidden-xs hidden-sm hidden-md">
                    <a href="<?= base_url() ?>">
                        <!--<img src="img/logo-icon.png" alt="">-->
                        <!--<i class="fa fa-maxcdn"></i>-->
                        <span class="brand-name"><?= CLIENT_SHORTNAME ?></span>
                    </a>
                </div>

                <div class="icon-logo dark-logo-bg hidden-xs hidden-sm hidden-md">
                    <a href="<?= base_url() ?>">
                        <img src="<?= base_url('img/logo-icon.png') ?>" alt="">
                        <!--<i class="fa fa-maxcdn"></i>-->
                    </a>
                </div>
                <!--logo and logo icon end-->

                <!--toggle button start-->
                <a class="toggle-btn"><i class="fa fa-outdent"></i></a>
                <!--toggle button end-->

                <!--mega menu start-->
               
				
                <!--mega menu end-->
                <div class="notification-wrap">
                <!--left notification start-->
                <div class="left-notification">
                <ul class="notification-menu">
                <!--mail info start-->
                </ul>
                </div>
                <!--left notification end-->


                <!--right notification start-->
                <div class="right-notification">
                    <ul class="notification-menu">
                       

                        <li data-step="2" data-intro="Manage your personal information here">
                            <a href="javascript:;" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                <img src="<?= base_url('img/img2.jpg') ?>" alt="" /><?php echo $loginas; ?>
                                <span class=" fa fa-angle-down"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-usermenu purple pull-right">
                                <!--<li><a href="<?php echo base_url("profile"); ?>">  Profile</a></li>
                                <li>
                                    <a href="<?php echo base_url("profile/updatespass"); ?>">
                                        <span>Change Password</span>
                                    </a>
                                </li>-->
                                <li>
                                    <a href="#">
                                        <span class="label bg-info pull-right">new</span>
                                        Help
                                    </a>
                                </li>
                                <li><a href="<?php echo base_url("auth/logout"); ?>"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                            </ul>
                        </li>

                    </ul>
                </div>
                <!--right notification end-->
                </div>

            </div>
            <!-- header section end-->