<div class="right_col">

    <div class="row">

        <?php if (isset($profileData->human_id)) { ?>

            <!-- General informations -->
            <div class="col-md-8 col-sm-8">

                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-success alert-dismissible " role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                            </button>
                            <strong>Holy guacamole!</strong> Best check yo self, you're not looking too good.
                        </div>
                    </div>
                </div>

                <div class="row">

                    <div class="col-md-12">

                        <div class="x_panel">

                            <div class="x_title">
                                <h2>General Informations</h2>
                                <div class="clearfix"></div>
                            </div>

                            <div class="x_content">
                                <form action="<?php echo URL  ?>profile/update" method="POST">
                                    <input type="hidden" name="_token" value="<?php echo $_SESSION['auth7_token'] ?? '' ?>">
                                    <input type="hidden" name="user_id" value="<?php echo $profileData->id ?? '' ?>">
                                    <input type="hidden" name="human_id" value="<?php echo $profileData->human_id ?? '' ?>">
                                    <input type="hidden" name="edit" value="<?php echo password_hash('general_info', PASSWORD_DEFAULT) ?>">

                                    <div class="form-group">
                                        <label for="first_name">First Name</label>
                                        <input type="text" name="first_name" value="<?php if(isset($_SESSION['errors']['first_name'])){ echo $_SESSION['validated']['first_name'];}else{echo $profileData->first_name;}?>" id="first_name" class="form-control">
                                        <span class="text-danger"><?php echo  $_SESSION['errors']['first_name'] ?? ''?></span>
                                    </div>

                                    <div class="form-group">
                                        <label for="last_name">Last Name</label>
                                        <input type="text" name="last_name" value="<?php if(isset($_SESSION['errors']['last_name'])){ echo $_SESSION['validated']['last_name'];}else{echo $profileData->last_name;} ?>" id="last_name" class="form-control">
                                        <span class="text-danger"><?php echo  $_SESSION['errors']['last_name'] ?? ''?></span>
                                    </div>

                                    <div class="form-group text-right">
                                        <button type="submit" class="btn btn-sm btn-primary">Save</button>
                                    </div>
                                </form>
                            </div>

                        </div>

                    </div>
                </div>
            </div>

            <div class="col-md-4 col-sm-4">

                <!-- Avatar -->
                <div class="row">

                    <div class="col-md-12">
                        <div class="alert alert-success alert-dismissible " role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                            </button>
                            <strong>Holy guacamole!</strong> Best check yo self, you're not looking too good.
                        </div>
                    </div>

                    <div class="col-md-12">

                        <div class="x_panel">

                            <div class="x_title">
                                <h2>Avatar</h2>
                                <div class="clearfix"></div>
                            </div>

                            <div class="x_content">

                                <form action="<?php echo URL  ?>profile/update" method="POST">
                                    <div class="row">
                                        <div class="col-md-4 offset-md-4 profile_details">
                                            <div class="profile_view">
                                                <div class="col-md-12">
                                                    <img src="<?php echo URL ?>img/img.jpg" alt="" class="img-circle img-fluid">
                                                </div>

                                            </div>
                                        </div>
                                    </div>



                                    <div class="form-group">
                                        <label for="">Image</label>
                                        <input type="file" class="form-control-file" name="" id="" placeholder="">
                                        <small class="form-text text-danger">Lorem</small>
                                    </div>

                                    <div class="form-group text-right">
                                        <button type="submit" class="btn btn-sm btn-primary">Save</button>
                                    </div>
                                </form>

                            </div>

                        </div>
                    </div>
                </div>

                <!-- Password -->
                <div class="row">

                    <div class="col-md-12">
                        <div class="alert alert-success alert-dismissible " role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                            </button>
                            <strong>Holy guacamole!</strong> Best check yo self, you're not looking too good.
                        </div>
                    </div>

                    <div class="col-md-12">

                        <div class="x_panel">

                            <div class="x_title">
                                <h2>Password</h2>
                                <div class="clearfix"></div>
                            </div>

                            <div class="x_content">

                                <form>
                                    <div class="form-group">
                                        <label for="">Old Password</label>
                                        <input type="password" class="form-control" name="" id="" placeholder="">
                                        <small class="form-text text-danger">Lorem</small>
                                    </div>

                                    <div class="form-group">
                                        <label for="">New Password</label>
                                        <input type="password" class="form-control" name="" id="" placeholder="">
                                        <small class="form-text text-danger">Lorem</small>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Confirm New Password</label>
                                        <input type="password" class="form-control" name="" id="" placeholder="">
                                        <small class="form-text text-danger">Lorem</small>
                                    </div>

                                    <div class="form-group text-right">
                                        <button type="submit" class="btn btn-sm btn-primary">Save</button>
                                    </div>
                                </form>

                            </div>

                        </div>

                    </div>
                </div>

                <!-- Email -->
                <div class="row">

                    <div class="col-md-12">
                        <div class="alert alert-success alert-dismissible " role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                            </button>
                            <strong>Holy guacamole!</strong> Best check yo self, you're not looking too good.
                        </div>
                    </div>
                    
                    <div class="col-md-12">

                        <div class="x_panel">

                            <div class="x_title">
                                <h2>Email</h2>
                                <div class="clearfix"></div>
                            </div>

                            <div class="x_content">

                                <form>
                                    <div class="form-group">
                                        <label for="">Old Email</label>
                                        <input type="email" class="form-control" name="" id="">
                                        <small class="form-text text-danger">Lorem</small>
                                    </div>

                                    <div class="form-group">
                                        <label for="">New Email</label>
                                        <input type="email" class="form-control" name="" id="">
                                        <small class="form-text text-danger">Lorem</small>
                                    </div>

                                    <div class="form-group">
                                        <label for="">Confirm New Email</label>
                                        <input type="email" class="form-control" name="" id="">
                                        <small class="form-text text-danger">Lorem</small>
                                    </div>

                                    <div class="form-group text-right">
                                        <button type="submit" class="btn btn-sm btn-primary">Save</button>
                                    </div>
                                </form>

                            </div>

                        </div>

                    </div>
                </div>

            </div>
        <?php } ?>

    </div>

</div>

<?php

unset(
    $_SESSION['validated'],
    $_SESSION['errors'],
);