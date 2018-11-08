 <style type="text/css">
 /*Panel tabs*/
.panel-tabs {
    position: relative;
    bottom: 30px;
    clear:both;
    border-bottom: 1px solid transparent;
}

.panel-tabs > li {
    float: left;
    margin-bottom: -1px;
}

.panel-tabs > li > a {
    margin-right: 2px;
    margin-top: 4px;
    line-height: .85;
    border: 1px solid transparent;
    border-radius: 4px 4px 0 0;
    color: #A52A2A;
    font-weight: bold;
}

.panel-tabs > li > a:hover {
    border-color: transparent;
    color:#6495ED;
    background-color: transparent;
    font-weight: bold;
}

.panel-tabs > li.active > a,
.panel-tabs > li.active > a:hover,
.panel-tabs > li.active > a:focus {
    color:#FFFFFF;
    cursor: default;
    -webkit-border-radius: 2px;
    -moz-border-radius: 2px;
    border-radius: 2px;
    background-color: #A52A2A;
    border-bottom-color: transparent;
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
                <div class="panel-heading">
                    <h3 class="panel-title"> <?php echo $detail_siswa->nama_lengkap ?> </h3>
                    <span class="pull-right">
                        <!-- Tabs -->
                        <ul class="nav panel-tabs">
                            <li class="active"><a href="#tab1" data-toggle="tab">Biodata Siswa</a></li>
                            <li><a href="#tab2" data-toggle="tab">Data Orang Tua</a></li>
                    </span>
                </div>
                
              </div>
              <div class="box-body">
                <div id="interactive">

                               
                <div class="panel-body">
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab1">
                           
                           <div class="col-md-3">
                                <?php if ($detail_siswa->foto == ""): ?>
                                <img src="<?php echo base_url(); ?>images/no-image.jpg" class="avatar img-circle img-thumbnail">
                            <?php else: ?>
                                <img src="<?php echo base_url(); ?>images/avatar5.png" class="avatar img-circle img-thumbnail" alt="avatar">
                            <?php endif ?>
                           </div> 
                           
                           <div class="col-md-9">
                                <div class="col-md-4">
                                    <label for="first_name"><h4>Nama Lengkap</h4></label>
                                    <input type="text" readonly class="form-control"  value="<?php echo $detail_siswa->nama_lengkap ?>">
                                </div>

                                 <div class="col-md-4">
                                    <label for="first_name"><h4> NISN</h4></label>
                                    <input type="text" readonly class="form-control"  value="<?php echo $detail_siswa->nisn ?>">
                                </div>

                                 <div class="col-md-4">
                                    <label for="first_name"><h4> NIS </h4></label>
                                    <input type="text" readonly class="form-control"  value="<?php echo $detail_siswa->nis ?>">
                                </div>

                                 <div class="col-md-4">
                                    <label for="first_name"><h4> Tempat Lahir </h4></label>
                                    <input type="text" readonly class="form-control"  value="<?php echo $detail_siswa->tempat_lahir ?>">
                                </div>

                                 <div class="col-md-4">
                                    <label for="first_name"><h4> Tanggal Lahir </h4></label>
                                    <input type="text" readonly class="form-control"  value="<?php echo $detail_siswa->tgl_lahir ?>">
                                </div>

                                <div class="col-md-4">
                                    <label for="first_name"><h4>  Jenis Kelamin </h4></label>
                                    <input type="text" readonly class="form-control"  value="<?php echo $detail_siswa->jk ?>">
                                </div>

                                <div class="col-md-4">
                                    <label for="first_name"><h4>  Agama </h4></label>
                                    <input type="text" readonly class="form-control"  value="<?php echo $detail_siswa->agama ?>">
                                </div>

                                <div class="col-md-8">
                                    <label for="first_name"><h4>  Alamat </h4></label>
                                    <textarea class="form-control" readonly id="alamat"> 
                                                <?php echo $detail_siswa->alamat_siswa ?>
                                    </textarea>
                                </div>

                                <div class="col-md-4">
                                    <label for="first_name"><h4>  Kode Pos </h4></label>
                                    <input type="text" readonly class="form-control"  value="<?php echo $detail_siswa->kode_pos ?>">
                                </div>

                           </div> 

                        </div>
                        <div class="tab-pane" id="tab2">

                            <div class="col-md-6">
                                
                                <div class="col-md-6">
                                    <label for="first_name"><h4> Nama Ayah </h4></label>
                                    <input type="text" readonly class="form-control" value="<?php echo $detail_siswa->nama_ayah ?>">
                                </div>

                                <div class="col-md-6">
                                    <label for="first_name"><h4> Tanggal Lahir Ayah </h4></label>
                                    <input type="text" readonly class="form-control"  value="<?php echo $detail_siswa->lahir_ayah ?>">
                                </div>

                                <div class="col-md-6">
                                    <label for="first_name"><h4> Pendidikan Ayah </h4></label>
                                    <input type="text" readonly class="form-control"  value="<?php echo $detail_siswa->pendidikan_ayah ?>">
                                </div>

                                <div class="col-md-6">
                                    <label for="first_name"><h4> Pekerjaan Ayah </h4></label>
                                    <input type="text" readonly class="form-control"  value="<?php echo $detail_siswa->pekerjaan_ayah ?>">
                                </div>

                                <div class="col-md-6">
                                    <label for="first_name"><h4> Gaji Ayah </h4></label>
                                    <input type="text" readonly class="form-control"  value="Rp. <?php echo round($detail_siswa->gaji_ayah, 2) ?>">
                                </div>

                            </div>  

                            <div class="col-md-6">
                                
                                <div class="col-md-6">
                                    <label for="first_name"><h4> Nama Ibu </h4></label>
                                    <input type="text" readonly class="form-control"  value="<?php echo $detail_siswa->nama_ibu ?>">
                                </div>

                                <div class="col-md-6">
                                    <label for="first_name"><h4> Tanggal Lahir Ibu</h4></label>
                                    <input type="text" readonly class="form-control"  value="<?php echo $detail_siswa->lahir_ibu ?>">
                                </div>

                                 <div class="col-md-6">
                                    <label for="first_name"><h4> Pendidikan Ibu</h4></label>
                                    <input type="text" readonly class="form-control"  value="<?php echo $detail_siswa->pendidikan_ibu ?>">
                                </div>

                                 <div class="col-md-6">
                                    <label for="first_name"><h4> Pekerjaan Ibu</h4></label>
                                    <input type="text" readonly class="form-control"  value="<?php echo $detail_siswa->pekerjaan_ibu ?>">
                                </div>

                                <div class="col-md-6">
                                    <label for="first_name"><h4> Gaji Ibu</h4></label>
                                    <input type="text" readonly class="form-control"  value="Rp. <?php echo $detail_siswa->gaji_ibu ?>">
                                </div>

                            </div>  

                            <div class="col-md-12">
                                    <label for="first_name"><h4> Alamat Orang Tua</h4></label>
                                    <textarea class="form-control" readonly id="alamat"> 
                                                <?php echo $detail_siswa->alamat_ortu ?>
                                    </textarea>
                            </div>

                             <div class="col-md-6">
                                    <label for="first_name"><h4> Nama Wali </h4></label>
                                    <input type="text" readonly class="form-control"  value="<?php echo $detail_siswa->nama_wali ?>">
                            </div>

                            <div class="col-md-6">
                                <label for="first_name"><h4> Pekerjaan Wali </h4></label>
                                <input type="text" readonly class="form-control"  value="<?php echo $detail_siswa->pekerjaan_wali ?>">
                            </div>

                             <div class="col-md-12">
                                    <label for="first_name"><h4> Alamat Wali</h4></label>
                                    <textarea class="form-control" readonly id="alamat"> 
                                                <?php echo $detail_siswa->alamat_wali ?>
                                    </textarea>
                            </div>

                        </div>
                </div>


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
