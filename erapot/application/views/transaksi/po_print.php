<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta name="author" content="Andy Febrico Bintoro" />
		<title>AHASS - eAdmin</title>

		<!-- Bootstrap framework -->
		<link rel="stylesheet" media="all" href="<?php echo base_url("bootstrap/css/bootstrap.min.css"); ?>" />
		<link rel="stylesheet" href="<?php echo base_url("bootstrap/css/bootstrap-responsive.min.css"); ?>" />
		<!-- jQuery UI -->
		<link rel="stylesheet" href="<?php echo base_url("css/jquery-ui.css"); ?>" />
		<!-- gebo blue theme-->
		<link rel="stylesheet" href="<?php echo base_url("css/blue.css"); ?>" id="link_theme" />
		<!-- breadcrumbs-->
		<link rel="stylesheet" href="<?php echo base_url("lib/jBreadcrumbs/css/BreadCrumb.css"); ?>" />
		<!-- FontAwesome 4.2.0 -->
		<link rel="stylesheet" href="<?php echo base_url("font-awesome/css/font-awesome.min.css"); ?>" />
		
		<link rel="stylesheet" href="<?php echo base_url("css/multi-select.css"); ?>" />

		<!--[if lte IE 8]>
			<link rel="stylesheet" href="<?php echo base_url(); ?>css/ie.css" />
		<![endif]-->
			
		<!--[if lt IE 9]>
			<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->

		<script>
			document.getElementsByTagName('html')[0].className = 'js';
		</script>
		<script src="<?php echo base_url("js/jquery.min.js"); ?>"></script>
		<script src="<?php echo base_url("js/jquery-ui.js"); ?>"></script>
		<script src="<?php echo base_url("js/jquery.multi-select.js"); ?>"></script>
		<script src="<?php echo base_url("js/jquery.quicksearch.js"); ?>"></script>
	</head>
	<body>
		<div id="maincontainer" class="clearfix">
			<!-- main content -->
			<div id="contentwrapper">
				<div class="main_content">
					
					<table width="100%"><tr>
						<td width="40%">
							<?= $no_ahass ?><br/><br/>
							<strong>HOTLINE ORDER</strong>
						</td>
						<td width="20%">
							<h3>HONDA</h3>
						</td>
						<td width="40%" class="text-center" style="margin-bottom:0;">
							<address style="margin-bottom:0;">
								<strong><?= $nama_perusahaan ?></strong><br/>
								<?= $alamat_perusahaan ?><br/>
								Telp: <?= $telp_perusahaan ?>
							</address>
						</td>
					</tr></table>
					
					<hr style="margin:0;"/>
					
					<table width="100%"><tr>
						<td width="50%">
							<?php if($customer!=0) { ?>
							<table style="margin-left:50px;">
								<tr>
									<td style="text-align:right;"><strong>Pelanggan</strong></td>
									<td> &nbsp;&nbsp;<?php echo $customer[0]['nama']; ?></td>
								</tr>
								<tr>
									<td style="text-align:right;"><strong>Alamat</strong></td>
									<td> &nbsp;&nbsp;<?php if ($customer[0]['alamat']!=null) echo $customer[0]['alamat']; else echo '-'; ?></td>
								</tr>
								<tr>
									<td style="text-align:right;"><strong>Telp</strong></td>
									<td> &nbsp;&nbsp;<?php if ($customer[0]['telp_rumah']!='') echo $customer[0]['telp_rumah']; else echo '-'; ?></td>
								</tr>
							</table>
							<?php } ?>
							<br />
							<strong>No Faktur : </strong><?php echo $hotline[0]['no_faktur']; ?><br/>
							<strong>Tanggal : </strong><?php echo $hotline[0]['tanggal']; ?>
						</td>
						<td width="50%">
							<?php if($customer_motor!=0) { ?>
							<table style="margin-left:50px;">
								<tr>
									<td style="text-align:right;"><strong>Tipe Motor</strong></td>
									<td> &nbsp;&nbsp;<?php echo get_merk_motor($customer_motor[0]['tipe_motor']); ?></td>
								</tr>
								<tr>
									<td style="text-align:right;"><strong>Nama Pemilik</strong></td>
									<td> &nbsp;&nbsp;<?php if ($customer_motor[0]['nama_pemilik']!=null) echo $customer_motor[0]['nama_pemilik']; else echo '-'; ?></td>
								</tr>
								<tr>
									<td style="text-align:right;"><strong>No Polisi</strong></td>
									<td> &nbsp;&nbsp;<?php if ($customer_motor[0]['no_polisi']!='') echo $customer_motor[0]['no_polisi']; else echo '-'; ?></td>
								</tr>
								<tr>
									<td style="text-align:right;"><strong>No Rangka</strong></td>
									<td> &nbsp;&nbsp;<?php if ($customer_motor[0]['no_rangka']!='') echo $customer_motor[0]['no_rangka']; else echo '-'; ?></td>
								</tr>
								<tr>
									<td style="text-align:right;"><strong>No Mesin</strong></td>
									<td> &nbsp;&nbsp;<?php if ($customer_motor[0]['no_mesin']!='') echo $customer_motor[0]['no_mesin']; else echo '-'; ?></td>
								</tr>
								<tr>
									<td style="text-align:right;"><strong>Tahun Perakitan</strong></td>
									<td> &nbsp;&nbsp;<?php if ($customer_motor[0]['tahun_perakitan']!='') echo $customer_motor[0]['tahun_perakitan']; else echo '-'; ?></td>
								</tr>
							</table>
							<?php } ?>
						</td>
					</tr></table>
					<hr style="margin:5px;"/>
					<div class="row-fluid">
						<div class="span12">
								<table class="table table-striped table-hover" id="toro">
									<thead>
										<tr>
											<th>No</th>
											<th>Kode</th>
											<th>Nama</th>
											<th>Jumlah</th>
											<th>Harga</th>
											<th>Diskon</th>
											<th>Sub Total</th>
										</tr>
									</thead>
									<tbody id="toro-body">
										<?php if(isset($barang) && $barang!=0) { $i=0; $total=0; $diskon=0; foreach($barang as $toro) { ?>
										<tr>
											<td><?php $i++; echo $i; ?></td>
											<td><?php echo get_uac($toro['barang']); ?></td>
											<td><?php echo get_barang($toro['barang']); ?></td>
											<td><?php echo $toro['kuantitas']; ?></td>
											<td><?php echo number_format($toro['harga'],2); ?></td>
											<td><?php echo number_format($toro['diskon'],2); ?></td>
											<td><?php echo number_format($toro['kuantitas']*$toro['harga']-$toro['diskon'],2); ?></td>
										</tr>
										<?php
											$total += $toro['kuantitas']*$toro['harga'];
											$diskon += $toro['diskon'];
										?>
										<?php }} ?>
									</tbody>
								</table>
						</div>
					</div>
					<table width="100%"><tr>
						<td width="30%" class="text-center">
							<br />
							<br />
							<br />
							<?php if($hotline!=0) echo get_customer($hotline[0]['customer']); ?>
							<hr style="margin:0;" />
							PELANGGAN
						</td>
						<td width="30%" class="text-center">
							<br />
							<br />
							<br />
							<?php if($hotline!=0) echo get_users($user); ?>
							<hr style="margin:0;" />
							KASIR
						</td>
						<td width="40%">
							<table style="margin-left:50px;">
								<tr>
									<td style="text-align:right;"><strong>Total</strong></td>
									<td> &nbsp;&nbsp;<?php echo number_format($total,2); ?></td>
								</tr>
								<tr>
									<td style="text-align:right;"><strong>Diskon</strong></td>
									<td> &nbsp;&nbsp;<?php echo number_format($diskon,2); ?></td>
								</tr>
								<tr style="border-top:1px solid black;">
									<td style="text-align:right;"><strong>Pembayaran</strong></td>
									<td> &nbsp;&nbsp;<?php echo number_format($total-$diskon,2); ?></td>
								</tr>
								<tr>
									<td style="text-align:right;"><strong>Bayar di Muka</strong></td>
									<td> &nbsp;&nbsp;<?php echo number_format($hotline[0]['bayar'],2); ?></td>
								</tr>
								<tr style="border-top:1px solid black;">
									<td style="text-align:right;"><strong>Sisa Pembayaran</strong></td>
									<td> &nbsp;&nbsp;<?php echo number_format($total-$diskon-$hotline[0]['bayar'],2); ?></td>
								</tr>
							</dl>
						</td>
					</tr></table>
				</div>
			</div>
		</div>