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
                                    <label for="description" class="col-form-label">Name</label>
                                    <input type="text" name="name" class="form-control" value="<?=$katha_category->name?>">
                                    <?php echo form_error('name'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success mt-1">Save</button>
                        <a href="<?= base_url('admin/katha_category') ?>" class="btn btn-secondary mt-1">Cancel</a>
                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
        <!-- Row closed -->
    </div>
</div>