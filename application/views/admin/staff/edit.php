<div class="app-content icon-content">
    <div class="p-5"></div>
    <div class="section">
        <!-- Row opened -->
        <div class="row">
            <div class="col-lg-12">
                <?php if ($this->session->flashdata('message') !== NULL) {?>
                    <div class="alert alert-<?php echo $this->session->flashdata('message')['0'] == 1 ? 'success' : 'danger'; ?> alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <?php print_r($this->session->flashdata('message')['1']);?>
                    </div>
                <?php }?>
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><?= $title ?></h3>
                    </div>
                    <?php $attr = array('id' => 'edit_profile');?>
                    <?php echo form_open_multipart(current_url(), $attr); ?>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group" style="width:100%;">
                                    <label for="description" class="col-form-label">Role</label>
                                    <select class="form-control select-2 text-uppercase" name="role">
                                        <option value="" class="text-uppercase">Select Role</option>
                                        <option value="1" class="text-uppercase" <?= ($staff->group_id == "1") ? "selected" : "";?>>Admin</option>
                                        <option value="2" class="text-uppercase" <?= ($staff->group_id == "2") ? "selected" : "";?>>Manager</option>
                                        <option value="3" class="text-uppercase" <?= ($staff->group_id == "3") ? "selected" : "";?>>Employee</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group" style="width:100%;">
                                    <label for="description" class="col-form-label">Name</label>
                                    <input type="text" name="name" class="form-control" value="<?=$staff->name?>">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group" style="width:100%;">
                                    <label for="description" class="col-form-label">Profile Image</label>
                                    <input type="file" name="profile_image" class="form-control" value="<?=$staff->profile_image?>">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group" style="width:100%;">
                                    <label for="description" class="col-form-label">Email</label>
                                    <input type="email" name="email" class="form-control" value="<?=$staff->email?>">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group" style="width:100%;">
                                    <label for="description" class="col-form-label">Phone</label>
                                    <input type="number" name="phone" class="form-control" value="<?=$staff->phone?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success mt-1">Save</button>
                        <a href="<?= base_url('admin/staff') ?>" class="btn btn-secondary mt-1">Cancel</a>
                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
        <!-- Row closed -->
    </div>
</div>