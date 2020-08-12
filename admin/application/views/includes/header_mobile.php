        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="<?=base_url()?>">
                            <img src="<?=base_url()?>theme/images/icon/logo.png" alt="CoolAdmin" />
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <li class="<?php if($this->uri->segment(1)=="" || $this->uri->segment(1)=="prijava"){echo "active";}?>">
                            <a class="js-arrow" href="<?=base_url()?>">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                        </li>
                        <!-- <li class="<?php // if($this->uri->segment(1)=="prijave"){echo "active";}?>">
                            <a href="<?//=base_url()?>prijave">
                                <i class="fas fa-book"></i>Prijave</a>
                        </li> -->
                        <li class="<?php if($this->uri->segment(1)=="users"){echo "active";}?>">
                            <a href="<?=base_url()?>users">
                                <i class="fas fa-user"></i>Korisnici</a>
                        </li>
                        <li class="<?php if($this->uri->segment(1)=="kategorije"){echo "active";}?>">
                            <a href="<?=base_url()?>kategorije">
                                <i class="fas fa-book"></i>Kategorije</a>
                        </li>
                        <li class="<?php if($this->uri->segment(1)=="opstine"){echo "active";}?>">
                            <a href="<?=base_url()?>opstine">
                                <i class="fas fa-book"></i>Opštine</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->