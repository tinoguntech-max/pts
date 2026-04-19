

<!--jquery-ui-->
<script src="<?= base_url('js/dependencies/rsvp-3.1.0.min.js')?>" type="text/javascript"></script>
<script src="<?= base_url('js/dependencies/sha-256.min.js')?>" type="text/javascript"></script>
<script src="<?= base_url('js/qz-tray.js')?>"></script>
</br>
</br>
</br>
</br>
</br>
</br>
</br>
</br>
<center>Jika Transksi Tidak Di Print Tekan Tombol Di Bawah Ini Untuk Print Ulang</center>
<center><button onclick="location.reload()"> Print Ulang </button></center>
<script>	
	var myVar;
		qz.websocket.connect().then(function() { 
			return qz.printers.find("EPSON TM-U220 Receipt")               // Pass the printer name into the next Promise
		}).then(function(printer) {
			var config = qz.configs.create(printer);       // Create a default config for the found printer
			var data = [   '\x1B' + '\x40',          // init
	   '\x1B' + '\x61' + '\x31', // center align
	   'RIA SUKSES' + '\x0A',
	   'Jl. Tembaan Ruko Galaxi A-23' + '\x0A',
	   'Surabaya' + '\x0A',
	   '031-3532047, 3532043' + '\x0A',
	   '\x1B' + '\x61' + '\x30', // left align
	   'Nota : <?= $detil[0]['inv_no']?>' + '\x0A',
	   '\x1B' + '\x61' + '\x31', // center align
	   '========================================' + '\x0A', 
	   'QTY     Nama Barang     Hrg.Sat    Total' + '\x0A', 
	   '========================================' + '\x0A',
		<?php if (isset($detils)) : $sub = 0; $tambahh = 0;?>
		<?php if (is_array($detils)) : ?>
		<?php foreach ($detils as $toro => $value) : $sub += $value['sub']; 
		$tambahan = $detil[0]['ppn']/$jumlah; $tambahan_sub = $value['jumlah_convert'] * $tambahan; $tambahh += $tambahan?>
			'\x1B' + '\x61' + '\x30', // left align
			<?php if(strlen(get_data('barang', 'id', $value['id_barang'], 'nama')) > 40):?>
				'<?= $value['jumlah_convert']?><?= get_data('satuan', 'id', $value['id_satuan_convert'], 'nama')?>\t<?= substr(get_data('barang', 'id', $value['id_barang'], 'nama'), 0, 32)?>' + '\x0A',
				'\t<?= substr(get_data('barang', 'id', $value['id_barang'], 'nama'), 32)?>' + '\x0A',
			<?php else:?>
				'<?= $value['jumlah_convert']?><?= get_data('satuan', 'id', $value['id_satuan_convert'], 'nama')?>\t<?= get_data('barang', 'id', $value['id_barang'], 'nama')?>' + '\x0A',
			<?php endif; ?>
			'\x1B' + '\x61' + '\x32', // right align
			'<?= number_format(($value['harga']+$tambahan ),2)?>\t<?= number_format(($value['sub']+$tambahan_sub),2)?>' + '\x0A',
		<?php endforeach; ?>
		<?php endif; ?>
		<?php endif; ?>
	   '\x1B' + '\x61' + '\x31', // center align
	   '========================================' + '\x0A',
	   '\x1B' + '\x61' + '\x30', // left align
	   'Total Item : <?php if (isset($detils)) echo count($detils); else echo "0"?>' + '\x0A', 
	   '\x1B' + '\x61' + '\x32', // right align
	   'DPP\t:\t<?php if (isset($detils)) echo number_format($sub,2); else echo "0"?>' + '\x0A', 
	   'PPN(<?= $detil[0]['ppn_p']?>%)\t:\t<?php if (isset($detils)) echo number_format($detil[0]['ppn'],2); else echo "0"?> ' + '\x0A', 
	   'DISC\t:\t    0.00' + '\x0A', 
	   'Sub Total\t:\t<?php if (isset($detils)) echo number_format(($sub + $detil[0]['ppn']) ,2); else echo "0"?>' + '\x0A',  
	   '\x1B' + '\x61' + '\x30', // left align
	   'Tanggal : <?= date('d/m/Y')?> Jam : <?= date('H:i')?>' + '\x0A',
	   'Cust : <?= get_data('customer', 'id', $detil[0]['id_customer'], 'nama')?>' + '\x0A',
	   `Cust Nama : <?= $detil[0]['customer_nama']?>` + '\x0A',
	   'Nama Sales : <?= get_data('users', 'user_id', $detil[0]['created_id'], 'nama_depan')?>' + '\x0A',
	   '\x1B' + '\x61' + '\x31', // center align
	   'Barang Yang Sudah Dibeli TIDAK DAPAT' + '\x0A',
	   'Dikembalikan/Ditukar' + '\x0A',
	   '**Laris manis, cepat kembali lagi ya!' + '\x0A',
	   '\x1B' + '\x61' + '\x30', // left align
	   '\x0A' + '\x0A' + '\x0A' + '\x0A' + '\x0A' + '\x0A' + '\x0A',
	   '\x1B' + '\x69',          // cut paper
	   '\x10' + '\x14' + '\x01' + '\x00' + '\x05',];   // Raw ZPL
		return qz.print(config, data);
		myVar = setTimeout("closePrintView()", 5);
		}).catch(function(e) { 
			console.error(e);		
			alert(e);
		});
		
		function closePrintView() {
				document.location.href ="<?=base_url($main_url)?>";
		}
	

</script>

