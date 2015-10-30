<div class="container">
        	<h1>Selamat Datang </br>di Fastival Bajo Pasakayyang 2015
Sabtu 21 November 2015</h2>
<p>Sed ut perspiciatis, unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam eaque ipsa, quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt, explicabo. Nemo enim ipsam voluptatem, quia voluptas sit, aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos, qui ratione voluptatem sequi nesciunt, neque porro quisquam est, qui dolorem ipsum, quia dolor sit amet, consectetur, adipisci[ng] velit, sed quia non numquam [do] eius modi tempora inci[di]dunt, ut labore et dolore magnam aliquam quaerat voluptatem.</p>
<p class="top"><a href="#">more detil >></a></p> 
  </div>
     <br class="clearfloat" />
     <div class="container_full bg">
    
		<!-- end .slider -->
        <!-- begin .boxes -->
        
       <div class="boxes">
        	<div class="box">
            	<div><img src="<?php echo base_url(); ?>asset/images/potho1.jpg" alt=""></div>
                <h2>Ipsum is simply dummy text</h2>
                <p>
                	Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 
                </p>
                <p><a href="<?php echo base_url(); ?>morowali">More detil >></a></p>
            </div>
            <?php if(isset($updates)): ?>
                <?php foreach($updates as $value): ?>
                    <div class="box">
                    	<div><img src="<?php echo base_url() ?>asset_admin/assets/uploads/cover/original/<?php echo $value['filename']; ?>" alt=""></div>
                        <h2><?php echo substr($value['title'], 0, 40) . "..."; ?></h2>
                        <p>
                        	<?php echo substr($value['short_desc'], 0, 140) . "..."; ?>
                        </p>
                        <p><a href="<?php echo base_url(); ?>update">More detil >></a></p>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
            <?php if(isset($galeri)): ?>
                <?php foreach($galeri as $value): ?>
                    <div class="box">
                    	<div><img src="<?php echo base_url() ?>asset_admin/assets/uploads/cover/original/<?php echo $value['filename']; ?>" alt=""></div>
                        <h2><?php echo substr($value['title'], 0, 40) . "..."; ?></h2></h2>
                        <p>
                        	<?php echo substr($value['short_desc'], 0, 140) . "..."; ?>
                        </p>
                        <p><a href="<?php echo base_url(); ?>galeri">More detil >></a></p>
                    </div>
            <?php endforeach; ?>
            <?php endif; ?>
            <br class="clearfloat" />
        </div>
  </div>