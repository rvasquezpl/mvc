

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Dashboard
                <small>Control panel</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="../#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Dashboard</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="box" id="users-list">
                        <div class="box-header with-border">
                            <h3 class="box-title">Users List</h3>
                            <button class="btn btn-danger pull-right open-popu" type="button" data-modal-target="#add-category-form" data-target="<?= url('/admin/categories/add');?>">Add New Category</button>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table class="table table-bordered">
                                <tr>
                                    <th>#</th>
                                    <th>User name</th>
                                    <th>Group</th>
                                    <th>Email</th>
                                    <th>Created</th>
                                    <th>Status</th>
                                    <th>Gender</th>
                                    <th>Update</th>
                                </tr>
                                <tr>
                                    <td>1.</td>
                                    <td>Ayman Elash</td>
                                    <td>Aminstration</td>
                                    <td>contact@aymanelash.com</td>
                                    <td>01/01/2016</td>
                                    <td>Enabled</td>
                                    <td>male</td>
                                    <td><a href="#" class="label label-info">Edit</a><a href="#" class="label label-info">Delete</a></td>
                                </tr>
                                <tr>
                                    <td>2.</td>
                                    <td>Ayman Elash</td>
                                    <td>Aminstration</td>
                                    <td>contact@aymanelash.com</td>
                                    <td>01/01/2016</td>
                                    <td>Enabled</td>
                                    <td>male</td>
                                    <td><a href="#" class="label label-info">Edit</a><a href="#" class="label label-info">Delete</a></td>
                                </tr>
                                <tr>
                                    <td>3.</td>
                                    <td>Ayman Elash</td>
                                    <td>Aminstration</td>
                                    <td>contact@aymanelash.com</td>
                                    <td>01/01/2016</td>
                                    <td>Enabled</td>
                                    <td>male</td>
                                    <td><a href="#" class="label label-info">Edit</a><a href="#" class="label label-info">Delete</a></td>
                                </tr>
                                <tr>
                                    <td>4.</td>
                                    <td>Ayman Elash</td>
                                    <td>Aminstration</td>
                                    <td>contact@aymanelash.com</td>
                                    <td>01/01/2016</td>
                                    <td>Enabled</td>
                                    <td>male</td>
                                    <td><a href="#" class="label label-info">Edit</a><a href="#" class="label label-info">Delete</a></td>
                                </tr>
                            </table>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer clearfix">
                            <!-- <ul class="pagination pagination-sm no-margin pull-right">
                              <li><a href="#">&laquo;</a></li>
                              <li><a href="#">1</a></li>
                              <li><a href="#">2</a></li>
                              <li><a href="#">3</a></li>
                              <li><a href="#">&raquo;</a></li>
                            </ul> -->
                        </div>
                    </div>
                </div>
            </div>


        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>

