<script type="text/javascript" src="<?=base_url()?>/assets/plugins/ckeditor/ckeditor.js"> </script>
<div class="row">
    <form class="form-horizontal" id="myForm" action="<?=base_url().'admin/page/save_data'?>" method="post" enctype="multipart/form-data">
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
                        <label for="inputEmail3" class="col-md-2 control-label">Kategori </label>
                        <div class="col-md-6">
                            <select class="form-control" name="id_kategori" id="id_kategori">
                                <option value='' selected>- Pilih Kategori -</option>";
                                <?php
                                    foreach($getKategori as $row) {
                                        $selected = "";
                                        if($row->id == $getData->id_kategori) {
                                            $selected = "selected";
                                        }
                                    ?>
                                    <option value="<?=$row->id?>" <?=$selected?> ><?=$row->nama_kategori?></option>
                                <?php } ?>
                                
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-md-2 control-label">Judul Page </label>
                        <div class="col-md-6"> 
                            <input type="text" class="form-control firstInput" id="judul_page" name="judul_page" placeholder="Masukan Judul Page..." value="<?=$getData->judul_page?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-md-2 control-label">Seo Page </label>
                        <div class="col-md-6">
                            <input type="text" class="form-control secondInput" id="seo_page" name="seo_page" placeholder="Masukan Seo Page..." value="<?=$getData->seo_page?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-md-2 control-label">Deskripsi</label>
                        <div class="col-md-9">
                            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="10" cols="20"><?=$getData->deskripsi?></textarea>
							<input type="hidden" name="deskripsi">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="inputEmail3" class="col-md-2 control-label">Cover </label>
                        <div class="col-md-6">
                            <input type="file"  id="cover" name="file_foto" class="form-control" onchange="loadFile(event)" /><br>
                                <img id="foto_cover" style="width:30%;border: 1px solid #ddd;border-radius: 4px;padding: 5px;width: 150px;"  src="<?=base_url()?>assets/images/page/<?=$getData->cover ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-md-2 control-label">Status </label>
                        <div class="col-md-6">
                            <select class="form-control" name="status" id="status">
                                <option value="draft" <?=($getData->status == 'draft' ? 'selected':'')?>>Draft</option>
                                <option value="publish" <?=($getData->status == 'publish' ? 'selected':'')?>>Publish</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="inputEmail3" class="col-md-2 control-label">Tag </label>
                       <div class="col-md-6">
                            <select class="form-control select2" name="tag[]" id="tag" multiple style="width: 100%;" placeholder="Silahkan pilih tag">
                                <?php
                                    foreach($get_tag as $getTag) {                                       
                                    ?>
                                    <option <?=in_array($getTag->id,explode(',',$getData->tag)) ? 'selected':''?> value="<?=$getTag->id?>" ><?=$getTag->nama_tag?></option>                                        
                                   <?php }
                                    ?>                                
                            </select>
                        </div>
                    </div>                    
                </div>
                <div class='box-footer'>
                    <a href='<?=base_url().'admin/page/index'?>'> <button type='button' class='btn btn-danger pull-right'><i class="fa fa-close"></i> Batalkan</button></a>
                    <button type='submit' id="btnSubmit" class='btn btn-success pull-right' style="margin-right:5px"><i
                            class="fa fa-save"></i> Simpan</button>
                </div>
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
				$("input[name=deskripsi]").val(CKEDITOR.instances.deskripsi.getData()); 						
                var formData = new FormData(document.getElementById('myForm'));
                $("#btnSubmit").attr("disabled",true);
                $("#btnSubmit").html("<i class='fa fa-spin fa-spinner'></i> Loading...");
                $.ajax({
                    type    : "POST",
                    url     : "<?=base_url()?>admin/page/save_data",
                    data    : formData,
                    dataType : "json",
                    processData : false,
                    contentType : false,
                    success: function (res) {
                        if(res.status == 'success') {
                            $("#btnSubmit").removeAttr("disabled");
                            $("#btnSubmit").html("<i class='fa fa-save'></i> Simpan");
                            alert(res.message);
                            location.href="<?=base_url()?>admin/page/index"
                        }
                    }
                });

            }
        });
    });
</script>
<script>
    $("#tag").select2();
    var loadFile = function(event) {
        var output = document.getElementById('foto_cover');
        output.src = URL.createObjectURL(event.target.files[0]);
    };
</script>

<script>

var ckeditor_config = {
	toolbar: [{
		name: 'basicstyles',
		items: ['Bold', 'Italic', 'Strike','Subscript','Superscript','-', 'RemoveFormat','SpecialChar','PasteFromWord']
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
	extraPlugins: 'autoembed,embedsemantic,image2,uploadimage,uploadfile,specialchar,pastefromword,mathjax',
	imageUploadUrl	: '<?=site_url("auth/uploader")?>',
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
CKEDITOR.replace('deskripsi', ckeditor_config);

</script>
