
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
                 <form action="<?php echo base_url().'Absensi/GetByKelas'; ?>" method="post">  
               
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

                  <form action="<?php echo base_url().'Absensi/Update'; ?>" method="post">


                    <table id="example1" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                        <tr>
                            <th>NISN</th>
                            <th>NIS</th>
                            <th>Nama Lengkap</th>
                            <th>Sakit</th> 
                            <th>Ijin</th>
                            <th>Alpa</th>    
                        </tr>
                        </thead>
                        <tbody>
                          <?php foreach ($m_absensi as $row): ?>
                        <tr>
                          

                          <td><?php echo $row->nisn;?></td>
                          <td><?php echo $row->nis;?></td>
                          <td><?php echo $row->nama_siswa;?></td>
                          <td>
                               <input type="hidden" id="id" name="id[]" value="<?php echo $row->id; ?>">
                               
                               <input type="text" name="sakit[]" id="sakit" class="form-control" style="width: 50px; height: 25px;" value="<?php echo $row->sakit; ?>"> 
                          </td>
                          <td> 
                              
                              <input type="text" name="ijin[]" id="ijin" class="form-control" style="width: 50px; height: 25px;" value="<?php echo $row->ijin; ?>"> 
                          </td>
                          <td> 
                           
                              <input type="text" name="alpa[]" id="alpa" class="form-control" style="width: 50px; height: 25px;" value="<?php echo $row->alpa; ?>"> 
                          </td>
                                
                        </tr>
                         <?php endforeach ?>
                        </tbody>
                        
                    </table>

                     
                         <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> Update Nilai</button> 
                  

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