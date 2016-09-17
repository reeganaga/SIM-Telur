<!DOCTYPE html>
<html>
<head>
  <title>Data Persediaan</title> 
</head>
<body>
<div class="box box-info">
  <div class="box-header">
    <i class="fa fa-envelope"></i>
    <h3 class="box-title">Data Stok</h3>
    <!-- tools box -->
    <div class="pull-right box-tools">
      <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove">
      <i class="fa fa-times"></i></button>
    </div>
    <!-- /. tools -->
  </div>
  <div class="box-body">

    <?php if (isset($_GET['sukses'])) : ?>
        <div class="alert alert-success alert-dismissible alert-sm" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <?=base64_decode($_GET['sukses']);?>
        </div>
    <?php endif;?>
  <?php if (isset($_GET['error'])) : ?>
        <div class="alert alert-danger alert-dismissible alert-sm" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <?=base64_decode($_GET['error']);?>
        </div>
    <?php endif;?>
  
    <table class="table table-striped table-hover" id="datastok">
      <thead>
        <tr>
          <th>Nomor</th>
          <th>Nama</th>
          <th>Persediaan</th>
        </tr>
      </thead>
      <tbody>
        <?php  
        $i=1;
        include"../koneksi.php";
        $query=mysql_fetch_array(mysql_query("select ((select sum(jml_terima) from produksi) - (select sum(jml_penjualan) from penjualan)) as Persediaan"));
        ?>
        <tr>
          <td><?php  echo $i; ?></td>
          <td><?php echo "Telur";  ?></td>
          <td><?php echo $query['Persediaan'];  ?></td>
        </tr>
      </tbody>
    </table>
    
  </div>
  <div class="box-footer clearfix">
  </div>
</div>
</body>
</html>
