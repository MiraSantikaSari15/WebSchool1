<div class="row">
    <form class="form-horizontal" id="myForm" action="<?=base_url().'admin/guru/save_data'?>" method="post" enctype="multipart/form-data">
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
                        <label for="inputEmail3" class="col-md-2 control-label">NIP </label>
                        <div class="col-md-6">
                            <input type="text" class="form-control firstInput" id="nip" name="nip" value="<?=$getData->nip?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-md-2 control-label">Nama </label>
                        <div class="col-md-6">
                            <input type="text" class="form-control firstInput" id="nama" name="nama" value="<?=$getData->nama?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-md-2 control-label">Tanggal Lahir </label>
                        <div class="col-md-6">
                            <input type="date" class="form-control firstInput" id="tanggal_lahir" name="tanggal_lahir" value="<?=$getData->tanggal_lahir?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-md-2 control-label">Tempat Lahir </label>
                        <div class="col-md-6">
                            <input type="text" class="form-control firstInput" id="tempat_lahir" name="tempat_lahir" value="<?=$getData->tempat_lahir?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-md-2 control-label">Jenis Kelamin </label>
                        <div class="col-md-6">
                            <label><input type="radio" name="jk" class="flat-red" value="Laki-laki" checked>L &nbsp&nbsp</label>
                            <label><input type="radio" name="jk" class="flat-red" value="Perempuan" >P</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-md-2 control-label">Agama </label>
                        <div class="col-md-6">
                            <input type="text" class="form-control firstInput" id="agama" name="agama" value="<?=$getData->agama?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-md-2 control-label">Pendidikan </label>
                        <div class="col-md-6">
                            <input type="text" class="form-control firstInput" id="pendidikan" name="pendidikan" value="<?=$getData->pendidikan?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-md-2 control-label">Mata Pelajaran </label>
                        <div class="col-md-6">
                            <input type="text" class="form-control firstInput" id="mata_pelajaran" name="mata_pelajaran" value="<?=$getData->mata_pelajaran?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-md-2 control-label">Foto </label>
                        <div class="col-md-6">
                            <input type="file"  id="cover" name="file_foto" class="form-control" onchange="loadFile(event)" /><br>
                                <img id="foto_cover" style="width:30%;border: 1px solid #ddd;border-radius: 4px;padding: 5px;width: 150px;"  src="<?=base_url()?>assets/images/guru/<?=$getData->foto?>">
                        </div>
                    </div>

                    
                </div>
                <div class='box-footer'>
                    <a href='<?=base_url().'admin/guru/index'?>'> <button type='button' class='btn btn-danger pull-right'><i class="fa fa-close"></i> Batalkan</button></a>
                    <button type='submit' id="btnSubmit" class='btn btn-success pull-right' style="margin-right:5px"><i
                            class="fa fa-save"></i> Simpan</button>
                </div>
            </div>
    </form>
</div>

<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>;
<script>
$(".firstInput").on('input', function(e) {
  $(".secondInput").val( $(this).val().replace(/ /g, "-") );
});
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
            
            submitHandler: function (form, event) {
                var formData = new FormData(document.getElementById('myForm'));
                $("#btnSubmit").attr("disabled",true);
                $("#btnSubmit").html("<i class='fa fa-spin fa-spinner'></i> Loading...");
                $.ajax({
                    type    : "POST",
                    url     : "<?=base_url()?>admin/guru/save_data",
                    data    : formData,
                    dataType : "json",
                    processData : false,
                    contentType : false,
                    success: function (res) {
                        if(res.status == 'success') {
                            $("#btnSubmit").removeAttr("disabled");
                            $("#btnSubmit").html("<i class='fa fa-save'></i> Simpan");
                            alert(res.message);
                            location.href="<?=base_url()?>admin/guru/index"
                        }
                    }
                });

            }
        });
    });
</script>
<script>
    var loadFile = function(event) {
        var output = document.getElementById('foto_cover');
        output.src = URL.createObjectURL(event.target.files[0]);
    };
</script>