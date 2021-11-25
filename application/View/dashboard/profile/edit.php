<div class="right_col">

    <div class="row">

        <?php if (isset($profileData)) { ?>

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
                                        <input type="text" name="first_name" value="<?php if (isset($_SESSION['errors']['first_name'])) {
                                                                                        echo $_SESSION['validated']['first_name'];
                                                                                    } else {
                                                                                        echo $profileData->first_name;
                                                                                    } ?>" id="first_name" class="form-control">
                                        <span class="text-danger"><?php echo  $_SESSION['errors']['first_name'] ?? '' ?></span>
                                    </div>

                                    <div class="form-group">
                                        <label for="last_name">Last Name</label>
                                        <input type="text" name="last_name" value="<?php if (isset($_SESSION['errors']['last_name'])) {
                                                                                        echo $_SESSION['validated']['last_name'];
                                                                                    } else {
                                                                                        echo $profileData->last_name;
                                                                                    } ?>" id="last_name" class="form-control">
                                        <span class="text-danger"><?php echo  $_SESSION['errors']['last_name'] ?? '' ?></span>
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

                                <form action="<?php echo URL  ?>profile/update" method="POST" enctype="multipart/form-data">
                                  
                                    <div class="row">
                                        <div class="col-md-4 offset-md-4 profile_details">
                                            <div class="profile_view">
                                                <div class="col-md-12">
                                                    <img src="<?php echo URL ?>img/img.jpg" alt="" class="img-circle img-fluid">
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <input type="hidden" name="_token" value="<?php echo $_SESSION['auth7_token'] ?? '' ?>">
                                    <input type="hidden" name="user_id" value="<?php echo $profileData->id ?? '' ?>">
                                    <input type="hidden" name="human_id" value="<?php echo $profileData->human_id ?? '' ?>">
                                    <input type="hidden" name="edit" value="<?php echo password_hash('avatar', PASSWORD_DEFAULT) ?>">


                                    <div class="form-group">
                                        <label for="avatar">Avatar</label>
                                        <input type="file" name="avatar" id="avatar" class="form-control-file">
                                        <span class="form-text text-danger"><?php echo  $_SESSION['errors']['avatar'] ?? '' ?></span>
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

                                <form action="<?php echo URL  ?>profile/update" method="POST">

                                    <input type="hidden" name="_token" value="<?php echo $_SESSION['auth7_token'] ?? '' ?>">
                                    <input type="hidden" name="user_id" value="<?php echo $profileData->id ?? '' ?>">
                                    <input type="hidden" name="human_id" value="<?php echo $profileData->human_id ?? '' ?>">
                                    <input type="hidden" name="edit" value="<?php echo password_hash('password', PASSWORD_DEFAULT) ?>">

                                    <div class="form-group">
                                        <label for="old_password">Old Password</label>
                                        <input type="password" name="old_password" id="old_password" class="form-control">
                                        <span class="text-danger"><?php echo  $_SESSION['errors']['old_password'] ?? '' ?></span>
                                        <span class="text-danger"><?php echo  $_SESSION['password_not_found'] ?? '' ?></span>
                                    </div>

                                    <div class="form-group">
                                        <label for="new_password">New Password</label>
                                        <input type="password" name="new_password" value="<?php if (isset($_SESSION['errors']['new_password'])) {
                                                                                                echo $_SESSION['validated']['new_password'];
                                                                                            } ?>" id="new_password" class="form-control">
                                        <span class="text-danger"><?php echo  $_SESSION['errors']['new_password'] ?? '' ?></span>
                                    </div>

                                    <div class="form-group">
                                        <label for="new_password_confirm">New Password Confirmation</label>
                                        <input type="password" name="new_password_confirm" value="<?php if (isset($_SESSION['errors']['new_password_confirm'])) {
                                                                                                        echo $_SESSION['validated']['new_password_confirm'];
                                                                                                    } ?>" id="new_password_confirm" class="form-control">
                                        <span class="text-danger"><?php echo  $_SESSION['errors']['new_password_confirm'] ?? '' ?></span>
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

                                <form action="<?php echo URL  ?>profile/update" method="POST">

                                    <input type="hidden" name="_token" value="<?php echo $_SESSION['auth7_token'] ?? '' ?>">
                                    <input type="hidden" name="user_id" value="<?php echo $profileData->id ?? '' ?>">
                                    <input type="hidden" name="human_id" value="<?php echo $profileData->human_id ?? '' ?>">
                                    <input type="hidden" name="edit" value="<?php echo password_hash('email', PASSWORD_DEFAULT) ?>">

                                    <div class="form-group">
                                        <label for="old_email">Old Email</label>
                                        <input type="email" name="old_email" value="<?php echo $profileData->email ?? '' ?>" id="old_email" class="form-control">
                                        <span class="text-danger"><?php echo  $_SESSION['errors']['old_email'] ?? '' ?></span>
                                        <span class="text-danger"><?php echo  $_SESSION['email_not_found'] ?? '' ?></span>
                                    </div>

                                    <div class="form-group">
                                        <label for="new_email">New Email</label>
                                        <input type="email" name="new_email" value="<?php if (isset($_SESSION['errors']['new_email']) || isset($_SESSION['errors']['new_email_confirm'])) {
                                                                                        echo $_SESSION['validated']['new_email'];
                                                                                    } ?>" id="new_email" class="form-control">
                                        <span class="text-danger"><?php echo  $_SESSION['errors']['new_email'] ?? '' ?></span>
                                    </div>

                                    <div class="form-group">
                                        <label for="new_email_confirm">New Email Confirmation</label>
                                        <input type="email" name="new_email_confirm" value="<?php if (isset($_SESSION['errors']['new_email_confirm'])) {
                                                                                                echo $_SESSION['validated']['new_email_confirm'];
                                                                                            } ?>" id="new_email_confirm" class="form-control">
                                        <span class="text-danger"><?php echo  $_SESSION['errors']['new_email_confirm'] ?? '' ?></span>
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
    $_SESSION['password_not_found'],
    $_SESSION['email_not_found'],
);
