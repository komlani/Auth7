<body class="login">

    <div class="login_wrapper">

        <div class="animate form login_form">

            <section class="login_content">


                <h1>Verify Email</h1>

                <div class="text-justify">
                    <b>Thanks for signing up! </b> Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn't receive the email, we will gladly send you another.
                </div>

                <div class="separator">

                    <?php if (isset($_SESSION['validation_error'])) { ?>

                        <div class="row">
                            <div class="col-md-12 p-2">
                                <span class="text-danger">We got an error, retry later</span>
                            </div>
                        </div>

                    <?php } ?>

                    <p class="change_link">
                    <form action="<?php echo URL  ?>verifyEmail/store" method="POST">

                        <input type="hidden" name="_token" value="<?php echo $_SESSION['auth7_token'] ?>">
                        <input type="hidden" name="email" value="fake@email.com">

                        <?php if (isset($_SESSION["verification_email_sent"])) { ?>
                            <button type="submit" class="link-primary mr-3" style="color: #5A738E;border: none;background-color: transparent;">Resend Verification Email ?</button>
                        <?php } else { ?>
                            <button type="submit" class="link-primary mr-3" style="color: #5A738E;border: none;background-color: transparent;">Send Verification Email ?</button>
                        <?php } ?>

                        <a href="<?php echo URL; ?>login/destroy" class="to_register">Logout</a>

                    </form>
                    </p>

                    <div class="clearfix"></div>
                    <br />

                    <div>
                        <h1><i class="fa fa-paw"></i> <?php echo APP_NAME ?></h1>
                        <p> &copy; <?php echo date("Y") ?> All Rights Reserved </p>
                    </div>

                </div>


            </section>

        </div>

    </div>

    <?php

    unset(
        $_SESSION["validation_error"],
        $_SESSION['verification_email_not_sent'],
    );
