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
             
           
              <div class="box-body">
                
                

                <?php foreach ($m_jadwal_table as $row): ?>

                <div class="col-md-4" style="margin: 10px; font-weight: bold; font-size: 14;">
                  Kelas : <?php echo $row->nama_kelas;?>
                </div>
              
                <table class="table">
                  <thead>
                        <tr>
                          <th>#</th>
                          <th>Hari</th>
                          <th>Jam</th>
                          <th>Kelas</th>
                          <th>Mata Pelajaran</th>
                          <th>Keterangan</th>  
                        </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($m_jadwal as $row): ?>
                        <tr>
                          
                          <td></td>
                          <td><?php echo $row->hari;?></td>
                          <td><?php echo $row->jam;?></td>
                          <td><?php echo $row->kelas;?></td>
                          <td><?php echo $row->nama_pelajaran;?></td>
                          <td><?php echo $row->keterangan;?></td>
                        </tr>
                         <?php endforeach ?>
                        </tbody>
                  </table>
                  <?php endforeach ?>
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
        // "bPaginate": false,
        //         "bStateSave": true,
        //         "bAutoWidth": false,
        //         "bFilter": false
      })
    })
    
  </script>


