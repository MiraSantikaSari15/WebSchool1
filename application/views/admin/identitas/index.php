<script type="text/javascript" src="<?=base_url()?>/assets/plugins/ckeditor/ckeditor.js"> </script>
<div class="row">
    <form class="form-horizontal" id="myForm" action="<?=base_url().'admin/identitas/save_data'?>" method="post" enctype="multipart/form-data">
        <div class='col-md-12'>
            <div class='box box-info'>
                <div class='box-header with-border'>
                    <h3 class='box-title'>
                        <?=$judul?>
                    </h3>
                </div>
                <div class='box-body'>
                    <input type="hidden" name="id" value="<?=$getData->id?>"/>
                    <!-- Nama -->
                    <div class="form-group">
                        <label for="inputEmail3" class="col-md-2 control-label">Nama <span style="color:red">*</span></label>
                        <div class="col-md-6">
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan Nama..." value="<?=$getData->nama?>">
                        </div>
                    </div>
                    <!-- Alamat -->
                    <div class="form-group">
                        <label for="inputEmail3" class="col-md-2 control-label">Alamat</label>
                        <div class="col-md-6">
                            <textarea class="form-control" name="alamat" rows="10" cols="20"> <?=$getData->alamat?></textarea>
                        </div>
                        </div>
                        <div class="form-group">
                        <label for="inputEmail3" class="col-md-2 control-label">Meta Deskripsi </label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="meta_deskripsi" name="meta_deskripsi" placeholder="Masukan Meta Deskripsi..." value="<?=$getData->meta_deskripsi?>">
                        </div>
                    <!-- Meta Keyword -->
                    </div>
                     <div class="form-group">
                        <label for="inputEmail3" class="col-md-2 control-label">Meta Keyword </label>
                        <div class="col-md-6">
                        <input type="text" class="form-control" id="meta_keyword" name="meta_keyword" placeholder="Masukan Meta Keyword..." value="<?=$getData->meta_keyword?>">
                        </div>
                    </div>
                    <!-- Nomor Telepon -->
                   <div class="form-group">
                        <label for="inputEmail3" class="col-md-2 control-label">Nomor Telepon </label>
                        <div class="col-md-6">
                        <input type="text" class="form-control" id="nomor_telepon" name="nomor_telepon" placeholder="Masukan Nomor Telepon..." value="<?=$getData->nomor_telepon?>">
                        </div>
                    </div>
                    <!-- Email -->
                    <div class="form-group">
                        <label for="inputEmail3" class="col-md-2 control-label">Email</label>
                        <div class="col-md-6">
                        <input type="text" class="form-control" id="email" name="email" placeholder="Masukan Email..." value="<?=$getData->email?>">
                        </div>
                    </div>
                    <!-- Link Facebook -->
                    <div class="form-group">
                        <label for="inputEmail3" class="col-md-2 control-label">Link Facebook </label>
                        <div class="col-md-6">
                        <input type="text" class="form-control" id="link_facebook" name="link_facebook" placeholder="Masukan Link Facebook..." value="<?=$getData->link_facebook?>">
                        </div>
                    </div>
                    <!-- Link Twitter -->
                    <div class="form-group">
                        <label for="inputEmail3" class="col-md-2 control-label">Link Twitter </label>
                        <div class="col-md-6">
                        <input type="text" class="form-control" id="link_twitter" name="link_twitter" placeholder="Masukan Link Twitter..." value="<?=$getData->link_twitter?>">
                        </div>
                    </div>
                    <!-- Link Instagram -->
                    <div class="form-group">
                        <label for="inputEmail3" class="col-md-2 control-label">Link Instagram </label>
                        <div class="col-md-6">
                        <input type="text" class="form-control" id="link_instagram" name="link_instagram" placeholder="Masukan Link Instagram..." value="<?=$getData->link_instagram?>">
                        </div>
                    </div>
                    <!-- Logo -->
                    <div class="form-group">
                        <label for="inputEmail3" class="col-md-2 control-label">Logo </label>
                        <div class="col-md-6">
                        <input type="file" class="form-control" id="logo" name="logo" onchange="loadFile(event)"/><br>
                        <img id="foto_logo" style="width:30%;border: 1px solid #ddd;border-radius: 4px;padding: 5px;width: 150px;"  src="<?=base_url()?>assets/images/identitas/<?=$getData->logo ?>">
                        </div>
                    </div>
                    <!-- Foto Kepala Sekolah -->
                   <div class="form-group">
                        <label for="inputEmail3" class="col-md-2 control-label">Foto Kepala Sekolah</label>
                        <div class="col-md-6">
                        <input type="file"  id="foto" name="foto" class="form-control" onchange="loadFile(event)" /><br>
                        <img id="foto_kes" style="width:30%;border: 1px solid #ddd;border-radius: 4px;padding: 5px;width: 150px;"  src="<?=base_url()?>assets/images/identitas/<?=$getData->foto ?>">
                        </div>
                    </div>
                    <!-- Sambutan -->
                    <div class="form-group">
                        <label for="inputEmail3" class="col-md-2 control-label">Sambutan</label>
                        <div class="col-md-9">
                        <textarea class="form-control" id="sambutan" name="sambutan" rows="10" cols="20"><?=$getData->sambutan?></textarea>
                        <input type="hidden" name="sambutan">
                        </div>
                    </div>
                    <small class="pull-right"><i>Ket : Tanda (<span style="color:red">*</span>) Wajib diisi</i></small>
                    </div>
                    
                </div>
                <div class='box-footer'>
                    <a href='<?=base_url().'admin/identitas/index'?>'> <button type='button' class='btn btn-danger pull-right'><i class="fa fa-close"></i> Batalkan</button></a>
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
                nama: {
                    required: true,
                    minlength: 3
                }
            },
            submitHandler: function (form, event) {
                $("input[name=sambutan]").val(CKEDITOR.instances.sambutan.getData());                         
                var formData = new FormData(document.getElementById('myForm'));
                $("#btnSubmit").attr("disabled",true);
                $("#btnSubmit").html("<i class='fa fa-spin fa-spinner'></i> Loading...");
                $.ajax({
                    type    : "POST",
                    url     : "<?=base_url()?>admin/identitas/save_data",
                    data    : formData,
                    dataType : "json",
                    processData : false,
                    contentType : false,
                    success: function (res) {
                        if(res.status == 'success') {
                            $("#btnSubmit").removeAttr("disabled");
                            $("#btnSubmit").html("<i class='fa fa-save'></i> Simpan");
                            alert(res.message);
                            location.href="<?=base_url()?>admin/identitas/index"
                        }
                    }
                });

            }
        });
    });
