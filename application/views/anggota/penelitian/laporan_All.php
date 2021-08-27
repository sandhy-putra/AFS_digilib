<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $title ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url('assets') ?>/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url('assets') ?>/plugins/datatables/dataTables.bootstrap.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('assets') ?>/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url('assets') ?>/dist/css/skins/_all-skins.min.css">
  <!-- Pace style -->
  <link rel="stylesheet" href="<?php echo base_url('assets') ?>/plugins/pace/pace.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition">
    <div class="container">
        <!-- Judul Dokumen -->
        <img src="<?php echo base_url('assets/');?>image/logo.png" style=' display: block;margin-left: auto;margin-right: auto;'>
        <h1 style="text-align: center">Data Laporan Penelitian <br> Perpustakaan Digital STMIK Mardira Indonesia</h1>

        <table>
            <tr>
                <td width="100px">Dicetak Oleh</td>
                <td width="15px">:</td>
                <td> <?php echo $this->session->userdata('nama'); ?> </td>
            </tr>
            <tr>
                <td>Waktu</td>
                <td>:</td>
                <td>
                    <?php
                        date_default_timezone_set('Asia/Jakarta');
                        echo date('d-M-Y H:i:s');
                    ?>
                </td>
            </tr>
        </table>
   
        <!-- Tabel Data Barang -->
        <table class="table table-bordered" style="margin-top: 15px">
            <thead>
                <tr>
                    <th width="5px">No</th>
                    <th>Kode</th>
					<th>Abjad</th>
                    <th>Judul</th>
                    <th>Penulis</th>
                    <th>Penerbit</th>
                    <th>Tahun</th>
					<th>Keterangan</th>
					<th>Sitasi</th>
					<th>Stok</th>
                    <th>createDate</th>
					<th>updateDate</th>
                    
                </tr>
            </thead>
            <tbody>
                <?php
                    $no = 1;
                    foreach ($penelitian as $b) {
                ?>
                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $b->kode; ?></td>
						<td><?php echo $b->abjad; ?></td>
                        <td><?php echo $b->judul; ?></td>
                        <td><?php echo $b->penulis; ?></td>
                        <td><?php echo $b->penerbit; ?></td>
                        <td><?php echo $b->tahun; ?></td>
						<td><?php echo $b->keterangan; ?></td>
						<td><?php echo $b->sitasi; ?></td>
						<td><?php echo $b->stok; ?></td>
						<td><?php echo $b->createDate; ?></td>
						<td><?php echo $b->updateDate; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

    </div>

  
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="<?php echo base_url('assets') ?>/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url('assets') ?>/bootstrap/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url('assets') ?>/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url('assets') ?>/plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url('assets') ?>/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url('assets') ?>/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets') ?>/dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url('assets') ?>/dist/js/demo.js"></script>
<!-- PACE -->
<script src="<?php echo base_url('assets') ?>/plugins/pace/pace.min.js"></script>
<!-- page script -->
<script type="text/javascript">
	// To make Pace works on Ajax calls
	$(document).ajaxStart(function() { Pace.restart(); });
    $('.ajax').click(function(){
        $.ajax({url: '#', success: function(result){
            $('.ajax-content').html('<hr>Ajax Request Completed !');
        }});
    });
</script>

<!-- Sweet Alert -->
<script src="<?php echo base_url('assets/sweetalert') ?>/sweetalert.min.js"></script>
<script>
    //Notifikasi
    const flashData = $('.flash-data').data('flashdata');
    if (flashData){
      swal({
        title: "Success!",
        text: flashData,
        icon: "success",
        button: "Ok!",
      });
    }

    //Konfirmasi
    $('.tombol-yakin').on('click', function (e) {
      e.preventDefault();
      const href = $(this).attr('href');
      const isiData = $(this).data('isidata');
      swal({
        title: 'Apakah anda yakin?',
        text: isiData,
        icon: 'warning',
        buttons: true,
        dangerMode: true,
      }).then((willDelete) => {
          if (willDelete) {
            document.location.href = href;
          }
        });
    });
</script>

<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>

<script>
    window.print();
</script>
</body>
</html>
