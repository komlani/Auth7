<body class="login">

    <div class="login_wrapper">

        <div class="animate form login_form">

            <section class="login_content">

                <form action="<?php echo URL  ?>register/store" method="POST">

                    <h1>Register</h1>

                    <input type="hidden" name="_token" value="<?php echo $_SESSION['auth7_token'] ?>">

                    <div>
                        <input type="text" name="first_name" value="<?php echo $_SESSION['validated']['first_name'] ?? '' ?>" class="form-control <?php if (isset($_SESSION['errors']['first_name'])) {
                                                                                                                                                        echo 'mb-0';
                                                                                                                                                    } else {
                                                                                                                                                        echo 'mb-2';
                                                                                                                                                    } ?>" placeholder="First Name" autofocus required />
                        <div class="text-danger text-left mb-1"><?php echo $_SESSION['errors']['first_name'] ?? '' ?></div>
                    </div>
                    <div>
                        <input type="text" name="last_name" value="<?php echo $_SESSION['validated']['last_name'] ?? '' ?>" class="form-control <?php if (isset($_SESSION['errors']['last_name'])) {
                                                                                                                                                    echo 'mb-0';
                                                                                                                                                } else {
                                                                                                                                                    echo 'mb-2';
                                                                                                                                                } ?>" placeholder="Last Name" required />
                        <div class="text-danger text-left mb-1"><?php echo $_SESSION['errors']['last_name'] ?? '' ?></div>
                    </div>
                    <div>
                        <input type="email" name="email" value="<?php echo $_SESSION['validated']['email'] ?? '' ?>" class="form-control <?php if (isset($_SESSION['errors']['email'])) {
                                                                                                                                                echo 'mb-0';
                                                                                                                                            } else {
                                                                                                                                                echo 'mb-2';
                                                                                                                                            } ?>" placeholder="Email" required />
                        <div class="text-danger text-left mb-1"><?php echo $_SESSION['errors']['email'] ?? '' ?></div>
                    </div>
                    <div>
                        <input type="password" name="password" class="form-control <?php if (isset($_SESSION['errors']['password'])) {
                                                                                        echo 'mb-0';
                                                                                    } else {
                                                                                        echo 'mb-2';
                                                                                    } ?>" placeholder="Password" required />
                        <div class="text-danger text-left mb-1"><?php echo $_SESSION['errors']['password'] ?? '' ?></div>
                    </div>
                    <div>
                        <input type="password" name="password_confirm" class="form-control <?php if (isset($_SESSION['errors']['password_confirm'])) {
                                                                                                echo 'mb-0';
                                                                                            } else {
                                                                                                echo 'mb-2';
                                                                                            } ?>" placeholder="Password Confirmation" required />
                        <div class="text-danger text-left mb-1"><?php echo $_SESSION['errors']['password_confirm'] ?? '' ?></div>
                    </div>

                    <div class="row">

                        <div class="col-md-6 text-left"></div>

                        <div class="col-md-6 text-right">
                            <button class="btn btn-success text-white" id="submit_btn" type="submit">Register</button>
                        </div>

                    </div>

                    <div class="clearfix"></div>

                    <div class="separator">

                        <?php if (isset($_SESSION['verfication_email_not_sent'])) { ?>

                            <div class="row">
                                <div class="col-md-12 p-2">
                                    <span class="text-danger">We got an internal error, retry later</span>
                                </div>
                            </div>

                        <?php  } ?>

                        <?php if (isset($_SESSION['verfication_email_sent'])) { ?>

                            <div class="row">
                                <div class="col-md-12 p-2">
                                    <span class="text-info">You have been registered.Check your mail to acticate your account</span>
                                </div>
                            </div>

                        <?php  } ?>

                        <?php if (isset($_SESSION['Email_verified'])) { ?>

                            <div class="row">
                                <div class="col-md-12 p-2">
                                    <span class="text-info">Your account have been activated ! login now ! </span>
                                </div>
                            </div>

                        <?php  } ?>

                        <p class="change_link"> Already registered ?
                            <a href="<?php echo URL; ?>login" class="link-primary">Login</a>
                        </p>

                        <div class="clearfix"></div>
                        <br />

                        <div>
                            <h1><i class="fa fa-paw"></i> <?php echo APP_NAME ?></h1>
                            <p> &copy; <?php echo date('Y') ?> All Rights Reserved </p>
                        </div>

                    </div>

                </form>

            </section>

        </div>

    </div>

    <?php

    unset(
        $_SESSION['validated'],
        $_SESSION['errors'],
        $_SESSION['verfication_email_not_sent'],
        $_SESSION['verfication_email_sent'],
        $_SESSION['Email_verified'],
    );
