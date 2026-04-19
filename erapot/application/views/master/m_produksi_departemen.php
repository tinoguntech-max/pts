
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
			
			#map {height: 400px;}
			.controls {margin-top: 10px; border: 1px solid transparent; border-radius: 2px 0 0 2px; box-sizing: border-box;
				-moz-box-sizing: border-box; height: 32px; outline: none; box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);}
			#pac-input { background-color: #fff; font-family: Roboto; font-size: 15px; font-weight: 300; margin-left: 12px;
				padding: 0 11px 0 13px; text-overflow: ellipsis; width: 300px;}
			#pac-input:focus {border-color: #4d90fe;}
			.pac-container {font-family: Roboto;}
			#type-selector {color: #fff; background-color: #4d90fe; padding: 5px 11px 0px 11px;}
			#type-selector label {font-family: Roboto; font-size: 13px; font-weight: 300;}
            </style>
			
			<!-- main content -->
            <div id="page-wrapper" class="wrapper">
                <div class="container-fluid panel">
                    <br />
                    <div id="error-area"></div>
                    <form class="form-horizontal" name="hotlineForm" action="<?php echo base_url("m_produksi_departemen"); ?>/<?php echo $viewoptions['action']; if($viewoptions['action'] == 'update') echo '/'.base64_encode($primary); ?>" onsubmit="return validateForm();" method="post">
                        <div class="form-group">
                            <input id="pac-input" class="controls" type="search" placeholder="Search Your Places Here">
                            <div id="type-selector" class="controls radio col-sm-10 col-sm-offset-2">
                                Tipe Pencarian Lokasi : 
                                <label for="changetype-all">
                                    <input type="radio" name="type" id="changetype-all" checked="checked">
                                    All &nbsp;&nbsp;
                                </label>
                                <label for="changetype-establishment">
                                    <input type="radio" name="type" id="changetype-establishment">
                                    Establishments &nbsp;&nbsp;
                                </label>
                                <label for="changetype-address">
                                    <input type="radio" name="type" id="changetype-address">
                                    Addresses &nbsp;&nbsp;
                                </label>
                                <label for="changetype-geocode">
                                    <input type="radio" name="type" id="changetype-geocode">
                                    Geocodes &nbsp;&nbsp;
                                </label>
                            </div>
                            <div class="col-sm-10 col-sm-offset-2" id="map"></div>
                        </div>
                        <div class="form-group">
                            <label for="latitude" class="col-sm-2 control-label">Koordinat</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="latitude" placeholder="Latitude" 
                                    value="<?php if(isset($detil)) echo $detil[0]['latitude']; ?>" disabled>
                                <input type="hidden" id="latitude-hide" name="latitude" 
                                    value="<?php if(isset($detil)) echo $detil[0]['latitude']; ?>">
                            </div>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="longitude" placeholder="Longitude" 
                                    value="<?php if(isset($detil)) echo $detil[0]['longitude']; ?>" disabled>
                                <input type="hidden" id="longitude-hide" name="longitude" 
                                    value="<?php if(isset($detil)) echo $detil[0]['longitude']; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="latitude" class="col-sm-2 control-label">Google Connector</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="placeid" placeholder="ID Google Map" 
                                    value="<?php if(isset($detil)) echo $detil[0]['gplace_id']; ?>" disabled>
                                <input type="hidden" id="placeid-hide" name="gplace_id" 
                                    value="<?php if(isset($detil)) echo $detil[0]['gplace_id']; ?>">
                            </div>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="gtypes" placeholder="Google Place Type" 
                                    value="<?php if(isset($detil)) echo $detil[0]['gplace_types']; ?>" disabled>
                                <input type="hidden" id="gtypes-hide" name="gplace_types" 
                                    value="<?php if(isset($detil)) echo $detil[0]['gplace_types']; ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="nama" class="col-sm-2 control-label">Nama <sup class="text-info">*)</sup></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama" 
                                        value="<?php if(isset($detil)) echo $detil[0]['nama']; ?>">
                                </div>
                        </div>
                        <div class="form-group">
                            <label for="alamat" class="col-sm-2 control-label">Alamat</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat" 
                                        value="<?php if(isset($detil)) echo $detil[0]['alamat']; ?>">
                                </div>
                        </div>
                        <div class="form-group">
                                <label for="provinces" class="col-sm-2 control-label">Propinsi / Kota <sup class="text-info">*)</sup></label>
                                <div class="col-sm-5">
                                    <select class="form-control" id="provinces" name="provinces" placeholder="Propinsi">
                                        <option value='' selected>-- PROPINSI --</option>
                                        <?php if(isset($provinces)) : ?>
                                        <?php if (is_array($provinces)): ?>
                                        <?php foreach ($provinces as $key => $value) : ?>
                                        <?php if(isset($detil)) : if($detil[0]['id_provinces'] == $value['id']) : ?>
                                        <option value="<?= $value['id'] ?>" selected><?= $value['name'] ?></option>
                                        <?php else : ?>
                                        <option value="<?= $value['id'] ?>"><?= $value['name'] ?></option>
                                        <?php endif; ?>
                                        <?php else : ?>
                                        <option value="<?= $value['id'] ?>"><?= $value['name'] ?></option>
                                        <?php endif; ?>
                                        <?php endforeach; ?>
                                        <?php endif; ?>
                                        <?php endif; ?>
                                    </select>
                                </div>
                                <div class="col-sm-5">
                                    <select class="form-control" id="regencies" name="regencies" placeholder="Kabupaten">
                                        <option value='' selected>-- KABUPATEN --</option>
                                        <?php if(isset($detil)) : ?>
                                        <?php if(isset($regencies)) : ?>
                                        <?php if (is_array($regencies)): ?>
                                        <?php foreach ($regencies as $key => $value) : ?>
                                        <?php if($detil[0]['id_regencies'] == $value['id']) : ?>
                                        <option value="<?= $value['id'] ?>" selected><?= $value['name'] ?></option>
                                        <?php else : ?>
                                        <option value="<?= $value['id'] ?>"><?= $value['name'] ?></option>
                                        <?php endif; ?>
                                        <?php endforeach; ?>
                                        <?php endif; ?>
                                        <?php endif; ?>
                                        <?php endif; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="districts" class="col-sm-2 control-label">Kecamatan / Desa</label>
                                <div class="col-sm-5">
                                    <select class="form-control" id="districts" name="districts" placeholder="Kecamatan">
                                        <option selected>-- KECAMATAN --</option>
                                        <?php if(isset($detil)) : ?>
                                        <?php if(isset($districts)) : ?>
                                        <?php if (is_array($districts)): ?>
                                        <?php foreach ($districts as $key => $value) : ?>
                                        <?php if($detil[0]['id_districts'] == $value['id']) : ?>
                                        <option value="<?= $value['id'] ?>" selected><?= $value['name'] ?></option>
                                        <?php else : ?>
                                        <option value="<?= $value['id'] ?>"><?= $value['name'] ?></option>
                                        <?php endif; ?>
                                        <?php endforeach; ?>
                                        <?php endif; ?>
                                        <?php endif; ?>
                                        <?php endif; ?>
                                    </select>
                                </div>
                                <div class="col-sm-5">
                                    <select class="form-control" id="villages" name="villages" placeholder="Desa">
                                        <option selected>-- DESA --</option>
                                        <?php if(isset($detil)) : ?>
                                        <?php if(isset($villages)) : ?>
                                        <?php if (is_array($villages)): ?>
                                        <?php foreach ($villages as $key => $value) : ?>
                                        <?php if($detil[0]['id_villages'] == $value['id']) : ?>
                                        <option value="<?= $value['id'] ?>" selected><?= $value['name'] ?></option>
                                        <?php else : ?>
                                        <option value="<?= $value['id'] ?>"><?= $value['name'] ?></option>
                                        <?php endif; ?>
                                        <?php endforeach; ?>
                                        <?php endif; ?>
                                        <?php endif; ?>
                                        <?php endif; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="no_telp" class="col-sm-2 control-label">No Telepon</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="no_telp" name="no_telp" placeholder="No Telepon" 
                                        value="<?php if(isset($detil)) echo $detil[0]['telp']; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="keterangan" class="col-sm-2 control-label">Keterangan</label>
                                <div class="col-sm-10">
                                    <textarea class="textarea form-control" placeholder="Enter text ..." rows="8" name="keterangan" 
                                        ><?php if(isset($detil)) echo $detil[0]['keterangan']; ?></textarea>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                    </form>
                </div>
            </div>