<body class="sticky-header">

    <section>
        <!-- sidebar left start-->
        <div class="sidebar-left">
            <!--responsive view logo start-->
            <div class="logo dark-logo-bg visible-xs-* visible-sm-*">
                <a href="<? base_url() ?>">
                    <img src="<?= base_url('img/logo-icon.png') ?>" alt="">
                    <!--<i class="fa fa-maxcdn"></i>-->
                    <span class="brand-name"><?= CLIENT_SHORTNAME ?></span>
                </a>
            </div>
            <!--responsive view logo end-->

            <div class="sidebar-left-info">
                <!-- visible small devices start-->
                <div class=" search-field">  </div>
                <!-- visible small devices end-->

                <!--sidebar nav start-->
                <ul class="nav nav-pills nav-stacked side-navigation">
                    <li>
                        <h3 class="navigation-title"><?= $this->lang->line('master_data'); ?></h3>
                    </li>
					<?php if (strpos($this->session->userdata('user_access'),'m_language_manage') !== false || 
						strpos($this->session->userdata('user_access'),'m_kelas_manage') !== false|| 
						strpos($this->session->userdata('user_access'),'m_supplier_manage') !== false 
					) : ?>
					<li class="menu-list<?php if($viewoptions['section'] == "master_data") echo " active"; ?>">
                        <a href="">
							<i class="fa fa-fw fa-cog"></i> <?= $this->lang->line('master_data'); ?>
						</a>
                        <ul id="collapseMaster" class="child-list">
							
                            <?php if (strpos($this->session->userdata('user_access'),'m_kelas_manage') !== false) : ?>
                            <li<?php if($viewoptions['section'] == "master_data" && $viewoptions['page'] == "siswa") echo " class=\"active\""; ?>>
                                <a href="<?php echo base_url("siswa"); ?>"><i class="fa fa-fw fa-user"></i>Siswa</a></li>
                            <?php endif; ?>
							<?php if (strpos($this->session->userdata('user_access'),'m_kelas_manage') !== false) : ?>
                            <li<?php if($viewoptions['section'] == "master_data" && $viewoptions['page'] == "kelas") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("kelas"); ?>"><i class="fa fa-fw fa-users"></i>Kelas</a></li>
							<?php endif; ?>
							
						</ul>
                    </li>
					<?php endif; ?>
					
					
					
                    <li>
                        <h3 class="navigation-title">E-Rapot</h3>
                    </li>
                   <?php if (strpos($this->session->userdata('user_access'),'pos_beli_terima_laporan_manage') !== false ||
						strpos($this->session->userdata('user_access'),'pos_beli_terima_detil_laporan_manage') !== false || 
						strpos($this->session->userdata('user_access'),'pos_jual_delivery_laporan_manage') !== false ||
						strpos($this->session->userdata('user_access'),'pos_jual_delivery_detil_laporan_manage') !== false 
					) : ?>
                    <li class="menu-list<?php if($viewoptions['section'] == "laporan_rapot") echo " active"; ?>">
                        <a href="">
							<i class="fa fa-fw fa-copy"></i> Reports
						</a>
                        <ul id="collapsePembelian" class="child-list">
                            <?php if (strpos($this->session->userdata('user_access'),'pos_beli_terima_laporan_manage') !== false) : ?>
                            <li<?php if($viewoptions['section'] == "laporan_rapot" && $viewoptions['page'] == "laporan_rapot") echo " class=\"active\""; ?>>
                                <a href="<?php echo base_url("laporan/laporan_rapot"); ?>"><i class="fa fa-fw fa-book"></i>  E-Rapot</a></li>
                            <?php endif; ?>
                            <?php if (strpos($this->session->userdata('user_access'),'pos_beli_terima_laporan_manage') !== false) : ?>
                            <li<?php if($viewoptions['section'] == "laporan_rapot" && $viewoptions['page'] == "laporan_batch") echo " class=\"active\""; ?>>
                                <a href="<?php echo base_url("laporan/laporan_batch"); ?>"><i class="fa fa-fw fa-book"></i> Laporan Rapot Batch</a></li>
                            <?php endif; ?>
                            <?php if (strpos($this->session->userdata('user_access'),'pos_beli_terima_laporan_manage') !== false) : ?>
                            <li<?php if($viewoptions['section'] == "laporan_rapot" && $viewoptions['page'] == "laporan_mapel") echo " class=\"active\""; ?>>
                                <a href="<?php echo base_url("laporan/laporan_mapel"); ?>"><i class="fa fa-fw fa-book"></i> Laporan Mapel</a></li>
                            <?php endif; ?>
                            <?php if (strpos($this->session->userdata('user_access'),'pos_beli_terima_laporan_manage') !== false) : ?>
                            <li<?php if($viewoptions['section'] == "laporan_rapot" && $viewoptions['page'] == "laporan_bk") echo " class=\"active\""; ?>>
                                <a href="<?php echo base_url("laporan/laporan_bk"); ?>"><i class="fa fa-fw fa-book"></i> Laporan Rekap Tugas</a></li>
                            <?php endif; ?>
							<?php if (strpos($this->session->userdata('user_access'),'pos_beli_terima_laporan_manage') !== false) : ?>
							<li<?php if($viewoptions['section'] == "laporan_rapot" && $viewoptions['page'] == "laporan_bk_materi") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("laporan/laporan_bk_materi"); ?>"><i class="fa fa-fw fa-book"></i> Laporan Rekap Materi</a></li>
							<?php endif; ?>
						</ul>
                    </li>
					<?php endif; ?>


				<!--	<li>
                        <h3 class="navigation-title"><?= $this->lang->line('extra'); ?></a></li></h3>
                    </li>
					<?php if ($this->session->userdata('user_level') == 2) { ?>
                    <li class="menu-list<?php if($viewoptions['section'] == "users") echo " active"; ?>">
                        <a href=""">
							<i class="fa fa-fw fa-users"></i> <?= $this->lang->line('user_management'); ?></a>
						</a>
                        <ul id="collapseUser" class="child-list">
                            <li<?php if($viewoptions['section'] == "users" && $viewoptions['page'] == "access_master") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("access_master"); ?>"><i class="fa fa-fw fa-lock"></i> <?= $this->lang->line('access_master'); ?></a></li>
                            <li<?php if($viewoptions['section'] == "users" && $viewoptions['page'] == "access_group") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("access_group"); ?>"><i class="fa fa-fw fa-gears"></i> <?= $this->lang->line('access_group'); ?></a></li>
							<li<?php if($viewoptions['section'] == "user" && $viewoptions['page'] == "users") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("users"); ?>"><i class="fa fa-fw fa-users"></i> <?= $this->lang->line('user'); ?></a></li>
						</ul>
                    </li>
					<?php } ?>-->
				
					
                    <!--<li class="<?php if($viewoptions['section'] == "email") echo " active"; ?>">
						<a href="<?= base_url('email') ?>"><i class="fa fa-envelope-o"></i> <span>Email</span>  <span class="label noti-arrow bg-danger pull-right">4 Unread</span> </a>
					</li>
					<li class="<?php if($viewoptions['section'] == "wall") echo " active"; ?>">
						<a href="<?= base_url('wall') ?>"><i class="fa fa-comments-o"></i> <span>Progress Report</span>  <span class="label noti-arrow bg-danger pull-right">1 Unread</span> </a>
					</li>-->

                </ul>
                <!--sidebar nav end-->

                <!--sidebar widget start-->
                <div class="sidebar-widget">
                    <h4>Server Status</h4>
                    <ul class="list-group">
                        <li>
                            <span class="label label-danger pull-right">33%</span>
                            <p>CPU Used</p>
                            <div class="progress progress-xs">
                                <div class="progress-bar progress-bar-danger" style="width: 33%;">
                                    <span class="sr-only">33%</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <span class="label label-warning pull-right">65%</span>
                            <p>Bandwidth</p>
                            <div class="progress progress-xs">
                                <div class="progress-bar progress-bar-warning" style="width: 65%;">
                                    <span class="sr-only">65%</span>
                                </div>
                            </div>
                        </li>
                        <li><a href="javascript:;" class="btn btn-success btn-sm ">View Details</a></li>
                    </ul>
                </div>
                <!--sidebar widget end-->

            </div>
        </div>
        <!-- sidebar left end-->