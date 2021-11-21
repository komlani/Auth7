<body class="login">

    <div class="login_wrapper">

        <div class="animate form login_form">

            <section class="login_content">

                <form action="<?php echo URL ?>forgotPassword/store" method="POST">

                    <h1>Forgot Password</h1>

                    <div class="text-left">
                        Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.
                    </div>

                    <input type="hidden" name="_token" value="<?php echo $_SESSION['auth7_token'] ?>">

                    <div class="mt-2">
                        <input type="email" name="email" value="<?php echo $_SESSION['validated']['email'] ?? '' ?>" class="form-control <?php if (isset($_SESSION['errors']['email'])) {
                                                                                                                                                echo 'mb-0';
                                                                                                                                            } else {
                                                                                                                                                echo 'mb-2';
                                                                                                                                            } ?>" placeholder="Email" autofocus required />
                        <div class="text-danger text-left mb-1"><?php echo $_SESSION['errors']['email'] ?? '' ?></div>
                    </div>

                    <div class="row">

                        <div class="col-md-6 text-left"></div>
                        <div class="col-md-6 text-right">
                            <button class="btn btn-success text-white" id="submit_btn" type="submit">Send Link</button>
                        </div>

                    </div>

                    <div class="clearfix"></div>

                    <div class="separator">

                        <?php if (isset($_SESSION['forgot_password_email_not_sent'])) { ?>

                            <div class="row">
                                <div class="col-md-12 p-2">
                                    <span class="text-danger">We got an internal error, retry later</span>
                                </div>
                            </div>

                        <?php  } ?>

                        <?php if (isset($_SESSION['forgot_password_email_sent'])) { ?>

                            <div class="row">
                                <div class="col-md-12 p-2">
                                    <span class="text-info">Check your mails to recover your login credentials</span>
                                </div>
                            </div>

                        <?php  } ?>

                        <p class="change_link">Remember credentials ?
                            <a href="<?php echo URL . 'login' ?>" class="link-primary">Login</a>
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
        $_SESSION['forgot_password_email_sent'],
        $_SESSION['forgot_password_email_not_sent'],
    );
