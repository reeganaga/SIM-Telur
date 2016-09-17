<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Form Data User</title>
</head>

<body>
<?php
include "../koneksi.php";
extract($_GET);
// query untuk menampilkan mahasiswa berdasarkan id_user
$query=mysql_query("select * from user where id_user ='$id' " );
$data=mysql_fetch_array($query);
  $iduser = $data['id_user'];
  $nama = $data['nama_user'];
  $username = $data['username'];
  $password = $data['password'];
  $lev = $data['level'];
  $aksi="edit";
?>

<div class="box box-info">
  <div class="box-header">
    <i class="fa fa-envelope"></i>
    <h3 class="box-title">Data User</h3>
              <!-- tools box -->
  </div>
  <div class="box-body">
    <form action="proses-data-user.php" method="post">
    <input type="hidden" value="<?php echo $iduser; ?>" name="id">
    <div class="form-group">
      <label>Nama</label>
      <input type="text" id="nama" class="form-control input-sm" name="nama" maxlength="35" value="<?php echo $nama ?>" required>
    </div>
    <div class="form-group">
      <label>Username</label>
      <input type="text" id="username" class="form-control input-sm" name="username" maxlength="30" value="<?php echo $username ?>" required>
    </div>
    <div class="form-group">
      <label>Password</label>
      <input type="password" id="password" class="form-control input-sm" name="password" maxlength="30" value="<?php echo $password ?>" required>
    </div>
    <div class="form-group">
      <input type="hidden" id="lev" class="form-control input-sm" name="lev" maxlength="30" value="<?php echo $lev ?>" required>
    </div>
  </div>
  <div class="box-footer clearfix">
    <input type="submit" class="pull-right btn btn-info" id="send" value="Send">
  </div>
</div>
</form>
</body>
</html>