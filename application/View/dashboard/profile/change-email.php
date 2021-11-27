<div class="right_col">

    <div class="row">

        <div class="col-md-6 offset-md-3">

            <?php if (isset($_SESSION['verification_email_sent'])) { ?>

                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-success alert-dismissible " role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                            </button>
                            <strong>Awesome, confirmation email have sent to your new email account!</strong>
                            <br>The change will take effect as soon as this new email address has been confirmed.
                        </div>
                    </div>
                </div>

            <?php } ?>

            <?php if (isset($_SESSION['verification_email_not_sent'])) { ?>

                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-danger alert-dismissible " role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                            </button>
                            <strong>Sorry, we got an issue to send you a confirmation email</strong>
                            <br> Retry later please :(
                        </div>
                    </div>
                </div>

            <?php } ?>

            <?php if (isset($_SESSION['verified'])) { ?>

                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-success alert-dismissible " role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                            </button>
                            <strong>Awesome !, your new email have been verified
                        </div>
                    </div>
                </div>

            <?php }?>

            <div class="row">

                <div class="col-md-12">

                    <div class="x_panel">

                        <div class="x_title">
                            <h2>Change Email</h2>
                            <div class="clearfix"></div>
                        </div>

                        <div class="x_content">

                            <form action="<?php echo URL  ?>changeEmail/store" method="POST">

                                <input type="hidden" name="_token" value="<?php echo $_SESSION['auth7_token'] ?? '' ?>">

                                <div class="form-group">
                                    <label for="newEmail">New Email</label>
                                    <input type="email" name="newEmail" value="<?php if (isset($_SESSION['validated']['newEmail'])) echo $_SESSION['validated']['newEmail'] ?>" id="newEmail" class="form-control">
                                    <span class="text-danger"><?php echo  $_SESSION['errors']['newEmail'] ?? '' ?></span>
                                    <span class="text-danger"><?php if (isset($_SESSION['email_already_exists'])) echo  "Sorry, email already taken" ?></span>
                                    <span class="text-danger"><?php if (isset($_SESSION['too_many_request'])) echo "Too many requests!  Retry later." ?></span>
                                </div>
                                
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" id="password" class="form-control">
                                    <span class="text-danger"><?php if (isset($_SESSION['wrong_password'])) echo  "Wrong password !" ?></span>
                                    <span class="text-danger"><?php echo  $_SESSION['errors']['password'] ?? '' ?></span>
                                </div>

                                <div class="form-group">
                                    <label for="password_confirmation">Password Confirmation</label>
                                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                                    <span class="text-danger"><?php echo  $_SESSION['errors']['password_confirmation'] ?? '' ?></span>
                                </div>

                                <div class="form-group text-right">
                                    <button type="submit" class="btn btn-sm btn-primary">Send</button>
                                </div>

                            </form>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

<?php
unset(
    $_SESSION['errors'],
    $_SESSION['validated'],
    $_SESSION['email_already_exists'],
    $_SESSION['too_many_request'],
    $_SESSION['verification_email_sent'],
    $_SESSION['verification_email_not_sent'],
    $_SESSION['verified'],
    $_SESSION["wrong_password"],
);
