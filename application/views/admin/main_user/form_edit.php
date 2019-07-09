<div class="row">
    <form class="form-horizontal" id="myForm" action="<?=base_url().'admin/main_user/save_data'?>" method="post" enctype="multipart/form-data">
        <div class='col-md-12'>
            <div class='box box-info'>
                <div class='box-header with-border'>
                    <h3 class='box-title'>
                        <?=$judul?>
                    </h3>
                </div>
                <div class='box-body'>
                    <input type="hidden" name="id" value="<?=$getData->id?>"/>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-md-2 control-label">Username <span style="color:red">*</span></label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="username" name="username" placeholder="Masukan Nama Menu..." value="<?=$getData->username?>">
                           
                        </div>
                    </div>
                  <!--   <div class="form-group">
                        <label for="inputEmail3" class="col-md-2 control-label">Password <span style="color:red">*</span></label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="password" name="password" placeholder="Masukan Password..." value="<?=$getData->password?>">
                        </div>
                    </div> -->
                    <div class="form-group">
                        <label for="inputEmail3" class="col-md-2 control-label">Nama</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan Nama..." value="<?=$getData->nama?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-md-2 control-label">Email</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="email" name="email" placeholder="Masukan Email..." value="<?=$getData->email?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-md-2 control-label">Nomor Telepon </label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="nomor_telepon" name="nomor_telepon" placeholder="Masukan Nomor Telepon..." value="<?=$getData->nomor_telepon?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-md-2 control-label">Level User</label>
                        <div class="col-md-6">
                            <select class="form-control" name="level_user" id="level_user">
                                <option value="admin" <?=($getData->level_user == 'admin' ? 'selected':'')?> >Admin</option>
                                <option value="user" <?=($getData->level_user == 'user' ? 'selected':'')?>>User</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-md-2 control-label">Foto </label>
                        <div class="col-md-6">
                            <input type="file"  id="foto" name="file_foto" class="form-control" onchange="loadFile(event)" /><br>
                                <img id="foto_users" style="width:30%;border: 1px solid #ddd;border-radius: 4px;padding: 5px;width: 150px;"  src="<?=base_url()?>assets/images/users/<?=$getData->foto ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-md-2 control-label">Status Aktif</label>
                        <div class="col-md-6">
                            <select class="form-control" name="status_aktif" id="status_aktif">
                                <option value="yes" <?=($getData->status_aktif == 'yes' ? 'selected':'')?>>Iya</option>
                                <option value="no" <?=($getData->status_aktif == 'no' ? 'selected':'')?>>Tidak</option>
                            </select>
                        </div>
                    </div>
                    <small class="pull-right"><i>Ket : Tanda (<span style="color:red">*</span>) Wajib diisi</i></small>
                </div>
                <div class='box-footer'>
                    <a href='<?=base_url().'admin/main_user/index'?>'> <button type='button' class='btn btn-danger pull-right'><i class="fa fa-close"></i> Batalkan</button></a>
                    <button type='submit' id="btnSubmit" class='btn btn-success pull-right' style="margin-right:5px"><i
                            class="fa fa-save"></i> Simpan</button>
                </div>
            </div>
    </form>
</div>

<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<script>

    $(document).ready(function () {
        $("#myForm").validate({
            debug: true,
            errorClass: 'has-error help-inline',
            validClass: 'success',
            errorElement: 'span',
            highlight: function (element, errorClass, validClass) {
                $(element).parents("div.control-group").addClass(errorClass).removeClass(validClass);
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).parents(".has-error").removeClass(errorClass).addClass(validClass);
            },
            rules: {
                username: {
                    required: true,
                    minlength: 3
                }
            },
            submitHandler: function (form, event) {
                var formData = new FormData(document.getElementById('myForm'));
                $("#btnSubmit").attr("disabled",true);
                $("#btnSubmit").html("<i class='fa fa-spin fa-spinner'></i> Loading...");
                $.ajax({
                    type    : "POST",
                    url     : "<?=base_url()?>admin/main_user/save_data",
                    data    : formData,
                    dataType : "json",
                    processData : false,
                    contentType : false,
                    success: function (res) {
                        if(res.status == 'success') {
                            $("#btnSubmit").removeAttr("disabled");
                            $("#btnSubmit").html("<i class='fa fa-save'></i> Simpan");
                            alert(res.message);
                            location.href="<?=base_url()?>admin/main_user/index"
                        }
                    }
                });

            }
        });
    });
</script>
<script>
    var loadFile = function(event) {
        var output = document.getElementById('foto_users');
        output.src = URL.createObjectURL(event.target.files[0]);
    };
</script>