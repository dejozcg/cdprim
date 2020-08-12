            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap2">
                            <!-- <form class="form-header" action="" method="POST">
                                <input class="au-input au-input--xl" type="text" name="search" placeholder="Search for datas &amp; reports..." />
                                <button class="au-btn--submit" type="submit">
                                    <i class="zmdi zmdi-search"></i>
                                </button>
                            </form> -->
                            <div class="header-button">
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="image">
                                        <img src="<?=base_url()?><?php echo (!empty($this->session->userdata('user')['user_image']))?($this->session->userdata('user')['user_image']):'theme/images/avatar.jpg';?>" class="wd-32 rounded-circle" alt="">
                                            <!-- <img src="<?//=base_url()?>theme/images/icon/avatar-01.jpg" alt="" /> -->
                                        </div>
                                        <div class="content">
                                            <a class="js-acc-btn" href="#"><?php echo (!empty($this->session->userdata('user')['name']))?($this->session->userdata('user')['name']): "Jane Doe"?></a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="image">
                                                    <a href="#">
                                                    <img src="<?=base_url()?><?php echo (!empty($this->session->userdata('user')['user_image']))?($this->session->userdata('user')['user_image']):'theme/images/avatar.jpg';?>" class="wd-32 rounded-circle" alt="">
                                                    </a>
                                                </div>
                                                <div class="content">
                                                    <h5 class="name">
                                                        <a href="#"><?php echo (!empty($this->session->userdata('user')['name']))?($this->session->userdata('user')['name']): "Jane Doe"?></a>
                                                    </h5>
                                                    <span class="email"><?php echo (!empty($this->session->userdata('user')['name']))?($this->session->userdata('user')['email']): "Jane Doe"?></span>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__body">
                                                <div class="account-dropdown__item">
                                                    <a href="<?=base_url()?>editprofile">
                                                        <i class="zmdi zmdi-account"></i>Account</a>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__footer">
                                                <a href="<?=base_url()?>logout">
                                                    <i class="zmdi zmdi-power"></i>Logout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->