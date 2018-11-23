
<style>
section .header-custom-box{
  margin: 10px;
}
section .header-custom-box .table-judul-konten{
  /*border: 2px solid #F5F5F5;*/
  margin-top:10px; 
  padding: 10px;
  width: 100%;
  font-weight: bold;
}
</style>

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

              <div class="container-fluid header-custom-box">
                 <form action="<?php echo base_url().'Jadwal/getByKelas'; ?>" method="post">  
               
                  <div class="col-md-3">
                        <select class="text-center form-control" id="nama_kelas" name="nama_kelas"  onchange="selectKelas()">
                          <option value=" ">Select Kelas</option>
                              <?php foreach($m_kelas as $row){ ?>
                                <?php $selected = (isset($_REQUEST['nama_kelas']) && $_REQUEST['nama_kelas'] == $row->id)?'selected="selected"':''; ?>
                                <option value="<?php echo $row->id;?>" <?php echo $selected ?>>Kelas <?php echo $row->nama_kelas; ?></option>
                              <?php } ?>

                        </select>
                    </div>

                   

                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary" id="submit" name="submit">Pilih</button>
                    </div>    

                </form>

                
              </div>

               <!-- modal add new  -->
                <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModalAdd" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                                <h4 class="modal-title">Tambah <?php echo $judul ?></h4>
                            </div>
                            
                            <form action="<?php echo base_url('Jadwal/Tambah')?>" method="post">
                            <div class="modal-body">
                              <div class="row">
                             
                                <div class="form-row">
 
                                    <div class="form-group col-md-6">
                                        <label for="status">Kelas</label>  
                                        <select class="text-center form-control" name="kelas" id="kelas">
                                          <option value=""> Kelas </option>
                                          <?php foreach($m_kelas as $row): ?>
                                            <option value="<?php echo $row->id_kelas_detail;?>"><?php echo $row->nama_kelas; ?></option>
                                          <?php endforeach ?>
                                        </select>
                                    </div>

                                     <div class="form-group col-md-6">
                                        <label for="status">Sesi</label>
                                        <input type="number" class="form-control" name="sesi" id="sesi">
                                      </div>

                                    <div class="form-group col-md-6">
                                         <label for="status">Senin</label>
                                         <select class="text-center form-control" name="senin" id="senin">
                                          <option value=""> Pelajaran </option>
                                          <?php foreach($m_pelajaran as $row): ?>
                                            <option value="<?php echo $row->nama_pelajaran;?>"><?php echo $row->nama_pelajaran; ?></option>
                                          <?php endforeach ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                         <label for="status">Selasa</label>
                                         <select class="text-center form-control" name="selasa" id="selasa">
                                          <option value=""> Pelajaran </option>
                                          <?php foreach($m_pelajaran as $row): ?>
                                            <option value="<?php echo $row->nama_pelajaran;?>"><?php echo $row->nama_pelajaran; ?></option>
                                          <?php endforeach ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                         <label for="status">Rabu</label>
                                         <select class="text-center form-control" name="rabu" id="rabu">
                                          <option value=""> Pelajaran </option>
                                          <?php foreach($m_pelajaran as $row): ?>
                                            <option value="<?php echo $row->nama_pelajaran;?>"><?php echo $row->nama_pelajaran; ?></option>
                                          <?php endforeach ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                         <label for="status">Kamis</label>
                                         <select class="text-center form-control" name="kamis" id="kamis">
                                          <option value=""> Pelajaran </option>
                                          <?php foreach($m_pelajaran as $row): ?>
                                            <option value="<?php echo $row->nama_pelajaran;?>"><?php echo $row->nama_pelajaran; ?></option>
                                          <?php endforeach ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                         <label for="status">Jumat</label>
                                         <select class="text-center form-control" name="jumat" id="jumat">
                                          <option value=""> Pelajaran </option>
                                          <?php foreach($m_pelajaran as $row): ?>
                                            <option value="<?php echo $row->nama_pelajaran;?>"><?php echo $row->nama_pelajaran; ?></option>
                                          <?php endforeach ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                         <label for="status">Sabtu</label>
                                         <select class="text-center form-control" name="sabtu" id="sabtu">
                                          <option value=""> Pelajaran </option>
                                          <?php foreach($m_pelajaran as $row): ?>
                                            <option value="<?php echo $row->nama_pelajaran;?>"><?php echo $row->nama_pelajaran; ?></option>
                                          <?php endforeach ?>
                                        </select>
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
                            <th>Jam Selesai</th> 
                            <th>Senin</th>
                            <th>Selasa</th>
                            <th>Rabu</th>
                            <th>Kamis</th>
                            <th>Jumat</th>
                            <th>Sabtu</th>
                            <th>Action</th>   
                        </tr>
                        </thead>
                        <tbody>
                          <?php foreach ($m_jadwal as $row): ?>
                        <tr>
                          <td><?php echo $row->sesi;?></td>
                          <td><?php echo $row->jam_mulai;?></td>
                          <td><?php echo $row->jam_selesai;?></td>
                          <td><?php echo $row->senin;?></td>
                          <td><?php echo $row->selasa;?></td>
                          <td><?php echo $row->rabu;?></td>
                          <td><?php echo $row->kamis;?></td>
                          <td><?php echo $row->jumat;?></td>
                          <td><?php echo $row->sabtu;?></td>
                          
                          <td style="align">
                              <a id="edit" data-toggle="modal" data-target="#myModalEdit" data-id="<?php echo $row->id; ?>"  data-sesi="<?php echo $row->sesi; ?>" data-kelas="<?php echo $row->id_kelas_detail; ?>" data-senin="<?php echo $row->senin; ?>" data-selasa="<?php echo $row->selasa; ?>" data-rabu="<?php echo $row->rabu; ?>" data-kamis="<?php echo $row->kamis; ?>"data-jumat="<?php echo $row->jumat; ?>" data-sabtu="<?php echo $row->sabtu; ?>">
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
      
      })
    })
    
  </script>

    <!-- modal add new  -->
                <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModalEdit" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                                <h4 class="modal-title">Tambah <?php echo $judul ?></h4>
                            </div>
                            
                            <form action="<?php echo base_url('Jadwal/Edit')?>" method="post">
                            <div class="modal-body"  id="modal-edit">
                              <div class="row">
                             
                                <div class="form-row">
 
                                    <div class="form-group col-md-6">
                                        <label for="status">Kelas</label>  
                                        <select class="text-center form-control" name="kelas" id="kelas">
                                          <option value=""> Kelas </option>
                                          <?php foreach($m_kelas as $row): ?>
                                            <option value="<?php echo $row->id_kelas_detail;?>"><?php echo $row->nama_kelas; ?></option>
                                          <?php endforeach ?>
                                        </select>
                                    </div>

                                     <div class="form-group col-md-6">
                                        <label for="status">Sesi</label>
                                        <input type="number" class="form-control" name="sesi" id="sesi">
                                      </div>

                                    <div class="form-group col-md-6">
                                         <label for="status">Senin</label>
                                         <select class="text-center form-control" name="senin" id="senin">
                                          <option value=""> Pelajaran </option>
                                          <?php foreach($m_pelajaran as $row): ?>
                                            <option value="<?php echo $row->nama_pelajaran;?>"><?php echo $row->nama_pelajaran; ?></option>
                                          <?php endforeach ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                         <label for="status">Selasa</label>
                                         <select class="text-center form-control" name="selasa" id="selasa">
                                          <option value=""> Pelajaran </option>
                                          <?php foreach($m_pelajaran as $row): ?>
                                            <option value="<?php echo $row->nama_pelajaran;?>"><?php echo $row->nama_pelajaran; ?></option>
                                          <?php endforeach ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                         <label for="status">Rabu</label>
                                         <select class="text-center form-control" name="rabu" id="rabu">
                                          <option value=""> Pelajaran </option>
                                          <?php foreach($m_pelajaran as $row): ?>
                                            <option value="<?php echo $row->nama_pelajaran;?>"><?php echo $row->nama_pelajaran; ?></option>
                                          <?php endforeach ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                         <label for="status">Kamis</label>
                                         <select class="text-center form-control" name="kamis" id="kamis">
                                          <option value=""> Pelajaran </option>
                                          <?php foreach($m_pelajaran as $row): ?>
                                            <option value="<?php echo $row->nama_pelajaran;?>"><?php echo $row->nama_pelajaran; ?></option>
                                          <?php endforeach ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                         <label for="status">Jumat</label>
                                         <select class="text-center form-control" name="jumat" id="jumat">
                                          <option value=""> Pelajaran </option>
                                          <?php foreach($m_pelajaran as $row): ?>
                                            <option value="<?php echo $row->nama_pelajaran;?>"><?php echo $row->nama_pelajaran; ?></option>
                                          <?php endforeach ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                         <label for="status">Sabtu</label>
                                         <select class="text-center form-control" name="sabtu" id="sabtu">
                                          <option value=""> Pelajaran </option>
                                          <?php foreach($m_pelajaran as $row): ?>
                                            <option value="<?php echo $row->nama_pelajaran;?>"><?php echo $row->nama_pelajaran; ?></option>
                                          <?php endforeach ?>
                                        </select>
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

                <script src="<?php echo base_url();?>assets/vendors/jquery/dist/jquery.min.js"></script>
                <script type="text/javascript">
                  $(document).on("click","#edit", function() {
                    var id          =  $(this).data('id');
                    var sesi        =  $(this).data('sesi');
                    var kelas       =  $(this).data('kelas');
                    var senin       =  $(this).data('senin');
                    var selasa      =  $(this).data('selasa');
                    var rabu        =  $(this).data('rabu');
                    var kamis       =  $(this).data('kamis');
                    var jumat       =  $(this).data('jumat');
                    var sabtu       =  $(this).data('sabtu');
                 
                    $("#modal-edit #id").val(id);
                    $("#modal-edit #sesi").val(sesi);
                    $("#modal-edit #kelas").val(kelas);
                    $("#modal-edit #senin").val(senin);
                    $("#modal-edit #selasa").val(selasa);
                    $("#modal-edit #rabu").val(rabu);
                    $("#modal-edit #kamis").val(kamis);
                    $("#modal-edit #jumat").val(jumat);
                    $("#modal-edit #sabtu").val(sabtu);
                  
                    
                  })
                </script>