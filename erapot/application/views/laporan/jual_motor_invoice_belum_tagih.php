
			<!-- page head start-->
            <div class="page-head">
                <h3>
                    <?= HEADER_IDENTITY ?>
                </h3>
                <span class="sub-title"><?php echo $viewoptions['pageinfo']; ?></span>
            </div>
            <!-- page head end-->
			
			<!-- main content -->
			<div id="page-wrapper">
				<div class="container-fluid panel">
					<div class="toro">
					<div id="error-area"></div>
					<br>
                        <div class="row">
                            <div class="col-xs-4">
                                <div class="invoice-logo">
                                    <img src="<?= base_url() ?>/img/invoice-logo.png" alt=""/>
                                </div>
                            </div>
                            <div class="col-xs-8">
                                <h2 class="text-center">Laporan Jual Motor Invoice Belum Tagih</h1>
                            </div>
                        </div>
                        <br>
                        <table class="table table-striped table-hover convert-data-table">
                            <thead>
                            <tr>
                                <th>CABANG</th>
                                <th>CUSTOMER</th>
                                <th>NO SO</th>
                                <th>NO DELIVERY</th>
                                <th>TANGGAL BUAT</th>
								<th>TANGGAL KIRIM</th>
								<th>TIPE</th>
                                <th>WARNA</th>
                                <th>HARGA JUAL</th>
								<th>SISA</th>
                            </tr>
                            </thead>
                            <tbody>
                            	<?php if(isset($detil)) : ?>
                            	<?php if(is_array($detil)) : ?>
                            	<?php foreach ($detil as $key => $value) : ?>
                            	<tr>
                            	<td><?= get_m_cabang($value['id_m_cabang']) ?></td>
                                <td><?= get_customer($value['id_customer']) ?></td>
                                <td><?= $value['so_no'] ?></td>
                            	<td><?= get_jual_motor_delivery_by_order($value['id']) ?></td>
                            	<td><?= $value['tanggal'] ?></td>
                            	<td><?= $value['tanggal_kirim'] ?></td>
                                <td><?= get_m_motor_tipe($value['id_m_motor_tipe']) ?></td>
                                <td><?= get_m_motor_warna($value['id_m_motor_warna']) ?></td>
                            	<td><?= number_format($value['harga_otr'],2) ?></td>
                            	<td><?= number_format($value['bayar'],2) ?></td>
                            	</tr>
                            <?php endforeach; ?>
                        	<?php endif; ?>
                        	<?php endif; ?>
                            </tbody>
                        </table>
					</div>
					<div class="row-fluid wrapper invoice" id="toro-area"></div>
				</div>
			</div>