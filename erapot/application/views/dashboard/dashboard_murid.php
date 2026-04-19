
<!DOCTYPE html>
<html lang="en">
<head>
  
  <!--
    Basic
  -->
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
  <title>SMKN 1 KRAS KEDIRI</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
  <meta name="description" content="vCard & Resume Template" />
  <meta name="keywords" content="vcard, resposnive, resume, personal, card, cv, cards, portfolio" />
  <meta name="author" content="beshleyua" />
  
  <!--
    Load Fonts
  -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.0/css/all.css">
  
  <!--
    Load CSS
  -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>profil/css/basic.css" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>profil/css/layout.css" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>profil/css/blogs.css" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>profil/css/ionicons.css" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>profil/css/magnific-popup.css" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>profil/css/animate.css" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>profil/css/owl.carousel.css" />

  <!--
    Background Gradient
  -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>profil/css/gradient.css" />
  
  <!--
    Template New-Skin
  -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>profil/css/new-skin/new-skin.css" />

  <!--
    Template RTL
  -->
  <!--<link rel="stylesheet" href="css/rtl.css" />-->
  
  <!--
    Template Colors
  -->
   <!--<link rel="stylesheet" href="css/template-colors/green.css" />-->
  <link rel="stylesheet" href="<?php echo base_url(); ?>profil/css/template-colors/blue.css" />
  <!--<link rel="stylesheet" href="css/template-colors/orange.css" />-->
  <!--<link rel="stylesheet" href="css/template-colors/pink.css" />-->
  <!--<link rel="stylesheet" href="css/template-colors/purple.css" />-->
  <!--<link rel="stylesheet" href="css/template-colors/red.css" />-->

  <!--
    Template Dark
  -->
  <!--<link rel="stylesheet" href="css/template-dark/dark.css" />-->
  

  <!--[if lt IE 9]>
  <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
  
  <!--
    Favicons
  -->
  <style> 
    #main {
      width: 300px;
      margin:auto;
      background: #ececec;
      padding: 20px;
      border: 1px solid #ccc;
    }
     
    #image-list {
      list-style:none;
      margin:0;
      padding:0;
    }
    #image-list li {
      background: #fff;
      border: 1px solid #ccc;
      text-align:center;
      padding:20px;
      margin-bottom:19px;
    }
    #image-list li img {
      width: 258px;
      vertical-align: middle;
      border:1px solid #474747;
    }
</style>
  <link rel="shortcut icon" href="<?php echo base_url(); ?>profil/images/favicons/logo-9.png">
  
</head>

