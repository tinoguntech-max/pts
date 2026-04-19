
			<!-- page head start-->
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
                    script.src = "https://maps.googleapis.com/maps/api/js?key=AIzaSyBKpyKaJVbZnJyUvrcCIrgyAkkJlDRXbDw&sensor=false&callback=initialize";
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
                            <div class="col-sm-10"><p class="form-control-static"><?php echo $detil[0]['nama']; ?></p></div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Alamat</label>
                            <div class="col-sm-10"><p class="form-control-static"><?php echo $detil[0]['alamat']; ?></p></div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Propinsi</label>
                            <div class="col-sm-10"><p class="form-control-static"><?php echo $provinces[0]['name']; ?></p></div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Kota</label>
                            <div class="col-sm-10"><p class="form-control-static"><?php echo $regencies[0]['name']; ?></p></div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Kecamatan</label>
                            <div class="col-sm-10"><p class="form-control-static"><?php echo $districts[0]['name']; ?></p></div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Desa</label>
                            <div class="col-sm-10"><p class="form-control-static"><?php echo $villages[0]['name']; ?></p></div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Telepon</label>
                            <div class="col-sm-10"><p class="form-control-static"><?php echo $detil[0]['telp']; ?></p></div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Keterangan</label>
                            <div class="col-sm-10"><p class="form-control-static"><?php echo $detil[0]['keterangan']; ?></p></div>
                        </div>
                    </form>
                </div>
            </div>