<div class="container" style="border-bottom: 1px solid rgba(136,132,133,1.00)"><img src="<?php echo base_url(); ?>asset/images/galeri_ico.png"></div>
	<div class="container_isi">
    	<div class="boxes">
            <?php if(isset($galeri)): ?>
              <?php foreach($galeri as $value): ?>
                <div class="box">
                <div class="box_photo">
                <a href="<?php echo base_url() ?>asset_admin/assets/uploads/cover/original/<?php echo $value['filename']; ?>" rel="single"  class="fancybox-effects-a" title="<?php echo $value['title']; ?>" style="margin:0 10px 0 0;">
                <img src="<?php echo base_url() ?>asset_admin/assets/uploads/cover/original/<?php echo $value['filename']; ?>" alt="" width="300px" height="auto"></a>
                </div>
                <p>
                    <?php echo substr($value['short_desc'], 0, 75) . "..."; ?>
                </p>
            </div>
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
        </div>