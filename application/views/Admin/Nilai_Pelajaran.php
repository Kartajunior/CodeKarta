
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
                    <i class="fa fa-refresh"></i></button>
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
                                <h4 class="modal-title">Tambah Nilai Pelajaran</h4>
                            </div>
                           
                              <div class="modal-body">
                                <div class="row">

                                  <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                    <select class="text-center form-control" name="id_mengajar">
                                      <option value=""> Pilih Guru</option>
                                       <?php foreach($m_mengajar as $row): ?>
                                        <option value="<?php echo $row->id;?>"><?php echo $row->nama_guru; ?></option>
                                      <?php endforeach ?>
                                    </select>
                                  </div>

                                  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                     <input type="number" name="kkm" class="form-control" placeholder="KKM">
                                  </div>

                                  <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                     <input type="number" name="rata_rata_kelas" class="form-control" placeholder="Rata Rata Kelas">
                                  </div>

                                </div>
                              </div>  
                              <div class="modal-footer">
                                  <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> Save</button>
                                  <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                              </div>
                              
                        </div>
                    </div>
                </div>
              <!--end modal add new -->

              <div class="container-fluid header-custom-box">
                 <form action="<?php echo base_url().'Nilai_Pelajaran/GetByGuru'; ?>" method="post">  
               
                    <div class="col-md-3">
                        <select class="text-center form-control" id="guru" name="guru"  onchange="selectGuru()">
                          <option value=" ">Select Guru</option>
                              <?php foreach($m_guru as $row){ ?>
                                <?php $selected = (isset($_REQUEST['guru']) && $_REQUEST['guru'] == $row->id)?'selected="selected"':''; ?>
                                <option value="<?php echo $row->id;?>" <?php echo $selected ?>> <?php echo $row->nama_lengkap; ?></option>
                              <?php } ?>

                        </select>
                    </div>

                    
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary" id="submit" name="submit">Pilih</button>
                    </div>    

                </form>
                 <div class="col-md-12 table-judul-konten">
                  
                 </div>
             

              <div class="box-body">

                <div id="interactive">

                    
                    <form action="<?php echo base_url().'Nilai_Pelajaran/Update'; ?>" method="post">
                    <table id="example1" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                        <tr>
                            <th>Kelas</th>
                            <th>Nama Kelas</th>
                            <th>Pelajaran</th>
                            <th>Nama Guru</th>
                            <th>Tahun Ajaran</th>
                            <th>KKM</th> 
                            <th>Rata Rata Kelas</th> 

                        </tr>
                        </thead>
                        <tbody>
                          <?php foreach ($m_nilai_pelajaran as $row): ?>
                        <tr>
                          <td><?php echo $row->kelas;?></td>
                          <td><?php echo $row->nama_kelas;?></td>
                          <td><?php echo $row->nama_pelajaran;?></td>
                          <td><?php echo $row->nama_guru;?></td>
                          <td><?php echo $row->nama_ta;?> - <?php echo $row->semester;?></td>
                          <td>
                            <input type="hidden" id="id" name="id[]" value="<?php echo $row->id; ?> ">
                            
                            <input type="number" id="kkm" name="kkm[]" value="<?php echo $row->kkm; ?>" style="width: 100px; height: 25px; ">
                          </td>
                          <td>
                            <input type="number" id="rata_rata_kelas" name="rata_rata_kelas[]" value="<?php echo $row->rata_rata_kelas; ?>" style="width: 100px; height: 25px; ">
                          </td>
                          
                        </tr>
                         <?php endforeach ?>
                        </tbody>
                        
                    </table>
                     <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> Update Nilai</button>  
                      
                     <p><?php echo $links; ?></p>

                </form>  
                </div>
              </div>
              <!-- /.box-body-->
               <?=$this->session->flashdata('notif')?>
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
  


