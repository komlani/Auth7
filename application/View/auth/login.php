<body class="login">

    <div class="login_wrapper">

        <div class="animate form login_form">

            <section class="login_content">

                <form>

                    <h1>Login</h1>

                    <div>
                        <input type="email" class="form-control" placeholder="Email" autofocus required />
                    </div>
                    <div>
                        <input type="password" class="form-control" placeholder="Password" required />
                    </div>

                    <div class="row">

                        <div class="col-md-6 text-left">

                            <div class="checkbox">
                                <label class="">
                                    <div class="icheckbox_flat-green" style="position: relative;"><input type="checkbox" class="flat" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> Remember me
                                </label>
                            </div>

                        </div>

                        <div class="col-md-6 text-right">

                            <button class="btn btn-success text-white" id="submit_btn" type="submit">Log in</button>

                        </div>

                    </div>

                    <div class="clearfix"></div>

                    <div class="separator">

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