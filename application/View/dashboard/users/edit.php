<div class="right_col">

    <div class="row">

        <div class="x_panel">

            <div class="x_content">

                <div class="row">
                    <div class="col-sm-12 text-left p-3 m-2">
                        <a href="<?php echo URL ?>user" class="btn btn-sm btn-primary">
                            <i class="fa fa-list" aria-hidden="true"></i> Return To List
                        </a>
                    </div>
                </div>

                <form action="<?php echo URL  ?>user/store" method="POST">

                    <input type="hidden" name="_token" value="<?php echo $_SESSION['auth7_token'] ?? '' ?>">


                    <div class="row">

                        <div class="col-md-8">

                            <div class="row">

                                <div class="col-md-12">

                                    <div class="x_panel">

                                        <div class="x_title">
                                            <h2>General Informations</h2>
                                            <div class="clearfix"></div>
                                        </div>

                                        <div class="x_content">


                                            <div class="form-group">
                                                <label for="first_name">First Name</label>
                                                <input type="text" name="first_name" value="" id="first_name" class="form-control">
                                                <span class="text-danger"><?php echo  $_SESSION['errors']['first_name'] ?? '' ?></span>
                                            </div>

                                            <div class="form-group">
                                                <label for="last_name">Last Name</label>
                                                <input type="text" name="last_name" value="" id="last_name" class="form-control">
                                                <span class="text-danger"><?php echo  $_SESSION['errors']['last_name'] ?? '' ?></span>
                                            </div>

                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input type="email" name="email" value="" id="email" class="form-control">
                                                <span class="text-danger"><?php echo  $_SESSION['errors']['email'] ?? '' ?></span>
                                            </div>

                                            <div class="form-group">
                                                <label for="password">Password</label>
                                                <input type="password" name="password" value="" id="password" class="form-control">
                                                <span class="text-danger"><?php echo  $_SESSION['errors']['password'] ?? '' ?></span>
                                            </div>

                                            <div class="form-group">
                                                <label for="password_confirmation">Password Confirmation</label>
                                                <input type="password" name="password_confirmation" value="" id="password_confirmation" class="form-control">
                                                <span class="text-danger"><?php echo  $_SESSION['errors']['password_confirmation'] ?? '' ?></span>
                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                        <div class="col-md-4">

                            <div class="row">

                                <div class="col-md-12">

                                    <div class="x_panel">

                                        <div class="x_title">
                                            <h2>Roles</h2>
                                            <div class="clearfix"></div>
                                        </div>

                                        <div class="x_content">

                                            <div class="form-group row">


                                                <div class="col-md-12">
                                                    <div class="checkbox">
                                                        <label>
                                                            <div class="icheckbox_flat-green">
                                                                <input type="checkbox" class="flat">
                                                            </div> Checked
                                                        </label>
                                                        <label>
                                                            <div class="icheckbox_flat-green">
                                                                <input type="checkbox" class="flat">
                                                            </div> Checked
                                                        </label>
                                                        <label>
                                                            <div class="icheckbox_flat-green">
                                                                <input type="checkbox" class="flat">
                                                            </div> Checked
                                                        </label>
                                                        <label>
                                                            <div class="icheckbox_flat-green">
                                                                <input type="checkbox" class="flat">
                                                            </div> Checked
                                                        </label>
                                                        <label>
                                                            <div class="icheckbox_flat-green">
                                                                <input type="checkbox" class="flat">
                                                            </div> Checked
                                                        </label>
                                                        <label>
                                                            <div class="icheckbox_flat-green">
                                                                <input type="checkbox" class="flat">
                                                            </div> Checked
                                                        </label>
                                                        <label>
                                                            <div class="icheckbox_flat-green">
                                                                <input type="checkbox" class="flat">
                                                            </div> Checked
                                                        </label>
                                                        <label>
                                                            <div class="icheckbox_flat-green">
                                                                <input type="checkbox" class="flat">
                                                            </div> Checked
                                                        </label>
                                                        <label>
                                                            <div class="icheckbox_flat-green">
                                                                <input type="checkbox" class="flat">
                                                            </div> Checked
                                                        </label>
                                                        <label>
                                                            <div class="icheckbox_flat-green">
                                                                <input type="checkbox" class="flat">
                                                            </div> Checked
                                                        </label>
                                                        <label>
                                                            <div class="icheckbox_flat-green">
                                                                <input type="checkbox" class="flat">
                                                            </div> Checked
                                                        </label>
                                                        <label>
                                                            <div class="icheckbox_flat-green">
                                                                <input type="checkbox" class="flat">
                                                            </div> Checked
                                                        </label>
                                                        <label>
                                                            <div class="icheckbox_flat-green">
                                                                <input type="checkbox" class="flat">
                                                            </div> Checked
                                                        </label>
                                                        <label>
                                                            <div class="icheckbox_flat-green">
                                                                <input type="checkbox" class="flat">
                                                            </div> Checked
                                                        </label>
                                                        <label>
                                                            <div class="icheckbox_flat-green">
                                                                <input type="checkbox" class="flat">
                                                            </div> Checked
                                                        </label>
                                                        <label>
                                                            <div class="icheckbox_flat-green">
                                                                <input type="checkbox" class="flat">
                                                            </div> Checked
                                                        </label>
                                                        <label>
                                                            <div class="icheckbox_flat-green">
                                                                <input type="checkbox" class="flat">
                                                            </div> Checked
                                                        </label>
                                                        <label>
                                                            <div class="icheckbox_flat-green">
                                                                <input type="checkbox" class="flat">
                                                            </div> Checked
                                                        </label>                
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                    </div>

                                </div>


                            </div>

                        </div>

                        <div class="col-md-12">

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group text-right">
                                        <button type="submit" class="btn btn-sm btn-primary">Save</button>
                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>

                </form>

            </div>

        </div>

    </div>

</div>