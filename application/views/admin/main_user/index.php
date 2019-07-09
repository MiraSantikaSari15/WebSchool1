
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Manajemen User</h3>
        <a data-toggle="tooltip" title="Tambah data" class='pull-right btn btn-success btn-sm' href='<?=base_url(); ?>admin/main_user/add_data'><i class="fa fa-plus"></i>&nbsp;Tambahkan Data</a>
      </div>
      <div class="box-body">
        <table id="table-data" class="table table-bordered table-striped table-responsive" style="width:100%">
          <thead>
            <tr>
              <th style="width:3%" class="text-center">No</th>
              <th>Username</th>
              
              <th>Nama</th>
              <th>Email</th>
              <th>Nomor Telepon</th>
              <th>Level User</th>
              <th>Foto</th>
              <th>Status Aktif</th>
              <th style='width:10%'>Action</th>
            </tr>
          </thead>
          <tbody id="list-data">
          
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
	var MyTable = $('#table-data').dataTable({
    "paging": true,
    "lengthChange": true,
    "searching": true,
    "ordering": true,
    "info": true,
    "autoWidth": false
  });

  function refresh() {
    MyTable = $('#table-data').dataTable();
  }

  showData();
  function showData() {
		$.get('<?php echo base_url('admin/main_user/search'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#list-data').html(data);
			refresh();
		});
  }

  function editData(id) {
    location.href="<?=base_url()?>admin/main_user/edit_data/"+id;
  }
  function deleteData(id) {
    if (confirm('Apakah anda yakin ingin menghapus data ini ?')) {
      $.ajax({
          type    : "POST",
          url     : "<?=base_url()?>admin/main_user/delete_data",
          data    : {
              id : id
          },
          dataType : "json",
          success: function (res) {
              if(res.status == 'success') {
                  alert(res.message);
                  showData();
              }
          }
      });
    }
  }
</script>