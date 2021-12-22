<div class="right_col">

    <div class="row">

        <div class="x_panel">

            <div class="x_content">

                <div class="row">
                    <div class="col-sm-12 text-left p-3 m-2">
                        <a href="<?php echo URL ?>user/create" class="btn btn-sm btn-primary">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New User
                        </a>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-12">

                        <table class="table table-bordered datatable">
                            <thead>
                                <tr>
                                    <th>Names</th>
                                    <th>Email</th>
                                    <th>Password</th>
                                    <th>Roles</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>John Doe</td>
                                    <td>j@f.com</td>
                                    <td>xK12pAZs</td>
                                    <td> - </td>
                                    <td class="text-center">
                                        <a href="<?php echo URL . 'user/show/1'  ?>" class="btn btn-primary btn-sm btn-xs"><i class="fa fa-eye"></i> View </a>
                                        <a href="<?php echo URL . 'user/edit/1'  ?>" class="btn btn-info btn-sm btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                                        <a href="<?php echo URL . 'user/delete/1'?>" class="btn btn-danger btn-sm btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Jane Moe</td>
                                    <td>j@moe.com</td>
                                    <td> - </td>
                                    <td> ADMIN</td>
                                    <td class="text-center">
                                        <a href="<?php echo URL . 'user/show/'  ?>" class="btn btn-primary btn-sm btn-xs"><i class="fa fa-eye"></i> View </a>
                                        <a href="<?php echo URL . 'user/edit/'  ?>" class="btn btn-info btn-sm btn-xs"><i class="fa fa-pencil"></i> Edit </a>
                                        <a href="<?php echo URL . 'user/delete/'?>" class="btn btn-danger btn-sm btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>

        </div>

    </div>

</div>