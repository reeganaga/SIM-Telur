<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Pemesanan Telur</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bootstrap/css/font-awesome-4.6.3/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bootstrap/css/ionicons-2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<?php 
require_once __DIR__ . '/vendor/autoload.php';

// Register API keys at https://www.google.com/recaptcha/admin
require_once 'config_recapcha.php';
// reCAPTCHA supported 40+ languages listed here: https://developers.google.com/recaptcha/docs/language
$lang = 'id';
if(isset($_POST['g-recaptcha-response'])):
    // The POST data here is unfiltered because this is an example.
    // In production, *always* sanitise and validate your input'
  /*  ?>
    <h2><tt>POST</tt> data</h2>
    <tt><pre><?php var_export($_POST); ?></pre></tt>
    <?php*/
// If the form submission includes the "g-captcha-response" field
// Create an instance of the service using your secret
    $recaptcha = new \ReCaptcha\ReCaptcha($secret);


    $resp = $recaptcha->verify($_POST['g-recaptcha-response'], $_SERVER['REMOTE_ADDR']);


    if ($resp->isSuccess()):
		require_once 'koneksi.php';      
		extract($_POST);
		  $cari_kd=mysql_query("select max(id_pemesanan) as kode from pemesanan");
		    $tm_cari=mysql_fetch_array($cari_kd);
		    $kode=substr($tm_cari['kode'],4,10); 
		    $tambah=$kode+1;
		    if($tambah<10)
		    {
		        $idpemesanan="PMSN00000".$tambah;

		    }
		    else
		    {
		        $idpemesanan="PMSN0000".$tambah;
		    }		
		$tgl = date('Y-m-d');
		$query=mysql_query("insert into pemesanan values ('$idpemesanan','$nama_pemesan','$alamat_pemesan','$tgl','$jumlah_pemesanan','n','n') ");
		if ($query) {
		# code...
			header('location: order.php?sukses='.base64_encode('Data Pemesanan Berhasil di Simpan, data akan segera kami proses'));
			exit(); 
		}
		else
		{
			header('location: order.php?error='.base64_encode('Data Pemesanan Gagal di Simpan'));
			exit();
		}
    else:
    	header('location: order.php?error='.base64_encode('Silahkan Ulangi Lagi bagian Chapctha'));
		exit();
	endif;
endif; 
?>

<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <b>Pemesanan Telur</b>
  </div>
  <!-- /.login-logo -->
			<div class="alert alert-warning">
				<p><i class="fa fa-exclamation"></i>  Kami menyediakan fasilitas untuk melakukan pemesanan pada form dibawah, Silahkan memesan sesuai dengan kebutuhan Anda. Terimakasih</p>
			</div>
  <div class="login-box-body">
    <p class="login-box-msg"><?php
    /* handle error */
    if (isset($_GET['error'])) : ?>
        <div class="alert alert-danger alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <?=base64_decode($_GET['error']);?>
        </div>
    <?php elseif(isset($_GET['sukses'])): ?>
    	<div class="alert alert-success alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <?=base64_decode($_GET['sukses']);?>
        </div>
    <?php endif;?></p>
    <form action="" method="post">
    	<div class="input-group">
    	</div>
		<div class="form-group has-feedback">
			<input type="text" class="form-control" placeholder="Nama Anda" name="nama_pemesan">
			<span class="glyphicon glyphicon-user form-control-feedback"></span>
		</div>
		<div class="form-group has-feedback">
			<textarea class="form-control" placeholder="Alamat Lengkap Anda" name="alamat_pemesan"></textarea>
			<span class="glyphicon glyphicon-home form-control-feedback"></span>
		</div>
		<small><i>*Satuan Jumlah = peti</i></small>
		<div class="form-group has-feedback">
			<input type="text" class="form-control" placeholder="Jumlah" name="jumlah_pemesanan">
			<span class="glyphicon glyphicon-shopping-cart form-control-feedback"></span>
		</div>

      	<div class="g-recaptcha" data-sitekey="<?php echo $siteKey; ?>"></div>
	    <script type="text/javascript"
	            src="https://www.google.com/recaptcha/api.js?hl=<?php echo $lang; ?>">
	    </script>
	    <br>
      <div class="row">
        <div class="col-xs-12">
          <button type="submit" class="btn btn-primary btn-block btn-flat" name="login">Pesan</button>
          <a href="login.php" class="btn btn-success btn-block btn-flat">Login Area</a>
        </div>
        <!-- /.col -->
      </div>
    </form>
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>
