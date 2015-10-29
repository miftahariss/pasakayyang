<div class="container">
    <div class="navbar navbar-inverse">
        <div class="navbar-inner">
            <a href="#" class="brand"><strong>CMS</strong></a>
            <ul class="nav">
                <li><a href="<?php echo base_url()?>backend/acladmin" class="active"><span class=" icon-home"></span> Home</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Update <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo base_url()?>backend/acladmin/add_media"><span class="icon-plus-sign"></span> Add Update</a></li>
                        <li><a href="<?php echo base_url()?>backend/acladmin/view_media"><span class="icon-list"></span> View Update</a></li>
                    </ul>
                 </li>
                 <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Galeri <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo base_url()?>backend/acladmin/add_galeri"><span class="icon-plus-sign"></span> Add Galeri</a></li>
                        <li><a href="<?php echo base_url()?>backend/acladmin/view_galeri"><span class="icon-list"></span> View Galeri</a></li>
                    </ul>
                 </li>

                <!-- Only Administrator -->
                <?php if( $this->session->userdata('role') == 1 ): ?>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Administrator <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo base_url()?>backend/acladmin/add_user"><span class="icon-plus-sign"></span> Add New User</a></li>
                        <li><a href="<?php echo base_url()?>backend/acladmin/view_user"><span class="icon-list"></span> View User</a></li>
                        <!--<li><a href="<?php echo base_url()?>backend/acladmin/archive_user"><span class="icon-trash"></span> Archive User</a></li>-->
                    </ul>
                </li>
                <?php endif ?>
                <!-- Only Administrator -->

            </ul>
<!--            <ul class="pull-right nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?=$this->session->userdata('name')?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo base_url()?>backend/acladmin/edit_password"><span class="icon-edit"></span> Edit Password</a></li>
                        <li><a href="<?php echo base_url()?>backend/cmsauth/logout"><span class="icon-lock"></span> Logout</a></li>
                    </ul>
                </li>
            </ul>-->
<!--            <form class="navbar-search pull-right">-->
<!--                <input type="text" class="input-block-level search-query" placeholder="Search...">-->
<!--            </form>-->
        </div>
    </div><!-- end navbar-->
</div>