<div class="right_col">

    <div class="row">

        <div class="x_panel">

            <div class="x_content">

                <?php if (isset($profileData)) { ?>

                    <div class="col-md-4 offset-md-4 profile_details">

                        <div class="well profile_view">

                            <div class="col-sm-12">

                                <div class="left col-sm-8">
                                    <h2><?php echo $profileData->first_name . ' ' . strtoupper($profileData->last_name) ?></h2>

                                    <p><strong>About: </strong> Developer</p>

                                    <ul class="list-unstyled">
                                        <li><i class="fa fa-phone"></i> Phone: </li>
                                        <li><i class="fa fa-envelope"></i> Email: <?php echo  $profileData->email ?? ""?> </li>
                                        <li><i class="fa fa-history"></i> Last Update: <?php if ($profileData->updated) echo date("Y-m-d H:i:s", $profileData->updated); ?> </li>
                                    </ul>
                                </div>

                                <div class="left col-sm-4 text-center">
                                    <img src="<?php echo URL . 'img/avatars/' . $profileData->id . '/' . $profileData->avatar ?? URL . 'img/user.png' ?>" alt="<?php echo $profileData->avatar ?? 'img' ?>" class="img-circle img-fluid">
                                </div>

                            </div>

                            <div class=" bottom text-center">
                                <div class=" col-sm-6 text-left">
                                    <a href="<?php echo URL ?>changeEmail" class="btn btn-primary btn-sm">
                                        <i class="fa fa-pencil"> </i> Change Email
                                    </a>
                                </div>
                                <div class="col-sm-6 text-right">
                                    <a href="<?php echo URL ?>profile/edit/<?php echo $profileData->id ?? '' ?>" class="btn btn-primary btn-sm">
                                        <i class="fa fa-pencil"> </i> Edit Profile
                                    </a>
                                </div>
                            </div>

                        </div>

                    </div>
                <?php } ?>

            </div>

        </div>

    </div>

</div>