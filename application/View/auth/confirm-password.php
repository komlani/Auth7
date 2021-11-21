<body class="login">

    <div class="login_wrapper">

        <div class="animate form login_form">

            <section class="login_content">

                <form action="<?php echo URL ?>confirmPassword/store" method="POST">

                    <h1>Confirm Password</h1>

                    <div class="text-justify">
                        This is a secure area of the application. Please confirm your password before continuing.
                    </div>

                    <input type="hidden" name="_token" value="<?php echo $_SESSION['auth7_token'] ?>">


                    <div class="mt-2">
                        <input type="password" name="password" class="form-control pt-2 <?php if (isset($_SESSION['errors']['password'])) {
                                                                                            echo 'mb-0';
                                                                                        } else {
                                                                                            echo 'mb-2';
                                                                                        } ?>" placeholder="Confirm Password"  autofocus autocomplete="false" />
                        <div class="text-danger text-left mb-1"><?php echo $_SESSION['errors']['password'] ?? '' ?></div>
                    </div>

                    <div class="row">

                        <div class="col-md-6 text-left"></div>
                        <div class="col-md-6 text-right">
                            <button class="btn btn-success text-white" id="submit_btn" type="submit">Confirm</button>
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
    );
