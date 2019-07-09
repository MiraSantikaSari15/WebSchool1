<?php
  $nomor = 0;
  foreach ($listData as $row) {
    ?>
    <tr>
      <td class="text-center"><?=++$nomor?></td>
      <td><?=$row->username?></td>
     
      <td><?=$row->nama?></td>
      <td><?=$row->email?></td>
      <td><?=$row->nomor_telepon?></td>
      <td><?=$row->level_user?></td>
      <td><img id="foto_users" style="width:20%;border: 1px solid #ddd;border-radius: 5px;padding: 5px;width: 100px;"  src="<?=base_url()?>assets/images/users/<?=$row->foto?>"></td>
      <td><?=$row->status_aktif?></td>
      <td style="width:10%" class="text-center" style="min-width:230px;">
        <button type="button" data-toggle="tooltip" title="Edit" class="btn btn-primary btn-sm" onclick="editData(<?=$row->id?>)"><i class="fa fa-pencil"></i></button>
        <button type="button" data-toggle="tooltip" title="Hapus" class="btn btn-danger btn-sm" onclick="deleteData(<?=$row->id?>)"><i class="fa fa-trash"></i></button>
      </td>
    </tr>

    <?php

  }
?>
