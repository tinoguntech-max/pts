<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <title>Trampil - eAdmin</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/register_form.css"/>
    </head>
    <body>    
        <form action="<?php echo base_url(); ?>register/addnew" method="post" class="register">
            <h1>Form Pendaftaran</h1>
            <fieldset class="row1">
		<p>
	        <?php if(validation_errors() != false) { echo validation_errors(); } ?>
            	<?php if (isset($info_msg)) { echo $info_msg; } ?>
		</p>
            </fieldset>
            <fieldset class="row2">
                <legend>Data Pribadi
                </legend>
                <p>
                    <label>Nama Depan
                    </label>
                    <input type="text" name="nama_depan" class="long" />
		</p>
		<p>
                    <label>Nama Belakang
                    </label>
                    <input type="text" name="nama_belakang" class="long" />
                </p>
                <p>
                    <label>Jenis Kelamin
                    </label>
                    <input type="radio" name="jenis_kelamin" value="L"/>
                    <label class="gender">Laki laki</label>
                    <input type="radio" name="jenis_kelamin" value="P"/>
                    <label class="gender">Perempuan</label>
                </p>
                <p>
                    <label>Tempat Lahir
                    </label>
                    <input type="text" name="tempat_lahir" class="long"/>
                </p>
                <p>
                    <label>Tanggal Lahir
                    </label>
                    <select class="date" name="tgl_lahir">
                        <option value="1">01
                        </option>
                        <option value="2">02
                        </option>
                        <option value="3">03
                        </option>
                        <option value="4">04
                        </option>
                        <option value="5">05
                        </option>
                        <option value="6">06
                        </option>
                        <option value="7">07
                        </option>
                        <option value="8">08
                        </option>
                        <option value="9">09
                        </option>
                        <option value="10">10
                        </option>
                        <option value="11">11
                        </option>
                        <option value="12">12
                        </option>
                        <option value="13">13
                        </option>
                        <option value="14">14
                        </option>
                        <option value="15">15
                        </option>
                        <option value="16">16
                        </option>
                        <option value="17">17
                        </option>
                        <option value="18">18
                        </option>
                        <option value="19">19
                        </option>
                        <option value="20">20
                        </option>
                        <option value="21">21
                        </option>
                        <option value="22">22
                        </option>
                        <option value="23">23
                        </option>
                        <option value="24">24
                        </option>
                        <option value="25">25
                        </option>
                        <option value="26">26
                        </option>
                        <option value="27">27
                        </option>
                        <option value="28">28
                        </option>
                        <option value="29">29
                        </option>
                        <option value="30">30
                        </option>
                        <option value="31">31
                        </option>
                    </select>
                    <select name="bln_lahir">
                        <option value="1">January
                        </option>
                        <option value="2">February
                        </option>
                        <option value="3">March
                        </option>
                        <option value="4">April
                        </option>
                        <option value="5">May
                        </option>
                        <option value="6">June
                        </option>
                        <option value="7">July
                        </option>
                        <option value="8">August
                        </option>
                        <option value="9">September
                        </option>
                        <option value="10">October
                        </option>
                        <option value="11">November
                        </option>
                        <option value="12">December
                        </option>
                    </select>
                    <input name="thn_lahir" class="year" type="text" size="4" maxlength="4"/>e.g 1980
                </p>
                <p>
                    <label>Alamat
                    </label>
                    <input name="alamat" class="long" type="text"/>
                </p>
                <p>
                    <label>No Telp
                    </label>
                    <input name="telp" class="long" type="text"/>
                </p>
		<p>
		    <label>Email
                    </label>
                    <input type="text" name="email" />
		</p>
            </fieldset>
            <fieldset class="row3">
                <legend>Data Institusi
                </legend>
                <p>
                    <label>Nama Institusi
                    </label>
                    <input name="nama_institusi" class="long" type="text"/>
                </p>
                <p>
                    <label>Alamat Institusi
                    </label>
                    <input name="alamat_institusi" class="long" type="text"/>
                </p>
                <p>
                    <label>No Telp Institusi
                    </label>
                    <input name="telp_institusi" class="long" type="text"/>
                </p>

                <div class="infobox"><h4>Informasi</h4>
                    <p>Semua form wajib diisi. Pastikan email anda aktif, karena semua informasi ini akan dikirim melalui email anda untuk bisa melanjukan proses pendaftaran.</p>
                </div>
            </fieldset>
            <fieldset class="row4">
                <legend>Syarat dan Ketentuan
                </legend>
                <p class="agreement">
                    <input name="syarat_dan_ketentuan" type="checkbox" value=""/>
                    <label>Saya menyetujui <a href="#">Syarat dan Ketentuan</a> yang berlaku</label>
                </p>
            </fieldset>
            <div><button name="btsubmit" type="submit" value="submit" class="button">Daftar &raquo;</button></div>
        </form>
    </body>
</html>
