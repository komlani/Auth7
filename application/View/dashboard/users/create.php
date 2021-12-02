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
                                                <input type="text" name="first_name" value="<?php if (isset($_SESSION['validated']['first_name'])) echo $_SESSION['validated']['first_name'] ?>" id="first_name" class="form-control">
                                                <span class="text-danger"><?php echo  $_SESSION['errors']['first_name'] ?? '' ?></span>
                                            </div>

                                            <div class="form-group">
                                                <label for="last_name">Last Name</label>
                                                <input type="text" name="last_name" value="<?php if (isset($_SESSION['validated']['last_name'])) echo $_SESSION['validated']['last_name'] ?>" id="last_name" class="form-control">
                                                <span class="text-danger"><?php echo  $_SESSION['errors']['last_name'] ?? '' ?></span>
                                            </div>

                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input type="email" name="email" value="<?php if (isset($_SESSION['validated']['email']) || isset($_SESSION['errors']['email'])) echo $_SESSION['validated']['email'] ?>" id="email" class="form-control">
                                                <span class="text-danger"><?php echo  $_SESSION['errors']['email'] ?? '' ?></span>
                                            </div>

                                            <div class="form-group">
                                                <label for="password">Password</label>
                                                <input type="password" name="password" value="<?php if (isset($_SESSION['errors']['password_confirmation'])) echo $_SESSION['validated']['password'] ?>" id="password" class="form-control">
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
                                                                <input type="checkbox" name="roles[]" value="ADMIN" class="flat">
                                                            </div> ADMIN
                                                        </label>

                                                        <label>
                                                            <div class="icheckbox_flat-green">
                                                                <input type="checkbox" name="roles[]" value="AUTHOR" class="flat">
                                                            </div> AUTHOR
                                                        </label>

                                                        <label>
                                                            <div class="icheckbox_flat-green">
                                                                <input type="checkbox" name="roles[]" value="COLLABORATOR" class="flat">
                                                            </div> COLLABORATOR
                                                        </label>

                                                        <label>
                                                            <div class="icheckbox_flat-green">
                                                                <input type="checkbox" name="roles[]" value="CONSULTANT" class="flat">
                                                            </div> CONSULTANT
                                                        </label>

                                                        <label>
                                                            <div class="icheckbox_flat-green">
                                                                <input type="checkbox" name="roles[]" value="CONSUMER" class="flat">
                                                            </div> CONSUMER
                                                        </label>

                                                        <label>
                                                            <div class="icheckbox_flat-green">
                                                                <input type="checkbox" name="roles[]" value="CONTRIBUTOR" class="flat">
                                                            </div> CONTRIBUTOR
                                                        </label>

                                                        <label>
                                                            <div class="icheckbox_flat-green">
                                                                <input type="checkbox" name="roles[]" value="COORDINATOR" class="flat">
                                                            </div> COORDINATOR
                                                        </label>

                                                        <label>
                                                            <div class="icheckbox_flat-green">
                                                                <input type="checkbox" name="roles[]" value="CREATOR" class="flat">
                                                            </div> CREATOR
                                                        </label>

                                                        <label>
                                                            <div class="icheckbox_flat-green">
                                                                <input type="checkbox" name="roles[]" value="DEVELOPER" class="flat">
                                                            </div> DEVELOPER
                                                        </label>

                                                        <label>
                                                            <div class="icheckbox_flat-green">
                                                                <input type="checkbox" name="roles[]" value="DIRECTOR" class="flat">
                                                            </div> DIRECTOR
                                                        </label>

                                                        <label>
                                                            <div class="icheckbox_flat-green">
                                                                <input type="checkbox" name="roles[]" value="EDITOR" class="flat">
                                                            </div> EDITOR
                                                        </label>

                                                        <label>
                                                            <div class="icheckbox_flat-green">
                                                                <input type="checkbox" name="roles[]" value="EMPLOYEE" class="flat">
                                                            </div> EMPLOYEE
                                                        </label>

                                                        <label>
                                                            <div class="icheckbox_flat-green">
                                                                <input type="checkbox" name="roles[]" value="MAINTAINER" class="flat">
                                                            </div> MAINTAINER
                                                        </label>

                                                        <label>
                                                            <div class="icheckbox_flat-green">
                                                                <input type="checkbox" name="roles[]" value="MANAGER" class="flat">
                                                            </div> MANAGER
                                                        </label>

                                                        <label>
                                                            <div class="icheckbox_flat-green">
                                                                <input type="checkbox" name="roles[]" value="MODERATOR" class="flat">
                                                            </div> MODERATOR
                                                        </label>

                                                        <label>
                                                            <div class="icheckbox_flat-green">
                                                                <input type="checkbox" name="roles[]" value="PUBLISHER" class="flat">
                                                            </div> PUBLISHER
                                                        </label>

                                                        <label>
                                                            <div class="icheckbox_flat-green">
                                                                <input type="checkbox" name="roles[]" value="REVIEWER" class="flat">
                                                            </div> REVIEWER
                                                        </label>

                                                        <label>
                                                            <div class="icheckbox_flat-green">
                                                                <input type="checkbox" name="roles[]" value="SUBSCRIBER" class="flat">
                                                            </div> SUBSCRIBER
                                                        </label>

                                                        <label>
                                                            <div class="icheckbox_flat-green">
                                                                <input type="checkbox" name="roles[]" value="SUPER_ADMIN" class="flat">
                                                            </div> SUPER ADMIN
                                                        </label>

                                                        <label>
                                                            <div class="icheckbox_flat-green">
                                                                <input type="checkbox" name="roles[]" value="SUPER_EDITOR" class="flat">
                                                            </div> SUPER EDITOR
                                                        </label>

                                                        <label>
                                                            <div class="icheckbox_flat-green">
                                                                <input type="checkbox" name="roles[]" value="SUPER_MODERATOR" class="flat">
                                                            </div> SUPER MODERATOR
                                                        </label>

                                                        <label>
                                                            <div class="icheckbox_flat-green">
                                                                <input type="checkbox" name="roles[]" value="TRANSLATOR" class="flat">
                                                            </div> TRANSLATOR
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