<body>
 

  <div class="page new-skin">
    
    <!-- preloader -->
    <div class="preloader">
      <div class="centrize full-width">
        <div class="vertical-center">
          <div class="spinner">
            <div class="double-bounce1"></div>
            <div class="double-bounce2"></div>
          </div>
        </div>
      </div>
    </div>

    <!-- background -->
    <div class="background gradient">
      <ul class="bg-bubbles">
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
      <li></li>
    </ul>
    </div>

    <!--
      Container
    -->
    <div class="container opened" data-animation-in="fadeInLeft" data-animation-out="fadeOutLeft">

      <!--
        Header
      -->
      <header class="header">

        <!-- menu -->
        <div class="top-menu">
          <ul>
            <li class="active">
              <a href="#about-card">
                <span class="icon ion-person"></span>
                <span class="link">About</span>
              </a>
            </li>
            <li>
              <a href="#resume-card">
                <span class="icon ion-android-list"></span>
                <span class="link">Tunggakan</span>
              </a>
            </li>
          </ul>
        </div>

      </header>

      <!--
        Card - Started
      -->
      <div class="card-started" id="home-card">

        <!--
          Profile
        -->
        <div class="profile no-photo">

          <!-- profile image -->
          <div class="slide" style="background-image: url(<?= base_url(); ?>profil/images/man5_big.jpg);"></div>

          <!-- profile photo -->
          <div class="image">
            <img src="<?=base_url(); ?>images/profile.png" alt="" />

          </div>

          <!-- profile titles --> 
          <form action="<?php echo base_url("dashboard"); ?>/image" method="post"> 
              <div class="file-upload">
                <input type="file" id='image' name='image'/>
                <i class="fa fa-camera"></i>
                </div>
            </form>
          <div class="title"><?= $this->session->userdata('user_name') ?></div>
          <div class="subtitle"><?= get_data('m_kelas', 'id', get_data('supplier', 'nik', $this->session->userdata('user_id'), 'id_m_kelas'), 'nama') ?></div>          
        
          <!-- profile buttons -->
          <div class="lnks">
            <a href="https://smkn1kras.sch.id/" class="lnk">
              <span class="text">HOME</span>
              <span class="ion ion-university"></span>
            </a>
            <a href="<?php echo base_url("auth/logout"); ?>" class="lnk discover">
              <span class="text">Logout</span>
              <span class="arrow"></span>
            </a>
          </div>

        </div>

      </div>

      <!-- 
        Card - About
      -->
      <div class="card-inner animated active" id="about-card">
        <div class="card-wrap">

          <!-- 
            About 
          -->
          <div class="content about">

            <!-- title -->
            <div class="title">Data Siswa</div>

            <!-- content -->
            <div class="row">
              <?php 
                $gender = get_data('supplier', 'nik', $this->session->userdata('user_id'), 'jenis_kelamin');
                if($gender == 'L')
                    $gender = "LAKI - LAKI";
                 else
                    $gender  = "PEREMPUAN";

                $tanggal =  get_data('supplier', 'nik', $this->session->userdata('user_id'), 'tanggal_lahir');
                $tanggal = date_create($tanggal);
                $tanggal = date_format($tanggal,"d M Y");

              ?>
              
              <div class="col col-d-12 col-t-12 col-m-12 border-line-v">
                <div class="info-list">
                  <ul>
                    <li><strong>Nama . . . . .</strong> <?= $this->session->userdata('user_name') ?></li>
                    <li><strong>NIS . . . . .</strong> <?= $this->session->userdata('user_id') ?></li>
                    <li><strong>Kelas . . . . .</strong> <?= get_data('m_kelas', 'id', get_data('supplier', 'nik', $this->session->userdata('user_id'), 'id_m_kelas'), 'nama') ?></li>
                    <li><strong>Alamat . . . . .</strong> <?= get_data('supplier', 'nik', $this->session->userdata('user_id'), 'alamat') ?></li>
                    <li><strong>Tempat, Tanggal Lahir . . . . .</strong> <?=  get_data('supplier', 'nik', $this->session->userdata('user_id'), 'tempat_lahir') ?>, <?=  $tanggal ?> </li>
                    <li><strong>Jenis Kelamin . . . . .</strong> <?=  $gender ?></li>
                    <li><strong>Agama . . . . .</strong> <?= get_data('supplier', 'nik', $this->session->userdata('user_id'), 'agama') ?></li>
                    <li><strong>Tahun Masuk . . . . .</strong> <?= get_data('supplier', 'nik', $this->session->userdata('user_id'), 'tahun_masuk') ?></li>
                  </ul>
                </div>
              </div>
              <!--<div class="col col-d-12 col-t-12 col-m-12 border-line-v">
                <div class="info-list">
                  <ul>
                    <li><strong>Nama Wali . . . . .</strong> <?=  get_data('supplier', 'nik', $this->session->userdata('user_id'), 'nama_wali') ?></li>
                    <li><strong>Telp . . . . .</strong> <?=  get_data('supplier', 'nik', $this->session->userdata('user_id'), 'telp_wali') ?></li>
                    <li><strong>Alamat . . . . .</strong> <?=  get_data('supplier', 'nik', $this->session->userdata('user_id'), 'alamat_wali') ?></li>
                  </ul>
                </div>
              </div>-->
              <div class="clear"></div>
            </div>

          </div>


        </div>
      </div>

      <!--
        Card - Resume
      -->
      <div class="card-inner" id="resume-card">
        <div class="card-wrap">

          <!--
            Resume
          -->
          <div class="content resume">

            <!-- title -->
            <div class="title">List Pembayaran Tahun Ajaran <?= date('Y')?></div>

            <!-- content -->
            <div class="row">

              <!-- experience -->
              <?php if (isset($list)) : ?>
              <?php if (is_array($list)) : ?>
              <?php foreach ($list as $value) : ?>

                  <div class="col col-d-12 col-t-12 col-m-12 border-line-v">
                    <div class="resume-title border-line-h">
                      <div class="icon"><i class="ion ion-disc"></i></div>
                      <div class="name"><?= $value['nama']?></div>
                    </div>
                    <div class="resume-items">
                    </div>
                  </div>
                  <div class="row pricing-items">

              <!-- pricing item -->
              <div class="col col-d-6 col-t-6 col-m-12 border-line-v">
                <?php if (isset($value['list'])) : ?>
                <?php if (is_array($value['list'])) : ?>
                <?php foreach ($value['list'] as $values1) : ?>
                    <div class="pricing-item">
                      <div class="icon"><i class="ion-android-drafts"></i></div>
                      <div class="name">Sudah di Bayar</div>
                      <div class="amount">
                        <span class="dollar">Rp</span>
                        <span class="number"><?= $values1['bayar']?></span>
                        <span class="period">,-</span>
                      </div>
                      <div class="feature-list">
                        <ul>
                          <li><?= $values1['tanggal']?></li>
                        </ul>
                      </div>
                      <div class="lnks">
                      </div>
                    </div>
                  <?php endforeach; ?>
                  <?php endif; ?>
                  <?php endif; ?>
              </div>

              <!-- pricing item -->
              <div class="col col-d-6 col-t-6 col-m-12 border-line-v">
                <div class="pricing-item">
                  <div class="icon"><i class="ion-android-notifications"></i></div>
                  <div class="name">Tunggakan</div>
                  <div class="amount">
                    <span class="dollar">Rp</span>
                    <span class="number"><?= $value['sisa']?></span>
                    <span class="period">,-</span>
                  </div>
                <?php if ($value['status'] == 'Lunas') : ?>
                  <div class="feature-list">
                    <ul>
                      <li><strong>Lunas</strong></li>
                    </ul>
                  </div>
                <?php endif; ?>
                  <div class="lnks">
                  </div>
                </div>
              </div>

              <div class="clear"></div>
            </div>
              <?php endforeach; ?>
              <?php endif; ?>
              <?php endif; ?>
              <div class="clear"></div>
            </div>

          </div>

        </div>
      </div>

    </div>
  </div>
  
  <!--
    jQuery Scripts
  -->
  <script src="<?php echo base_url(); ?>profil/js/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>profil/js/jquery.validate.js"></script>
  <script src="<?php echo base_url(); ?>profil/js/jquery.magnific-popup.js"></script>
  <script src="<?php echo base_url(); ?>profil/js/imagesloaded.pkgd.js"></script>
  <script src="<?php echo base_url(); ?>profil/js/isotope.pkgd.js"></script>
  <script src="<?php echo base_url(); ?>profil/js/jquery.slimscroll.js"></script>
  <script src="<?php echo base_url(); ?>profil/js/owl.carousel.js"></script>
  
  <!--
    Google map api
  -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDz2w7HUaWudHwd7AWQpCL48Qs050WOn9s"></script>
  
  <!--
    Main Scripts
  -->
  <script src="<?php echo base_url(); ?>profil/js/scripts.js"></script>
  
</body>
</html>