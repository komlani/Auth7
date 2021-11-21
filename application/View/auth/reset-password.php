<body class="login">

    <div class="login_wrapper">

        <div class="animate form login_form">

            <section class="login_content">

                <form action="<?php echo URL  ?>resetPassword/store" method="POST">

                    <h1>Reset Password</h1>

                    <input type="hidden" name="_token" value="<?php echo $_SESSION['auth7_token'] ?? '' ?>">
                    <input type="hidden" name="token" value="<?php echo $_SESSION['token'] ?? '' ?>">
                    <input type="hidden" name="selector" value="<?php echo $_SESSION['selector'] ?? '' ?>">

                    <div>
                        <input type="email" name="email" value="<?php if (isset($_SESSION['email'])) {
                                                                    echo $_SESSION['email'];
                                                                } else {
                                                                    if (isset($_SESSION['validated']['email'])) {
                                                                        echo  $_SESSION['validated']['email'];
                                                                    }
                                                                } ?>" class="form-control <?php if (isset($_SESSION['errors']['email'])) {
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
                                                                                    } ?>" placeholder="Password" required autofocus />
                        <div class="text-danger text-left mb-1"><?php echo $_SESSION['errors']['password'] ?? '' ?></div>
                    </div>
                    <div>
                        <input type="password" name="password_confirm" class="form-control <?php if (isset($_SESSION['errors']['password_confirm'])) {
                                                                                                echo 'mb-0';
                                                                                            } else {
                                                                                                echo 'mb-2';
                                                                                            } ?>" required placeholder="Password Confirmation" />
                        <div class="text-danger text-left mb-1"><?php echo $_SESSION['errors']['password_confirm'] ?? '' ?></div>
                    </div>

                    <div class="row">

                        <div class="col-md-6 text-left"></div>

                        <div class="col-md-6 text-right">
                            <button class="btn btn-success text-white" id="submit_btn" type="submit">Reset Password</button>
                        </div>

                    </div>

                    <div class="clearfix"></div>

                    <div class="separator">

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
        $_SESSION['email'],
        $_SESSION['token'],
    );
