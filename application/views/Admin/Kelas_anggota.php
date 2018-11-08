
<style>
section .header-custom-box{
  margin: 10px;
}
section .header-custom-box .table-judul-konten{
 /* border: 1px solid #5590BB;*/
  margin-top:10px; 
  padding: 10px;
  width: 100%;
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
                 <form action="<?php echo base_url().'Kelas_anggota/getByKelas'; ?>" method="post">  
               
                    <div class="col-md-3">
                        <select class="text-center form-control" id="kelas" name="kelas"  onchange="selectKelas()">
                          <option value=" ">Select Kelas</option>
                              <?php foreach($m_kel as $row){ ?>
                                <?php $selected = (isset($_REQUEST['kelas']) && $_REQUEST['kelas'] == $row->kelas)?'selected="selected"':''; ?>
                                <option value="<?php echo $row->kelas;?>" <?php echo $selected ?>>Kelas <?php echo $row->kelas; ?></option>
                              <?php } ?>

                        </select>
                    </div>

                    <div class="col-md-3">
                        <select class="text-center form-control" id="nama_kelas" name="nama_kelas" >
                            <option value=""> Select Nama Kelas </option>
                           
                        </select>
                    </div>      

                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary" id="submit" name="submit">Pilih</button>
                    </div>    

                </form>

                 <div class="col-md-12 table-judul-konten">
                  <?php foreach ($header as $wal): ?>
                    <div class="col-md-6">
                        <div class="col-md-3">
                        Kelas 
                        </div>
                        <div class="col-md-3">
                        : <?php echo $wal->kelas; ?>
                        </div>
                    </div>
                   
                    <div class="col-md-6">
                        <div class="col-md-3">
                        Wali Kelas 
                        </div>
                        <div class="col-md-3">
                        :   
                            <?php echo $wal->nama_guru; ?>
                           
                      
                        </div>
                    </div>
                        <div class="col-md-6">
                        <div class="col-md-3">
                        Nama Kelas 
                        </div>
                        <div class="col-md-3">
                        :  <?php echo $wal->nama_kelas; ?>
                        </div>
                    </div>
                     <div class="col-md-6">
                        <div class="col-md-3">
                        Tahun Ajaran 
                        </div>
                        <div class="col-md-3">
                        : <?php echo $wal->nama_ta; ?>
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
                            <th>Kelas</th>
                            <th>Nama Kelas</th>
                            <th>NISN</th>
                            <th>Nama Lengkap</th> 
                            <th>JK</th>
                            <th>Action</th>   
                        </tr>
                        </thead>
                        <tbody>
                          <?php foreach ($m_kelas_anggota as $row): ?>
                        <tr>
                          
                          <td><?php echo $row->kelas;?></td>
                          <td><?php echo $row->nama_kelas;?></td>
                          <td><?php echo $row->nisn;?></td>
                          <td><?php echo $row->nama_siswa;?></td>
                          <td><?php echo $row->jk;?></td>
                          <td>
                              <a href="<?php echo base_url('Kelas_anggota/view/'.$row->id)?>" title="Click to View Detail" class="btn btn-info"><i class="fa fa-eye"></i></a>
                              <a href="<?php echo base_url('Kelas_anggota/delete/'.$row->id)?>" title="Click to Delete" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                            
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

<script>
  function selectKelas()
    {
       var kelas = $('#kelas').val();
        
        $.post('<?php echo base_url();?>Kelas_anggota/getNamaKelas/',
      {
        kelas:kelas
        
        },
        function(data) 
        {
        
        $('#nama_kelas').html(data);
        }); 
     
    }
</script>

