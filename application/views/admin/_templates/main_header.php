<?php $lang = $this->session->userdata('lang');?>
<div class="header-main header sticky">
    <div class="app-header header top-header navbar-collapse ">
        <div class="container-fluid">
            <div class="d-flex">
                <a class="header-brand" href="<?=base_url('admin/dashboard');?>">
                   Kathasagar
                </a>
                <a href="#" data-toggle="sidebar" class="nav-link icon toggle"><i class="fe fe-align-justify fs-20"></i></a>
                <div class="d-flex header-right ">
                    <div class="dropdown drop-profile">
                        <a class="nav-link pr-0 leading-none" href="#" data-toggle="dropdown" aria-expanded="false">
                            <div class="profile-details mt-1">
                                <?php
                                if($this->session->userdata['group_id'] == 1)
                                {
                                    ?>
                                    <span class="mr-3 mb-0  fs-15 font-weight-semibold"><?=$this->user->name?></span>
                                    <?php
                                }
                                ?>
                                <small class="text-muted mr-3"><?=$this->user->company_name?></small>
                            </div>
                            <?php if ($this->user->profile_image) {?>
                                <img class="avatar avatar-md brround" src="<?=base_url($this->user->profile_image)?>">
                            <?php } else {?>
                                <img class="avatar avatar-md brround" src="<?=base_url('assets/images/users/2.jpg')?>">
                            <?php }?>
                         </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow animated bounceInDown w-250">
                            <div class="user-profile bg-header-image border-bottom p-3">
                                <div class="user-image text-center">
                                    <?php if ($this->user->profile_image) {?>
                                        <img class="user-images" src="<?=base_url($this->user->profile_image)?>">
                                    <?php } else {?>
                                        <img class="user-images" src="<?=base_url('assets/images/users/2.jpg')?>">
                                    <?php }?>
                                </div>
                                <div class="user-details text-center">
                                    <?php
                                    if($this->session->userdata['group_id'] == 1)
                                    {
                                        ?>
                                        <h4 class="mb-0"><?=$this->user->name?></h4>
                                        <p class="mb-1 fs-13 text-white-50"><?=$this->user->email?></p>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>
                            <?php
                            if($this->session->userdata['group_id'] != 2)
                            {
                                ?>
                                <a class="dropdown-item" href="<?=base_url('admin/profile')?>">
                                    <i class="dropdown-icon mdi mdi-account-outline "></i> Profile
                                </a>
                                <?php
                            }?>
                            <a class="dropdown-item mb-1" href="<?=base_url('auth/logout')?>">
                                <i class="dropdown-icon mdi  mdi-logout-variant"></i> Sign Out
                            </a>
                        </div>
                    </div>
                    <!-- Profile -->
                </div>
            </div>
        </div>
    </div>
</div>
