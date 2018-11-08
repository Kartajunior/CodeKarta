
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
             
              <div class="container-fluid header-custom-box">
                 <form action="<?php echo base_url().'Ekskul_anggota/getByEkskul'; ?>" method="post">  
               
                    <div class="col-md-3">
                        <select class="text-center form-control" id="nama_ekskul" name="nama_ekskul" >
                           <option value=" ">Select Ekskul</option>
                              <?php foreach($m_ekskul as $row){ ?>
                                <?php $selected = (isset($_REQUEST['nama_ekskul']) && $_REQUEST['nama_ekskul'] == $row->nama_ekskul)?'selected="selected"':''; ?>
                                <option value="<?php echo $row->id;?>" <?php echo $selected ?>> <?php echo $row->nama_ekskul; ?></option>
                              <?php } ?>

                        </select>
                    </div>

                  
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary" id="submit" name="submit">Pilih</button>
                    </div>    

                </form>


                 <div class="col-md-12 table-judul-konten">
                    <?php foreach ($header as $row): ?>

                    <div class="col-md-6">

                        <div class="col-md-3">
                        Eksktrakurikuler 
                        </div>
                        <div class="col-md-3">
                          
                        :  <?php echo $row->nama_ekskul; ?>
                        </div>
                    </div>
                   
                    <div class="col-md-6">
                        <div class="col-md-3">
                        Wali Pengampu 
                        </div>
                        <div class="col-md-3">
                        : 
                            <?php echo $row->nama_guru; ?>
                           
                      
                        </div>
                    </div>
                     
                     <div class="col-md-6">
                        <div class="col-md-3">
                        Tahun Ajaran 
                        </div>
                       
                        <div class="col-md-3">
                        : <?php echo $row->nama_ta; ?> <?php echo $row->semester; ?>
                        </div>
                      
                    </div>
                 </div>

                 <?php endforeach; ?>
              </div>
             

              <div class="box-body">
                <div id="interactive">

                    <?=$this->session->flashdata('notif')?>
                    <table id="example1" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                        <tr>
                            <th>Ekskul</th>
                            <th>NISN</th>
                            <th>Nama Lengkap</th> 
                            <th>JK</th>
                            <th>Action</th>   
                        </tr>
                        </thead>
                        <tbody>
                          <?php foreach ($m_ekskul_anggota as $row): ?>
                        <tr>
                          
                          <td><?php echo $row->nama_ekskul;?></td>
                          <td><?php echo $row->nisn;?></td>
                          <td><?php echo $row->nama_siswa;?></td>
                          <td><?php echo $row->jk;?></td>
                          <td>
                              d
                            
                          </td>
                        </tr>
                         <?php endforeach ?>
                        </tbody>
                        
                    </table>
                     <p><?php echo $links; ?></p>
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



