
<div class="right_col">

    <div class="row">

        <div class="x_panel">

            <div class="x_content">
            
                <?php if (isset($humanInfo)) { ?>

                    <div class="col-md-4 offset-md-4 profile_details">

                        <div class="well profile_view">

                            <div class="col-sm-12">

                                <div class="left col-sm-8">
                                    <h2><?php echo $humanInfo->first_name . ' ' . strtoupper($humanInfo->last_name) ?></h2>

                                    <p><strong>About: </strong> Developer</p>

                                    <ul class="list-unstyled">
                                        <li><i class="fa fa-phone"></i> Phone #: </li>
                                        <li><i class="fa fa-history"></i> Last Update: <?php if($humanInfo->updated) echo date("Y-m-d H:i:s",$humanInfo->updated); ?> </li>
                                    </ul>
                                </div>

                                <div class="left col-sm-4 text-center">
                                    <img src="<?php if(isset($humanInfo->avatar)){echo URL.'img/avatars/'.$humanInfo->avatar;}else{echo URL.'img/img.jpg';}  ?>" alt="" class="img-circle img-fluid">
                                </div>

                            </div>

                            <div class=" bottom text-center">
                                <div class=" col-sm-6"> </div>
                                <div class="col-sm-6 text-right">
                                    <a href="<?php echo URL ?>profile/edit/<?php echo $humanInfo->human_id ?>" class="btn btn-primary btn-sm">
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