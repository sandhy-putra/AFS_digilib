  <!-- Content Wrapper. Contains page content -->
<script src="<?php echo base_url('assets') ?>/plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="<?php echo base_url('assets/sweetalert') ?>/sweetalert.min.js"></script>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      
              <div class="small-box bg-red">
                <div class="inner">
                    <font size=90 style="text-shadow: 3px 3px 8px black;">'<?php echo $this->session->userdata('abjad');?></font>
                  <p style="text-shadow: 3px 3px 8px black;"><i>Archive Folder</i></p>
                </div>
                <div class="icon">
                  <i class="fa fa-folder"></i>
                </div>
                  <a href="#" class="small-box-footer"><i>Alphabetical Filing System</i></a>
              </div>
            
      
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Alert -->
        <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('pesan') ?>"></div>

	  <?php if($this->session->userdata('status') == 'Aktif'){ ?>
      
		  <!-- Tombol Tambah Data -->
			<div type="button" class="btn btn-danger"  id="tomboltambah" onclick="tambah()">
				<div class="fa fa-plus"></div> Tambah Data
			</div>
	  <?php } ?>

	
        <!-- Tabel Data -->
        <div class="box box-danger" style="margin-top: 15px">
            <div class="box-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped" id="databuku">
                        <thead>
                            <tr>
                                <th width="5px">No</th>
                                <th>Kode Buku</th>
                                <th>Judul</th>
                                <th>Penulis</th>
                                <th>Penerbit</th>
                                <th>Tahun</th>
                                <th>Sitasi</th>
                                <th>Stok</th>
                                <th>Action</th> 
                                
                            </tr>
                        </thead >
                            
                        <tbody id="target_buku">
                          
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
      
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<!-- view modal tambah-->
<div class='viewmodal' style='display:none;'></div>


  

 
<script type="text/javascript">
 $(document).ready(function(){
     
     tampil();
    
 });
    

//----------menampilkan datatable    
function tampil(){
    
     table = $('#databuku').DataTable({
        responsive: true,
        "destroy": true,
        "processing": true,
        "serverSide": true,
        "order": [],
 
        "ajax": {
            "url": '<?php echo base_url()."index.php/dosen/buku/ambilData"?>',
            "type": "POST"
        },
 
 
        "columnDefs": [{
            "targets": [0],
            "orderable": false,
            "width": 5
        }],
 
    });
}
    
//------modal tambah data
function tambah(){
        $.ajax({
            url: '<?php echo base_url()."index.php/dosen/buku/formtambah"?>',
            dataType: 'json',
            success : function(response){
                if(response.sukses){
                    $('.viewmodal').html(response.sukses).show();
                    $('#modaltambah').modal('show');
               
                }
         
            }
                              
            });                                                  
}

//-----modal update data
     function edit(kode){
          $.ajax({
            type:'POST',
            url: '<?php echo base_url()."index.php/dosen/buku/formupdate"?>',
            data: {kode_b : kode},
            dataType: 'json',
            success : function(response){
                if(response.sukses){
                    $('.viewmodal').html(response.sukses).show();
                    $('#modalupdate').modal('show');
               
                }
         
            }
                              
            }); 
     }
//----function delete
    function hapus(kode){
      swal({
              title: "Anda yakin ingin menghapus data?",
              text: "Data yang sudah dihapus tidak dapat dikembalikan!",
              icon: "warning",
              buttons: true,
              dangerMode: true,
            })
            .then((willDelete) => {
              if (willDelete) {
                  $.ajax({
                    type:'POST',
                    url: '<?php echo base_url()."index.php/dosen/buku/delete_data"?>',
                    data: {kode_b:kode},
                    dataType:'json',
                    success:function(){
                                swal("Data berhasil dihapus!", {
                                      icon: "success",
                                    });
                        }
                    });
             swal("Data berhasil dihapus!", {icon: "success", });
             tampil();
                
              } else {
                swal("Data batal dihapus!");
              }
		});
    }
        
    function read_pustaka(judul,kode){
       // alert(judul);
        var x = window.open('<?php echo base_url()."index.php/dosen/buku/baca/";?>' + judul + '/' + kode,'_blank');
        x.focus();
     
    }
	
	function cite(kode){
	  swal({
              title: "Anda yakin akan mengutip?",
              text: "Pengutipan bertujuan untuk menghargai sumber karya ilmiah ini",
              icon: "warning",
              buttons: true,
              dangerMode: true,
            })
            .then((willDelete) => {
              if (willDelete) {
                  $.ajax({
                    type:'POST',
                    url: '<?php echo base_url()."index.php/dosen/buku/tambah_sitasi"?>',
                    data: {kode_s:kode},
                    dataType:'json',
                    success:function(){
                                swal("Anda berhasil menambah kutipan pada karya ilmiah ini!", {
                                      icon: "success",
                                    });
                        }
                    });
             swal("Anda berhasil menambah kutipan pada karya ilmiah ini!", {icon: "success", });
             tampil();
                
              } else {
                swal("Batal mengutip!");
              }
		});
	  
  }
  
   function transaksi(kode){
          $.ajax({
            type:'POST',
            url: '<?php echo base_url()."index.php/dosen/buku/formtransaksi"?>',
            data: {kode_b : kode},
            dataType: 'json',
            success : function(response){
                if(response.sukses){
                    $('.viewmodal').html(response.sukses).show();
                    $('#modaltransaksi').modal('show');
               
                }
         
            }
                              
            }); 
     }

    
</script>

