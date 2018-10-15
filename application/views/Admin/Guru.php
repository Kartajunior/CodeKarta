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
                            
                            <form action="<?php echo base_url('')?>" method="post">
                            <div class="modal-body">
                              <div class="row">
                             
                                <div class="form-row">
                                 
                                   <div class="form-group">
                                        
                                        <div class="col-xs-6">
                                            <label for="first_name"><h4>Kode Guru</h4></label>
                                            <input type="text" name="kode_guru"  class="form-control" >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        
                                        <div class="col-xs-6">
                                            <label for="last_name"><h4>NIP</h4></label>
                                             <input type="text" name="nip" class="form-control">
                                            </div>
                                    </div>
                        
                                    <div class="form-group">
                                        
                                        <div class="col-xs-6">
                                            <label for="phone"><h4>Nama Lengkap</h4></label>
                                             <input type="text" name="nama_lengkap" class="form-control">    
                                        </div>
                                    </div>
                        
                                    <div class="form-group">
                                        <div class="col-xs-6">
                                            <label for="mobile"><h4>Jenis Kelamin</h4></label><br>
                                            <label class="radio-inline">
                                            <input type="radio" name="jk" value="L">L</label>
                                            <label class="radio-inline">
                                            <input type="radio" name="jk" value="P">P</label>
                                        </div>

                                     <div class="form-group">
                                        
                                        <div class="col-xs-12">
                                            <label for="password2"><h4>Alamat</h4></label>
                                            <textarea class="form-control" name="alamat" id="alamat"> 
                                              
                                            </textarea>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="form-group">
                                        
                                        <div class="col-xs-6">
                                            <label for="email"><h4>Tempat Lahir</h4></label>
                                            <input type="text" name="tempat_lahir" class="form-control">      
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        
                                        <div class="col-xs-6">
                                            <label for="email"><h4>Tangggal Lahir</h4></label>
                                            <input type="text" name="tgl_lahir" class="form-control" >
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        
                                        <div class="col-xs-6">
                                            <label for="password"><h4>Jabatan</h4></label>
                                            <input type="text" name="jabatan" class="form-control"> 
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        
                                        <div class="col-xs-6">
                                            <label for="password2"><h4>Agama</h4></label>
                                            <input type="text" name="agama" class="form-control" >
                                        </div>
                                    </div>
                                     <div class="form-group">
                                        
                                        <div class="col-xs-6">
                                            <label for="password2"><h4>Kode Pos</h4></label>
                                            <input type="text" name="kd_pos" class="form-control">    
                                        </div>
                                    </div>
                                     <div class="form-group">
                                        
                                        <div class="col-xs-6">
                                            <label for="password2"><h4>Telpon</h4></label>
                                            <input type="text"  class="form-control">
                                        </div>
                                    </div>
                                     <div class="form-group">
                                        
                                        <div class="col-xs-6">
                                            <label for="password2"><h4>Tugas Tambahan</h4></label>
                                        <input type="text" name="tlp" class="form-control">
                                        </div>
                                    </div>
                                     <div class="form-group">
                                        
                                        <div class="col-xs-6">
                                            <label for="password2"><h4>Email</h4></label>
                                        <input type="text" name="email" class="form-control">
                                        </div>
                                    </div>

                                     <div class="form-group">
                                        
                                        <div class="col-xs-6">
                                            <label for="password2"><h4>Foto</h4></label>
                                             <div class="row"> 
                                                <div class="col-md-6 form-group has-feedback">
                                                <input type="file" name="foto" class="form-control-file">
                                                </div>   
                                            </div>
                                        </div>
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
                           
                            <th>NIP</th>
                            <th>Nama Lengkap</th>
                            <th>JK</th>
                            <th>Tempat Lahir</th>
                            <th>Tanggal Lahir</th>
                            <th>Jabatan</th>
                            <th>Alamat</th>
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
    ajax: {"url": "<?php echo base_url().'index.php/guru/json'?>", "type": "POST"},
    columns: [
                
                
                {"data": "nip"},
                {"data": "nama_lengkap"},
                {"data": "jk"},
                {"data": "tempat_lahir"},
                {"data": "tgl_lahir"},
                {"data": "jabatan"},
                {"data": "alamat"},
                {"data": "Action"}
            ],
            "columnDefs": [ {
            "targets": 7,
             "className": "text-center",
            "orderable": false
            } ]
         
             });
    });

</script>

<!-- Modal Update Produk-->
      <form id="add-row-form" action="<?php echo base_url().'index.php/Kelas/update'?>" method="post">
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
                                        <label for="tahun_ajaran">Kelas</label>
                                        <input type="text" class="form-control" id="id" name="id">
                                        <input type="text" class="form-control" id="kode_guru" name="kode_guru">
                                </div>
                                <div class="form-group col-md-6">
                                        <label for="tahun_ajaran">Nama Kelas</label>
                                       
                                        <input type="text" class="form-control" id="nip" name="nip">
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
                    var kode_guru=$(this).data('kode_guru');
                    var nip=$(this).data('nip');
            $('#ModalUpdate').modal('show');
                    $('[name="id"]').val(id);
                    $('[name="kode_guru"]').val(kode_guru);
                    $('[name="nip"]').val(nip);     
            });
            // End Edit Records
</script>   