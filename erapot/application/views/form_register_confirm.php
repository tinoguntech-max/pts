<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <title>Trampil - eAdmin</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/register_form.css"/>
    </head>
    <body>    
	<form class="register">
            <h1>Form Pendaftaran</h1>
            <fieldset class="row1">
		<center>
		<p>
            	<?php 
		if (isset($error_msg)) { echo "<h2>".$error_msg."</h2>"; } 
		else { echo "<h2>Proses pendaftaran sudah selesai, silahkan periksa kembali email anda untuk melihat nama login dan password Anda.</h2>"; }
		?>
		</p>
		</center>
            </fieldset>
	</form>
    </body>
</html>
