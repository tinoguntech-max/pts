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
						strpos($this->session->userdata('user_access'),'m_cabang_manage') !== false || 
						strpos($this->session->userdata('user_access'),'m_department_manage') !== false || 
						strpos($this->session->userdata('user_access'),'m_shipping_provider_manage') !== false || 
						strpos($this->session->userdata('user_access'),'customer_manage') !== false || 
						strpos($this->session->userdata('user_access'),'supplier_manage') !== false || 
						strpos($this->session->userdata('user_access'),'m_industry_type_manage') !== false || 
						strpos($this->session->userdata('user_access'),'m_customer_type_manage') !== false || 
						strpos($this->session->userdata('user_access'),'m_jenis_coa_manage') !== false || 
						strpos($this->session->userdata('user_access'),'m_coa_manage') !== false || 
						strpos($this->session->userdata('user_access'),'merk_manage') !== false || 
						strpos($this->session->userdata('user_access'),'satuan_manage') !== false
					) : ?>
					<li class="menu-list<?php if($viewoptions['section'] == "master_data") echo " active"; ?>">
                        <a href="">
							<i class="fa fa-fw fa-cog"></i> <?= $this->lang->line('master_data'); ?>
						</a>
                        <ul id="collapseMaster" class="child-list">
							<?php if (strpos($this->session->userdata('user_access'),'m_language_manage') !== false) : ?>
                            <li<?php if($viewoptions['section'] == "master_data" && $viewoptions['page'] == "m_language") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("m_language"); ?>"><i class="fa fa-fw fa-sign-language"></i> <?= $this->lang->line('bahasa'); ?> </a></li>
							<?php endif; ?>
							<?php if (strpos($this->session->userdata('user_access'),'m_shipping_provider_manage') !== false) : ?>
                            <li<?php if($viewoptions['section'] == "master_data" && $viewoptions['page'] == "m_shipping_provider") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("m_shipping_provider"); ?>"><i class="fa fa-fw fa-clone"></i> <?= $this->lang->line('shipping_provider'); ?> </a></li>
							<?php endif; ?>
							<?php if (strpos($this->session->userdata('user_access'),'m_bentuk_usaha_manage') !== false) : ?>
                            <li<?php if($viewoptions['section'] == "master_data" && $viewoptions['page'] == "m_bentuk_usaha") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("m_bentuk_usaha"); ?>"><i class="fa fa-fw fa-building"></i> <?= $this->lang->line('bentuk_usaha'); ?></a></li>
							<?php endif; ?>
							<?php if (strpos($this->session->userdata('user_access'),'m_cabang_manage') !== false) : ?>
                            <li<?php if($viewoptions['section'] == "master_data" && $viewoptions['page'] == "m_cabang") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("m_cabang"); ?>"><i class="fa fa-fw fa-sitemap"></i> <?= $this->lang->line('cabang'); ?></a></li>
							<?php endif; ?>
							<?php if (strpos($this->session->userdata('user_access'),'m_department_manage') !== false) : ?>
							<li<?php if($viewoptions['section'] == "master_data" && $viewoptions['page'] == "m_department") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("m_department"); ?>"><i class="fa fa-fw fa-tasks"></i> <?= $this->lang->line('divisi'); ?></a></li>
							<?php endif; ?>
							<?php if (strpos($this->session->userdata('user_access'),'m_industry_type_manage') !== false) : ?>
                            <li<?php if($viewoptions['section'] == "master_data" && $viewoptions['page'] == "m_industry_type") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("m_industry_type"); ?>"><i class="fa fa-fw fa-industry"></i> <?= $this->lang->line('jenis_industri'); ?></a></li>
							<?php endif; ?>
							<?php if (strpos($this->session->userdata('user_access'),'m_customer_type_manage') !== false) : ?>
                            <li<?php if($viewoptions['section'] == "master_data" && $viewoptions['page'] == "m_customer_type") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("m_customer_type"); ?>"><i class="fa fa-fw fa-user-circle"></i> <?= $this->lang->line('jenis_pelanggan'); ?></a></li>
							<?php endif; ?>
							<?php if (strpos($this->session->userdata('user_access'),'m_jenis_usaha_manage') !== false) : ?>
                            <li<?php if($viewoptions['section'] == "master_data" && $viewoptions['page'] == "m_jenis_usaha") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("m_jenis_usaha"); ?>"><i class="fa fa-fw fa-bank"></i> <?= $this->lang->line('jenis_usaha'); ?></a></li>
							<?php endif; ?>
							<li class="divider"></li>
							<?php if (strpos($this->session->userdata('user_access'),'customer_manage') !== false) : ?>
                            <li<?php if($viewoptions['section'] == "master_data" && $viewoptions['page'] == "customer") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("customer"); ?>"><i class="fa fa-fw fa-heart"></i> <?= $this->lang->line('customer'); ?></a></li>
							<?php endif; ?>
							<?php if (strpos($this->session->userdata('user_access'),'supplier_manage') !== false) : ?>
							<li<?php if($viewoptions['section'] == "master_data" && $viewoptions['page'] == "supplier") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("supplier"); ?>"><i class="fa fa-fw fa-industry"></i> <?= $this->lang->line('supplier'); ?></a></li>
							<?php endif; ?>
							<li class="divider"></li>
							<?php if (strpos($this->session->userdata('user_access'),'m_jenis_coa_manage') !== false) : ?>
							<li<?php if($viewoptions['section'] == "master_data" && $viewoptions['page'] == "m_jenis_coa") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("m_jenis_coa"); ?>"><i class="fa fa-fw fa-cubes"></i> <?= $this->lang->line('jenis_coa'); ?></a></li>
							<?php endif; ?>
							<?php if (strpos($this->session->userdata('user_access'),'m_coa_manage') !== false) : ?>
							<li<?php if($viewoptions['section'] == "master_data" && $viewoptions['page'] == "m_coa") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("m_coa"); ?>"><i class="fa fa-fw fa-cube"></i> <?= $this->lang->line('coa'); ?></a></li>
							<?php endif; ?>
							<?php if (strpos($this->session->userdata('user_access'),'merk_manage') !== false) : ?>
							<li<?php if($viewoptions['section'] == "master_data" && $viewoptions['page'] == "merk") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("merk"); ?>"><i class="fa fa-fw fa-apple"></i> <?= $this->lang->line('merk'); ?></a></li>
							<?php endif; ?>
							<?php if (strpos($this->session->userdata('user_access'),'satuan_manage') !== false) : ?>
							<li<?php if($viewoptions['section'] == "master_data" && $viewoptions['page'] == "satuan") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("satuan"); ?>"><i class="fa fa-fw fa-balance-scale"></i> <?= $this->lang->line('satuan'); ?></a></li>
							<?php endif; ?>
						</ul>
                    </li>
					<?php endif; ?>
					<?php if (strpos($this->session->userdata('user_access'),'m_jenis_barang_manage') !== false || 
						strpos($this->session->userdata('user_access'),'barang_manage') !== false || 
						strpos($this->session->userdata('user_access'),'m_jenis_service_manage') !== false || 
						strpos($this->session->userdata('user_access'),'m_service_manage') !== false || 
						strpos($this->session->userdata('user_access'),'m_motor_kategori_manage') !== false || 
						strpos($this->session->userdata('user_access'),'m_motor_tipe_manage') !== false || 
						strpos($this->session->userdata('user_access'),'m_motor_warna_manage') !== false
					) : ?>
                    <li class="menu-list<?php if($viewoptions['section'] == "master_material") echo " active"; ?>">
                        <a href="">
							<i class="fa fa-fw fa-motorcycle"></i> Material and Service
						</a>
                        <ul id="collapseMasterMaterial" class="child-list">
							<?php if (strpos($this->session->userdata('user_access'),'m_jenis_barang_manage') !== false) : ?>
							<li<?php if($viewoptions['section'] == "master_material" && $viewoptions['page'] == "m_jenis_barang") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("m_jenis_barang"); ?>"><i class="fa fa-fw fa-barcode"></i> <?= $this->lang->line('jenis_barang'); ?></a></li>
							<?php endif; ?>
							<?php if (strpos($this->session->userdata('user_access'),'barang_manage') !== false) : ?>
							<li<?php if($viewoptions['section'] == "master_material" && $viewoptions['page'] == "barang") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("barang"); ?>"><i class="fa fa-fw fa-barcode"></i> <?= $this->lang->line('barang'); ?></a></li>
							<?php endif; ?>
							<li class="divider">
							<?php if (strpos($this->session->userdata('user_access'),'m_jenis_service_manage') !== false) : ?>
							<li<?php if($viewoptions['section'] == "master_material" && $viewoptions['page'] == "m_jenis_service") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("m_jenis_service"); ?>"><i class="fa fa-fw fa-hotel"></i> Service Category</a></li>
							<?php endif; ?>
							<?php if (strpos($this->session->userdata('user_access'),'m_service_manage') !== false) : ?>
							<li<?php if($viewoptions['section'] == "master_material" && $viewoptions['page'] == "m_service") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("m_service"); ?>"><i class="fa fa-fw fa-hotel"></i> <?= $this->lang->line('service'); ?></a></li>
							<?php endif; ?>
							<li class="divider">
							<?php if (strpos($this->session->userdata('user_access'),'m_motor_kategori_manage') !== false) : ?>
                            <li<?php if($viewoptions['section'] == "master_material" && $viewoptions['page'] == "m_motor_kategori") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("m_motor_kategori"); ?>"><i class="fa fa-fw fa-clone"></i> Motor Category</a></li>
							<?php endif; ?>
							<?php if (strpos($this->session->userdata('user_access'),'m_motor_tipe_manage') !== false) : ?>
							<li<?php if($viewoptions['section'] == "master_material" && $viewoptions['page'] == "m_motor_tipe") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("m_motor_tipe"); ?>"><i class="fa fa-fw fa-motorcycle"></i> Motor Type</a></li>
							<?php endif; ?>
							<?php if (strpos($this->session->userdata('user_access'),'m_motor_warna_manage') !== false) : ?>
							<li<?php if($viewoptions['section'] == "master_material" && $viewoptions['page'] == "m_motor_warna") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("m_motor_warna"); ?>"><i class="fa fa-fw fa-tint"></i> Motor Color</a></li>
							<?php endif; ?>
						</ul>
                    </li>
					<?php endif; ?>
					<?php if (strpos($this->session->userdata('user_access'),'m_produksi_biaya_manage') !== false || 
						strpos($this->session->userdata('user_access'),'m_produksi_departemen_manage') !== false || 
						strpos($this->session->userdata('user_access'),'m_produksi_penanggung_manage') !== false
					) : ?>
                    <li class="menu-list<?php if($viewoptions['section'] == "master_produksi") echo " active"; ?>">
                        <a href="">
							<i class="fa fa-fw fa-industry"></i> <?= $this->lang->line('master_produksi'); ?>
						</a>
                        <ul id="collapseMasterProduksi" class="child-list">
							<?php if (strpos($this->session->userdata('user_access'),'m_produksi_biaya_manage') !== false) : ?>
                            <li<?php if($viewoptions['section'] == "master_produksi" && $viewoptions['page'] == "m_produksi_biaya") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("m_produksi_biaya"); ?>"><i class="fa fa-fw fa-percent"></i><?= $this->lang->line('biaya_produksi'); ?></a></li>
							<?php endif; ?>
							<?php if (strpos($this->session->userdata('user_access'),'m_produksi_departemen_manage') !== false) : ?>
							<li<?php if($viewoptions['section'] == "master_produksi" && $viewoptions['page'] == "m_produksi_departemen") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("m_produksi_departemen"); ?>"><i class="fa fa-fw fa-id-card"></i> <?= $this->lang->line('departemen_produksi'); ?></a></li>
							<?php endif; ?>
							<?php if (strpos($this->session->userdata('user_access'),'m_produksi_penanggung_manage') !== false) : ?>
							<li<?php if($viewoptions['section'] == "master_produksi" && $viewoptions['page'] == "m_produksi_penanggung") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("m_produksi_penanggung"); ?>"><i class="fa fa-fw fa-user-circle"></i> <?= $this->lang->line('penanggung_jawab'); ?></a></li>
							<?php endif; ?>
						</ul>
                    </li>
					<?php endif; ?>
					<?php if (strpos($this->session->userdata('user_access'),'m_bank_akun_manage') !== false || 
						strpos($this->session->userdata('user_access'),'m_bank_manage') !== false || 
						strpos($this->session->userdata('user_access'),'m_motor_cabang_leasing_manage') !== false || 
						strpos($this->session->userdata('user_access'),'m_npwp_internal_manage') !== false || 
						strpos($this->session->userdata('user_access'),'m_cost_manage') !== false ||  
						strpos($this->session->userdata('user_access'),'m_cost_type_manage') !== false || 
						strpos($this->session->userdata('user_access'),'m_currency_manage') !== false || 
						strpos($this->session->userdata('user_access'),'m_motor_surveyor_manage') !== false 
					) : ?>
                    <li class="menu-list<?php if($viewoptions['section'] == "master_finance") echo " active"; ?>">
                        <a href="">
							<i class="fa fa-fw fa-dollar"></i> <?= $this->lang->line('master_finance'); ?>
						</a>
                        <ul id="collapseMasterFinance" class="child-list">
							<?php if (strpos($this->session->userdata('user_access'),'m_bank_akun_manage') !== false) : ?>
                            <li<?php if($viewoptions['section'] == "master_finance" && $viewoptions['page'] == "m_bank_akun") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("m_bank_akun"); ?>"><i class="fa fa-fw fa-cc-visa"></i> <?= $this->lang->line('akun_bank'); ?></a></li>
							<?php endif; ?>
							<?php if (strpos($this->session->userdata('user_access'),'m_bank_manage') !== false) : ?>
                            <li<?php if($viewoptions['section'] == "master_finance" && $viewoptions['page'] == "m_bank") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("m_bank"); ?>"><i class="fa fa-fw fa-bank"></i> <?= $this->lang->line('bank'); ?></a></li>
							<?php endif; ?>
							<?php if (strpos($this->session->userdata('user_access'),'m_motor_cabang_leasing_manage') !== false) : ?>
                            <li<?php if($viewoptions['section'] == "master_finance" && $viewoptions['page'] == "m_motor_cabang_leasing") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("m_motor_cabang_leasing"); ?>"><i class="fa fa-fw fa-paper-plane"></i> <?= $this->lang->line('cabang_leasing'); ?></a></li>
							<?php endif; ?>
							<?php if (strpos($this->session->userdata('user_access'),'m_cost_manage') !== false) : ?>
                            <li<?php if($viewoptions['section'] == "master_finance" && $viewoptions['page'] == "m_cost") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("m_cost"); ?>"><i class="fa fa-fw fa-dollar"></i> Biaya </a></li>
							<?php endif; ?>
							<?php if (strpos($this->session->userdata('user_access'),'m_cost_type_manage') !== false) : ?>
                            <li<?php if($viewoptions['section'] == "master_finance" && $viewoptions['page'] == "m_cost_type") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("m_cost_type"); ?>"><i class="fa fa-fw fa-dollar"></i> Cost Type</a></li>
							<?php endif; ?>
							<?php if (strpos($this->session->userdata('user_access'),'m_npwp_internal_manage') !== false) : ?>
                            <li<?php if($viewoptions['section'] == "master_finance" && $viewoptions['page'] == "m_npwp_internal") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("m_npwp_internal"); ?>"><i class="fa fa-fw fa-cc-mastercard"></i> <?= $this->lang->line('npwp'); ?></a></li>
							<?php endif; ?>
							<?php if (strpos($this->session->userdata('user_access'),'m_currency_manage') !== false) : ?>
                            <li<?php if($viewoptions['section'] == "master_finance" && $viewoptions['page'] == "m_currency") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("m_currency"); ?>"><i class="fa fa-fw fa-dollar"></i> <?= $this->lang->line('mata_uang'); ?></a></li>
							<?php endif; ?>
							<?php if (strpos($this->session->userdata('user_access'),'m_motor_surveyor_manage') !== false) : ?>
                            <li<?php if($viewoptions['section'] == "master_finance" && $viewoptions['page'] == "m_motor_surveyor") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("m_motor_surveyor"); ?>"><i class="fa fa-fw fa-male"></i> <?= $this->lang->line('surveyor'); ?></a></li>
							<?php endif; ?>
						</ul>
                    </li>
					<?php endif; ?>
					<?php if (strpos($this->session->userdata('user_access'),'m_content_jenis_news_manage') !== false 
					) : ?>
                    <li class="menu-list<?php if($viewoptions['section'] == "master_extra") echo " active"; ?>">
                        <a href="">
							<i class="fa fa-fw fa-feed"></i> <?= $this->lang->line('master_extra'); ?>
						</a>
                        <ul id="collapseMasterExtra" class="child-list">
							<?php if (strpos($this->session->userdata('user_access'),'m_content_jenis_news_manage') !== false) : ?>
                            <li<?php if($viewoptions['section'] == "master_extra" && $viewoptions['page'] == "m_content_jenis_news") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("m_content_jenis_news"); ?>"><i class="fa fa-fw fa-feed"></i>  <?= $this->lang->line('jenis_berita'); ?></a></li>
							<?php endif; ?>
						</ul>
                    </li>
					<?php endif; ?>
					<?php if (strpos($this->session->userdata('user_access'),'m_agama_manage') !== false || 
						strpos($this->session->userdata('user_access'),'m_golongan_darah_manage') !== false || 
						strpos($this->session->userdata('user_access'),'m_job_title_manage') !== false || 
						strpos($this->session->userdata('user_access'),'m_jenis_identitas_manage') !== false || 
						strpos($this->session->userdata('user_access'),'m_karyawan_manage') !== false || 
						strpos($this->session->userdata('user_access'),'m_nationality_manage') !== false || 
						strpos($this->session->userdata('user_access'),'m_pendidikan_terakhir_manage') !== false || 
						strpos($this->session->userdata('user_access'),'m_status_pernikahan_manage') !== false || 
						strpos($this->session->userdata('user_access'),'m_status_pajak_manage') !== false
					) : ?>
					<li class="menu-list<?php if($viewoptions['section'] == "master_identitas") echo " active"; ?>">
                        <a href="">
							<i class="fa fa-fw fa-users"></i>  <?= $this->lang->line('master_identitas'); ?>
						</a>
                        <ul id="collapseMasterIdentitas" class="child-list">
							<?php if (strpos($this->session->userdata('user_access'),'m_agama_manage') !== false) : ?>
                            <li<?php if($viewoptions['section'] == "master_identitas" && $viewoptions['page'] == "m_agama") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("m_agama"); ?>"><i class="fa fa-fw fa-empire"></i>  <?= $this->lang->line('agama'); ?></a></li>
							<?php endif; ?>
							<?php if (strpos($this->session->userdata('user_access'),'m_golongan_darah_manage') !== false) : ?>
							<li<?php if($viewoptions['section'] == "master_identitas" && $viewoptions['page'] == "m_golongan_darah") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("m_golongan_darah"); ?>"><i class="fa fa-fw fa-tint"></i>  <?= $this->lang->line('golongan_darah'); ?></a></li>
							<?php endif; ?>
							<?php if (strpos($this->session->userdata('user_access'),'m_job_title_manage') !== false) : ?>
							<li<?php if($viewoptions['section'] == "master_identitas" && $viewoptions['page'] == "m_job_title") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("m_job_title"); ?>"><i class="fa fa-fw fa-suitcase"></i>  <?= $this->lang->line('jabatan'); ?></a></li>
							<?php endif; ?>
							<?php if (strpos($this->session->userdata('user_access'),'m_jenis_identitas_manage') !== false) : ?>
							<li<?php if($viewoptions['section'] == "master_identitas" && $viewoptions['page'] == "m_jenis_identitas") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("m_jenis_identitas"); ?>"><i class="fa fa-fw fa-neuter"></i>  <?= $this->lang->line('jenis_identitas'); ?></a></li>
							<?php endif; ?>
							<?php if (strpos($this->session->userdata('user_access'),'m_karyawan_manage') !== false) : ?>
							<li<?php if($viewoptions['section'] == "master_identitas" && $viewoptions['page'] == "m_karyawan") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("m_karyawan"); ?>"><i class="fa fa-fw fa-user"></i>  <?= $this->lang->line('karyawan'); ?></a></li>
							<?php endif; ?>
							<?php if (strpos($this->session->userdata('user_access'),'m_nationality_manage') !== false) : ?>
							<li<?php if($viewoptions['section'] == "master_identitas" && $viewoptions['page'] == "m_nationality") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("m_nationality"); ?>"><i class="fa fa-fw fa-globe"></i>  <?= $this->lang->line('kewarganegaraan'); ?></a></li>
							<?php endif; ?>
							<?php if (strpos($this->session->userdata('user_access'),'m_country_manage') !== false) : ?>
                            <li<?php if($viewoptions['section'] == "master_identitas" && $viewoptions['page'] == "m_country") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("m_country"); ?>"><i class="fa fa-fw fa-empire"></i><?= $this->lang->line('country'); ?></a></li>
							<?php endif; ?>
							<?php if (strpos($this->session->userdata('user_access'),'m_pendiidikan_terakhir_manage') !== false) : ?>
							<li<?php if($viewoptions['section'] == "master_identitas" && $viewoptions['page'] == "m_pendidikan_terakhir") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("m_pendidikan_terakhir"); ?>"><i class="fa fa-fw fa-graduation-cap"></i>  <?= $this->lang->line('pendidikan_terakhir'); ?></a></li>
							<?php endif; ?>
							<?php if (strpos($this->session->userdata('user_access'),'m_salutation_manage') !== false) : ?>
                            <li<?php if($viewoptions['section'] == "master_identitas" && $viewoptions['page'] == "m_salutation") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("m_salutation"); ?>"><i class="fa fa-fw fa-empire"></i><?= $this->lang->line('m_salutation'); ?></a></li>
							<?php endif; ?>
							<?php if (strpos($this->session->userdata('user_access'),'m_status_pernikahan_manage') !== false) : ?>
							<li<?php if($viewoptions['section'] == "master_identitas" && $viewoptions['page'] == "m_status_pernikahan") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("m_status_pernikahan"); ?>"><i class="fa fa-fw fa-venus-mars"></i>  <?= $this->lang->line('status_kawin'); ?></a></li>
							<?php endif; ?>
							<?php if (strpos($this->session->userdata('user_access'),'m_status_pajak_manage') !== false) : ?>
							<li<?php if($viewoptions['section'] == "master_identitas" && $viewoptions['page'] == "m_status_pajak") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("m_status_pajak"); ?>"><i class="fa fa-fw fa-dollar"></i>  <?= $this->lang->line('status_pajak'); ?></a></li>
							<?php endif; ?>
						</ul>
                    </li>
					<?php endif; ?>
					<?php if (strpos($this->session->userdata('user_access'),'m_crm_campaign_type_manage') !== false || 
						strpos($this->session->userdata('user_access'),'m_crm_case_type_manage') !== false ||
						strpos($this->session->userdata('user_access'),'m_crm_event_type_manage') !== false ||
						strpos($this->session->userdata('user_access'),'m_crm_knowledge_base_type_manage') !== false ||
						strpos($this->session->userdata('user_access'),'m_membership_type_manage') !== false ||
						strpos($this->session->userdata('user_access'),'m_crm_stage_manage') !== false ||
						strpos($this->session->userdata('user_access'),'m_crm_source') !== false 
					) : ?>
                    <li class="menu-list<?php if($viewoptions['section'] == "master_crm") echo " active"; ?>">
                        <a href="">
							<i class="fa fa-fw fa-handshake-o"></i><?= $this->lang->line('master_crm'); ?>
						</a>
                        <ul id="collapseMasterCrm" class="child-list">
							<?php if (strpos($this->session->userdata('user_access'),'m_crm_campaign_type_manage') !== false) : ?>
                            <li<?php if($viewoptions['section'] == "master_crm" && $viewoptions['page'] == "m_crm_campaign_type") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("m_crm_campaign_type"); ?>"><i class="fa fa-fw fa-gift"></i> <?= $this->lang->line('campaign_type'); ?></a></li>
							<?php endif; ?>
							<?php if (strpos($this->session->userdata('user_access'),'m_crm_case_type_manage') !== false) : ?>
                            <li<?php if($viewoptions['section'] == "master_crm" && $viewoptions['page'] == "m_crm_case_type") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("m_crm_case_type"); ?>"><i class="fa fa-fw fa-briefcase"></i> <?= $this->lang->line('case_type'); ?></a></li>
							<?php endif; ?>
							<?php if (strpos($this->session->userdata('user_access'),'m_crm_event_type_manage') !== false) : ?>
                            <li<?php if($viewoptions['section'] == "master_crm" && $viewoptions['page'] == "m_crm_event_type") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("m_crm_event_type"); ?>"><i class="fa fa-fw fa-calendar"></i> Event Type</a></li>
							<?php endif; ?>
							<?php if (strpos($this->session->userdata('user_access'),'m_crm_knowledge_base_type_manage') !== false) : ?>
                            <li<?php if($viewoptions['section'] == "master_crm" && $viewoptions['page'] == "m_crm_knowledge_base_type") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("m_crm_knowledge_base_type"); ?>"><i class="fa fa-fw fa-graduation-cap"></i> <?= $this->lang->line('kbase_type'); ?></a></li>
							<?php endif; ?>
							<?php if (strpos($this->session->userdata('user_access'),'m_membership_type_manage') !== false) : ?>
                            <li<?php if($viewoptions['section'] == "master_crm" && $viewoptions['page'] == "m_membership_type") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("m_membership_type"); ?>"><i class="fa fa-fw fa-users"></i> Membership Type</a></li>
							<?php endif; ?>
							<?php if (strpos($this->session->userdata('user_access'),'m_crm_source') !== false) : ?>
                            <li<?php if($viewoptions['section'] == "master_crm" && $viewoptions['page'] == "m_crm_source") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("m_crm_source"); ?>"><i class="fa fa-fw fa-comments"></i> <?= $this->lang->line('marketing_source'); ?></a></li>
							<?php endif; ?>
							<?php if (strpos($this->session->userdata('user_access'),'m_crm_stage_manage') !== false) : ?>
                            <li<?php if($viewoptions['section'] == "master_crm" && $viewoptions['page'] == "m_crm_stage") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("m_crm_stage"); ?>"><i class="fa fa-fw fa-star"></i> <?= $this->lang->line('opportunity_stage'); ?></a></li>
							<?php endif; ?>
						</ul>
                    </li>
					<?php endif; ?>

					<?php if (strpos($this->session->userdata('user_access'),'m_project_subcon_manage') !== false 
					) : ?>
                    <li class="menu-list<?php if($viewoptions['section'] == "master_project") echo " active"; ?>">
                        <a href="">
							<i class="fa fa-fw fa-folder-open"></i>Master Project
						</a>
                        <ul id="collapseMasterCrm" class="child-list">
							<?php if (strpos($this->session->userdata('user_access'),'m_project_subcon_manage') !== false) : ?>
                            <li<?php if($viewoptions['section'] == "master_project" && $viewoptions['page'] == "m_project_subcon") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("m_project_subcon"); ?>"><i class="fa fa-fw fa-folder-open"></i> Subcon</a></li>
							<?php endif; ?>
						</ul>
                    </li>
					<?php endif; ?>
					
                    <li>
                        <h3 class="navigation-title"> <?= $this->lang->line('transaksi'); ?></h3>
                    </li>
					<?php if (strpos($this->session->userdata('user_access'),'pos_beli_terima_manage') !== false ||
						strpos($this->session->userdata('user_access'),'pos_jual_delivery_manage') !== false ||
						strpos($this->session->userdata('user_access'),'pos_beli_terima_satuan_manage') !== false ||
						strpos($this->session->userdata('user_access'),'pos_jual_delivery_satuan_manage') !== false||
						strpos($this->session->userdata('user_access'),'pos_beli_terima_manage_manage') !== false||
						strpos($this->session->userdata('user_access'),'pos_jual_retur_manage') !== false||
						strpos($this->session->userdata('user_access'),'pos_jual_delivery_manage_manage') !== false 
					) : ?>
                    <li class="menu-list<?php if($viewoptions['section'] == "pos") echo " active"; ?>">
                        <a href="">
							<i class="fa fa-fw fa-bar-chart"></i>  POS
						</a>
                        <ul id="collapsePembelian" class="child-list">
							<?php if (strpos($this->session->userdata('user_access'),'pos_beli_terima_manage') !== false) : ?>
							<li<?php if($viewoptions['section'] == "pos" && $viewoptions['page'] == "pos_beli_terima") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("pos_beli_terima"); ?>"><i class="fa fa-fw fa-bar-chart"></i>  POS Beli Terima</a></li>
							<?php endif; ?>
							<?php if (strpos($this->session->userdata('user_access'),'pos_beli_terima_satuan_manage') !== false) : ?>
							<li<?php if($viewoptions['section'] == "pos" && $viewoptions['page'] == "pos_beli_terima_satuan") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("pos_beli_terima_satuan"); ?>"><i class="fa fa-fw fa-bar-chart"></i>  POS Beli Terima (Satuan Edit)</a></li>
							<?php endif; ?>
							<?php if (strpos($this->session->userdata('user_access'),'pos_beli_terima_manage_manage') !== false) : ?>
							<li<?php if($viewoptions['section'] == "pos" && $viewoptions['page'] == "pos_beli_terima_manage") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("pos_beli_terima_manage"); ?>"><i class="fa fa-fw fa-bar-chart"></i>  POS Beli Terima Manage</a></li>
							<?php endif; ?>
							<?php if (strpos($this->session->userdata('user_access'),'pos_jual_delivery_manage') !== false) : ?>
							<li<?php if($viewoptions['section'] == "pos" && $viewoptions['page'] == "pos_jual_delivery") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("pos_jual_delivery"); ?>"><i class="fa fa-fw fa-bar-chart"></i>  POS Jual Delivery</a></li>
							<?php endif; ?>
							<?php if (strpos($this->session->userdata('user_access'),'pos_jual_delivery_satuan_manage') !== false) : ?>
							<li<?php if($viewoptions['section'] == "pos" && $viewoptions['page'] == "pos_jual_delivery_satuan") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("pos_jual_delivery_satuan"); ?>"><i class="fa fa-fw fa-bar-chart"></i>  POS Jual Delivery (Satuan Edit)</a></li>
							<?php endif; ?>
							<?php if (strpos($this->session->userdata('user_access'),'pos_jual_delivery_manage_manage') !== false) : ?>
							<li<?php if($viewoptions['section'] == "pos" && $viewoptions['page'] == "pos_jual_delivery_manage") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("pos_jual_delivery_manage"); ?>"><i class="fa fa-fw fa-bar-chart"></i>  POS Jual Delivery Manage</a></li>
							<?php endif; ?>
							<?php if (strpos($this->session->userdata('user_access'),'pos_jual_retur_manage') !== false) : ?>
							<li<?php if($viewoptions['section'] == "pos" && $viewoptions['page'] == "pos_jual_retur") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("pos_jual_retur"); ?>"><i class="fa fa-fw fa-bar-chart"></i>  POS Jual Retur</a></li>
							<?php endif; ?>
						</ul>
                    </li>
					<?php endif; ?>
					
					<?php if (strpos($this->session->userdata('user_access'),'beli_minta_manage') !== false ||
						strpos($this->session->userdata('user_access'),'beli_lazy_manage') !== false ||  
						strpos($this->session->userdata('user_access'),'beli_tender_manage') !== false ||  
						strpos($this->session->userdata('user_access'),'beli_quote_manage') !== false ||  
						strpos($this->session->userdata('user_access'),'beli_order_manage') !== false || 
						strpos($this->session->userdata('user_access'),'beli_terima_manage') !== false || 
						strpos($this->session->userdata('user_access'),'beli_invoice_manage') !== false ||
						strpos($this->session->userdata('user_access'),'beli_invoice_batch_manage') !== false || 
						strpos($this->session->userdata('user_access'),'beli_retur_manage') !== false || 
						strpos($this->session->userdata('user_access'),'beli_bayar_manage') !== false ||
						strpos($this->session->userdata('user_access'),'beli_manual_manage') !== false 
					) : ?>
                    <li class="menu-list<?php if($viewoptions['section'] == "transaksi") echo " active"; ?>">
                        <a href="">
							<i class="fa fa-fw fa-shopping-cart"></i>  <?= $this->lang->line('pembelian'); ?>
						</a>
                        <ul id="collapsePembelian" class="child-list">
							<?php if (strpos($this->session->userdata('user_access'),'beli_lazy_manage') !== false) : ?>
							<li<?php if($viewoptions['section'] == "transaksi" && $viewoptions['page'] == "beli_lazy") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("beli_lazy"); ?>"><i class="fa fa-fw fa-object-group"></i>  Purchase Lazy Mode</a></li>
							<?php endif; ?>
							<?php if (strpos($this->session->userdata('user_access'),'beli_tender_manage') !== false) : ?>
							<li<?php if($viewoptions['section'] == "transaksi" && $viewoptions['page'] == "beli_tender") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("beli_tender"); ?>"><i class="fa fa-fw fa-bar-chart"></i>  Open Tender</a></li>
							<?php endif; ?>
							<?php if (strpos($this->session->userdata('user_access'),'beli_quote_manage') !== false) : ?>
							<li<?php if($viewoptions['section'] == "transaksi" && $viewoptions['page'] == "beli_quote") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("beli_quote"); ?>"><i class="fa fa-fw fa-question-circle"></i>  Request for Quotation</a></li>
							<?php endif; ?>
							<?php if (strpos($this->session->userdata('user_access'),'beli_minta_manage') !== false) : ?>
							<li<?php if($viewoptions['section'] == "transaksi" && $viewoptions['page'] == "beli_minta") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("beli_minta"); ?>"><i class="fa fa-fw fa-edit"></i>  <?= $this->lang->line('beli_minta'); ?></a></li>
							<?php endif; ?>
							<?php if (strpos($this->session->userdata('user_access'),'beli_order_manage') !== false) : ?>
							<li<?php if($viewoptions['section'] == "transaksi" && $viewoptions['page'] == "beli_order") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("beli_order"); ?>"><i class="fa fa-fw fa-check"></i>  <?= $this->lang->line('beli_order'); ?></a></li>
							<?php endif; ?>
							<?php if (strpos($this->session->userdata('user_access'),'beli_terima_manage') !== false) : ?>
							<li<?php if($viewoptions['section'] == "transaksi" && $viewoptions['page'] == "beli_terima") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("beli_terima"); ?>"><i class="fa fa-fw fa-check-square"></i>  <?= $this->lang->line('beli_terima'); ?></a></li>
							<?php endif; ?>
							<?php if (strpos($this->session->userdata('user_access'),'beli_invoice_manage') !== false) : ?>
							<li<?php if($viewoptions['section'] == "transaksi" && $viewoptions['page'] == "beli_invoice") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("beli_invoice"); ?>"><i class="fa fa-fw fa-dollar"></i>  <?= $this->lang->line('beli_invoice'); ?></a></li>
							<?php endif; ?>
							<?php if (strpos($this->session->userdata('user_access'),'beli_invoice_batch_manage') !== false) : ?>
							<li<?php if($viewoptions['section'] == "transaksi" && $viewoptions['page'] == "beli_invoice_batch") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("beli_invoice_batch"); ?>"><i class="fa fa-fw fa-dollar"></i>  Receipt Invoice Batch</a></li>
							<?php endif; ?>
							<?php if (strpos($this->session->userdata('user_access'),'beli_retur_manage') !== false) : ?>
							<!--<li<?php if($viewoptions['section'] == "transaksi" && $viewoptions['page'] == "beli_retur") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("beli_retur"); ?>"><i class="fa fa-fw fa-retweet"></i>  <?= $this->lang->line('beli_retur'); ?></a></li>-->
							<?php endif; ?>
							<?php if (strpos($this->session->userdata('user_access'),'beli_retur_manage') !== false) : ?>
							<li<?php if($viewoptions['section'] == "transaksi" && $viewoptions['page'] == "beli_retur_batch") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("beli_retur_batch"); ?>"><i class="fa fa-fw fa-retweet"></i>  Beli Retur Batch</a></li>
							<?php endif; ?>
							<?php if (strpos($this->session->userdata('user_access'),'beli_bayar_manage') !== false) : ?>
							<!--<li<?php if($viewoptions['section'] == "transaksi" && $viewoptions['page'] == "beli_bayar") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("beli_bayar"); ?>"><i class="fa fa-fw fa-cc-stripe"></i>  <?= $this->lang->line('beli_bayar'); ?></a></li>-->
							<?php endif; ?>
							<?php if (strpos($this->session->userdata('user_access'),'beli_bayar_manage') !== false) : ?>
							<li<?php if($viewoptions['section'] == "transaksi" && $viewoptions['page'] == "beli_bayar_batch") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("beli_bayar_batch"); ?>"><i class="fa fa-fw fa-cc-stripe"></i>  Pembayaran Batch</a></li>
							<?php endif; ?>
							<?php if (strpos($this->session->userdata('user_access'),'beli_manual_manage') !== false) : ?>
							<li<?php if($viewoptions['section'] == "transaksi" && $viewoptions['page'] == "beli_manual") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("beli_manual"); ?>"><i class="fa fa-fw fa-shopping-cart"></i>  Manual Purchase</a></li>
							<?php endif; ?>
						</ul>
                    </li>
					<?php endif; ?>
					<?php if (strpos($this->session->userdata('user_access'),'jual_lazy_manage') !== false || 
						strpos($this->session->userdata('user_access'),'jual_order_manage') !== false || 
						strpos($this->session->userdata('user_access'),'jual_quote_manage') !== false ||
						strpos($this->session->userdata('user_access'),'jual_delivery_manage') !== false || 
						strpos($this->session->userdata('user_access'),'jual_delivery_qc_manage') !== false || 
						strpos($this->session->userdata('user_access'),'jual_invoice_manage') !== false || 
						strpos($this->session->userdata('user_access'),'jual_retur_manage') !== false || 
						strpos($this->session->userdata('user_access'),'jual_bayar_manage') !== false
					) : ?>
					<li class="menu-list<?php if($viewoptions['section'] == "transaksi_jual") echo " active"; ?>">
                        <a href="">
							<i class="fa fa-fw fa-shopping-cart"></i>  <?= $this->lang->line('transaksi_jual'); ?>
						</a>
                        <ul id="collapsePembelian" class="child-list">
							<?php if (strpos($this->session->userdata('user_access'),'jual_lazy_manage') !== false) : ?>
							<li<?php if($viewoptions['section'] == "transaksi_jual" && $viewoptions['page'] == "jual_lazy") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("jual_lazy"); ?>"><i class="fa fa-fw fa-object-group"></i>Sales Lazy Mode</a></li>
							<?php endif; ?>
							<?php if (strpos($this->session->userdata('user_access'),'jual_quote_manage') !== false) : ?>
							<li<?php if($viewoptions['section'] == "transaksi_jual" && $viewoptions['page'] == "jual_quote") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("jual_quote"); ?>"><i class="fa fa-fw fa-question-circle"></i> Sales Quotation</a></li>
							<?php endif; ?>
							<?php if (strpos($this->session->userdata('user_access'),'jual_order_manage') !== false) : ?>
							<li<?php if($viewoptions['section'] == "transaksi_jual" && $viewoptions['page'] == "jual_order") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("jual_order"); ?>"><i class="fa fa-fw fa-check"></i>  <?= $this->lang->line('jual_order'); ?></a></li>
							<?php endif; ?>
							<?php if (strpos($this->session->userdata('user_access'),'jual_delivery_manage') !== false) : ?>
							<li<?php if($viewoptions['section'] == "transaksi_jual" && $viewoptions['page'] == "jual_delivery") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("jual_delivery"); ?>"><i class="fa fa-fw fa-check-square"></i>  <?= $this->lang->line('jual_delivery'); ?></a></li>
							<?php endif; ?>
							<?php if (strpos($this->session->userdata('user_access'),'jual_delivery_qc_manage') !== false) : ?>
							<li<?php if($viewoptions['section'] == "transaksi_jual" && $viewoptions['page'] == "jual_delivery_qc") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("jual_delivery_qc"); ?>"><i class="fa fa-fw fa-check-square"></i> Jual Delivery QC</a></li>
							<?php endif; ?>
							<?php if (strpos($this->session->userdata('user_access'),'jual_invoice_manage') !== false) : ?>
							<li<?php if($viewoptions['section'] == "transaksi_jual" && $viewoptions['page'] == "jual_invoice") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("jual_invoice"); ?>"><i class="fa fa-fw fa-dollar"></i>  <?= $this->lang->line('jual_invoice'); ?></a></li>
							<?php endif; ?>
							<?php if (strpos($this->session->userdata('user_access'),'jual_invoice_batch_manage') !== false) : ?>
							<li<?php if($viewoptions['section'] == "transaksi_jual" && $viewoptions['page'] == "jual_invoice_batch") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("jual_invoice_batch"); ?>"><i class="fa fa-fw fa-dollar"></i>  Invoicing Batch</a></li>
							<?php endif; ?>
							<?php if (strpos($this->session->userdata('user_access'),'jual_retur_manage') !== false) : ?>
							<!--<li<?php if($viewoptions['section'] == "transaksi_jual" && $viewoptions['page'] == "jual_retur") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("jual_retur"); ?>"><i class="fa fa-fw fa-retweet"></i> <?= $this->lang->line('jual_retur'); ?></a></li>-->
							<?php endif; ?>
							<?php if (strpos($this->session->userdata('user_access'),'jual_retur_manage') !== false) : ?>
							<li<?php if($viewoptions['section'] == "transaksi_jual" && $viewoptions['page'] == "jual_retur_batch") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("jual_retur_batch"); ?>"><i class="fa fa-fw fa-retweet"></i> Jual Retur Batch</a></li>
							<?php endif; ?>
							<?php if (strpos($this->session->userdata('user_access'),'jual_bayar_manage') !== false) : ?>
							<!--<li<?php if($viewoptions['section'] == "transaksi_jual" && $viewoptions['page'] == "jual_bayar") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("jual_bayar"); ?>"><i class="fa fa-fw fa-cc-discover"></i>  <?= $this->lang->line('jual_bayar'); ?></a></li>-->
							<?php endif; ?>
							<?php if (strpos($this->session->userdata('user_access'),'jual_bayar_manage') !== false) : ?>
							<li<?php if($viewoptions['section'] == "transaksi_jual" && $viewoptions['page'] == "jual_bayar_batch") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("jual_bayar_batch"); ?>"><i class="fa fa-fw fa-cc-discover"></i> Pembayaran Piutang Batch</a></li>
							<?php endif; ?>
						</ul>
                    </li>
					<?php endif; ?>
					<?php if (strpos($this->session->userdata('user_access'),'produksi_bom_manage') !== false ||
							strpos($this->session->userdata('user_access'),'produksi_spk_manage') !== false 
					) : ?>
					<li class="menu-list<?php if($viewoptions['section'] == "produksi") echo " active"; ?>">
                        <a href="">
							<i class="fa fa-fw fa-industry"></i> <?= $this->lang->line('produksi'); ?>
						</a>
                        <ul id="collapseProduksi" class="child-list">
							<?php if (strpos($this->session->userdata('user_access'),'produksi_bom_manage') !== false) : ?>
							<li<?php if($viewoptions['section'] == "produksi" && $viewoptions['page'] == "produksi_bom") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("produksi_bom"); ?>"><i class="fa fa-fw fa-tags"></i>  <?= $this->lang->line('produksi_bom'); ?></a></li>
							<?php endif; ?>
							<?php if (strpos($this->session->userdata('user_access'),'produksi_spk_manage') !== false) : ?>
							<li<?php if($viewoptions['section'] == "produksi" && $viewoptions['page'] == "produksi_spk") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("produksi_spk"); ?>"><i class="fa fa-fw fa-tags"></i>  Production Work Order</a></li>
							<?php endif; ?>
							<?php if (strpos($this->session->userdata('user_access'),'produksi_delivery_manage') !== false) : ?>
							<li<?php if($viewoptions['section'] == "produksi" && $viewoptions['page'] == "produksi_delivery") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("produksi_delivery"); ?>"><i class="fa fa-fw fa-tags"></i>  Production Delivery</a></li>
							<?php endif; ?>
							<?php if (strpos($this->session->userdata('user_access'),'produksi_hasil_manage') !== false) : ?>
							<li<?php if($viewoptions['section'] == "produksi" && $viewoptions['page'] == "produksi_hasil") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("produksi_hasil"); ?>"><i class="fa fa-fw fa-tags"></i>  Production Result</a></li>
							<?php endif; ?>
							<?php if (strpos($this->session->userdata('user_access'),'produksi_retur_manage') !== false) : ?>
							<li<?php if($viewoptions['section'] == "produksi" && $viewoptions['page'] == "produksi_retur") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("produksi_retur"); ?>"><i class="fa fa-fw fa-tags"></i>  Production Retur</a></li>
							<?php endif; ?>
						</ul>
                    </li>
					<?php endif; ?>
					<?php if (strpos($this->session->userdata('user_access'),'project_manage') !== false 
					) : ?>
					<li class="menu-list<?php if($viewoptions['section'] == "project") echo " active"; ?>">
                        <a href="">
							<i class="fa fa-fw fa-folder-open"></i> Project
						</a>
                        <ul id="collapseProduksi" class="child-list">
							<?php if (strpos($this->session->userdata('user_access'),'project_manage') !== false) : ?>
							<li<?php if($viewoptions['section'] == "project" && $viewoptions['page'] == "project") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("project"); ?>"><i class="fa fa-fw fa-folder-open"></i> Project</a></li>
							<?php endif; ?>
						</ul>
						<ul id="collapseProduksi" class="child-list">
							<?php if (strpos($this->session->userdata('user_access'),'project_activity_template_manage') !== false) : ?>
							<li<?php if($viewoptions['section'] == "project" && $viewoptions['page'] == "project_activity_template") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("project_activity_template"); ?>"><i class="fa fa-fw fa-folder-open"></i> Project Activity Template</a></li>
							<?php endif; ?>
						</ul>
                    </li>
					<?php endif; ?>
					<?php if (strpos($this->session->userdata('user_access'),'beli_motor_order_manage') !== false || 
						strpos($this->session->userdata('user_access'),'beli_motor_terima_manage') !== false || 
						strpos($this->session->userdata('user_access'),'beli_motor_invoice_manage') !== false ||
						strpos($this->session->userdata('user_access'),'beli_motor_bayar_manage') !== false 
					) : ?>
                    <li class="menu-list<?php if($viewoptions['section'] == "beli_motor") echo " active"; ?>">
                        <a href="">
							<i class="fa fa-fw fa-shopping-cart"></i>  <?= $this->lang->line('beli_motor'); ?>
						</a>
                        <ul id="collapsePembelianMotor" class="child-list">
							<?php if (strpos($this->session->userdata('user_access'),'beli_motor_order_manage') !== false) : ?>
							<li<?php if($viewoptions['section'] == "beli_motor" && $viewoptions['page'] == "beli_motor_order") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("beli_motor_order"); ?>"><i class="fa fa-fw fa-check"></i> <?= $this->lang->line('beli_motor_order'); ?></a></li>
							<?php endif; ?>
							<?php if (strpos($this->session->userdata('user_access'),'beli_motor_terima_manage') !== false) : ?>
							<li<?php if($viewoptions['section'] == "beli_motor" && $viewoptions['page'] == "beli_motor_terima") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("beli_motor_terima"); ?>"><i class="fa fa-fw fa-check-square"></i>  <?= $this->lang->line('beli_motor_terima'); ?></a></li>
							<?php endif; ?>
							<?php if (strpos($this->session->userdata('user_access'),'beli_motor_invoice_manage') !== false) : ?>
							<li<?php if($viewoptions['section'] == "beli_motor" && $viewoptions['page'] == "beli_motor_invoice") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("beli_motor_invoice"); ?>"><i class="fa fa-fw fa-dollar"></i> <?= $this->lang->line('beli_motor_invoice'); ?></a></li>
							<?php endif; ?>
							<?php if (strpos($this->session->userdata('user_access'),'beli_motor_bayar_manage') !== false) : ?>
							<li<?php if($viewoptions['section'] == "beli_motor" && $viewoptions['page'] == "beli_motor_bayar") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("beli_motor_bayar"); ?>"><i class="fa fa-fw fa-cc-amex"></i> <?= $this->lang->line('beli_motor_bayar'); ?></a></li>
							<?php endif; ?>
						</ul>
                    </li>
					<?php endif; ?>
					<?php if (strpos($this->session->userdata('user_access'),'jual_motor_order_manage') !== false || 
						strpos($this->session->userdata('user_access'),'jual_motor_delivery_manage') !== false || 
						strpos($this->session->userdata('user_access'),'jual_motor_bayar_manage') !== false || 
						strpos($this->session->userdata('user_access'),'pos_bengkel_manage') !== false || 
						strpos($this->session->userdata('user_access'),'pos_bengkel_ksg_manage') !== false 
					) : ?>
					<li class="menu-list<?php if($viewoptions['section'] == "motor_jual") echo " active"; ?>">
                        <a href="">
							<i class="fa fa-fw fa-shopping-cart"></i>  <?= $this->lang->line('motor_jual'); ?>
						</a>
                        <ul id="collapsePembelian" class="child-list">
							<?php if (strpos($this->session->userdata('user_access'),'jual_motor_order_manage') !== false) : ?>
							<li<?php if($viewoptions['section'] == "motor_jual" && $viewoptions['page'] == "jual_order") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("jual_motor_order"); ?>"><i class="fa fa-fw fa-check"></i> <?= $this->lang->line('jual_motor_order'); ?></a></li>
							<?php endif; ?>
							<?php if (strpos($this->session->userdata('user_access'),'jual_motor_delivery_manage') !== false) : ?>
							<li<?php if($viewoptions['section'] == "motor_jual" && $viewoptions['page'] == "jual_delivery") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("jual_motor_delivery"); ?>"><i class="fa fa-fw fa-check"></i> <?= $this->lang->line('jual_motor_delivery'); ?></a></li>
							<?php endif; ?>
							<?php if (strpos($this->session->userdata('user_access'),'jual_motor_bayar_manage') !== false) : ?>
							<li<?php if($viewoptions['section'] == "motor_jual" && $viewoptions['page'] == "jual_bayar") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("jual_motor_bayar"); ?>"><i class="fa fa-fw fa-check"></i>  <?= $this->lang->line('jual_motor_bayar'); ?></a></li>
							<?php endif; ?>
							<?php if (strpos($this->session->userdata('user_access'),'pos_bengkel_manage') !== false) : ?>
							<li<?php if($viewoptions['section'] == "motor_jual" && $viewoptions['page'] == "pos_bengkel") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("pos_bengkel"); ?>"><i class="fa fa-fw fa-check"></i>  <?= $this->lang->line('pos_bengkel'); ?></a></li>
							<?php endif; ?>
							<?php if (strpos($this->session->userdata('user_access'),'pos_bengkel_ksg_manage') !== false) : ?>
							<li<?php if($viewoptions['section'] == "motor_jual" && $viewoptions['page'] == "pos_bengkel_ksg") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("pos_bengkel_ksg"); ?>"><i class="fa fa-fw fa-check"></i> <?= $this->lang->line('pos_bengkel_ksg'); ?></a></li>
							<?php endif; ?>
							<!--<li<?php if($viewoptions['section'] == "motor_jual" && $viewoptions['page'] == "jual_delivery") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("jual_motor_delivery"); ?>"><i class="fa fa-fw fa-check-square"></i> Order Pengiriman</a></li>-->
							<!--<li<?php if($viewoptions['section'] == "motor_jual" && $viewoptions['page'] == "jual_invoice") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("jual_motor_invoice"); ?>"><i class="fa fa-fw fa-dollar"></i> Pengiriman Tagihan</a></li>-->
						</ul>
                    </li>
					<?php endif; ?>
					<?php if (strpos($this->session->userdata('user_access'),'jurnal_sesuai_manage') !== false || 
						strpos($this->session->userdata('user_access'),'jurnal_sesuai_motor_manage') !== false || 
						strpos($this->session->userdata('user_access'),'stock_mutasi_manage') !== false || 
						strpos($this->session->userdata('user_access'),'beli_motor_mutasi_manage') !== false || 
						strpos($this->session->userdata('user_access'),'stock_motor_manage') !== false 
					) : ?>
					<li class="menu-list<?php if($viewoptions['section'] == "warehouse") echo " active"; ?>">
                        <a href="">
							<i class="fa fa-fw fa-glass"></i> <?= $this->lang->line('gudang'); ?>
							</a>
                        <ul id="collapseFinance" class="child-list">
							<?php if (strpos($this->session->userdata('user_access'),'beli_motor_mutasi_manage') !== false) : ?>
							<li<?php if($viewoptions['section'] == "warehouse" && $viewoptions['page'] == "beli_motor_mutasi") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("beli_motor_mutasi"); ?>"><i class="fa fa-fw fa-check-square"></i> <?= $this->lang->line('beli_motor_mutasi'); ?></a></li>
							<?php endif; ?>
							<?php if (strpos($this->session->userdata('user_access'),'stock_motor_manage') !== false) : ?>
							<li<?php if($viewoptions['section'] == "warehouse" && $viewoptions['page'] == "stock_motor") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("stock_motor"); ?>"><i class="fa fa-fw fa-dollar"></i> <?= $this->lang->line('stock_motor'); ?></a></li>
							<?php endif; ?>
							<?php if (strpos($this->session->userdata('user_access'),'jurnal_sesuai_motor_manage') !== false) : ?>
							<li<?php if($viewoptions['section'] == "warehouse" && $viewoptions['page'] == "jurnal_sesuai_motor") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("jurnal_sesuai_motor"); ?>"><i class="fa fa-fw fa-refresh"></i> <?= $this->lang->line('sesuai_motor'); ?></a></li>
							<?php endif; ?>
							<?php if (strpos($this->session->userdata('user_access'),'jurnal_sesuai_manage') !== false) : ?>
							<li<?php if($viewoptions['section'] == "warehouse" && $viewoptions['page'] == "jurnal_sesuai") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("jurnal_sesuai"); ?>"><i class="fa fa-fw fa-refresh"></i> <?= $this->lang->line('jurnal_sesuai'); ?></a></li>
							<?php endif; ?>
							<?php if (strpos($this->session->userdata('user_access'),'stock_mutasi_manage') !== false) : ?>
							<li<?php if($viewoptions['section'] == "warehouse" && $viewoptions['page'] == "stock_mutasi") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("stock_mutasi"); ?>"><i class="fa fa-fw fa-refresh"></i> <?= $this->lang->line('stock_mutasi'); ?></a></li>
							<?php endif; ?>
						</ul>
                    </li>
					<?php endif; ?>
					<?php if (strpos($this->session->userdata('user_access'),'cash_masuk_manage') !== false || 
						strpos($this->session->userdata('user_access'),'cash_keluar_manage') !== false || 
						strpos($this->session->userdata('user_access'),'payroll_bayar_manage') !== false || 
						strpos($this->session->userdata('user_access'),'journal_manage') !== false || 
						strpos($this->session->userdata('user_access'),'memorial_manage') !== false
					) : ?>
					<li class="menu-list<?php if($viewoptions['section'] == "finance") echo " active"; ?>">
                        <a href="">
							<i class="fa fa-fw fa-credit-card"></i> <?= $this->lang->line('finance'); ?>
						</a>
                        <ul id="collapseFinance" class="child-list">
							<?php if (strpos($this->session->userdata('user_access'),'cash_masuk_manage') !== false) : ?>
							<li<?php if($viewoptions['section'] == "finance" && $viewoptions['page'] == "cash_masuk") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("cash_masuk"); ?>"><i class="fa fa-fw fa-credit-card"></i> <?= $this->lang->line('cash_masuk'); ?></a></li>
							<?php endif; ?>
							<?php if (strpos($this->session->userdata('user_access'),'cash_keluar_manage') !== false) : ?>
							<li<?php if($viewoptions['section'] == "finance" && $viewoptions['page'] == "cash_keluar") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("cash_keluar"); ?>"><i class="fa fa-fw fa-credit-card-alt"></i> <?= $this->lang->line('cash_keluar'); ?></a></li>
							<?php endif; ?>
							<?php if (strpos($this->session->userdata('user_access'),'payroll_bayar_manage') !== false) : ?>
							<li<?php if($viewoptions['section'] == "finance" && $viewoptions['page'] == "payroll_bayar") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("payroll_bayar"); ?>"><i class="fa fa-fw fa-cc-amex"></i> <?= $this->lang->line('payroll_bayar'); ?></a></li>
							<?php endif; ?>
							<?php if (strpos($this->session->userdata('user_access'),'memorial_manage') !== false) : ?>
							<li<?php if($viewoptions['section'] == "finance" && $viewoptions['page'] == "memorial") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("memorial"); ?>"><i class="fa fa-fw fa-refresh"></i> <?= $this->lang->line('memorial'); ?></a></li>
							<?php endif; ?>
							<?php if (strpos($this->session->userdata('user_access'),'journal_manage') !== false) : ?>
							<li<?php if($viewoptions['section'] == "finance" && $viewoptions['page'] == "journal") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("journal"); ?>"><i class="fa fa-fw fa-file-text"></i> Manual Journal Entry</a></li>
							<?php endif; ?>
						</ul>
                    </li>
					<?php endif; ?>
					<?php if (strpos($this->session->userdata('user_access'),'payroll_minta_manage') !== false 
					) : ?>
					<li class="menu-list<?php if($viewoptions['section'] == "payroll") echo " active"; ?>">
                        <a href="">
							<i class="fa fa-fw fa-dollar"></i> <?= $this->lang->line('payroll'); ?>
						</a>
                        <ul id="collapsePayroll" class="child-list">
							<?php if (strpos($this->session->userdata('user_access'),'payroll_minta_manage') !== false) : ?>
							<li<?php if($viewoptions['section'] == "payroll" && $viewoptions['page'] == "payroll_minta") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("payroll_minta"); ?>"><i class="fa fa-fw fa-cc-mastercard"></i> <?= $this->lang->line('payroll_minta'); ?></a></li>
							<?php endif; ?>
						</ul>
                    </li>
					<?php endif; ?>
					<?php if (strpos($this->session->userdata('user_access'),'m_asset_type_manage') !== false || 
						strpos($this->session->userdata('user_access'),'m_depreciation_year_manage') !== false || 
						strpos($this->session->userdata('user_access'),'m_asset_manage') !== false
					) : ?>
					<li class="menu-list<?php if($viewoptions['section'] == "asset") echo " active"; ?>">
                        <a href="">
							<i class="fa fa-fw fa-cubes"></i> <?= $this->lang->line('asset'); ?>
						</a>
                        <ul id="collapseAsset" class="child-list">
							<?php if (strpos($this->session->userdata('user_access'),'m_asset_type_manage') !== false) : ?>
							<li<?php if($viewoptions['section'] == "asset" && $viewoptions['page'] == "m_asset_type") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("m_asset_type"); ?>"><i class="fa fa-fw fa-cubes"></i> <?= $this->lang->line('asset_type'); ?></a></li>
							<?php endif; ?>
							<?php if (strpos($this->session->userdata('user_access'),'m_depreciation_year_manage') !== false) : ?>
							<li<?php if($viewoptions['section'] == "asset" && $viewoptions['page'] == "m_depreciation_year") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("m_depreciation_year"); ?>"><i class="fa fa-fw fa-calendar"></i> <?= $this->lang->line('depreciation_year'); ?></a></li>
							<?php endif; ?>
							<?php if (strpos($this->session->userdata('user_access'),'m_asset_manage') !== false) : ?>
							<li<?php if($viewoptions['section'] == "asset" && $viewoptions['page'] == "m_asset") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("m_asset"); ?>"><i class="fa fa-fw fa-cube"></i> <?= $this->lang->line('asset'); ?></a></li>
							<?php endif; ?>
						</ul>
                    </li>
					<?php endif; ?>
					<?php if (strpos($this->session->userdata('user_access'),'crm_target_list_manage') !== false || 
						strpos($this->session->userdata('user_access'),'crm_campaign_manage') !== false || 
						strpos($this->session->userdata('user_access'),'crm_call_manage') !== false || 
						strpos($this->session->userdata('user_access'),'crm_case_manage') !== false || 
						strpos($this->session->userdata('user_access'),'crm_lead_manage') !== false || 
						strpos($this->session->userdata('user_access'),'crm_opportunity_manage') !== false || 
						strpos($this->session->userdata('user_access'),'crm_knowledge_base_manage') !== false 
					) : ?>
					<li class="menu-list<?php if($viewoptions['section'] == "crm") echo " active"; ?>">
                        <a href="">
							<i class="fa fa-fw fa-handshake-o"></i> <?= $this->lang->line('crm'); ?>
						</a>
                        <ul id="collapseCrm" class="child-list">
							<?php if (strpos($this->session->userdata('user_access'),'crm_target_list_manage') !== false) : ?>
							<li<?php if($viewoptions['section'] == "crm" && $viewoptions['page'] == "crm_target_list") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("crm_target_list"); ?>"><i class="fa fa-fw fa-server"></i> <?= $this->lang->line('target_list'); ?></a></li>
							<?php endif; ?>
							<?php if (strpos($this->session->userdata('user_access'),'crm_campaign_manage') !== false) : ?>
							<li<?php if($viewoptions['section'] == "crm" && $viewoptions['page'] == "crm_campaign") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("crm_campaign"); ?>"><i class="fa fa-fw fa-star"></i> <?= $this->lang->line('campaign'); ?></a></li>
							<?php endif; ?>
							<?php if (strpos($this->session->userdata('user_access'),'crm_lead_manage') !== false) : ?>
							<li<?php if($viewoptions['section'] == "crm" && $viewoptions['page'] == "crm_lead") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("crm_lead"); ?>"><i class="fa fa-fw fa-eye"></i> <?= $this->lang->line('lead'); ?></a></li>
							<?php endif; ?>
							<?php if (strpos($this->session->userdata('user_access'),'crm_opportunity_manage') !== false) : ?>
							<li<?php if($viewoptions['section'] == "crm" && $viewoptions['page'] == "crm_opportunity") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("crm_opportunity"); ?>"><i class="fa fa-fw fa-exclamation-circle"></i> <?= $this->lang->line('opportunity'); ?></a></li>
							<?php endif; ?>
							<?php if (strpos($this->session->userdata('user_access'),'crm_call_manage') !== false) : ?>
							<li<?php if($viewoptions['section'] == "crm" && $viewoptions['page'] == "crm_call") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("crm_call"); ?>"><i class="fa fa-fw fa-phone"></i> <?= $this->lang->line('call'); ?></a></li>
							<?php endif; ?>
							<?php if (strpos($this->session->userdata('user_access'),'crm_case_manage') !== false) : ?>
							<li<?php if($viewoptions['section'] == "crm" && $viewoptions['page'] == "crm_case") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("crm_case"); ?>"><i class="fa fa-fw fa-terminal"></i> <?= $this->lang->line('case'); ?></a></li>
							<?php endif; ?>
							<?php if (strpos($this->session->userdata('user_access'),'crm_knowledge_base_manage') !== false) : ?>
							<li<?php if($viewoptions['section'] == "crm" && $viewoptions['page'] == "crm_knowledge_base") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("crm_knowledge_base"); ?>"><i class="fa fa-fw fa-graduation-cap"></i> <?= $this->lang->line('knowledge_base'); ?></a></li>
							<?php endif; ?>
						</ul>
                    </li>
					<?php endif; ?>
                    <li>
                        <h3 class="navigation-title"><?= $this->lang->line('report'); ?></h3>
                    </li>
                   <?php if (strpos($this->session->userdata('user_access'),'pos_beli_terima_laporan_manage') !== false ||
						strpos($this->session->userdata('user_access'),'pos_beli_terima_detil_laporan_manage') !== false || 
						strpos($this->session->userdata('user_access'),'pos_jual_delivery_laporan_manage') !== false ||
						strpos($this->session->userdata('user_access'),'pos_jual_delivery_detil_laporan_manage') !== false 
					) : ?>
                    <li class="menu-list<?php if($viewoptions['section'] == "laporan_pos") echo " active"; ?>">
                        <a href="">
							<i class="fa fa-fw fa-copy"></i>  POS Reports
						</a>
                        <ul id="collapsePembelian" class="child-list">
							<?php if (strpos($this->session->userdata('user_access'),'pos_beli_terima_laporan_manage') !== false) : ?>
							<li<?php if($viewoptions['section'] == "laporan_pos" && $viewoptions['page'] == "laporan_pos_beli_terima") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("laporan_pos/laporan_pos_beli_terima"); ?>"><i class="fa fa-fw fa-bar-chart"></i>  POS Beli Terima Report</a></li>
							<?php endif; ?>
							<?php if (strpos($this->session->userdata('user_access'),'pos_beli_terima_detil_laporan_manage') !== false) : ?>
							<li<?php if($viewoptions['section'] == "laporan_pos" && $viewoptions['page'] == "laporan_pos_beli_terima_detil") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("laporan_pos/laporan_pos_beli_terima_detil"); ?>"><i class="fa fa-fw fa-bar-chart"></i>  POS Beli Terima Detil Report</a></li>
							<?php endif; ?>
							<?php if (strpos($this->session->userdata('user_access'),'pos_jual_delivery_laporan_manage') !== false) : ?>
							<li<?php if($viewoptions['section'] == "laporan_pos" && $viewoptions['page'] == "laporan_pos_jual_delivery") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("laporan_pos/laporan_pos_jual_delivery"); ?>"><i class="fa fa-fw fa-bar-chart"></i>  POS Jual Delivery Report</a></li>
							<?php endif; ?>
							<?php if (strpos($this->session->userdata('user_access'),'pos_jual_delivery_detil_laporan_manage') !== false) : ?>
							<li<?php if($viewoptions['section'] == "laporan_pos" && $viewoptions['page'] == "laporan_pos_jual_delivery_detil") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("laporan_pos/laporan_pos_jual_delivery_detil"); ?>"><i class="fa fa-fw fa-bar-chart"></i>  POS Jual Delivery Detil Report</a></li>
							<?php endif; ?>
						</ul>
                    </li>
					<?php endif; ?>
					<?php if (strpos($this->session->userdata('user_access'),'beli_minta_laporan_manage') !== false || 
						strpos($this->session->userdata('user_access'),'beli_manual_laporan_manage') !== false || 
						strpos($this->session->userdata('user_access'),'beli_minta_detil_laporan_manage') !== false || 
						strpos($this->session->userdata('user_access'),'beli_order_laporan_manage') !== false || 
						strpos($this->session->userdata('user_access'),'beli_order_detil_laporan_manage') !== false || 
						strpos($this->session->userdata('user_access'),'beli_terima_laporan_manage') !== false || 
						strpos($this->session->userdata('user_access'),'beli_terima_detil_laporan_manage') !== false || 
						strpos($this->session->userdata('user_access'),'beli_invoice_laporan_manage') !== false || 
						strpos($this->session->userdata('user_access'),'beli_invoice_detil_laporan_manage') !== false ||
						strpos($this->session->userdata('user_access'),'beli_invoice_belum_lunas_laporan_manage') !== false || 
						strpos($this->session->userdata('user_access'),'beli_retur_laporan_manage') !== false || 
						strpos($this->session->userdata('user_access'),'beli_bayar_laporan_manage') !== false 
					) : ?>
                    <li class="menu-list<?php if($viewoptions['section'] == "laporan_beli") echo " active"; ?>">
                        <a href="">
							<i class="fa fa-fw fa-copy"></i> <?= $this->lang->line('laporan_beli'); ?>
						</a>
                        <ul id="collapsePembelian" class="child-list">
							<?php if (strpos($this->session->userdata('user_access'),'beli_minta_laporan_manage') !== false) : ?>
							<li<?php if($viewoptions['section'] == "laporan_beli" && $viewoptions['page'] == "beli_minta") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("laporan_beli/laporan_beli_minta"); ?>"><i class="fa fa-fw fa-edit"></i> <?= $this->lang->line('beli_minta'); ?></a></li>
							<?php endif; ?>
							<?php if (strpos($this->session->userdata('user_access'),'beli_minta_detil_laporan_manage') !== false) : ?>
							<li<?php if($viewoptions['section'] == "laporan_beli" && $viewoptions['page'] == "beli_minta_detil") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("laporan_beli/laporan_beli_minta_detil"); ?>"><i class="fa fa-fw fa-edit"></i> <?= $this->lang->line('beli_minta_detil'); ?></a></li>
							<?php endif; ?>
							<?php if (strpos($this->session->userdata('user_access'),'beli_minta_laporan_manage') !== false) : ?>
							<li<?php if($viewoptions['section'] == "laporan_beli" && $viewoptions['page'] == "beli_minta_infographic") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("laporan_beli_infographic/laporan_beli_minta"); ?>"><i class="fa fa-fw fa-edit"></i> PP Infographic</a></li>
							<?php endif; ?>
							<?php if (strpos($this->session->userdata('user_access'),'beli_order_laporan_manage') !== false) : ?>
							<li<?php if($viewoptions['section'] == "laporan_beli" && $viewoptions['page'] == "beli_order") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("laporan_beli/laporan_beli_order"); ?>"><i class="fa fa-fw fa-check"></i> <?= $this->lang->line('beli_order'); ?></a></li>
							<?php endif; ?>
							<?php if (strpos($this->session->userdata('user_access'),'beli_order_detil_laporan_manage') !== false) : ?>
							<li<?php if($viewoptions['section'] == "laporan_beli" && $viewoptions['page'] == "beli_order_detil") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("laporan_beli/laporan_beli_order_detil"); ?>"><i class="fa fa-fw fa-check"></i> <?= $this->lang->line('beli_order_detil'); ?></a></li>
							<?php endif; ?>
							<?php if (strpos($this->session->userdata('user_access'),'beli_terima_laporan_manage') !== false) : ?>
							<li<?php if($viewoptions['section'] == "laporan_beli" && $viewoptions['page'] == "beli_terima") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("laporan_beli/laporan_beli_terima"); ?>"><i class="fa fa-fw fa-check-square"></i> <?= $this->lang->line('beli_terima'); ?></a></li>
							<?php endif; ?>
							<?php if (strpos($this->session->userdata('user_access'),'beli_terima_detil_laporan_manage') !== false) : ?>
							<li<?php if($viewoptions['section'] == "laporan_beli" && $viewoptions['page'] == "beli_terima_detil") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("laporan_beli/laporan_beli_terima_detil"); ?>"><i class="fa fa-fw fa-check-square"></i> <?= $this->lang->line('beli_terima_detil'); ?></a></li>
							<?php endif; ?>
							<?php if (strpos($this->session->userdata('user_access'),'beli_invoice_laporan_manage') !== false) : ?>
							<li<?php if($viewoptions['section'] == "laporan_beli" && $viewoptions['page'] == "beli_invoice") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("laporan_beli/laporan_beli_invoice"); ?>"><i class="fa fa-fw fa-dollar"></i> <?= $this->lang->line('beli_invoice'); ?></a></li>
							<?php endif; ?>
							<?php if (strpos($this->session->userdata('user_access'),'beli_invoice_detil_laporan_manage') !== false) : ?>
							<li<?php if($viewoptions['section'] == "laporan_beli" && $viewoptions['page'] == "beli_invoice_detil") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("laporan_beli/laporan_beli_invoice_detil"); ?>"><i class="fa fa-fw fa-dollar"></i> <?= $this->lang->line('beli_invoice_detil'); ?></a></li>
							<?php endif; ?>
							<?php if (strpos($this->session->userdata('user_access'),'beli_invoice_belum_lunas_laporan_manage') !== false) : ?>
							<li<?php if($viewoptions['section'] == "laporan_beli" && $viewoptions['page'] == "beli_invoice_belum_lunas") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("laporan_beli/laporan_beli_invoice_belum_lunas"); ?>"><i class="fa fa-fw fa-dollar"></i> Laporan Invoice Belum Bayar Lunas</a></li>
							<?php endif; ?>
							<?php if (strpos($this->session->userdata('user_access'),'beli_retur_laporan_manage') !== false) : ?>
							<li<?php if($viewoptions['section'] == "laporan_beli" && $viewoptions['page'] == "beli_retur") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("laporan_beli/laporan_beli_retur"); ?>"><i class="fa fa-fw fa-retweet"></i> <?= $this->lang->line('beli_retur'); ?></a></li>
							<?php endif; ?>
							<?php if (strpos($this->session->userdata('user_access'),'beli_bayar_laporan_manage') !== false) : ?>
							<li<?php if($viewoptions['section'] == "laporan_beli" && $viewoptions['page'] == "beli_bayar") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("laporan_beli/laporan_beli_bayar"); ?>"><i class="fa fa-fw fa-cc-amex"></i> <?= $this->lang->line('beli_bayar'); ?></a></li>
							<?php endif; ?>
							<?php if (strpos($this->session->userdata('user_access'),'beli_manual_laporan_manage') !== false) : ?>
							<li<?php if($viewoptions['section'] == "laporan_beli" && $viewoptions['page'] == "beli_manual") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("laporan_beli/laporan_beli_manual"); ?>"><i class="fa fa-fw fa-edit"></i> Manual Purchasing</a></li>
							<?php endif; ?>
							<?php if (strpos($this->session->userdata('user_access'),'beli_manual_laporan_manage') !== false) : ?>
							<li<?php if($viewoptions['section'] == "laporan_beli" && $viewoptions['page'] == "beli_manual_detil") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("laporan_beli/laporan_beli_manual_detil"); ?>"><i class="fa fa-fw fa-edit"></i> Manual Purchasing Detil</a></li>
							<?php endif; ?>
						</ul>
                    </li>
					<?php endif; ?>
					<?php if (strpos($this->session->userdata('user_access'),'jual_order_laporan_manage') !== false || 
						strpos($this->session->userdata('user_access'),'profitability_laporan_manage') !== false || 
						strpos($this->session->userdata('user_access'),'jual_delivery_laporan_manage') !== false || 
						strpos($this->session->userdata('user_access'),'jual_invoice_laporan_manage') !== false || 
						strpos($this->session->userdata('user_access'),'jual_invoice_belum_tagih_laporan_manage') !== false || 
						strpos($this->session->userdata('user_access'),'jual_retur_laporan_manage') !== false || 
						strpos($this->session->userdata('user_access'),'jual_bayar_laporan_manage') !== false ||
						strpos($this->session->userdata('user_access'),'jual_order_detil_laporan_manage') !== false || 
						strpos($this->session->userdata('user_access'),'jual_delivery_detil_laporan_manage') !== false || 
						strpos($this->session->userdata('user_access'),'jual_retur_detil_laporan_manage') !== false || 
						strpos($this->session->userdata('user_access'),'jual_bayar_detil_laporan_manage') !== false 
					) : ?>
					<li class="menu-list<?php if($viewoptions['section'] == "laporan_jual") echo " active"; ?>">
                        <a href="">
							<i class="fa fa-fw fa-copy"></i> <?= $this->lang->line('laporan_jual'); ?>
						</a>
                        <ul id="collapsePenjualan" class="child-list">
							<?php if (strpos($this->session->userdata('user_access'),'profitability_laporan_manage') !== false) : ?>
							<li<?php if($viewoptions['section'] == "laporan_jual" && $viewoptions['page'] == "profitability") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("laporan_jual/laporan_profitability"); ?>"><i class="fa fa-fw fa-dollar"></i> Profitability</a></li>
							<?php endif; ?>
							<?php if (strpos($this->session->userdata('user_access'),'jual_order_laporan_manage') !== false) : ?>
							<li<?php if($viewoptions['section'] == "laporan_jual" && $viewoptions['page'] == "jual_order") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("laporan_jual/laporan_jual_order"); ?>"><i class="fa fa-fw fa-check"></i> <?= $this->lang->line('jual_order'); ?></a></li>
							<?php endif; ?>
							<?php if (strpos($this->session->userdata('user_access'),'jual_order_detil_laporan_manage') !== false) : ?>
							<li<?php if($viewoptions['section'] == "laporan_jual" && $viewoptions['page'] == "jual_order_detil") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("laporan_jual/laporan_jual_order_detil"); ?>"><i class="fa fa-fw fa-check"></i> Sales Order Detils</a></li>
							<?php endif; ?>
							<?php if (strpos($this->session->userdata('user_access'),'jual_delivery_laporan_manage') !== false) : ?>
							<li<?php if($viewoptions['section'] == "laporan_jual" && $viewoptions['page'] == "jual_delivery") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("laporan_jual/laporan_jual_delivery"); ?>"><i class="fa fa-fw fa-check-square"></i><?= $this->lang->line('jual_delivery'); ?></a></li>
							<?php endif; ?>
							<?php if (strpos($this->session->userdata('user_access'),'jual_delivery_detil_laporan_manage') !== false) : ?>
							<li<?php if($viewoptions['section'] == "laporan_jual" && $viewoptions['page'] == "jual_delivery_detil") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("laporan_jual/laporan_jual_delivery_detil"); ?>"><i class="fa fa-fw fa-check-square"></i>  Sales Delivery Detils</a></li>
							<?php endif; ?>
							<?php if (strpos($this->session->userdata('user_access'),'jual_invoice_laporan_manage') !== false) : ?>
							<li<?php if($viewoptions['section'] == "laporan_jual" && $viewoptions['page'] == "jual_invoice") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("laporan_jual/laporan_jual_invoice"); ?>"><i class="fa fa-fw fa-dollar"></i> <?= $this->lang->line('jual_invoice'); ?></a></li>
							<?php endif; ?>
							<?php if (strpos($this->session->userdata('user_access'),'jual_invoice_detil_laporan_manage') !== false) : ?>
							<li<?php if($viewoptions['section'] == "laporan_jual" && $viewoptions['page'] == "jual_invoice_detil") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("laporan_jual/laporan_jual_invoice_detil"); ?>"><i class="fa fa-fw fa-dollar"></i> Invoicing Detils</a></li>
							<?php endif; ?>
							<?php if (strpos($this->session->userdata('user_access'),'jual_invoice_belum_tagih_laporan_manage') !== false) : ?>
							<li<?php if($viewoptions['section'] == "laporan_jual" && $viewoptions['page'] == "jual_invoice_belum_tagih") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("laporan_jual/laporan_jual_invoice_belum_tagih"); ?>"><i class="fa fa-fw fa-dollar"></i>Laporan Invoice Belum Tagih</a></li>
							<?php endif; ?>
							<?php if (strpos($this->session->userdata('user_access'),'jual_retur_laporan_manage') !== false) : ?>
							<li<?php if($viewoptions['section'] == "laporan_jual" && $viewoptions['page'] == "jual_retur") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("laporan_jual/laporan_jual_retur"); ?>"><i class="fa fa-fw fa-retweet"></i> <?= $this->lang->line('jual_retur'); ?></a></li>
							<?php endif; ?>
							<?php if (strpos($this->session->userdata('user_access'),'jual_retur_detil_laporan_manage') !== false) : ?>
							<li<?php if($viewoptions['section'] == "laporan_jual" && $viewoptions['page'] == "jual_retur_detil") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("laporan_jual/laporan_jual_retur_detil"); ?>"><i class="fa fa-fw fa-retweet"></i> Sales Returs Detils</a></li>
							<?php endif; ?>
							<?php if (strpos($this->session->userdata('user_access'),'jual_bayar_laporan_manage') !== false) : ?>
							<li<?php if($viewoptions['section'] == "laporan_jual" && $viewoptions['page'] == "jual_bayar") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("laporan_jual/laporan_jual_bayar"); ?>"><i class="fa fa-fw fa-cc-discover"></i> <?= $this->lang->line('jual_bayar'); ?></a></li>
							<?php endif; ?>
							<?php if (strpos($this->session->userdata('user_access'),'jual_bayar_detil_laporan_manage') !== false) : ?>
							<li<?php if($viewoptions['section'] == "laporan_jual" && $viewoptions['page'] == "jual_bayar_detil") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("laporan_jual/laporan_jual_bayar_detil"); ?>"><i class="fa fa-fw fa-cc-discover"></i> Payment Detils</a></li>
							<?php endif; ?>
						</ul>
                    </li>
					<?php endif; ?>
					
					<?php if (strpos($this->session->userdata('user_access'),'produksi_spk_laporan_manage') !== false || 
						strpos($this->session->userdata('user_access'),'produksi_spk_detil_laporan_manage') !== false || 
						strpos($this->session->userdata('user_access'),'produksi_delivery_laporan_manage') !== false || 
						strpos($this->session->userdata('user_access'),'produksi_delivery_detil_laporan_manage') !== false ||
						strpos($this->session->userdata('user_access'),'produksi_hasil_laporan_manage') !== false || 
						strpos($this->session->userdata('user_access'),'produksi_hasil_detil_laporan_manage') !== false ||  
						strpos($this->session->userdata('user_access'),'produksi_retur_laporan_manage') !== false || 
						strpos($this->session->userdata('user_access'),'produksi_retur_detil_laporan_manage') !== false 
					) : ?>
					<li class="menu-list<?php if($viewoptions['section'] == "laporan_produksi") echo " active"; ?>">
                        <a href="">
							<i class="fa fa-fw fa-copy"></i> Production Reports
						</a>
                        <ul id="collapsePenjualan" class="child-list">
							<?php if (strpos($this->session->userdata('user_access'),'produksi_spk_laporan_manage') !== false) : ?>
							<li<?php if($viewoptions['section'] == "laporan_produksi" && $viewoptions['page'] == "produksi_spk") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("laporan_produksi/laporan_produksi_spk"); ?>"><i class="fa fa-fw fa-tags"></i> Work Order</a></li>
							<?php endif; ?>
							<?php if (strpos($this->session->userdata('user_access'),'produksi_spk_detil_laporan_manage') !== false) : ?>
							<li<?php if($viewoptions['section'] == "laporan_produksi" && $viewoptions['page'] == "produksi_spk_detil") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("laporan_produksi/laporan_produksi_spk_detil"); ?>"><i class="fa fa-fw fa-tags"></i> Work Order Detils</a></li>
							<?php endif; ?>
							<?php if (strpos($this->session->userdata('user_access'),'produksi_delivery_laporan_manage') !== false) : ?>
							<li<?php if($viewoptions['section'] == "laporan_produksi" && $viewoptions['page'] == "produksi_delivery") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("laporan_produksi/laporan_produksi_delivery"); ?>"><i class="fa fa-fw fa-tags"></i> Delivery </a></li>
							<?php endif; ?>
							<?php if (strpos($this->session->userdata('user_access'),'produksi_delivery_detil_laporan_manage') !== false) : ?>
							<li<?php if($viewoptions['section'] == "laporan_produksi" && $viewoptions['page'] == "produksi_delivery_detil") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("laporan_produksi/laporan_produksi_delivery_detil"); ?>"><i class="fa fa-fw fa-tags"></i> Delivery Detils </a></li>
							<?php endif; ?>
							<?php if (strpos($this->session->userdata('user_access'),'produksi_hasil_laporan_manage') !== false) : ?>
							<li<?php if($viewoptions['section'] == "laporan_produksi" && $viewoptions['page'] == "produksi_hasil") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("laporan_produksi/laporan_produksi_hasil"); ?>"><i class="fa fa-fw fa-tags"></i> Result</a></li>
							<?php endif; ?>							
							<?php if (strpos($this->session->userdata('user_access'),'produksi_hasil_detil_laporan_manage') !== false) : ?>
							<li<?php if($viewoptions['section'] == "laporan_produksi" && $viewoptions['page'] == "produksi_hasil_detil") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("laporan_produksi/laporan_produksi_hasil_detil"); ?>"><i class="fa fa-fw fa-tags"></i> Result Detils</a></li>
							<?php endif; ?>
							<?php if (strpos($this->session->userdata('user_access'),'produksi_retur_laporan_manage') !== false) : ?>
							<li<?php if($viewoptions['section'] == "laporan_produksi" && $viewoptions['page'] == "produksi_retur") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("laporan_produksi/laporan_produksi_retur"); ?>"><i class="fa fa-fw fa-tags"></i> Return</a></li>
							<?php endif; ?>							
							<?php if (strpos($this->session->userdata('user_access'),'produksi_retur_detil_laporan_manage') !== false) : ?>
							<li<?php if($viewoptions['section'] == "laporan_produksi" && $viewoptions['page'] == "produksi_retur_detil") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("laporan_produksi/laporan_produksi_retur_detil"); ?>"><i class="fa fa-fw fa-tags"></i> Return Detils</a></li>
							<?php endif; ?>
						</ul>
                    </li>
					<?php endif; ?>
					
					<?php if (strpos($this->session->userdata('user_access'),'stock_laporan_manage') !== false  || 
						strpos($this->session->userdata('user_access'),'stock_opname_laporan_manage') !== false || 
						strpos($this->session->userdata('user_access'),'stock_opname_owner_laporan_manage') !== false 
					) : ?>
					<li class="menu-list<?php if($viewoptions['section'] == "laporan_gudang") echo " active"; ?>">
                        <a href="">
							<i class="fa fa-fw fa-copy"></i><?= $this->lang->line('laporan_gudang'); ?>
						</a>
                        <ul id="collapsePembelian" class="child-list">
							<?php if (strpos($this->session->userdata('user_access'),'stock_laporan_manage') !== false) : ?>
							<li<?php if($viewoptions['section'] == "laporan_gudang" && $viewoptions['page'] == "stock") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("laporan_stock/laporan_stocks"); ?>"><i class="fa fa-fw fa-shopping-basket"></i> Stock Barang</a></li>
							<?php endif; ?>
							<?php if (strpos($this->session->userdata('user_access'),'stock_laporan_manage') !== false) : ?>
							<li<?php if($viewoptions['section'] == "laporan_gudang" && $viewoptions['page'] == "stock_gudang") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("laporan_stock/laporan_stocks_gudang"); ?>"><i class="fa fa-fw fa-shopping-basket"></i> Stock Gudang</a></li>
							<?php endif; ?>
							<?php if (strpos($this->session->userdata('user_access'),'stock_opname_laporan_manage') !== false) : ?>
							<li<?php if($viewoptions['section'] == "laporan_gudang" && $viewoptions['page'] == "stock_opname") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("laporan_stock/laporan_stock_opname"); ?>"><i class="fa fa-fw fa-check"></i> <?= $this->lang->line('stock_opname'); ?></a></li>
							<?php endif; ?>
							<?php if (strpos($this->session->userdata('user_access'),'stock_opname_owner_laporan_manage') !== false) : ?>
							<li<?php if($viewoptions['section'] == "laporan_gudang" && $viewoptions['page'] == "stock_opname_owner") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("laporan_stock/laporan_stock_opname_owner"); ?>"><i class="fa fa-fw fa-check"></i> Stock Opname (Owner)</a></li>
							<?php endif; ?>
						</ul>
                    </li>
					<?php endif; ?>
					<?php if (strpos($this->session->userdata('user_access'),'journal_laporan_manage') !== false || 
						strpos($this->session->userdata('user_access'),'balance_sheet_laporan_manage') !== false || 
						strpos($this->session->userdata('user_access'),'income_laporan_manage') !== false 
					) : ?>
					<li class="menu-list<?php if($viewoptions['section'] == "laporan_finance") echo " active"; ?>">
                        <a href="">
							<i class="fa fa-fw fa-copy"></i><?= $this->lang->line('laporan_finance'); ?>
						</a>
                        <ul id="collapseFinance" class="child-list">
							<?php if (strpos($this->session->userdata('user_access'),'journal_laporan_manage') !== false) : ?>
							<li<?php if($viewoptions['section'] == "laporan_finance" && $viewoptions['page'] == "ledger_table") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("laporan_finance/laporan_ledger_table"); ?>"><i class="fa fa-fw fa-check"></i> General Ledger Table</a></li>
							<?php endif; ?>
							<?php if (strpos($this->session->userdata('user_access'),'journal_laporan_manage') !== false) : ?>
							<li<?php if($viewoptions['section'] == "laporan_finance" && $viewoptions['page'] == "ledger") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("laporan_finance/laporan_ledger"); ?>"><i class="fa fa-fw fa-check"></i> General Ledger</a></li>
							<?php endif; ?>
							<?php if (strpos($this->session->userdata('user_access'),'journal_laporan_manage') !== false) : ?>
							<li<?php if($viewoptions['section'] == "laporan_finance" && $viewoptions['page'] == "journal") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("laporan_finance/laporan_journal"); ?>"><i class="fa fa-fw fa-check"></i> T Ledger</a></li>
							<?php endif; ?>
							<?php if (strpos($this->session->userdata('user_access'),'balance_sheet_laporan_manage') !== false) : ?>
							<li<?php if($viewoptions['section'] == "laporan_finance" && $viewoptions['page'] == "balance_sheet") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("laporan_finance/laporan_balance_sheet"); ?>"><i class="fa fa-fw fa-check"></i> Balance Sheet</a></li>
							<?php endif; ?>
							<?php if (strpos($this->session->userdata('user_access'),'balance_sheet_laporan_manage') !== false) : ?>
							<li<?php if($viewoptions['section'] == "laporan_finance" && $viewoptions['page'] == "trial_balance") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("laporan_finance/laporan_trial_balance"); ?>"><i class="fa fa-fw fa-check"></i> Trial Balance</a></li>
							<?php endif; ?>
							<?php if (strpos($this->session->userdata('user_access'),'income_laporan_manage') !== false) : ?>
							<li<?php if($viewoptions['section'] == "laporan_finance" && $viewoptions['page'] == "income") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("laporan_finance/laporan_income"); ?>"><i class="fa fa-fw fa-check"></i> Income Statement</a></li>
							<?php endif; ?>
						</ul>
                    </li>
					<?php endif; ?>
					<?php if (strpos($this->session->userdata('user_access'),'beli_motor_order_laporan_manage') !== false || 
						strpos($this->session->userdata('user_access'),'beli_motor_terima_laporan_manage') !== false || 
						strpos($this->session->userdata('user_access'),'beli_motor_invoice_laporan_manage') !== false ||
						strpos($this->session->userdata('user_access'),'beli_motor_invoice_belum_lunas_laporan_manage') !== false || 
						strpos($this->session->userdata('user_access'),'beli_motor_bayar_laporan_manage') !== false 
					) : ?>
					<li class="menu-list<?php if($viewoptions['section'] == "laporan_beli_motor") echo " active"; ?>">
                        <a href="">
							<i class="fa fa-fw fa-copy"></i> <?= $this->lang->line('laporan_beli_motor'); ?>
						</a>
                        <ul id="collapsePembelianMotor" class="child-list">
							<?php if (strpos($this->session->userdata('user_access'),'beli_motor_order_laporan_manage') !== false) : ?>
							<li<?php if($viewoptions['section'] == "laporan_beli_motor" && $viewoptions['page'] == "beli_motor_order") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("laporan_beli_motor/laporan_beli_order"); ?>"><i class="fa fa-fw fa-check"></i> <?= $this->lang->line('beli_motor_order'); ?></a></li>
							<?php endif; ?>
							<?php if (strpos($this->session->userdata('user_access'),'beli_motor_terima_laporan_manage') !== false) : ?>
							<li<?php if($viewoptions['section'] == "laporan_beli_motor" && $viewoptions['page'] == "beli_motor_terima") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("laporan_beli_motor/laporan_beli_terima"); ?>"><i class="fa fa-fw fa-check-square"></i> <?= $this->lang->line('beli_motor_terima'); ?></a></li>
							<?php endif; ?>
							<?php if (strpos($this->session->userdata('user_access'),'beli_motor_invoice_laporan_manage') !== false) : ?>
							<li<?php if($viewoptions['section'] == "laporan_beli_motor" && $viewoptions['page'] == "beli_motor_invoice") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("laporan_beli_motor/laporan_beli_invoice"); ?>"><i class="fa fa-fw fa-dollar"></i> <?= $this->lang->line('beli_motor_invoice'); ?></a></li>
							<?php endif; ?>
							<?php if (strpos($this->session->userdata('user_access'),'beli_motor_invoice_belum_lunas_laporan_manage') !== false) : ?>
							<li<?php if($viewoptions['section'] == "laporan_beli_motor" && $viewoptions['page'] == "beli_motor_invoice_belum_lunas") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("laporan_beli_motor/laporan_beli_invoice_belum_lunas"); ?>"><i class="fa fa-fw fa-dollar"></i>Laporan Invoice Belum Lunas</a></li>
							<?php endif; ?>							
							<?php if (strpos($this->session->userdata('user_access'),'beli_motor_bayar_laporan_manage') !== false) : ?>
							<li<?php if($viewoptions['section'] == "laporan_beli_motor" && $viewoptions['page'] == "beli_motor_bayar") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("laporan_beli_motor/laporan_beli_bayar"); ?>"><i class="fa fa-fw fa-cc-amex"></i> <?= $this->lang->line('beli_motor_bayar'); ?></a></li>
							<?php endif; ?>
						</ul>
                    </li>
					<?php endif; ?>
					<?php if (strpos($this->session->userdata('user_access'),'jual_motor_order_laporan_manage') !== false || 
						strpos($this->session->userdata('user_access'),'jual_motor_delivery_laporan_manage') !== false || 
						strpos($this->session->userdata('user_access'),'jual_motor_bayar_laporan_manage') !== false ||
						strpos($this->session->userdata('user_access'),'jual_motor_invoice_belum_tagih_laporan_manage') !== false || 
						strpos($this->session->userdata('user_access'),'pos_bengkel_laporan_manage') !== false || 
						strpos($this->session->userdata('user_access'),'pos_bengkel_ksg_laporan_manage') !== false
					) : ?>
					<li class="menu-list<?php if($viewoptions['section'] == "laporan_jual_motor") echo " active"; ?>">
                        <a href="">
							<i class="fa fa-fw fa-copy"></i> <?= $this->lang->line('laporan_jual_motor'); ?>
						</a>
                        <ul id="collapsePenjualanMotor" class="child-list">
							<?php if (strpos($this->session->userdata('user_access'),'jual_motor_order_laporan_manage') !== false) : ?>
							<li<?php if($viewoptions['section'] == "laporan_jual_motor" && $viewoptions['page'] == "jual_motor_order") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("laporan_jual_motor/laporan_jual_order"); ?>"><i class="fa fa-fw fa-check"></i> <?= $this->lang->line('jual_motor_order'); ?></a></li>
							<?php endif; ?>
							<?php if (strpos($this->session->userdata('user_access'),'jual_motor_delivery_laporan_manage') !== false) : ?>
							<li<?php if($viewoptions['section'] == "laporan_jual_motor" && $viewoptions['page'] == "jual_motor_delivery") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("laporan_jual_motor/laporan_jual_delivery"); ?>"><i class="fa fa-fw fa-check-square"></i> <?= $this->lang->line('jual_motor_delivery'); ?></a></li>
							<?php endif; ?>
							<?php if (strpos($this->session->userdata('user_access'),'jual_motor_bayar_laporan_manage') !== false) : ?>
							<li<?php if($viewoptions['section'] == "laporan_jual_motor" && $viewoptions['page'] == "jual_motor_bayar") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("laporan_jual_motor/laporan_jual_bayar"); ?>"><i class="fa fa-fw fa-cc-amex"></i> <?= $this->lang->line('jual_motor_bayar'); ?></a></li>
							<?php endif; ?>
							<?php if (strpos($this->session->userdata('user_access'),'jual_motor_invoice_belum_tagih_laporan_manage') !== false) : ?>
							<li<?php if($viewoptions['section'] == "laporan_jual_motor" && $viewoptions['page'] == "jual_motor_invoice_belum_tagih") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("laporan_jual_motor/laporan_jual_invoice_belum_tagih"); ?>"><i class="fa fa-fw fa-dollar"></i> Laporan Invoice Belum Tagih</a></li>
							<?php endif; ?>
							<?php if (strpos($this->session->userdata('user_access'),'pos_bengkel_laporan_manage') !== false) : ?>
							<li<?php if($viewoptions['section'] == "laporan_jual_motor" && $viewoptions['page'] == "pos_bengkel") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("laporan_jual_motor/laporan_pos_bengkel"); ?>"><i class="fa fa-fw fa-gears"></i> <?= $this->lang->line('pos_bengkel'); ?></a></li>
							<?php endif; ?>
							<?php if (strpos($this->session->userdata('user_access'),'pos_bengkel_ksg_laporan_manage') !== false) : ?>
							<li<?php if($viewoptions['section'] == "laporan_jual_motor" && $viewoptions['page'] == "pos_bengkel_ksg") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("laporan_jual_motor/laporan_pos_bengkel_ksg"); ?>"><i class="fa fa-fw fa-gear"></i><?= $this->lang->line('pos_bengkel_ksg'); ?></a></li>
							<?php endif; ?>
							<?php if (strpos($this->session->userdata('user_access'),'call_log_laporan_manage') !== false) : ?>
							<li<?php if($viewoptions['section'] == "laporan_call_log" && $viewoptions['page'] == "call_log") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("laporan_crm/laporan_call_log"); ?>"><i class="fa fa-fw fa-dollar"></i> Laporan Log Panggilan</a></li>
							<?php endif; ?>
						</ul>
                    </li>
					<?php endif; ?>
					<li>
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
							<li<?php if($viewoptions['section'] == "user" && $viewoptions['page'] == "user_log") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("users_logs"); ?>"><i class="fa fa-fw fa-file-archive-o"></i><?= $this->lang->line('user_log'); ?></a></li>
							<li<?php if($viewoptions['section'] == "user" && $viewoptions['page'] == "user_failed") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("users_failed_attempts"); ?>"><i class="fa fa-fw fa-file-code-o"></i> <?= $this->lang->line('user_failed'); ?></a></li>
						</ul>
                    </li>
					<li class="menu-list<?php if($viewoptions['section'] == "settings") echo " active"; ?>">
                        <a href=""">
							<i class="fa fa-fw fa-gears"></i> Settings</a>
						</a>
                        <ul id="collapseSetting" class="child-list">
                            <li<?php if($viewoptions['section'] == "settings" && $viewoptions['page'] == "general") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("general"); ?>"><i class="fa fa-fw fa-info"></i> General Info</a></li>
							<li<?php if($viewoptions['section'] == "settings" && $viewoptions['page'] == "general_template") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("general_template"); ?>"><i class="fa fa-fw fa-info"></i> General Template</a></li>
							<li<?php if($viewoptions['section'] == "settings" && $viewoptions['page'] == "general_coa") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("general_coa"); ?>"><i class="fa fa-fw fa-info"></i> General COA</a></li>
						</ul>
                    </li>
					<?php } ?>
					<?php if (strpos($this->session->userdata('user_access'),'barcode_generator_manage') !== false
					) : ?>
					<li class="menu-list<?php if($viewoptions['section'] == "tools") echo " active"; ?>">
                        <a href="">
							<i class="fa fa-fw fa-paint-brush"></i>  Tools
						</a>
                        <ul id="collapseTools" class="child-list">
							<?php if (strpos($this->session->userdata('user_access'),'barcode_generator_manage') !== false) : ?>
							<li<?php if($viewoptions['section'] == "tools" && $viewoptions['page'] == "barcode_generator") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("barcode_generator"); ?>"><i class="fa fa-fw fa-barcode"></i> Barcode Generator</a></li>
							<?php endif; ?>
							<li<?php if($viewoptions['section'] == "tools" && $viewoptions['page'] == "pivot") echo " class=\"active\""; ?>>
								<a href="<?php echo base_url("pivot"); ?>"><i class="fa fa-fw fa-bar-chart"></i> Pivot Table</a></li>
						</ul>
                    </li>
					<?php endif; ?>
					<?php if (strpos($this->session->userdata('user_access'),'content_news_manage') !== false) : ?>
					<li class="<?php if($viewoptions['section'] == "content_news") echo " active"; ?>">
						<a href="<?= base_url('content_news') ?>"><i class="fa fa-fw fa-feed"></i><?= $this->lang->line('managemen_berita'); ?></span> </a>
					</li>
					<?php endif; ?>
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