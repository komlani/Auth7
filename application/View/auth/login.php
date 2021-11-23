<body class="login">

    <div class="login_wrapper">

        <div class="animate form login_form">

            <section class="login_content">

                <form action="<?php echo URL  ?>login/store" method="POST">

                    <h1>Login</h1>

                    <input type="hidden" name="_token" value="<?php echo $_SESSION['auth7_token'] ?>">

                    <div>
                        <input type="email" name="email" value="<?php echo 'bozer@mailinator.com'?? $_SESSION['validated']['email'] ?? '' ?>" class="form-control <?php if (isset($_SESSION['errors']['password'])) {
                                                                                                                                                echo 'mb-0';
                                                                                                                                            } else {
                                                                                                                                                echo 'mb-2';
                                                                                                                                            } ?>" placeholder="Email" autocomplete="off" autofocus required />
                        <div class="text-danger text-left mb-1"><?php echo $_SESSION['errors']['email'] ?? '' ?></div>
                    </div>
                    <div>
                        <input type="password" name="password" class="form-control <?php if (isset($_SESSION['errors']['password'])) {
                                                                                        echo 'mb-0';
                                                                                    } else {
                                                                                        echo 'mb-2';
                                                                                    } ?> " autocomplete="off" placeholder="Password" required />
                        <div class="text-danger text-left mb-1"><?php echo $_SESSION['errors']['password'] ?? '' ?></div>
                    </div>

                    <div class="row">

                        <div class="col-md-6 text-left">

                            <label for="remember_me">

                                <div class="checkbox">
                                    <div class="icheckbox_flat-green" style="position: relative;">
                                        <input type="checkbox" name="remember_me" value="1" class="flat" id="remember_me" style="position: absolute; opacity: 0;">
                                        <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                    </div> Remember me
                                </div>
                            </label>


                        </div>

                        <div class="col-md-6 text-right">

                            <button class="btn btn-success text-white" id="submit_btn" type="submit">Log in</button>

                        </div>

                    </div>

                    <div class="clearfix"></div>

                    <div class="separator">

                        <?php if (isset($_SESSION['connexion_error'])) { ?>

                            <div class="row">
                                <div class="col-md-12 p-2">
                                    <span class="text-danger"><?php echo $_SESSION['connexion_error'] ?></span>
                                </div>
                            </div>
                        <?php  } ?>

                        <?php if (isset($_SESSION['password_reseted'])) { ?>

                            <div class="row">
                                <div class="col-md-12 p-2">
                                    <span class="text-info">Password reseted, login now ! </span>
                                </div>
                            </div>
                        <?php  } ?>

                        <p class="change_link">
                            <a href="<?php echo URL; ?>forgotPassword" class="link-primary mr-3">Forgot Password ?</a>
                            <a href="<?php echo URL; ?>register" class="to_register">Create Account</a>
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
        $_SESSION['connexion_error'],
    );
