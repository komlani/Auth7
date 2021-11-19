<body class="login">
    <div>
        <div class="login_wrapper">
            <div class="animate form login_form">
                <section class="login_content">
                    <form>
                        <h1>Forgot Password</h1>
                        <div class="text-left">
                        Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.
                        </div>
                        <div class="mt-2">
                            <input type="email" class="form-control" placeholder="Email" autofocus required />
                        </div>
                       

                        <div class="row">
                            <div class="col-md-6 text-left">

                            </div>
                            <div class="col-md-6 text-right">
                                <button class="btn btn-success text-white" id="submit_btn" type="submit">Send Link</button>
                            </div>
                        </div>
                        <div class="clearfix"></div>

                        <div class="separator">
                            <p class="change_link">Remember credentials ?
                                <a href="<?php echo URL. 'login' ?>" class="link-primary">Login</a>
                               
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
    </div>