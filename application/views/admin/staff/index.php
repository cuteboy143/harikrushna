<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<div class="app-content icon-content">
    <div class="section">
        <div class="page-header">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?=base_url('admin/dashboard');?>"><i class="fa fa-dashboard mr-1"></i> Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Staff</li>
            </ol>
             <div class="mt-3 mt-lg-0">
                <div class="d-flex align-items-center flex-wrap text-nowrap">
                    <!-- <a href="<?//=base_url('admin/staff/add')?>" class="btn btn-success btn-icon-text mr-2 d-none d-md-block"> <i class="fe fe-plus"></i> Add Staff</a> -->

                    <button class="btn btn-success btn-icon-text mr-2 d-none d-md-block dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Add Staff </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="<?= base_url('admin/staff/add_manager')?>">Add Manager</a>
                        <a class="dropdown-item" href="<?= base_url('admin/staff/add_employee')?>">Add Employee</a>
                    </div>
                </div>
            </div>
        </div>
        <?php if ($this->session->flashdata('message') !== NULL) {?>
            <div class="alert alert-<?php echo $this->session->flashdata('message')['0'] == 1 ? 'success' : 'danger'; ?> alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <?php print_r($this->session->flashdata('message')['1']);?>
            </div>
        <?php }?>
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Staff</h4>
                    </div>
                    <div class="card-body">
                        <div class="user-table">
                            <div class="table-responsive">
                                <table id="tables" class="table table-striped table-bordered text-nowrap dataTable no-footer dtr-inline">
                                    <thead>
                                        <tr>
                                            <th>Sr No</th>
                                            <th class="border-bottom-0">Name</th>
                                            <th class="border-bottom-0">Email</th>
                                            <th class="border-bottom-0">Phone</th>
                                            <th class="border-bottom-0">Staff Type</th>
                                            <th class="border-bottom-0">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 0; if($staff){ foreach($staff as $key => $sta){ $no = $no + 1;?>
                                        <tr>
                                            <td><?=$no?></td>
                                            <td><?=$sta->name?></td>
                                            <td><?=$sta->email?></td>
                                            <td><?=$sta->phone?></td>
                                            <td><?php if($sta->group_id == 1){echo "Admin";}elseif($sta->group_id == 2){echo "Manager";}elseif($sta->group_id == 3){echo "Employee";}?></td>
                                            <td>
                                            <a  data-toggle="data-toggle/data-dismiss" class="btn btn-primary" href="<?=base_url('admin/staff/edit/'.$sta->id);?>"><i class="fa fa-edit"></i></a></button>
                                            <a  class="btn btn-danger"href="<?=base_url('admin/staff/delete/'.$sta->id);?>"><i class="fa fa-trash"></i></a></button></td>
                                        </tr>
                                        <?php } } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
