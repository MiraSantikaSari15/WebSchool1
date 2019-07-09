<?php
  $nomor = 0;
  foreach ($listData as $row) {
    ?>
    <tr>
      <td class="text-center"><?=++$nomor?></td>
      <td><?=$row->nama_album?></td>
      <td><?=$row->nama_foto?></td>
      <td><?=$row->seo?></td>
      <td><img id="foto_galeri" style="width:20%;border: 1px solid #ddd;border-radius: 5px;padding: 5px;width: 100px;"  src="<?=base_url()?>assets/images/galeri/<?=$row->cover?>"></td>
      <td><?=$row->deskripsi?></td>
      <td style="width:10%" class="text-center" style="min-width:230px;">
        <button type="button" data-toggle="tooltip" title="Edit" class="btn btn-primary btn-sm" onclick="editData(<?=$row->id?>)"><i class="fa fa-pencil"></i></button>
        <button type="button" data-toggle="tooltip" title="Hapus" class="btn btn-danger btn-sm" onclick="deleteData(<?=$row->id?>)"><i class="fa fa-trash"></i></button>
      </td>
    </tr>
    <?php
  }
?>