</script>
<script>
    var loadFile = function(event) {
        var output = document.getElementById('foto_logo');
        output.src = URL.createObjectURL(event.target.files[0]);
    };
</script>
<script>
    var loadFile = function(event) {
        var output = document.getElementById('foto_kes');
        output.src = URL.createObjectURL(event.target.files[0]);
    };
</script>
<script>

var ckeditor_config = {
    toolbar: [{
        name: 'basicstyles',
        items: ['Bold', 'Italic', 'Strike','Subscript','Superscript','-', 'RemoveFormat','SpecialChar','EqnEditor','PasteFromWord']
    }, {
        name: 'paragraph',
        items: ['NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote']
    }, {
        name: 'links',
        items: ['Link', 'Unlink']
    }, {
        name: 'insert',
        items: ['Mathjax','Image', 'EmbedSemantic', 'Table']
    }, {
        name: 'tools',
        items: ['Maximize']
    }],

    customConfig: '',
    extraPlugins: 'autoembed,embedsemantic,image2,uploadimage,uploadfile,specialchar,eqneditor,pastefromword,mathjax',
    imageUploadUrl  : '<?=site_url("auth/uploader")?>',
    uploadUrl: '/uploader/upload.php',
    contentsCss: ['assets/pages/ckeditor/contents.css', 'assets/pages/ckeditor/artical.css'],
    bodyClass: 'article-editor',
    format_tags: 'p;h1;h2;h3;pre',
    removeDialogTabs: 'image:advanced;link:advanced',
    stylesSet: [
        /* Inline Styles */
        {
        name: 'Marker',
        element: 'span',
        attributes: {
        'class': 'marker'
        }
        }, {
        name: 'Cited Work',
        element: 'cite'
        }, {
        name: 'Inline Quotation',
        element: 'q'
        },

        /* Object Styles */
        {
        name: 'Special Container',
        element: 'div',
        styles: {
        padding: '5px 10px',
        background: '#eee',
        border: '1px solid #ccc'
        }
        }, {
        name: 'Compact table',
        element: 'table',
        attributes: {
        cellpadding: '5',
        cellspacing: '0',
        border: '1',
        bordercolor: '#ccc'
        },
        styles: {
        'border-collapse': 'collapse'
        }
        }, {
        name: 'Borderless Table',
        element: 'table',
        styles: {
        'border-style': 'hidden',
        'background-color': '#E6E6FA'
        }
        }, {
        name: 'Square Bulleted List',
        element: 'ul',
        styles: {
        'list-style-type': 'square'
        }
        },

        /* Widget Styles */
        // We use this one to style the brownie picture.
        {
        name: 'Illustration',
        type: 'widget',
        widget: 'image',
        attributes: {
        'class': 'image-illustration'
        }
        },
        // Media embed
        {
        name: '240p',
        type: 'widget',
        widget: 'embedSemantic',
        attributes: {
        'class': 'embed-240p'
        }
        }, {
        name: '360p',
        type: 'widget',
        widget: 'embedSemantic',
        attributes: {
        'class': 'embed-360p'
        }
        }, {
        name: '480p',
        type: 'widget',
        widget: 'embedSemantic',
        attributes: {
        'class': 'embed-480p'
        }
        }, {
        name: '720p',
        type: 'widget',
        widget: 'embedSemantic',
        attributes: {
        'class': 'embed-720p'
        }
        }, {
        name: '1080p',
        type: 'widget',
        widget: 'embedSemantic',
        attributes: {
        'class': 'embed-1080p'
        }
        }
    ]
};

CKEDITOR.config.mathJaxLib = 'https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.5/MathJax.js?config=TeX-MML-AM_CHTML';
CKEDITOR.replace('sambutan', ckeditor_config);

</script>
