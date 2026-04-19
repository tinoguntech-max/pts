
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
                                <h2 class="text-center"><?= $this->lang->line('beli_motor_sisa_bayar_report'); ?></h1>
                            </div>
                        </div>
                        <br>
                        <table class="table table-striped table-hover convert-data-table">
                            <thead>
                            <tr>
                                <th><?= $this->lang->line('beli_motor_terima_bpb_no'); ?></th>
								<th><?= $this->lang->line('beli_motor_invoice_no'); ?></th>
                                <th><?= $this->lang->line('beli_motor_invoice_tanggal'); ?></th>
								<th><?= $this->lang->line('beli_motor_invoice_jth_tempo'); ?></th>
								<th><?= $this->lang->line('beli_motor_invoice_total'); ?></th>
								<th><?= $this->lang->line('beli_motor_inv_sisa'); ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            	<?php if(isset($detil)) : ?>
                            	<?php if(is_array($detil)) : ?>
                            	<?php foreach ($detil as $key => $value) : ?>
                            	<tr>
                            	<td><?= get_beli_motor_terima($value['id_beli_motor_terima']) ?></td>
                            	<td><?= $value['inv_no'] ?></td>
                            	<td><?= $value['tanggal'] ?></td>
                            	<td><?= $value['tanggal_jatuh_tempo'] ?></td>
                            	<td><?= number_format($value['total'],2) ?></td>
                            	<td><?= number_format($value['sisa'],2) ?></td>
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