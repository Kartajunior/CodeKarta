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

                 <!-- modal add new  -->
                <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModalAdd" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                                <h4 class="modal-title">Tambah <?php echo $judul ?></h4>
                            </div>
                            
                            <form action="<?php echo base_url('Sesi/Tambah')?>" method="post">
                            <div class="modal-body">
                              <div class="row">
                             
                                <div class="form-row">

                                  <div class="form-group col-md-12">
                                    <label for="status">Sesi</label>
                                    <input type="number" class="form-control" name="sesi" id="sesi">
                                  </div>

                                    <div class="form-group col-md-6">
                                          
                                         <label for="status">Jam Mulai</label>
                                         <input type="time" name="jam_mulai" id="jam_mulai" min="6:00" max="18:00" required>

                                    </div>

                                    <div class="form-group col-md-6">
                                          
                                         <label for="status">Jam Selesai</label>
                                         <input type="time" name="jam_selesai" id="jam_selesai" min="6:00" max="18:00" required>

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
                <!--end modal add new -->

              <div class="box-body">
                <div id="interactive">
                    <?=$this->session->flashdata('notif')?>
                    <table id="example1" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                        <tr>
                            <th>Sesi</th>                           
                            <th>Jam Mulai</th>
                            <th>Jam Selesi</th> 
                            <th>Action</th>   
                        </tr>
                        </thead>
                        <tbody>
                          <?php foreach ($m_sesi as $row): ?>
                        <tr>
                          
                          <td><?php echo $row->sesi;?></td>
                          <td><?php echo $row->jam_mulai;?></td>
                          <td><?php echo $row->jam_selesai;?></td>                       
                          <td class="text-center">
                            <a id="edit" data-toggle="modal" data-target="#myModalEdit" data-id="<?php echo $row->id; ?>"  data-sesi="<?php echo $row->sesi; ?>" data-jam_mulai="<?php echo $row->jam_mulai; ?>" data-jam_selesai="<?php echo $row->jam_selesai; ?>">
                              <button class="btn btn-info"><i class="fa fa-edit"></i> Edit</button>
                            </a>
                          </td>
                        </tr>
                         <?php endforeach ?>
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
    $(document).ready(function(){ 
        var table = $('#example1').DataTable({
      
      });

    })
    
  </script>

            <!-- modal add Edit -->
            <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModalEdit" class="modal fade">
             <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                                <h4 class="modal-title">Tambah <?php echo $judul ?></h4>
                            </div>
                            
                            <form action="<?php echo base_url('Sesi/Edit')?>" method="post">
                            <div class="modal-body" id="modal-edit">
                              <div class="row">
                             
                                <div class="form-row">

                                  <input type="text" class="form-control" name="id" id="id" required>

                                  <div class="form-group col-md-12">
                                    <label for="status">Sesi</label>
                                    <input type="number" class="form-control" name="sesi" id="sesi" required readonly>
                                  </div>

                                    <div class="form-group col-md-6">
                                          
                                         <label for="status">Jam Mulai</label>
                                         <input type="time" name="jam_mulai" id="jam_mulai" min="6:00" max="18:00" required >

                                    </div>

                                    <div class="form-group col-md-6">
                                          
                                         <label for="status">Jam Selesai</label>
                                         <input type="time" name="jam_selesai" id="jam_selesai" min="6:00" max="18:00" required >

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
            <!--end modal Edit-->

            <script src="<?php echo base_url();?>assets/vendors/jquery/dist/jquery.min.js"></script>
            <script type="text/javascript">
              $(document).on("click","#edit", function() {
                var id          =  $(this).data('id');
                var sesi        =  $(this).data('sesi');
                var jam_mulai       =  $(this).data('jam_mulai');
                var jam_selesai        =  $(this).data('jam_selesai');
             
                $("#modal-edit #id").val(id);
                $("#modal-edit #sesi").val(sesi);
                $("#modal-edit #jam_mulai").val(jam_mulai);
                $("#modal-edit #jam_selesai").val(jam_selesai);
                
              })
            </script>