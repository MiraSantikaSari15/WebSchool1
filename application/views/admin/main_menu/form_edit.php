<div class="row">
    <form class="form-horizontal" id="myForm" action="<?=base_url().'admin/main_menu/save_data'?>" method="post" enctype="multipart/form-data">
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
                        <label for="inputEmail3" class="col-md-2 control-label">Nama Menu <span style="color:red">*</span></label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="nama_menu" name="nama_menu" placeholder="Masukan Nama Menu..." value="<?=$getData->nama_menu?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-md-2 control-label">Link / URL <span style="color:red">*</span></label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="link" name="link" placeholder="Masukan Link / URL..." value="<?=$getData->link?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-md-2 control-label">Status Aktif</label>
                        <div class="col-md-6">
                            <select class="form-control" name="status_aktif" id="status_aktif">
                                <option value="yes" <?=($getData->status_aktif == 'yes' ? 'selected':'')?> >Iya</option>
                                <option value="no" <?=($getData->status_aktif == 'no' ? 'selected':'')?>>Tidak</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-md-2 control-label">Admin Menu</label>
                        <div class="col-md-6">
                            <select class="form-control" name="admin_menu" id="admin_menu">
                                <option value="yes" <?=($getData->admin_menu == 'yes' ? 'selected':'')?>>Iya</option>
                                <option value="no" <?=($getData->admin_menu == 'no' ? 'selected':'')?>>Tidak</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-md-2 control-label">Urutan & Keterangan</label>
                        <div class="col-md-3">
                            <input type="number" min=0 class="form-control" id="urutan" name="urutan" placeholder="Masukan Urutan Menu..." value="<?=$getData->urutan?>">
                        </div>
                        <div class="col-md-3">
                            <select class="form-control" name="keterangan" id="keterangan">
                                <option value="single_menu" <?=($getData->keterangan == 'single_menu' ? 'selected':'')?>>Single Menu</option>
                                <option value="multiple_menu" <?=($getData->keterangan == 'multiple_menu' ? 'selected':'')?>>Multiple Menu</option>
                            </select>
                        </div>
                    </div>

                    <small class="pull-right"><i>Ket : Tanda (<span style="color:red">*</span>) Wajib diisi</i></small>
                </div>
                <div class='box-footer'>
                    <a href='<?=base_url().'admin/main_menu/index'?>'> <button type='button' class='btn btn-danger pull-right'><i class="fa fa-close"></i> Batalkan</button></a>
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
                nama_menu: {
                    required: true,
                    minlength: 3
                },
                link: {
                    required: true,
                }
            },
            submitHandler: function (form, event) {
                var formData = new FormData(document.getElementById('myForm'));
                $("#btnSubmit").attr("disabled",true);
                $("#btnSubmit").html("<i class='fa fa-spin fa-spinner'></i> Loading...");
                $.ajax({
                    type    : "POST",
                    url     : "<?=base_url()?>admin/main_menu/save_data",
                    data    : formData,
                    dataType : "json",
                    processData	: false,
                    contentType	: false,
                    success: function (res) {
                        if(res.status == 'success') {
                            $("#btnSubmit").removeAttr("disabled");
                            $("#btnSubmit").html("<i class='fa fa-save'></i> Simpan");
                            alert(res.message);
                            location.href="<?=base_url()?>admin/main_menu/index"
                        }
                    }
                });

            }
        });
    });
</script>