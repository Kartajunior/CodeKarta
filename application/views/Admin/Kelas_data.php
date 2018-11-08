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
             
              

              <div class="box-body">
                <div id="interactive">
                    <?=$this->session->flashdata('notif')?>
                    <table id="example1" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                        <tr>
                          
                            <th>Kelas</th>
                            <th>Nama Kelas</th>
                            <th>Wali Kelas</th>
                            <th>Semester</th>
                            <th>Tahun Ajaran</th>
                            <th>Action</th>   
                        </tr>
                        </thead>
                        <tbody>
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

     $(document).ready(function() {
        
    $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings)
    {
        return {
        "iStart": oSettings._iDisplayStart,
        "iEnd": oSettings.fnDisplayEnd(),
        "iLength": oSettings._iDisplayLength,
        "iTotal": oSettings.fnRecordsTotal(),
        "iFilteredTotal": oSettings.fnRecordsDisplay(),
        "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
        "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
        };
    };
    var t = $("#example1").DataTable({
        initComplete: function() {
        var api = this.api();
        $('#mytable_filter input')
        .off('.DT')
        .on('keyup.DT', function(e) {
        if (e.keyCode == 13) {
        api.search(this.value).draw();
        }
        });
    },
    processing: true,
    serverSide: true,
    ajax: {"url": "<?php echo base_url().'index.php/Kelas_Data/Json'?>", "type": "POST"},
    columns: [
                
                {"data": "kelas"},
                {"data": "nama_kelas"},
                {"data": "nama_lengkap"},
                {"data": "semester"},
                {"data": "nama_ta"},
                {"data": "Action","width": "130"}
            ],
            "columnDefs": [ {
            "targets": 2,
             "className": "text-center",
            "orderable": false
            } ]
         
             });
    });

</script>
