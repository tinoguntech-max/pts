<script>

		Number.prototype.formatMoney = function(c, d, t){
var n = this, 
    c = isNaN(c = Math.abs(c)) ? 2 : c, 
    d = d == undefined ? "." : d, 
    t = t == undefined ? "," : t, 
    s = n < 0 ? "-" : "", 
    i = parseInt(n = Math.abs(+n || 0).toFixed(c)) + "", 
    j = (j = i.length) > 3 ? j % 3 : 0;
   return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
 };
 
		function validateForm() {
			var check = true;
			var error = '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><i class="fa fa-info-circle"></i>  <strong>ERROR!</strong><br />';
			// check apakah tanggal sudah terisi
			if ($("#nama").val()=='') {
				check = false;
				error += 'Anda harus mengisi nama lokasi<br/>';
			}
			// check apakah customer terisi
			if ($("#provinces").val()=='') {
				check = false;
				error += 'Anda harus memilih propinsi<br/>';
			}
			error += '</div>';
			if (check == false) $("#error-area").html(error);
			return check;
		}
		
		$(function() {
			$("#provinces").change(function() {
				var dats = 'id='+ $(this).val();
				$.ajax({
					type: "POST",
					url: "<?= base_url('regencies/dependent_regencies') ?>",
					data: dats,
					cache: false,
					success: function(html) {
						$("#regencies").html(html);
						$('#regencies').prop('disabled',false);
						$('#districts').prop('disabled',true);
						$('#villages').prop('disabled',true);
					}
				});
			});
			
			$("#regencies").change(function() {
				var dats = 'id='+ $(this).val();
				$.ajax({
					type: "POST",
					url: "<?= base_url('districts/dependent_districts') ?>",
					data: dats,
					cache: false,
					success: function(html) {
						$("#districts").html(html);
						$('#districts').prop('disabled',false);
						$('#villages').prop('disabled',true);
					}
				});
			});
			
			$("#districts").change(function() {
				var dats = 'id='+ $(this).val();
				$.ajax({
					type: "POST",
					url: "<?= base_url('villages/dependent_villages') ?>",
					data: dats,
					cache: false,
					success: function(html) {
						$("#villages").html(html);
						$('#villages').prop('disabled',false);
					}
				});
			});
		
			$("#tanggal").datepicker({
				dateFormat : "yy-mm-dd",
				showButtonPanel : true
			});
		});
		
	function initAutocomplete() {
		var map = new google.maps.Map(document.getElementById('map'), {
			<?php if(isset($detil)) : ?>
			<?php if($detil[0]['latitude'] != 0 || $detil[0]['longitude'] != 0) : ?>
			center: {lat: <?= $detil[0]['latitude'] ?>, lng: <?= $detil[0]['longitude'] ?>},
			<?php else : ?>
			center: {lat: -7.315151896006033, lng: 112.6662003993988},
			<?php endif; ?>
			<?php else : ?>
			center: {lat: -7.315151896006033, lng: 112.6662003993988},
			<?php endif; ?>
			zoom: 15,
			mapTypeId: google.maps.MapTypeId.ROADMAP
		});
		
		// Create the search box and link it to the UI element.
		var input = document.getElementById('pac-input');
		var types = document.getElementById('type-selector');
		map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
		var autocomplete = new google.maps.places.Autocomplete(input);
		autocomplete.bindTo('bounds', map);
		
		var infowindow = new google.maps.InfoWindow();
		var marker = new google.maps.Marker({
			map: map,
			anchorPoint: new google.maps.Point(0, -29)
		});
		
		//if user click a place
		//keep a reference to the original setPosition-function
		var fx = google.maps.InfoWindow.prototype.setPosition;
		//override the built-in setPosition-method
		google.maps.InfoWindow.prototype.setPosition = function () {
			if (this.logAsInternal) {
				google.maps.event.addListenerOnce(this, 'map_changed',function () {
					var map = this.getMap();
					//the infoWindow will be opened, usually after a click on a POI
					if (map) {
						//trigger the click
						google.maps.event.trigger(map, 'click', {latLng: this.getPosition()});
					}
				});
			}
			//call the original setPosition-method
			fx.apply(this, arguments);
		};
		
		// get long lat value in the click area
		google.maps.event.addListener(map, "click", function(event) {
			var lat = event.latLng.lat();
			var lng = event.latLng.lng();
			$("#latitude").val(lat);
			$("#latitude-hide").val(lat);
			$("#longitude").val(lng);
			$("#longitude-hide").val(lng);
			$('#placeid').val('');
			$('#placeid-hide').val('');
			$('#gtypes').val('');
			$('#gtypes-hide').val('');
		});

		autocomplete.addListener('place_changed', function() {
			infowindow.close();
			marker.setVisible(false);
			var place = autocomplete.getPlace();
			if (!place.geometry) {
				window.alert("This place contains no geometry");
				return;
			}

			// If the place has a geometry, then present it on a map.
			if (place.geometry.viewport) {
				map.fitBounds(place.geometry.viewport);
			} else {
				map.setCenter(place.geometry.location);
				map.setZoom(17);  // Why 17? Because it looks good.
			}
			marker.setIcon(/** @type {google.maps.Icon} */({
				url: place.icon,
				size: new google.maps.Size(71, 71),
				origin: new google.maps.Point(0, 0),
				anchor: new google.maps.Point(17, 34),
				scaledSize: new google.maps.Size(35, 35)
			}));
			marker.setPosition(place.geometry.location);
			marker.setVisible(true);

			var address = '';
			if (place.address_components) {
				address = [
					(place.address_components[0] && place.address_components[0].short_name || ''),
					(place.address_components[1] && place.address_components[1].short_name || ''),
					(place.address_components[2] && place.address_components[2].short_name || '')
				].join(' ');
			}
			
			// ambil data place
			$("#latitude").val(place.geometry.location.lat());
			$("#latitude-hide").val(place.geometry.location.lat());
			$("#longitude").val(place.geometry.location.lng());
			$("#longitude-hide").val(place.geometry.location.lng());
			$('#placeid').val(place.place_id);
			$('#placeid-hide').val(place.place_id);
			$('#gtypes').val(place.types);
			$('#gtypes-hide').val(place.types);
			
			$('#nama').val(place.name);
			$('#alamat').val(place.formatted_address);
			$('#no_telp').val(place.formatted_phone_number);
			$('#website').val(place.website);
			$('#gurl').val(place.url);

			infowindow.setContent('<div><strong>' + place.name + '</strong><br>' + address);
			infowindow.open(map, marker);
		});

		// Sets a listener on a radio button to change the filter type on Places Autocomplete.
		function setupClickListener(id, types) {
			var radioButton = document.getElementById(id);
			radioButton.addEventListener('click', function() {
				autocomplete.setTypes(types);
			});
		}

		setupClickListener('changetype-all', []);
		setupClickListener('changetype-address', ['address']);
		setupClickListener('changetype-establishment', ['establishment']);
		setupClickListener('changetype-geocode', ['geocode']);
	}
	</script>

	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBKpyKaJVbZnJyUvrcCIrgyAkkJlDRXbDw&libraries=places&callback=initAutocomplete" async defer></script>
	
	<script>
		$('.textarea').wysihtml5();
		$('#activities').multiselect({maxHeight:200, numberDisplayed:5, buttonWidth:'100%'});
		$(window).keydown(function(event){
			if(event.keyCode == 13) {
				event.preventDefault();
				return false;
			}
		});
		
		<?php if(isset($detil)) : ?>
		<?php if($detils != 0) : echo "$('#activities').multiselect('select', ["; ?>
		<?php foreach ($detils as $key => $value) : echo "'".$value['id_activities']."',"; ?>
		<?php endforeach; echo "]);"; ?>
		<?php endif; ?>
		<?php endif; ?>

		<?php if($viewoptions['action'] == 'add') : ?>
		$('#regencies').prop('disabled',true);
		$('#districts').prop('disabled',true);
		$('#villages').prop('disabled',true);

		<?php elseif($viewoptions['action'] == 'update') : ?>
		<?php if($detil[0]['id_villages'] != 0) : ?>
		$('#regencies').prop('disabled',false); $('#districts').prop('disabled',false); $('#villages').prop('disabled',false);

		<?php elseif($detil[0]['id_districts'] != 0) : ?>
		$('#regencies').prop('disabled',false); $('#districts').prop('disabled',false); $('#villages').prop('disabled',false);

		<?php elseif($detil[0]['id_regencies'] != 0) : ?>
		$('#regencies').prop('disabled',false); $('#districts').prop('disabled',false); $('#villages').prop('disabled',true);

		<?php elseif($detil[0]['id_provinces'] != 0) : ?>
		$('#regencies').prop('disabled',false); $('#districts').prop('disabled',true); $('#villages').prop('disabled',true);
		<?php else : ?>
		$('#regencies').prop('disabled',true); $('#districts').prop('disabled',true); $('#villages').prop('disabled',true);
		<?php endif; ?>
		<?php endif; ?>

	</script>