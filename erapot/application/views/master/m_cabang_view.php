
						 <div class="page-head">
                <h3>
                    <?= HEADER_IDENTITY ?>
                </h3>
                <span class="sub-title"><?php echo $viewoptions['pageinfo']; ?></span>
            </div>
            <!-- page head end-->
			
			<style type="text/css">
			.border { border:#5e5e5e 1px solid; }
			.text-ctr { text-align: center; }
			.space-top10 { margin-top: 10px; }
			.space-top5 { margin-top: 5px; }
			#map_canvas {height: 400px;}
            </style>

			<script>
                function initialize() {
                    var sites = ["<?= $detil[0]['latitude'] ?>","<?= $detil[0]['longitude'] ?>"];
                    var centerMap = new google.maps.LatLng("<?= $detil[0]['latitude'] ?>","<?= $detil[0]['longitude'] ?>");
                    var myOptions = {
                    zoom: 13,
                    center: centerMap,
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                    }
                    var map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
                    setMarkers(map, sites);
                }
                function setMarkers(map, markers) {
                    var sites = markers;
                    var siteLatLng = new google.maps.LatLng("<?= $detil[0]['latitude'] ?>","<?= $detil[0]['longitude'] ?>");
                    var marker = new google.maps.Marker({
                        position: siteLatLng,
                        map: map
                    });
                }

                function loadScript() {
                    var script = document.createElement("script");
                    script.type = "text/javascript";
                    script.src = "http://maps.google.com/maps/api/js?AIzaSyBKpyKaJVbZnJyUvrcCIrgyAkkJlDRXbDwsensor=false&callback=initialize";
                    document.body.appendChild(script);
                }
                
                window.onload = loadScript;
            </script>
			
			<!-- main content -->
		   	<div id="page-wrapper" class="wrapper">
            	<div class="container-fluid panel">
                    <form class="form-horizontal">
                        <div id="error-area"></div>
                        <div class="col-sm-10 col-sm-offset-2" id="map_canvas"></div>
						
						<div class="form-group">
                            <label class="col-sm-2 control-label">Nama</label>
                            <div class="col-sm-10">
                            <p class="form-control-static"><?php echo $detil[0]['nama']; ?></p>
                            </div>
                        </div>
						<div class="form-group">
							<label for="users" class="col-sm-2 control-label">Nama Pemimpin</label>
							<div class="col-sm-10">
								<p class="form-control-static"><?php echo get_data('users','user_id',$detil[0]['id_users'],'nama'); ?></p>
							</div>
						</div>
						<div class="form-group">
							<label for="alamat" class="col-sm-2 control-label">Alamat</label>
							<div class="col-sm-10">
								<p class="form-control-static"><?php echo $detil[0]['alamat']; ?> </p>
							</div>
						</div>
						<div class="form-group">
							<label for="provinces" class="col-sm-2 control-label">Propinsi / Kota </label>
							<div class="col-sm-10">
							<p class="form-control-static"><?php echo get_data('provinces','id',$detil[0]['id_provinces'],'name'); ?> </p>
							</div>
						</div>
						<div class="form-group">
							<label for="regencies" class="col-sm-2 control-label">Kabupaten </label>
							<div class="col-sm-10">
							<p class="form-control-static"><?php echo get_data('regencies','id',$detil[0]['id_regencies'],'name'); ?> </p>
							</div>
						</div>
						<div class="form-group">
							<label for="districts" class="col-sm-2 control-label">Kecamatan </label>
							<div class="col-sm-10">
							<p class="form-control-static"><?php echo get_data('districts','id',$detil[0]['id_districts'],'name'); ?> </p>
							</div>
						</div>
						<div class="form-group">
							<label for="villages" class="col-sm-2 control-label">Desa </label>
							<div class="col-sm-10">
							<p class="form-control-static"><?php echo get_data('villages','id',$detil[0]['id_villages'],'name'); ?> </p>
							</div>
						</div>
						<div class="form-group">
							<label for="no_telp" class="col-sm-2 control-label">No Telepon</label>
							<div class="col-sm-10">
								<p class="form-control-static"><?php echo $detil[0]['no_telp']; ?> </p>
							</div>
						</div>
						<div class="form-group">
							<label for="website" class="col-sm-2 control-label">Website</label>
							<div class="col-sm-10">
								<p class="form-control-static"><?php echo $detil[0]['website']; ?> </p>
							</div>
						</div>
						<div class="form-group">
							<label for="gurl" class="col-sm-2 control-label">Google+ URL</label>
							<div class="col-sm-10">
								<p class="form-control-static"><?php echo $detil[0]['gurl']; ?> </p>
							</div>
						</div>
						<div class="form-group">
							<label for="keterangan" class="col-sm-2 control-label">Keterangan</label>
							<div class="col-sm-10">
								<p class="form-control-static"><?php echo $detil[0]['keterangan']; ?> </p>
							</div>
						</div>
						
						<!--<div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                      	        <button type="submit" class="btn btn-primary">Back</button>
                            </div>
                        </div>-->
                    </form>
                </div>
			</div>
