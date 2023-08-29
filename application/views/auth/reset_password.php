
<div class="page">
   <div class="signup-page">
        <div class="col col-login mx-auto">
            <div class="text-center">
                <img src="<?= base_url('assets/images/brand/logo.png') ?>" class="header-brand-img desktop-logo h-100 mb-5" alt="Dashlot logo">
            </div>
        </div>
    </div>
    <!-- Container opened -->
    <div class="container">
        <div class="row">
            <div class="col-xl-6 justify-content-center mx-auto text-center">
                <div class="card">
                    <div class="row">
                        <div class="col-md-12 pl-0 ">
                            <div class="card-header text-center">
                                <h3 class="card-title"><?= $title ?></h3>
                            </div>
                            <div class="card-body signup">
                                <?php if ($this->session->flashdata('message') !== NULL) {?>
                                    <div class="alert alert-<?php echo $this->session->flashdata('message')['0'] == 1 ? 'success' : 'danger'; ?> alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <?php print_r($this->session->flashdata('message')['1']);?>
                                    </div>
                                <?php }?>
                                <?php $attr = array('id' => 'login-form');?>
                                <?php echo form_open_multipart(current_url(), $attr); ?>
                                <div class="row text-left">
                                    <div class="form-group col-md-12">
                                        <label>Password <span class="astrisk">*</span></label>
                                        <input type="password" name="password" class="form-control" placeholder="Enter password" autocomplete="off">
                                        <?php echo form_error('password'); ?>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label>Confirm Password <span class="astrisk">*</span></label>
                                        <input type="password" name="re_password" class="form-control" placeholder="Enter confirm password">
                                        <?php echo form_error('re_password'); ?>
                                    </div>
                                </div>
                                <div class="form-footer mt-1">
                                    <button class="btn btn-success btn-block" type="submit">Reset</button>
                                </div>
                                <div class="text-center fs-15 mt-3 pb-3"> <a href="<?= base_url('auth/login'); ?>" class="text-primary">Back to Login</a> </div>
                                <?php echo form_close(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Container closed -->
</div>
