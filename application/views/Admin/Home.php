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
                <div class="form-group col-md-2">
                  Tahun Ajaran :
                </div> 
                <div class="form-group col-md-3">
                  <select class="text-center form-control" name="t_ajaran">
                    <option value="">Select Tahun Ajaran</option>
                    <?php foreach ($m_tahun as $row){ ?>
          
                    <?php $selected = (isset($_REQUEST['t_ajaran']) && $_REQUEST['t_ajaran'] == $row->id)?'selected="selected"':''; ?>
                    <option value="<?php echo $row->id;?>" <?php echo $selected ?>><?php echo $row->nama_ta; ?> - <?php echo $row->semester; ?></option>

                    <?php } ?>
                  </select>
       
                </div>
                
                  <button type="button" class="btn btn-info btn-lrg ajax pull-right" title="Refresh" onclick="location.reload()">
                    <i class="fa fa-refresh"></i></button>
                        <script type="text/javascript">
                            function reload(){
                            location.reload();
                            }
                        </script> 
              </div>
             
             
              <div class="box-body">
                <div id="interactive">
                   

                </div>
              </div>
              <!-- /.box-body-->
            </div>
            <!-- /.box -->
          </div>
          <!-- /.col -->
        </div>
    </section>