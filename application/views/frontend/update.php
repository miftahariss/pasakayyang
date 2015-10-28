<div class="ilus"><img src="<?php echo base_url(); ?>asset/images/update_ilus.jpg"></div>
	<div class="container_isi">
        <?php if(isset($updates)): ?>
          <?php foreach($updates as $value): ?>
            <div class="list_art">
                 <ul>
                    <li class="list_poto"><img src="<?php echo base_url(); ?>asset/images/potho2.jpg" alt="" height="180px" width="300px"></li>
                    <li class="list_judul"><a href="<?php echo base_url(); ?>update/<?php echo $value->permalink; ?>"><?php echo $value->title; ?></a></li>
                    <li class="list_time">Sabtu, 19 April 2015  l   07.00 wib - 18.00 wib</li>
                    <span><?php echo $value->short_desc; ?></span>
                </ul>
            </div>
          <?php endforeach; ?>
        <?php endif; ?>
    	<div class="list_art">
             <ul>
                <li class="list_poto"><img src="<?php echo base_url(); ?>asset/images/potho1.jpg" alt="" height="180px" width="300px"></li>
                <li class="list_judul"><a href="#">Pembukaan Festifal Bajo Pasakayyang 2015</a></li>
                <li class="list_time">Sabtu, 19 April 2015  l   07.00 wib - 18.00 wib</li>
                <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit</span>
          	</ul>
        </div>
        <div class="list_art">
             <ul>
                <li class="list_poto"><img src="<?php echo base_url(); ?>asset/images/potho2.jpg" alt="" height="180px" width="300px"></li>
                <li class="list_judul"><a href="#">Pentas Budaya dan Kirab Seni bajo</a></li>
                <li class="list_time">Sabtu, 19 April 2015  l   07.00 wib - 18.00 wib</li>
                <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit</span>
          	</ul>
        </div>
        <div class="list_art">
             <ul>
                <li class="list_poto"><img src="<?php echo base_url(); ?>asset/images/potho3.jpg" alt="" height="180px" width="300px"></li>
                <li class="list_judul"><a href="#">Siapa sangka jika dia seorang lelaki</a></li>
                <li class="list_time">Sabtu, 19 April 2015  l   07.00 wib - 18.00 wib</li>
                <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit</span>
          	</ul>
        </div>
        <div class="list_art">
             <ul>
                <li class="list_poto"><img src="<?php echo base_url(); ?>asset/images/potho1.jpg" alt="" height="180px" width="300px"></li>
                <li class="list_judul"><a href="#">Siapa sangka jika dia seorang lelaki</a></li>
                <li class="list_time">Sabtu, 19 April 2015  l   07.00 wib - 18.00 wib</li>
                <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit</span>
          	</ul>
        </div>
        <div class="list_art">
             <ul>
                <li class="list_poto"><img src="<?php echo base_url(); ?>asset/images/potho2.jpg" alt="" height="180px" width="300px"></li>
                <li class="list_judul"><a href="#">Siapa sangka jika dia seorang lelaki</a></li>
                <li class="list_time">Sabtu, 19 April 2015  l   07.00 wib - 18.00 wib</li>
                <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit</span>
          	</ul>
        </div>
        <div class="list_art" style="margin-bottom:30px">
             <ul>
                <li class="list_poto"><img src="<?php echo base_url(); ?>asset/images/potho3.jpg" alt="" height="180px" width="300px"></li>
                <li class="list_judul"><a href="#">Siapa sangka jika dia seorang lelaki</a></li>
                <li class="list_time">Sabtu, 19 April 2015  l   07.00 wib - 18.00 wib</li>
                <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit</span>
          	</ul>
        </div><br class="clearfloat" />
        <div class="container">
        <div class="pagination">
      			<a href="#" class="page">first</a>
            <a href="#" class="page">2</a>
            <a href="#" class="page">3</a>
            <span class="page active">4</span>
            <a href="#" class="page">5</a>
            <a href="#" class="page">6</a>
            <a href="#" class="page">last</a>
      	</div>
    </div>
  </div>