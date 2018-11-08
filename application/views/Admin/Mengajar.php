
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
               <?=$this->session->flashdata('notif')?>
                    <button type="button" class="btn btn-info btn-lrg ajax pull-right" title="Refresh" onclick="location.reload()">
                    <i class="fa fa-refresh"></i></button>
                        <script type="text/javascript">
                            function reload(){
                            location.reload();
                            }
                        </script> 
              </div>
             
             <div class="container-fluid header-custom-box">
                

            </div>
              
              <div class="box-body">

                <div id="interactive">

                  <form action="<?php echo base_url().'Absensi/Update'; ?>" method="post">
                    <table id="example1" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                        <tr>
                            <th>Kelas</th>
                            <th>Nama Kelas</th>
                            <th>Pelajaran</th>
                            <th>Guru Pengajar</th>
                            <th>Tahun Ajaran</th>
                        </tr>
                        </thead>
                        <tbody>
                          <?php foreach ($m_mengajar as $row): ?>
                          <tr>
                          <td><?php echo $row->kelas;?></td>
                          <td><?php echo $row->nama_kelas;?></td>
                          <td><?php echo $row->nama_pelajaran;?></td>
                          <td><?php echo $row->nama_guru;?></td>
                          <td><?php echo $row->nama_ta;?> <?php echo $row->semester;?></td>      
                        </tr>
                         <?php endforeach ?>
                        </tbody>
                        
                    </table>

                     
                   </form>
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
        // "bPaginate": false,
        //         "bStateSave": true,
        //         "bAutoWidth": false,
        //         "bFilter": false
      })
    })
    
  </script>

<script>
  function selectKelas()
    {
       var kelas = $('#kelas').val();
        
        $.post('<?php echo base_url();?>Absensi/getNamaKelas/',
      {
        kelas:kelas
        
        },
        function(data) 
        {
        
        $('#nama_kelas').html(data);
        }); 
     
    }
</script>


