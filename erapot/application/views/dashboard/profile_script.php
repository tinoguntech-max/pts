<script>
	function ProfileViewModel() {
		this.nama = ko.observable("<?php if(isset($detil)) echo $detil[0]['nama']; ?>");
		this.alamat = ko.observable("<?php if(isset($detil)) echo $detil[0]['alamat']; ?>");
		this.telp = ko.observable("<?php if(isset($detil)) echo $detil[0]['telp']; ?>");
		this.email = ko.observable("<?php if(isset($detil)) echo $detil[0]['email']; ?>");
		this.pendidikan = ko.observable("<?php if(isset($detil)) echo $detil[0]['id_m_pendidikan_terakhir']; ?>");
		this.agama = ko.observable("<?php if(isset($detil)) echo $detil[0]['id_m_agama']; ?>");
		this.m_golongan_darah = ko.observable("<?php if(isset($detil)) echo $detil[0]['id_m_golongan_darah']; ?>");
		this.m_kewarganegaraan = ko.observable("<?php if(isset($detil)) echo $detil[0]['id_m_kewarganegaraan']; ?>");
		this.m_status_kawin = ko.observable("<?php if(isset($detil)) echo $detil[0]['id_m_status_kawin']; ?>");
		this.fullName = ko.computed( function() {
				return this.nama() + " " + this.alamat();
			}, this
		);
	}
	

	function selected() {
			var brands = $('#m_kewarganegaraan option:selected');
				var selected = [];
				if (brands.length <= 8 && brands.length > 0) {
					$(brands).each(function(index, brand){
						selected.push(["--"+$(this).val()+"--"]);
					});
				}
				else {
					selected.push(["0"]);
				}

				var brands2 = $('#m_status_kawin option:selected');
				var selected2 = [];
				if (brands2.length <= 8 && brands2.length > 0) {
					$(brands2).each(function(index, brand){
						selected2.push(["--"+$(this).val()+"--"]);
					});
				}
				else {
					selected.push(["0"]);
				}

				var brands3 = $('#m_golongan_darah option:selected');
				var selected3 = [];
				if (brands3.length <= 8 && brands3.length > 0) {
					$(brands3).each(function(index, brand){
						selected.push(["--"+$(this).val()+"--"]);
					});
				}
				else {
					selected.push(["0"]);
				}
		}
		
		
	$(document).ready(function() {
			$('#m_kewarganegaraan').select2({
				enableFiltering: true,
				includeSelectAllOption: true,
				enableCaseInsensitiveFiltering: true,
			});
			$('#m_status_kawin').select({
				enableFiltering: true,
				includeSelectAllOption: true,
				enableCaseInsensitiveFiltering: true,
			});
			$('#m_golongan_darah').select2({
				enableFiltering: true,
				includeSelectAllOption: true,
				enableCaseInsensitiveFiltering: true,
			});
	});
	ko.applyBindings(new ProfileViewModel());
</script>