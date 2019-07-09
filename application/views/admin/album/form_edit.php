<div class="row">
    <form class="form-horizontal" id="myForm" action="<?=base_url().'admin/album/save_data'?>" method="post" enctype="multipart/form-data">
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
                        <label for="inputEmail3" class="col-md-2 control-label">Nama Album </label>
                        <div class="col-md-6">
                            <input type="text" class="form-control firstInput" id="nama_album" name="nama_album" placeholder="Masukan Nama Album..." value="<?=$getData->nama_album?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-md-2 control-label">Seo Album </label>
                        <div class="col-md-6">
                            <input type="text" class="form-control secondInput" id="seo_album" name="seo_album" placeholder="Masukan Seo Album..." value="<?=$getData->seo_album?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-md-2 control-label">Cover </label>
                        <div class="col-md-6">
                             <input type="file"  id="cover" name="file_foto" class="form-control" onchange="loadFile(event)" /><br>
                                <img id="foto_cover" style="width:30%;border: 1px solid #ddd;border-radius: 4px;padding: 5px;width: 150px;"  src="<?=base_url()?>assets/images/album/<?=$getData->cover ?>">
                        </div>
                    </div>
                   
                </div>
                <div class='box-footer'>
                    <a href='<?=base_url().'admin/album/index'?>'> <button type='button' class='btn btn-danger pull-right'><i class="fa fa-close"></i> Batalkan</button></a>
                    <button type='submit' id="btnSubmit" class='btn btn-success pull-right' style="margin-right:5px"><i
                            class="fa fa-save"></i> Simpan</button>
                </div>
            </div>
    </form>
</div>

<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
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
                    url     : "<?=base_url()?>admin/album/save_data",
                    data    : formData,
                    dataType : "json",
                    processData : false,
                    contentType : false,
                    success: function (res) {
                        if(res.status == 'success') {
                            $("#btnSubmit").removeAttr("disabled");
                            $("#btnSubmit").html("<i class='fa fa-save'></i> Simpan");
                            alert(res.message);
                            location.href="<?=base_url()?>admin/album/index"
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