<div class="ilus"><img src="<?php echo base_url(); ?>asset/images/update_ilus.jpg"></div>
	<div class="container_isi">
        <?php $i = 1; ?>
        <?php if(isset($updates)): ?>
          <?php foreach($updates as $value): ?>
            <div class="list_art" <?php if ($i % 6 == 0) echo 'style="margin-bottom:30px"'; ?>>
                 <ul>
                    <li class="list_poto"><img src="<?php echo base_url() ?>asset_admin/assets/uploads/cover/original/<?php echo $value['filename']; ?>" alt="" height="180px" width="300px"></li>
                    <li class="list_judul"><a href="<?php echo base_url(); ?>update/<?php echo $value['permalink']; ?>"><?php echo $value['title']; ?></a></li>
                    <li class="list_time">
                      <?php
                      $array_hari = array(1 => "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu", "Minggu");
                      $array_bulan = array(1 => "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
                      if ($updates[0]['created_date'] > date('Y')) {
                          echo $array_hari[date('N', $updates[0]['created_date'])].", ".date('d', $updates[0]['created_date'])." ".$array_bulan[date('n', $updates[0]['created_date'])]." ".date('Y');
                          //echo date('l, d M Y', $csr_penghijauan[0]->created_date);
                      } else {
                          echo '-';
                      }
                      ?>
                    </li>
                    <span><?php echo $value['short_desc']; ?></span>
                </ul>
            </div>
          <?php $i++; ?>
          <?php endforeach; ?>
        <?php endif; ?>
        <br class="clearfloat" />
        <div class="container">
        <?php echo $page_links; ?>
        <?php /* <div class="pagination">
      			<a href="#" class="page">first</a>
            <a href="#" class="page">2</a>
            <a href="#" class="page">3</a>
            <span class="page active">4</span>
            <a href="#" class="page">5</a>
            <a href="#" class="page">6</a>
            <a href="#" class="page">last</a>
      	</div> */ ?>
    </div>
  </div>