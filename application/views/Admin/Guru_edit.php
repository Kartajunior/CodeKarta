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
                <h4> <?php echo $detail_guru->nama_lengkap ?> </h4>
                
              </div>
              <div class="box-body">
                <div id="interactive">
                   
                   <div class="container bootstrap snippet">
                        <div class="row">
                            
                           
                        </div>
                        <div class="row">
                            <div class="col-sm-3"><!--left col-->
                            

                        <div class="text-center" style="margin-top:50px;">
                            <?php if ($detail_guru->foto == ""): ?>
                                <img src="<?php echo base_url(); ?>images/no-image.jpg" class="avatar img-circle img-thumbnail">
                            <?php else: ?>
                                <img src="<?php echo base_url(); ?>images/avatar5.png" class="avatar img-circle img-thumbnail" alt="avatar">
                            <?php endif ?>

                        </div>
                            <br>
                            <form action="<?php echo base_url('')?>" method="post" enctype="multipart/form-data">
                         
                                <div class="row"> 
                                    <div class="col-md-6 form-group has-feedback">
                                    <input type="file" name="file" class="form-control-file">
                                    </div>   
                                </div>
                        </div><!--/col-3-->
                        <div class="col-sm-9">
                    
                               
                                    <div class="form-group">
                                        
                                        <div class="col-xs-6">
                                            <label for="first_name"><h4>Kode Guru</h4></label>
                                            <input type="text"  class="form-control"  value="<?php echo $detail_guru->kode_guru ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        
                                        <div class="col-xs-6">
                                            <label for="last_name"><h4>NIP</h4></label>
                                             <input type="text"  class="form-control"  value="<?php echo $detail_guru->nip ?>">
                                            </div>
                                    </div>
                        
                                    <div class="form-group">
                                        
                                        <div class="col-xs-6">
                                            <label for="phone"><h4>Nama Lengkap</h4></label>
                                             <input type="text"  class="form-control" value="<?php echo $detail_guru->nama_lengkap ?>">    
                                        </div>
                                    </div>
                        
                                    <div class="form-group">
                                        <div class="col-xs-6">
                                            <label for="mobile"><h4>Jenis Kelamin</h4></label>
                                            <input type="text"  class="form-control" value="<?php echo $detail_guru->jk ?>">
                                        </div>

                                     <div class="form-group">
                                        
                                        <div class="col-xs-12">
                                            <label for="password2"><h4>Alamat</h4></label>
                                            <textarea class="form-control"  id="alamat"> 
                                                <?php echo $detail_guru->alamat ?>
                                            </textarea>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="form-group">
                                        
                                        <div class="col-xs-6">
                                            <label for="email"><h4>Tempat Lahir</h4></label>
                                            <input type="text"  class="form-control" value="<?php echo $detail_guru->tempat_lahir ?>">      
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        
                                        <div class="col-xs-6">
                                            <label for="email"><h4>Tangggal Lahir</h4></label>
                                            <input type="text"  class="form-control" value="<?php echo $detail_guru->tgl_lahir ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        
                                        <div class="col-xs-6">
                                            <label for="password"><h4>Jabatan</h4></label>
                                            <input type="text"  class="form-control" value="<?php echo $detail_guru->jabatan ?>"> 
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        
                                        <div class="col-xs-6">
                                            <label for="password2"><h4>Agama</h4></label>
                                            <input type="text"  class="form-control" value="<?php echo $detail_guru->agama ?>">
                                        </div>
                                    </div>
                                     <div class="form-group">
                                        
                                        <div class="col-xs-6">
                                            <label for="password2"><h4>Kode Pos</h4></label>
                                            <input type="text"  class="form-control" value="<?php echo $detail_guru->kd_pos ?>">    
                                        </div>
                                    </div>
                                     <div class="form-group">
                                        
                                        <div class="col-xs-6">
                                            <label for="password2"><h4>Telpon</h4></label>
                                            <input type="text"  class="form-control" value="<?php echo $detail_guru->tlp ?>">
                                        </div>
                                    </div>
                                     <div class="form-group">
                                        
                                        <div class="col-xs-6">
                                            <label for="password2"><h4>Tugas Tambahan</h4></label>
                                        <input type="text"  class="form-control" value="<?php echo $detail_guru->tugas_tambahan ?>">
                                        </div>
                                    </div>
                                     <div class="form-group">
                                        
                                        <div class="col-xs-6">
                                            <label for="password2"><h4>Email</h4></label>
                                        <input type="text"  class="form-control" value="<?php echo $detail_guru->email ?>">
                                        </div>
                                    </div>

                                     <div class="form-group">
                                        
                                        <div class="col-xs-6">
                                            <br>
                                           <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> Simpan</button>
                                        </div>
                                    </div>

                                </form>
                        </div><!--/col-9-->
                    </div><!--/row-->

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
