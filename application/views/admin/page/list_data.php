<?php
  $nomor = 0;
  foreach ($listData as $row) {
    ?>
    <tr>
      <td class="text-center"><?=++$nomor?></td>
      <td><?=$row->nama_kategori?></td>
      <td><?=$row->judul_page?></td>
      <td><?=$row->seo_page?></td>
      <td><?=$row->link?></td>
      <td><img id="foto_users" style="width:20%;border: 1px solid #ddd;border-radius: 5px;padding: 5px;width: 100px;"  src="<?=base_url()?>assets/images/page/<?=$row->cover?>"></td>
      <td><?=$row->status?></td>
      <td>
        <?php
          $list_tag = explode(',',$row->tag);        
          foreach($list_tag as $get) {
            $this->db->where("id",$get);
            $tag = $this->db->get("tag")->row();
            echo ''.isset($tag->nama_tag) ? $tag->nama_tag.'<br/>':'';
            ?>
          <?php }
        ?>
      </td>
      <td style="width:10%" class="text-center" style="min-width:230px;">
        <button type="button" data-toggle="tooltip" title="Edit" class="btn btn-primary btn-sm" onclick="editData(<?=$row->id?>)"><i class="fa fa-pencil"></i></button>
        <button type="button" data-toggle="tooltip" title="Hapus" class="btn btn-danger btn-sm" onclick="deleteData(<?=$row->id?>)"><i class="fa fa-trash"></i></button>
      </td>
    </tr>
    <?php
  }
?>