        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="#">
                    <img src="<?=base_url()?>theme/images/icon/logo.png" alt="Cool Admin" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li class="<?php if($this->uri->segment(1)=="" || $this->uri->segment(1)=="prijava"){echo "active";}?>">
                            <a class="js-arrow" href="<?=base_url()?>">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                        </li>
                        <li class="<?php if($this->uri->segment(1)=="prijave"){echo "active";}?>">
                            <a href="<?=base_url()?>prijave">
                                <i class="fas fa-book"></i>Prijave</a>
                        </li>
                        <li class="<?php if($this->uri->segment(1)=="users"){echo "active";}?>">
                            <a href="<?=base_url()?>users">
                                <i class="fas fa-user"></i>Korisnici</a>
                        </li>
                        <li class="<?php if($this->uri->segment(1)=="kategorije"){echo "active";}?>">
                            <a href="<?=base_url()?>kategorije">
                                <i class="fas fa-book"></i>Kategorije</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

