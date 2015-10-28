<div class="container" style="border-bottom: 1px solid rgba(136,132,133,1.00)"><img src="<?php echo base_url(); ?>asset/images/update_ico.png"></div>
	<div class="container_isi">
    	<div class="list_art">
             <ul>
                
                <li class="detil_judul"><?php echo $detail[0]->title; ?></li>
                <li class="detil_time">
                  <?php
                    $array_hari = array(1 => "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu", "Minggu");
                    $array_bulan = array(1 => "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
                    if ($detail[0]->created_date > date('Y')) {
                        echo $array_hari[date('N', $detail[0]->created_date)].", ".date('d', $detail[0]->created_date)." ".$array_bulan[date('n', $detail[0]->created_date)]." ".date('Y');
                        //echo date('l, d M Y', $csr_penghijauan[0]->created_date);
                    } else {
                        echo '-';
                    }
                  ?>
                </li>
                <li class="detil_poto"><img  src="<?php echo base_url() ?>asset_admin/assets/uploads/cover/original/<?php echo $detail[0]->filename; ?>"></li>
                <li class="isi">
                <?php echo $detail[0]->body; ?>
                </br>
                </li>
          	</ul>
        </div>
        <br class="clearfloat" />

  </div>