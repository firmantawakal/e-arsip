<nav class="sidebar">
    <div class="sidebar-header">
                    
        <a href="#" class="sidebar-brand"> <img src="<?php echo base_url().'assets/images/head_logo.png' ?>" style="width: 150px;"/></a>
        <div class="sidebar-toggler not-active">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <div class="sidebar-body">
        <ul class="nav">
            <li class="nav-item <?php echo ($this->uri->segment(1) == 'suratmasuk' ? 'active' : ''); ?>">
                <a href="<?php echo site_url('suratmasuk') ?>" class="nav-link">
                    <i class="link-icon" data-feather="download"></i><span class="link-title">Surat Masuk</span></a>
            </li> 
            <li class="nav-item <?php echo ($this->uri->segment(1) == 'suratkeluar' ? 'active' : ''); ?>">
                <a href="<?php echo site_url('suratkeluar') ?>" class="nav-link">
                    <i class="link-icon" data-feather="upload"></i><span class="link-title">Surat Keluar</span></a>
            </li> 
        <?php 
        if ($this->session->userdata('level')=='admin') { ?>
            <li class="nav-item <?php echo ($this->uri->segment(1) == 'user' ? 'active' : ''); ?>">
                <a href="<?php echo site_url('user') ?>" class="nav-link">
                    <i class="link-icon" data-feather="user"></i><span class="link-title">User</span></a>
            </li>  
            <li class="nav-item <?php echo ($this->uri->segment(1) == 'jenis' ? 'active' : ''); ?>">
                <a href="<?php echo site_url('jenis') ?>" class="nav-link">
                    <i class="link-icon" data-feather="folder"></i><span class="link-title">Jenis</span></a>
            </li>  
            <li class="nav-item <?php echo ($this->uri->segment(1) == 'bagian' ? 'active' : ''); ?>">
                <a href="<?php echo site_url('bagian') ?>" class="nav-link">
                    <i class="link-icon" data-feather="database"></i><span class="link-title">Bagian</span></a>
            </li>  
        
        <?php 
        }
        ?>
        </ul>
    </div>
</nav>