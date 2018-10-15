  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo $judul ?>
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><?php echo $judul ?></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
          <div class="col-xs-12">
            <!-- interactive chart -->
            <div class="box box-primary">
              <div class="box-header with-border">
                <a class="btn btn-success btn-sm" id="btn-Create" title="New" data-toggle="modal" data-target="#myModalAdd"><span class="glyphicon glyphicon-plus"></span></a>
                    <button type="button" class="btn btn-info btn-lrg ajax pull-right" title="Refresh" onclick="location.reload()">
                    <i class="fa fa-spin fa-refresh"></i></button>
                        <script type="text/javascript">
                            function reload(){
                            location.reload();
                            }
                        </script> 
              </div>
             
               <!-- modal add new receipt -->
                <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModalAdd" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                                <h4 class="modal-title">New <?php echo $judul ?></h4>
                            </div>
                            
                            <form action="<?php echo base_url('index.php/pelajaran/tambah')?>" method="post">
                            <div class="modal-body">
                              <div class="row">
                             
                                <div class="form-row">
                                 
                                    <div class="form-group col-md-6">
                                        <label for="tahun_ajaran">Kode Pelajaran</label>
                                        <input type="text" class="form-control" id="kd_pelajaran" name="kd_pelajaran" placeholder="Kode Pelajaran">
                                    </div>

                                     <div class="form-group col-md-6">
                                        <label for="tahun_ajaran">Nama Pelajaran</label>
                                        <input type="text" class="form-control" id="nama_pelajaran" name="nama_pelajaran" placeholder="Nama Pelajaran">
                                    </div>

                                </div>
                              
                                
                              </div> 
                            </div>
                            <div class="modal-footer">
                                <input class="btn btn-primary" type="submit" value="Save">
                                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                            </div>
                           </form> 
                        </div>
                    </div>
                </div>
                <!--end modal add new receipt-->

              <div class="box-body">
                <div id="interactive">
                    <?=$this->session->flashdata('notif')?>
                    <table id="example1" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                        <tr>
                          
                            <th>Kode Pelajaran</th>
                            <th>Nama Pelajaran</th>
                            <th>Action</th>   
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>

                </div>
              </div>
              <!-- /.box-body-->
            </div>
            <!-- /.box -->
          </div>
          <!-- /.col -->
        </div>
    </section>
     
  </div>
  <!-- /.content-wrapper -->

<script src="<?php echo base_url();?>assets/layout/bower_components/jquery/dist/jquery.min.js"></script>
<script type="text/javascript">

     $(document).ready(function() {
        
    $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings)
    {
        return {
        "iStart": oSettings._iDisplayStart,
        "iEnd": oSettings.fnDisplayEnd(),
        "iLength": oSettings._iDisplayLength,
        "iTotal": oSettings.fnRecordsTotal(),
        "iFilteredTotal": oSettings.fnRecordsDisplay(),
        "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
        "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
        };
    };
    var t = $("#example1").DataTable({
        initComplete: function() {
        var api = this.api();
        $('#mytable_filter input')
        .off('.DT')
        .on('keyup.DT', function(e) {
        if (e.keyCode == 13) {
        api.search(this.value).draw();
        }
        });
    },
    processing: true,
    serverSide: true,
    ajax: {"url": "<?php echo base_url().'index.php/Pelajaran/json'?>", "type": "POST"},
    columns: [
                
                {"data": "kd_pelajaran"},
                {"data": "nama_pelajaran"},
                {"data": "Action","width": "130"}
            ],
            "columnDefs": [ {
            "targets": 2,
             "className": "text-center",
            "orderable": false
            } ]
         
             });
    });

</script>


 <!-- Modal Hapus Produk-->
      <form id="add-row-form" action="<?php echo base_url().'index.php/pelajaran/delete'?>" method="post">
       <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModalHapus" class="modal fade">
            <div class="modal-dialog">
               <div class="modal-content">
                   <div class="modal-header">
                       <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                       <h4 class="modal-title" id="myModalLabel">Hapus <?php echo $judul ?></h4>
                   </div>
                   <div class="modal-body">
                           <input type="hidden" id="id" name="id" class="form-control" placeholder="ID" required>
                           <center><strong>Anda yakin mau menghapus record ini?</strong></center>
                        <div class="row">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                            <label for="tahun_ajaran">Kode Pelajaran</label>
                                            
                                            <input type="text" disabled class="form-control" id="kd_pelajaran" name="kd_pelajaran">
                                </div>
                                <div class="form-group col-md-6">
                                            <label for="tahun_ajaran">Nama Pelajaran</label>
                                        
                                            <input type="text" disabled class="form-control" id="nama_pelajaran" name="nama_pelajaran">
                                </div>
                            </div>
                        </div>
                   </div>
                    <div class="modal-footer">
                        <input class="btn btn-primary" type="submit" value="Save">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                   </div>
                </div>
            </div>
         </div>
     </form>

<script type="text/javascript">
             // get Hapus Records
            $('#example1').on('click','.hapus_record',function(){
                  var id=$(this).data('id');
                  var kd_pelajaran=$(this).data('kd_pelajaran');
                  var nama_pelajaran=$(this).data('nama_pelajaran');
            $('#myModalHapus').modal('show');
                    $('[name="id"]').val(id);
                    $('[name="kd_pelajaran"]').val(kd_pelajaran);
                    $('[name="nama_pelajaran"]').val(nama_pelajaran);
            });
            // End Hapus Records
</script>   
 <!-- Modal Update Produk-->
      <form id="add-row-form" action="<?php echo base_url().'index.php/pelajaran/update'?>" method="post">
         <div class="modal fade" id="ModalUpdate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
               <div class="modal-content">
                   <div class="modal-header">
                       <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                       <h4 class="modal-title" id="myModalLabel">Update Tahun <?php echo $judul ?></h4>
                   </div>
                   <div class="modal-body">
                        
                        <div class="row">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                        <label for="pelajaran">Kode Pelajaran</label>
                                        <input type="hidden" class="form-control" id="id" name="id">
                                        <input type="text" class="form-control" id="kd_pelajaran" name="kd_pelajaran">
                                </div>
                                <div class="form-group col-md-6">
                                        <label for="pelajaran">Nama Pelajaran</label>
                                       
                                        <input type="text" class="form-control" id="nama_pelajaran" name="nama_pelajaran">
                                </div>   
                            </div>
                        </div> 
                         
                   </div>
                   <div class="modal-footer">
                        <input class="btn btn-primary" type="submit" value="Save">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                   </div>
                    
            </div>
         </div>
     </form>
<script type="text/javascript">
              // get Edit Records
            $('#example1').on('click','.edit_record',function(){
                    var id=$(this).data('id');
                    var kd_pelajaran=$(this).data('kd_pelajaran');
                    var nama_pelajaran=$(this).data('nama_pelajaran');
                   
            $('#ModalUpdate').modal('show');
                    $('[name="id"]').val(id);
                    $('[name="kd_pelajaran"]').val(kd_pelajaran);
                    $('[name="nama_pelajaran"]').val(nama_pelajaran);
                  
            });
            // End Edit Records
</script>   

