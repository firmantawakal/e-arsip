<nav class="navbar d-print-none">
    <a href="#" class="sidebar-toggler">
        <i data-feather="menu"></i>
    </a>
    <div class="navbar-content">
        <ul class="navbar-nav">
            <li class="nav-item dropdown nav-profile">
                <a
                    class="nav-link dropdown-toggle"
                    href="#"
                    id="profileDropdown"
                    role="button"
                    data-toggle="dropdown"
                    aria-haspopup="true"
                    aria-expanded="false"
                >
                    <img src="<?php echo base_url().'assets/images/polda-logo.png' ?>" alt="profile" />
                </a>
                <div class="dropdown-menu" aria-labelledby="profileDropdown">
                    <div
                        class="dropdown-header d-flex flex-column align-items-center"
                    >
                        <div class="info text-center">
                            <p class="email text-muted mb-0">Selamat Datang,</p>
                            <p class="name text-muted mb-3"><?php echo $this->session->userdata('nama-user') ?></p>
                        </div>
                    </div>
                    <div class="dropdown-body">
                        <ul class="profile-nav p-0 pt-3">
                            <li class="nav-item">
                                <?php 
                                $logout = null;
                                if ($this->session->userdata('level') == 'superadmin') {
                                    $logout = site_url('superadmin/login/logout');
                                }else{
                                    $logout = site_url('login/logout');
                                }
                                    ?>
                                <a href="<?php echo $logout; ?>" class="nav-link">
                                    <i data-feather="log-out"></i>
                                    <span>Log Out</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </li>
        </ul>
    </div>
    </nav>