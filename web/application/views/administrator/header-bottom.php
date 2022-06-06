<?php
 if ($this->session -> userdata('email') == "" && $this->session -> userdata('login') != true && $this->session -> userdata('role_id') != 1) {
      redirect('administrator/index');
    }
 ?>

     <!-- Menu aside start -->
    <div class="main-menu">
        <div class="main-menu-header">
           <ul class="nav-left-new">
                        <li>
                            <a id="collapse-menu" href="#">
                                <i class="ti-home"></i>
                            </a>
                        </li>
                        <li>
                            <a class="main-search morphsearch-search" href="#">
                                <i class="ti-user   "></i>
                            </a>
                        </li>
                        <li>
                            <a class="main-search morphsearch-search" href="#">
                                <i class="ti-settings"></i>
                            </a>
                        </li>
                        <li>
                            <a class="main-search morphsearch-search" href="#">
                                <i class="ti-email"></i>
                            </a>
                        </li>
                   
                    </ul>
        </div>
        <div class="main-menu-content">
            <ul class="main-navigation">
             <li class="nav-item has-class">
                <a href="<?php echo base_url(); ?>administrator/dashboard">
                    <i class="ti-home"></i>
                    <span>Dashboard</span>
                </a>
            </li>
             
            <li class="nav-item">
                <a href="#!">
                    <i class="ti-layout"></i>
                    <span>Users</span>
                </a>
                <ul class="tree-1">
                    <li><a href="<?php echo base_url(); ?>administrator/users/add-user">Add User</a></li>
                    <li><a href="<?php echo base_url(); ?>administrator/users/users">Users</a></li>
                </ul>
            </li>
                <li class="nav-item">
                    <a href="#!">
                        <i class="ti-layers"></i>
                        <span>Hotels</span>
                    </a>
                    <ul class="tree-1">
                        <li class="nav-sub-item"><a href="#">Hotels</a>
                            <ul class="tree-2">
                                <li><a href="<?php echo base_url(); ?>administrator/add-hotel">Add Hotel</a></li>
                                <li><a href="<?php echo base_url(); ?>administrator/list-hotel">List Hotels</a></li>
                            </ul>
                        </li>
                        <li><a href="<?php echo base_url(); ?>administrator/blogs/blog-comments">Comments</a></li>
                    </ul>

                </li>
            
                <li class="nav-item">
                    <a href="#!">
                        <i class="ti-settings"></i>
                        <span>Site Configuration</span>
                    </a>
                    <ul class="tree-1">
                        <li><a href="<?php echo base_url(); ?>administrator/site-configuration/update/1">Site Configuration</a></li>
                        <li><a href="<?php echo base_url(); ?>administrator/scopages">SCO</a></li>
                        <li> <a href="<?php echo base_url(); ?>administrator/sociallinks">Social Links</a></li>
                        <li> <a href="<?php echo base_url(); ?>administrator/page-contents">Page Contents</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <!-- Menu aside end -->
     <!-- Main-body start -->
    <!-- Main-body start -->
    <div class="main-body">
        <div class="page-wrapper">
            <!-- Page-header start -->
    <?php if($this->session->flashdata('danger')): ?>
      <?php echo '<div class="alert alert-danger icons-alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <i class="icofont icofont-close-line-circled"></i>
                </button>
                <p><strong>Error! &nbsp;&nbsp;</strong>'.$this->session->flashdata('danger').'</p></div>'; ?>
    <?php endif; ?>

     <?php if(validation_errors() != null): ?>
      <?php echo '<div class="alert alert-warning icons-alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <i class="icofont icofont-close-line-circled"></i>
                </button>
                <p><strong>Alert! &nbsp;&nbsp;</strong>'.validation_errors().'</p></div>'; ?>
    <?php endif; ?>

    <?php if($this->session->flashdata('match_old_password')): ?>
      <?php echo '<p class="alert alert-success">'.$this->session->flashdata('match_old_password').'</p>'; ?>
    <?php endif; ?>
