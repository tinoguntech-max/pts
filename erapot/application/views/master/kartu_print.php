			<!--body wrapper start-->
            <div class="wrapper">

                <div class="panel invoice">
                    <div class="panel-body">
                 

                        <br/>
                        <br/>
                        <br/>
                        <div class="row">
                            <div class="col-md-12">
                            	<div class="row">
                            		<div class="col-md-3">
                            		</div>
                            		<div class="col-md-5">
                            			<img style="position: absolute; 
                            						height: 100%;" 
                            			src="<?= base_url();?>img/bg.jpg">
                            			<img style="position: absolute; 
                            						width: 80px;
													left: 35px;
													top: 10px;
													z-index: 2;" 
										src="<?= base_url();?>img/logosmk.png">
										<span style="position: absolute; 
                            						width: 370px;
													left: 135px;
													top: 15px;
													z-index: 2;
													text-align: center;
													font-family: Arial, Helvetica, sans-serif;
													font-size: 20px;
													font-weight: bold;">
										PEMERINTAH KABUPATEN KEDIRI <br> 
										DINAS PENDIDIKAN</span>
										<span style="position: absolute; 
                            						width: 370px;
													left: 135px;
													top: 58px;
													z-index: 2;
													text-align: center;
													font-family: Arial, Helvetica, sans-serif;
													font-size: 25px;
													font-weight: bold;
													color: blue">
										SMKN 1 KRAS</span>
										<span style="position: absolute; 
                            						width: 400px;
													left: 135px;
													top: 78px;
													z-index: 2;
													text-align: center;
													font-family: Arial, Helvetica, sans-serif;
													font-size: 12px;
													font-style: oblique;">
										Demangan, Setonorejo, Kec. Kras, Kediri, Jawa Timur 64172</span>
                            			<img style="position: absolute; 
                            						width: 90px;
													left: 81px;
													top: 115px;
													z-index: 2;
													box-shadow: 12px 6px 31px grey !important;" 
										src="<?= base_url();?>img/bayu.jpeg">
										<div style="position: absolute; 
                            						width: 535px;
													left: 35px;
													top: 115px;
													z-index: 2;
													font-family: Arial, Helvetica, sans-serif;
													font-size: 15px;
													font-style: oblique;">
													<div class="form-group">
														<div class="col-sm-3 text-right"></div>
														<div class="col-sm-3 "><strong>Nama</strong></div>
														<div class="col-sm-6">
															: <?= $detil[0]['nama']?>
														</div>
													</div>
													<div class="form-group">
														<div class="col-sm-3 text-right"></div>
														<div class="col-sm-3 "><strong>NIS</strong></div>
														<div class="col-sm-6">
															: <?= $detil[0]['nik']?>
														</div>
													</div>
													<div class="form-group">
														<div class="col-sm-3 text-right"></div>
														<div class="col-sm-3 "><strong>Jenis Kelamin</strong></div>
														<div class="col-sm-6">
															: Laki - Laki
														</div>
													</div>
													<div class="form-group">
														<div class="col-sm-3 text-right"></div>
														<div class="col-sm-3 "><strong>Alamat</strong></div>
														<div class="col-sm-6">
															: <?= $detil[0]['alamat']?>
														</div>
													</div>
										 </div>
										<span style="position: absolute; 
                            						width: 350px;
													left: -25px;
													top: 310px;
													z-index: 2;
													text-align: center;
													font-family: Arial, Helvetica, sans-serif;
													font-size: 13px;
													font-weight: bold;
													font-style: oblique;">
										Kartu ini berlaku selama menjadi Siswa</span>
										<div style="position: absolute; 
                            						width: 300px;
													left: 300px;
													top: 245px;
													z-index: 2;
													font-family: Arial, Helvetica, sans-serif;
													font-size: 15px;
													text-align: center;">													
														<strong>Kepala Sekolah</strong>
													<img style="position: absolute; width: 90px; left: 100px;top: 5px;z-index: -1;"
													src="<?= base_url();?>img/ttd.jpg">
													<br>
													<br>
													<br>
													<strong><u>Bayu Nur Roziqin</u></strong><br>
													<span style="
													display:block; 
													margin-top:-4px;
													font-family: Arial, Helvetica, sans-serif;
													font-size: 10px;
													text-align: center;"
													>NIP. 19860926  201505  1  001</span>
										</div>
														

                            			<br>
                            			<br>
                            			<br>
                            			<br>
                            			<br>
                            			<br>
                            			<br>
                            			<br>
                            			<br>
                            			<br>
                            			<br>
                            			<br>
                            			<br>
                            			<br>
                            			<br>
                            			<br>
                            			<br>
                            		</div>
                            		<div class="col-md-4">
                            		</div>
                            	</div>

                                <div class="pull-left">
                                    <a class="btn btn-danger" onclick="javascript:window.print();"><i class="fa fa-print"></i> Print</a>
									<a class="btn btn-success" href="<?= base_url('beli_minta/print_faktur/'.base64_encode($detil[0]['id'])) ?>">
										<i class="fa fa-file-excel-o"></i> Excel
									</a>
                                </div>
                                <div class="pull-right">
                                    <a href="<?= base_url('pos_beli_terima_manage') ?>" class="btn btn-success"><i class="fa fa-reply"></i> Kembali Menu Utama</a>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>

            </div>
            <!--body wrapper end-->
		