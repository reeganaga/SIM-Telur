<!DOCTYPE html>
<html>
<head>
  <title>Data Persediaan</title> 
  <script type="text/javascript">
      $(function(){
    $("#datastok").dataTable();
  });
  </script>
</head>
<body>

<div class="row">
  <div class="col-md-4 col-lg-3 col-xs-6">
    <!-- small box -->
        <?php  
        $i=1;
        include"../koneksi.php";
        $query=mysql_fetch_array(mysql_query("select ((select sum(jml_terima) from produksi) - (select sum(jml_penjualan) from penjualan)) as Persediaan"));
        $harga=mysql_fetch_array(mysql_query("select * from harga"));
        ?>
        <?php if ($query['Persediaan']>10): $style="bg-green";$status="Stok Aman";?>
        <?php elseif($query['Persediaan']>0 and $query['Persediaan']<=10): $style="bg-orange";$status="Stok Hampir Habis";?>
        <?php else: $style="bg-red";$status="Stok Habis";?>
        <?php endif ?>

    <div class="small-box <?php echo $style ?>">
      <div class="inner">
        <h3>
          <?php echo $query['Persediaan']; ?> Peti
        </h3>
        <p>Persediaan Telur <i class="label label-warning"><?php echo $harga['jml_per_peti']*$query['Persediaan']; ?> kg</i></p>
      </div>
      <div class="icon">
        <i class="fa fa-cube"></i>
      </div>
      <div class="small-box-footer">
        <?php echo $status; ?>
      </div>
    </div>
  </div>
  <div class="col-md-4 col-lg-3 col-xs-6">
    <?php 
    $sekarang=date('d');
    // echo "SELECT sum(jml_produksi) as jumlah from produksi where dayofmonth('tgl_produksi')=$sekarang";
    $qhari=mysql_fetch_array(mysql_query("SELECT sum(jml_terima) as jumlah from produksi where dayofmonth(tgl_produksi)=$sekarang"));
     ?>
    <!-- small box -->
    <div class="small-box bg-teal">
      <div class="inner">
        <h3>
          <?php if (empty($qhari['jumlah'])): ?>
            0
          <?php else: ?>
            <?php echo $qhari['jumlah']; ?>  
          <?php endif ?>
        </h3>
        <p>Telur Masuk Hari ini</p>
      </div>
      <div class="icon">
        <i class="fa fa-cubes"></i>
      </div>
      <a href="#" class="small-box-footer">
        More info <i class="fa fa-arrow-circle-right"></i>
      </a>
    </div>
  </div>
  <div class="col-md-4 col-lg-3 col-xs-6">
    <?php 
    $phari=mysql_fetch_array(mysql_query("SELECT sum(total_harga) as total from penjualan where dayofmonth(tgl_penjualan)=$sekarang"));
    ?>
    <!-- small box -->
    <div class="small-box bg-green">
      <div class="inner">
        <h3>Rp <?php echo $phari['total']; ?></h3>
        <p>Penjualan Hari ini</p>
      </div>
      <div class="icon">
        <i class="fa fa-dollar"></i>
      </div>
      <a href="#" class="small-box-footer">
        More info <i class="fa fa-arrow-circle-right"></i>
      </a>
    </div>
  </div>
  <div class="col-md-4 col-lg-3 col-xs-6">
    <?php 
    $pbulan=mysql_fetch_array(mysql_query("SELECT sum(total_harga) as total from penjualan where month(tgl_penjualan)=".date('m')) );
    ?>
    <!-- small box -->
    <div class="small-box bg-orange">
      <div class="inner">
        <h3>Rp <?php echo $pbulan['total']; ?></h3>
        <p>Penjualan Bulan ini</p>
      </div>
      <div class="icon">
        <i class="fa fa-dollar"></i>
      </div>
      <a href="#" class="small-box-footer">
        More info <i class="fa fa-arrow-circle-right"></i>
      </a>
    </div>
  </div>
  <div class="col-md-4 col-lg-3 col-xs-6">
    <?php 
    $ptahun=mysql_fetch_array(mysql_query("SELECT sum(total_harga) as total from penjualan where year(tgl_penjualan)=".date('Y')) );
     ?>
    <!-- small box -->
    <div class="small-box bg-navy">
      <div class="inner">
        <h3>Rp <?php echo $ptahun['total']; ?></h3>
        <p>Penjualan Tahun Ini</p>
      </div>
      <div class="icon">
        <i class="fa fa-dollar"></i>
      </div>
      <a href="#" class="small-box-footer">
        More info <i class="fa fa-arrow-circle-right"></i>
      </a>
    </div>
  </div>
</div>
<div class="box box-success">
  <div class="box-header with-border">
    <h3 class="box-title">Grafik Penjualan Tahun <?php echo date('Y') ?></h3>
    <div class="box-tools pull-right">
      <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
      <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
    </div>
  </div>
  <div class="box-body">
    <div class="chart">
      <div id="chart_div" style="height:230px;"></div>
    </div>
  </div><!-- /.box-body -->
</div><!-- /.box -->


</body>
</html>
